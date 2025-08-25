<?php

namespace PHPMaker2025\project250825AsignacionAutomaticaCoopASocios;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Page Unloaded Event
 */
class PageUnloadedEvent extends GenericEvent
{
    public const NAME = "page.unloaded";

    public function getPage(): mixed
    {
        return $this->subject;
    }
}
