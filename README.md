# PHP MCP Server sdk

## Requirements

* PHP 8.2+

## Overview

* Build MCP servers that expose resources, prompts and tools on PHP
* Use standard transports like stdio and Streamable HTTP(SSE)
* Handle all MCP protocol messages and lifecycle events

## Installation

```s
$ composer require yamayuski/php-mcp-server-sdk
```

## Development

You need [Development containers](https://containers.dev/) with [vscode](https://code.visualstudio.com/docs/devcontainers/create-dev-container) or [PhpStorm](https://www.jetbrains.com/help/phpstorm/connect-to-devcontainer.html)

```s
$ composer install

# Unit test
$ composer test

# Inspector test
$ ./start-inspector.sh
```

## LICENSE

Under [Apache-2.0](./LICENSE).
