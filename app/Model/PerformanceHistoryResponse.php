<?php

namespace web\work\assessment\Model;

class PerformanceHistoryResponse
{
    private array $performanceHistory;
    private int $averagePackageMonthly;

    /**
     * @return array
     */
    function getPerformanceHistory(): array {
        return $this->performanceHistory;
    }
    
    /**
     * @param array $performanceHistory 
     * @return PerformanceHistoryResponse
     */
    function setPerformanceHistory(array $performanceHistory): self {
        $this->performanceHistory = $performanceHistory;
        return $this;
    }

        /**
     * Get the value of averagePackageMonthly
     */ 
    public function getAveragePackageMonthly()
    {
        return $this->averagePackageMonthly;
    }

    /**
     * Set the value of averagePackageMonthly
     *
     * @return  self
     */ 
    public function setAveragePackageMonthly($averagePackageMonthly)
    {
        $this->averagePackageMonthly = $averagePackageMonthly;

        return $this;
    }
}