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
     * @param string $type
     *
     * @return array
     */
    public function getStatus(string $type):array;

    /**
     * @param string $server
     *
     * @return array
     */
    public function getService(string $server):array;
}