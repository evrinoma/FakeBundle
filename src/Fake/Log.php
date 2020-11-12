<?php


namespace Evrinoma\FakeBundle\Fake;


use Evrinoma\UtilsBundle\Entity\ActiveTrait;

final class Log
{
    use ActiveTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $stream = [];

    /**
     * @var string
     */
    private $status;

}