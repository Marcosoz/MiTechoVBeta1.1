<?php

namespace PHPMaker2025\project240825SeleccionarManualCoop;

use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * User activated by Login Link but login is required
 */
class UserActivatedException extends AuthenticationException
{
}
