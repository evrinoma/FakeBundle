<?php


namespace Evrinoma\FakeBundle;


use Evrinoma\FakeBundle\DependencyInjection\EvrinomaFakeExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class EvrinomaFakeBundle
 *
 * @package Evrinoma\FakeBundle
 */
class EvrinomaFakeBundle extends Bundle
{
    public const FAKE_BUNDLE = 'fake';

//region SECTION: Getters/Setters
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaFakeExtension();
        }

        return $this->extension;
    }
//endregion Getters/Setters
}