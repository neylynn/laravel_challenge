<?php

namespace App\Services\EmployeeManagement;

class SalaryCalculator
{
    public function calculateSalary($hoursWorked, $hourlyRate)
    {
        $salary = $hoursWorked * $hourlyRate;
        return $salary;
    }
}