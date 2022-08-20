<?php

namespace web\work\assessment\Model;

use web\work\assessment\Domain\PackageSendedTrace;

class SendReportPackageResponse
{
    private PackageSendedTrace $historyReport;

    /**
     * Get the value of historyReport
     */ 
    public function getHistoryReport()
    {
        return $this->historyReport;
    }

    /**
     * Set the value of historyReport
     *
     * @return  self
     */ 
    public function setHistoryReport($historyReport)
    {
        $this->historyReport = $historyReport;

        return $this;
    }
}