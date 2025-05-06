#!/bin/bash

set -eu

npx @modelcontextprotocol/inspector php e2e/index.php "${@}"
