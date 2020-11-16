<?php


namespace Evrinoma\FakeBundle\Fake;


use Evrinoma\UtilsBundle\Entity\ActiveTrait;

final class Log
{
    use ActiveTrait;

//region SECTION: Fields
    /**
     * @var \DateTime
     */
    private $date;

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
     * @var Record[]
     */
    private $stream = [];

    /**
     * @var string
     */
    private $status;
//endregion Fields

//region SECTION: Constructor
    /**
     * Log constructor.
     *
     * @param string $date
     * @param string $name
     * @param string $type
     * @param array  $options
     * @param array  $stream
     * @param string $status
     *
     * @throws \Exception
     */
    public function __construct(string $date, string $name, string $type, array $options, array $stream, string $status)
    {
        $this->date    = new \DateTime($date);
        $this->name    = $name;
        $this->type    = $type;
        $this->options = $options;
        $this->stream  = $stream;
        $this->status  = $status;
    }
//endregion Constructor

//region SECTION: Getters/Setters
    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getStream(): array
    {
        return $this->stream;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param \DateTime $date
     *
     * @return Log
     */
    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Log
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return Log
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $options
     *
     * @return Log
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param array $stream
     *
     * @return Log
     */
    public function setStream(array $stream): self
    {
        $this->stream = $stream;

        return $this;
    }

    /**
     * @param string $status
     *
     * @return Log
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
//endregion Getters/Setters

}