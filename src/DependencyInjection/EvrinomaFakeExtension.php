<?php


namespace Evrinoma\FakeBundle\DependencyInjection;

use Evrinoma\FakeBundle\EvrinomaFakeBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class EvrinomaFakeExtension
 *
 * @package Evrinoma\FakeBundle\DependencyInjection
 */
class EvrinomaFakeExtension extends Extension
{
//region SECTION: Fields
    private $container;
//endregion Fields

//region SECTION: Public
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
//endregion Public


//region SECTION: Getters/Setters
    public function getAlias()
    {
        return EvrinomaFakeBundle::FAKE_BUNDLE;
    }
//endregion Getters/Setters
}