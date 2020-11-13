<?php


namespace Evrinoma\FakeBundle\Fake;

use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\SerializedName;


final class Record
{
//region SECTION: Fields
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $uid;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var string
     */
    private $message;
    /**
     * @var \stdClass
     * @Exclude
     */
    private $status;
    /**
     * @var string
     */
    private $event;
    /**
     * @var int
     */
    private $code;
//endregion Fields

//region SECTION: Constructor
    /**
     * Record constructor.
     *
     * @param int       $id
     * @param string    $uid
     * @param string $date
     * @param string    $message
     * @param \stdClass $status
     * @param string    $event
     * @param int       $code
     */
    public function __construct(int $id, string $uid, string $date, string $message, \stdClass $status, string $event, int $code)
    {
        $this->id      = $id;
        $this->uid     = $uid;
        $this->date    = new \DateTime($date);
        $this->message = $message;
        $this->status  = $status;
        $this->event   = $event;
        $this->code    = $code;
    }
//endregion Constructor

//region SECTION: Getters/Setters

    /**
     * @VirtualProperty
     * @SerializedName("status")
     * @return array
     */
    public function serializeStatus():array
    {
        return  json_decode(json_encode($this->status), true);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

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
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return \stdClass
     */
    public function getStatus(): \stdClass
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $id
     *
     * @return Record
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $uid
     *
     * @return Record
     */
    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @param \DateTime $date
     *
     * @return Record
     */
    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return Record
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param \stdClass $status
     *
     * @return Record
     */
    public function setStatus(\stdClass $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param string $event
     *
     * @return Record
     */
    public function setEvent(string $event): self
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @param int $code
     *
     * @return Record
     */
    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }
//endregion Getters/Setters

}