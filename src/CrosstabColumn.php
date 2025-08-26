<?php

namespace PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos;

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
