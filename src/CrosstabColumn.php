<?php

namespace PHPMaker2025\project240825;

/**
 * Crosstab column class
 */
class CrosstabColumn
{

    public function __construct(
        public string $Caption,
        public mixed $Value,
        public bool $Visible = true,
    ) {
    }
}
