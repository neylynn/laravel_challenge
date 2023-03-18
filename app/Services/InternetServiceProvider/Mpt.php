<?php

namespace App\Services\InternetServiceProvider;

class Mpt
{
    protected $operator = 'mpt';
    
    protected $month = 0;
    
    protected $monthlyFees = 200;
    
    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}