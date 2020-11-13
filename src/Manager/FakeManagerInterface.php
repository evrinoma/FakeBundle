<?php


namespace Evrinoma\FakeBundle\Manager;

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
     * @param string $entityType
     *
     * @return array
     */
    public function getlog(string $entityType):array;

    /**
     * @return array
     */
    public function getEntityTypes():array;

    /**
     * @return array
     */
    public function getGroups(): array;

    /**
     * @param string|null $type
     *
     * @param string|null $entityType
     *
     * @return array
     */
    public function getService(string $type, string $entityType): array;
}
