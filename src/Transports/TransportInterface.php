<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServerSDK\Transports;

/**
 * MCP uses JSON-RPC to encode messages. JSON-RPC messages MUST be UTF-8 encoded.
 *
 * The protocol currently defines two standard transport mechanisms for client-server communication:
 *
 * * stdio, communication over standard in and standard out
 * * Streamable HTTP
 *
 * Clients SHOULD support stdio whenever possible.
 *
 * It is also possible for clients and servers to implement custom transports in a pluggable fashion.
 *
 * @link https://modelcontextprotocol.io/specification/2025-03-26/basic/transports
 */
interface TransportInterface
{
    /**
     * Start to listen for incoming messages.
     */
    public function start(): void;

    /**
     * Close the transport safely.
     */
    public function close(): void;

    /**
     * Send a message to the server.
     */
    public function send(string $data): void;
}
