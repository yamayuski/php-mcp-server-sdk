<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServerSDK\Transports;

use Revolt\EventLoop;
use RuntimeException;

use function stream_set_blocking;
use function fread;
use function is_resource;
use function feof;
use function assert;

/**
 * The client launches the MCP server as a subprocess.
 * The server reads JSON-RPC messages from its standard input (stdin) and sends messages to its standard output (stdout).
 * Messages may be JSON-RPC requests, notifications, responses—or a JSON-RPC batch containing one or more requests and/or notifications.
 * Messages are delimited by newlines, and MUST NOT contain embedded newlines.
 * The server MAY write UTF-8 strings to its standard error (stderr) for logging purposes. Clients MAY capture, forward, or ignore this logging.
 * The server MUST NOT write anything to its stdout that is not a valid MCP message.
 * The client MUST NOT write anything to the server’s stdin that is not a valid MCP message.
 * @link https://modelcontextprotocol.io/specification/2025-03-26/basic/transports#stdio
 */
class StdioTransport implements TransportInterface
{
    private const IO_GRANULARITY = 32_768;

    private bool $started = false;

    private ?string $callbackId = null;

    /**
     * @param mixed $stdin
     * @param mixed $stdout
     */
    public function __construct(
        private readonly StreamParserInterface $parser,
        private $stdin,
        private $stdout,
    ) {
        assert(is_resource($this->stdin));
        assert(is_resource($this->stdout));
    }

    /**
     * @link https://revolt.run/streams
     */
    public function start(): void
    {
        if ($this->started) {
            throw new RuntimeException('Transport is already started');
        }

        assert(is_resource($this->stdin));

        // @link https://revolt.run/streams
        if (stream_set_blocking($this->stdin, false) !== true) {
            throw new RuntimeException('Failed to set STDIN to non-blocking mode');
        }

        $this->callbackId = EventLoop::onReadable($this->stdin, function (string $callbackId, $socket): void {
            $newData = @fread($socket, self::IO_GRANULARITY);
            if ($newData !== '' && $newData !== false) {
                // Process incremental data
                $parsedData = $this->parser->parse($newData);
            } elseif (! is_resource($socket) || @feof($socket)) {
                // Stop loop
                $this->started = false;
                EventLoop::cancel($callbackId);
            }
        });

        $this->started = true;

        EventLoop::run();
    }

    public function close(): void
    {
        if ($this->started) {
            $this->started = false;
        }
        if ($this->callbackId !== null) {
            EventLoop::cancel($this->callbackId);
        }
    }

    public function send(string $data): void
    {
        assert(is_resource($this->stdout));
        @fwrite($this->stdout, $data);
    }
}
