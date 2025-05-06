<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServerSDK\Transports;

use Yamayuski\PhpMcpServerSDK\Messages\JSONRPCMessageInterface;

/**
 * Stream parser for JSON-RPC messages.
 */
interface StreamParserInterface
{
    /**
     * @param string $data raw stream data
     * @return JSONRPCMessageInterface[]
     */
    public function parse(string $data): array;
}
