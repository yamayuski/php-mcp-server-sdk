<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServerSDK\Transports;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StdioTransport::class)]
class StdioTransportTest extends TestCase
{
    public function testCanInstantiateStdioTransport(): void
    {
        $this->markTestIncomplete();
    }

    public function testSendWritesToStdout(): void
    {
        $this->markTestIncomplete();
    }

    public function testReceiveReadsFromStdin(): void
    {
        $this->markTestIncomplete();
    }
}
