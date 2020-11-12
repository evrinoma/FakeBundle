<?php

namespace Evrinoma\FakeBundle\Manager;


use Evrinoma\UtilsBundle\Manager\AbstractBaseManager;
use Evrinoma\UtilsBundle\Rest\RestTrait;


/**
 * Class FakeManager
 *
 * @package Evrinoma\FakeBundle\Manager
 */
final class FakeManager extends AbstractBaseManager implements FakeManagerInterface
{
    use RestTrait;

    public function getRestStatus(): int
    {
        return $this->status;
    }
}