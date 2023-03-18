<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected $staff;
    
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }
    
    public function payroll()
    {
        $data = $this->staff->salary();
    
        return response()->json([
            'data' => $data
        ]);
    }
}
