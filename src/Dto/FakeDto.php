<?php

namespace Evrinoma\FakeBundle\Dto;


use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\FakeBundle\Wrapper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class FakeDto
 *
 * @package Evrinoma\FakeBundle\Dto
 */
class FakeDto extends AbstractDto
{
//region SECTION: Fields
    /**
     * @var string
     */
    private $entityType;

    /**
     * @var string
     */
    private $group;
//endregion Fields

//region SECTION: Protected
    /**
     * @return mixed
     */
    protected function getClassEntity()
    {
        return null;
    }
//endregion Protected

//region SECTION: Public
    /**
     * @param $entity
     *
     * @return mixed
     */
    public function fillEntity($entity)
    {
        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function lookingForRequest()
    {
        return DtoInterface::DEFAULT_LOOKING_REQUEST;
    }

//endregion Public

//region SECTION: Dto
    /**
     * @param Request $request
     *
     * @return AbstractDto
     */
    public function toDto($request)
    {
        $entity = $request->get('entity_type');
        $group = $request->get('group');

        if ($entity) {
            $this->setEntityType($entity);
        }

        if ($group) {
            $this->setGroup($group);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function hasEntityType(): bool
    {
        return $this->entityType != null;
    }

    /**
     * @return bool
     */
    public function hasGroup(): bool
    {
        return $this->group != null;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entityType;
    }

    /**
     * @param mixed $entityType
     *
     * @return FakeDto
     */
    public function setEntityType($entityType): self
    {
        $this->entityType = $entityType;

        return $this;
    }

    /**
     * @param mixed $group
     *
     * @return FakeDto
     */
    public function setGroup($group): self
    {
        $this->group = $group;

        return $this;
    }
//endregion SECTION: Dto


}