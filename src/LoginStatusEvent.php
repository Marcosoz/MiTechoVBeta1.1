<?php

namespace PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Login Status Event
 */
class LoginStatusEvent extends GenericEvent
{
    public const NAME = "login.status";
}
