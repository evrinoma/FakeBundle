<?php


namespace Evrinoma\FakeBundle\DependencyInjection;

use Evrinoma\FakeBundle\EvrinomaFakeBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Evrinoma\FakeBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
//region SECTION: Getters/Setters
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(EvrinomaFakeBundle::FAKE_BUNDLE);
        $rootNode    = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
//endregion Getters/Setters
}
