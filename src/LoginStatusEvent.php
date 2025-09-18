<?php

namespace PHPMaker2025\project290825TrabajosCreatedAT;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Login Status Event
 */
class LoginStatusEvent extends GenericEvent
{
    public const NAME = "login.status";
}
