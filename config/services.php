<?php
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
$services = $containerConfigurator->services();

$services->defaults()->autowire();

$services->set(App\Repository\ArcaneRepository::class);

$services->load('App\\Repository\\', __DIR__ . '/../src/Repository');
};
