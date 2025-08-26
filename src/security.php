<?php

namespace PHPMaker2025\project250825NoRepiteCIniEmailEnNuevosIngresos;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension('security', Config('SECURITY'));
};
