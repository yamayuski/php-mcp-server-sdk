<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])

    // add a single rule
    ->withRules([
        NoUnusedImportsFixer::class,
    ])

    ->withPhpCsFixerSets(
        per: true,
        perCS: true,
        perCS10: true,
        perCS20: true,
        php83Migration: true,
        php84Migration: true,
        psr1: true,
        psr2: true,
        psr12: true,
    )

    // add sets - group of rules
    ->withPreparedSets(
        arrays: true,
        namespaces: true,
        spaces: true,
        docblocks: true,
        comments: true,
        psr12: true,
        symplify: true,
        controlStructures: true,
        phpunit: true,
        strict: true,
        cleanCode: true,
    )

;
