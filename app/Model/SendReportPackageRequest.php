<?php

namespace web\work\assessment\Model;

class SendReportPackageRequest
{

    private ?string $packageId = null;
    private ?string $userId = null;
    private ?string $date = null;
    private ?int $totalPackage = null;
    private ?string $codeRemark = null;
    private ?string $remark = null;


    /**
     * Get the value of packageId
     */ 
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * Set the value of packageId
     *
     * @return  self
     */ 
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;

        return $this;
    }

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
     * Get the value of totalPackage
     */ 
    public function getTotalPackage()
    {
        return $this->totalPackage;
    }

    /**
     * Set the value of totalPackage
     *
     * @return  self
     */ 
    public function setTotalPackage($totalPackage)
    {
        $this->totalPackage = $totalPackage;

        return $this;
    }

    /**
     * Get the value of codeRemark
     */ 
    public function getCodeRemark()
    {
        return $this->codeRemark;
    }

    /**
     * Set the value of codeRemark
     *
     * @return  self
     */ 
    public function setCodeRemark($codeRemark)
    {
        $this->codeRemark = $codeRemark;

        return $this;
    }

    /**
     * Get the value of remark
     */ 
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set the value of remark
     *
     * @return  self
     */ 
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }
}
