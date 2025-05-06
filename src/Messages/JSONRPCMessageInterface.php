<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServer\Messages;

interface JSONRPCMessageInterface
{
    public function getVersion(): string;

    public function getId(): string | int | null;
}
