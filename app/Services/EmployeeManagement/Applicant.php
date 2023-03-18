<?php

namespace App\Services\EmployeeManagement;

class Applicant implements Employee
{
    public function applyJob()
    {
        // return true;
        $applicationData = [
            'name' => 'Aung Aung',
            'email' => 'test@gmail.com',
            'resume' => 'path/to/resume.pdf',
            'additional_info' => 'I have 4 years of experience in web development.'
        ];
        
        $jobApplicationService = new JobApplicationService();
        $jobApplication = $jobApplicationService->applyNewJob($applicationData);
        
        return response()->json([
            'data' => $jobApplication
        ]);
    }
    
    public function salary()
    {
        // TODO: Implement salary() method.
    }
}