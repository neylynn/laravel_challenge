<?php

namespace App\Services\EmployeeManagement;

class Staff implements Employee
{
    public function applyJob()
    {
        // TODO: Implement applyJob() method.
    }
    
    public function salary()
    {
        // return 200;
        $calculator = new SalaryCalculator();
        $salary = $calculator->calculateSalary(40, 25);
        
        return response()->json([
            'data' => $salary
        ]);
    }
}