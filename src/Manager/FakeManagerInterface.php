<?php


namespace Evrinoma\FakeBundle\Manager;

use Evrinoma\FakeBundle\Dto\FakeDto;
use Evrinoma\UtilsBundle\Manager\BaseInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

/**
 * Interface FakeManagerInterface
 *
 * @package Evrinoma\FakeBundle\Manager
 */
interface FakeManagerInterface extends RestInterface, BaseInterface
{
    /**
     * @param FakeDto $dto
     *
     * @return array
     */
    public function getlog(FakeDto $dto):array;

    /**
     * @return array
     */
    public function getEntityTypes():array;

    /**
     * @return array
     */
    public function getGroups(): array;

    /**
     * @param FakeDto $dto
     *
     * @return array
     */
    public function getService(FakeDto $dto): array;
}
