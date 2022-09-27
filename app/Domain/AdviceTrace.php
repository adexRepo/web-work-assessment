<?php


namespace web\work\assessment\Domain;

use DateTime;

class AdviceTrace
{
    private string $adviceId;
    private string $userId;
    private string $title;
    private string $message;
    private DateTime $dateRegist;
    private DateTime $dateUpdated;

    /**
     * Get the value of userId
     *
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param string $userId
     *
     * @return self
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of dateRegist
     *
     * @return DateTime
     */
    public function getDateRegist(): DateTime
    {
        return $this->dateRegist;
    }

    /**
     * Set the value of dateRegist
     *
     * @param DateTime $dateRegist
     *
     * @return self
     */
    public function setDateRegist(DateTime $dateRegist): self
    {
        $this->dateRegist = $dateRegist;

        return $this;
    }

    /**
     * Get the value of dateUpdated
     *
     * @return DateTime
     */
    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * Set the value of dateUpdated
     *
     * @param DateTime $dateUpdated
     *
     * @return self
     */
    public function setDateUpdated(DateTime $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get the value of adviceId
     */ 
    public function getAdviceId()
    {
        return $this->adviceId;
    }

    /**
     * Set the value of adviceId
     *
     * @return  self
     */ 
    public function setAdviceId($adviceId)
    {
        $this->adviceId = $adviceId;

        return $this;
    }
}
