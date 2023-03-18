<?php

namespace App\Services\EmployeeManagement;

use App\Models\JobApplication;

class JobApplicationService
{
    public function applyNewJob($applicationData)
    {
        $jobApplication = new JobApplication();
        $jobApplication->name = $applicationData['name'];
        $jobApplication->email = $applicationData['email'];
        $jobApplication->resume = $applicationData['resume'];
        $jobApplication->additional_info = $applicationData['additional_info'];
        $jobApplication->save();

        return $jobApplication;
    }
}