<?php

namespace PHPMaker2025\project290825TrabajosCreatedAT;

use Symfony\Component\EventDispatcher\GenericEvent;
use Slim\Interfaces\RouteCollectorProxyInterface;

/**
 * Routes Event
 */
class RouteActionEvent extends GenericEvent
{
    public const NAME = "route.action";

    public function getApp(): RouteCollectorProxyInterface
    {
        return $this->subject;
    }
}
