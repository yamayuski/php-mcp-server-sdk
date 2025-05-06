<?php

declare(strict_types=1);

namespace Yamayuski\PhpMcpServerSDK\Messages;

interface JSONRPCMessageInterface
{
    public function getVersion(): string;

    public function getId(): string | int | null;
}
