<?php

namespace App\Services\EmployeeManagement;

class Applicant implements Employee
{
    public function applyJob(): bool
    {
        return true;
    }
    
    public function salary()
    {
        // TODO: Implement salary() method.
    }
}