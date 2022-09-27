<?php

namespace web\work\assessment\Model;

class SendAdviceRequest
{
    private ?string $adviceId = null;
    private ?string $userId = null;
    private ?string $title = null;
    private ?string $message = null;

    /**
     * Get the value of userId
     *
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param ?string $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param ?string $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of message
     *
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param ?string $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

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