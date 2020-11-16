<?php
namespace Evrinoma\FakeBundle\Fake;

use Evrinoma\UtilsBundle\Entity\ActiveTrait;

final class Service
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
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $options;

    /**
     * Service constructor.
     *
     * @param string $name
     * @param string $type
     * @param string $url
     * @param array  $options
     */
    public function __construct(string $name, string $type, string $url, array $options)
    {
        $this->name    = $name;
        $this->type    = $type;
        $this->url     = $url;
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Service
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Service
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return Service
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     *
     * @return Service
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }


}