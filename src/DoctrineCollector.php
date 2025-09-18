<?php

namespace PHPMaker2025\project290825TrabajosCreatedAT;

use DebugBar\Bridge\DoctrineCollector as BaseDoctrineCollector;

/**
 * Collects Doctrine queries
 *
 * Uses the DebugStack logger to collects data about queries
 */
class DoctrineCollector extends BaseDoctrineCollector
{

    public function __construct(DebugStack $debugStack)
    {
        $this->debugStack = $debugStack;
    }
}
