<?php

namespace Evrinoma\FakeBundle\Form\Rest;

use Evrinoma\FakeBundle\Manager\FakeManagerInterface;
use Evrinoma\UtilsBundle\Form\Rest\RestChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EntityType
 *
 * @package Evrinoma\FakeBundle\Form\Rest
 */
class EntityType extends AbstractType
{
//region SECTION: Fields
    /**
     * @var FakeManagerInterface
     */
    private $fakeManager;
//endregion Fields
//endregion Fields

//region SECTION: Constructor
    /**
     * ServerType constructor.
     */
    public function __construct(FakeManagerInterface $fakeManager)
    {
        $this->fakeManager = $fakeManager;
    }
//endregion Constructor

//region SECTION: Public
    public function configureOptions(OptionsResolver $resolver)
    {
        $callback = function (Options $options) {
            return $this->fakeManager->getEntityTypes();
        };
        $resolver->setDefault(RestChoiceType::REST_COMPONENT_NAME, 'entityType');
        $resolver->setDefault(RestChoiceType::REST_DESCRIPTION, 'entityTypeList');
        $resolver->setDefault(RestChoiceType::REST_CHOICES, $callback);
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getParent()
    {
        return RestChoiceType::class;
    }
//endregion Getters/Setters
}