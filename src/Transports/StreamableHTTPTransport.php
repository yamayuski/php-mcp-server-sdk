<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServerSDK\Transports;

/**
 * In the Streamable HTTP transport, the server operates as an independent process
 * that can handle multiple client connections.
 * This transport uses HTTP POST and GET requests.
 * Server can optionally make use of Server-Sent Events (SSE) to stream multiple server messages.
 * This permits basic MCP servers, as well as more feature-rich servers supporting streaming
 * and server-to-client notifications and requests.
 *
 * The server MUST provide a single HTTP endpoint path
 * (hereafter referred to as the MCP endpoint) that
 * supports both POST and GET methods. For example, this could be a URL like https://example.com/mcp.
 */
class StreamableHTTPTransport implements TransportInterface
{
    public function start(): void {}

    public function close(): void {}

    public function send(string $data): void {}
}
