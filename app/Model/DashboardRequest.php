<?php

namespace web\work\assessment\Model;

class DashboardRequest
{
    private ?string $userId   = null ;
    private ?string $date = null;

    private ?int $departement= null ;

    private ?string $contract   = null ;

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of contract
     */ 
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set the value of contract
     *
     * @return  self
     */ 
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get the value of departement
     */ 
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set the value of departement
     *
     * @return  self
     */ 
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }
}