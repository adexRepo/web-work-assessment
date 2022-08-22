<?php

namespace web\work\assessment\Model;

class PerformanceHistoryResponse
{
    private array $performanceHistory;
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
}