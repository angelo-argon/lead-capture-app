<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ZohoCRMService;

class DemoRequestController extends Controller
{
    protected $zoho;
    
    public function __construct(ZohoCRMService $zoho)
    {
        $this->zoho = $zoho;
    }
    
    public function submit(Request $request)
    {
        // Validate the form
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'company' => 'required|string|max:255',
            'contact_number' => 'required|string',
            'project_type' => 'required|string',
            'timeline' => 'nullable|date',
            'budget_range' => 'required|string',
            'job_title' => 'nullable|string|max:255',
            'agree_terms' => 'accepted',
        ]);
        
        try {
            // Create lead in Zoho CRM
            $result = $this->zoho->createLead($validated);
            
            // Check if successful
            if (isset($result['data'][0]['status']) && $result['data'][0]['status'] === 'success') {
                return response()->json([
                    'success' => true,
                    'message' => 'Your demo request has been submitted successfully! We will contact you within 24 hours.',
                    'zoho_id' => $result['data'][0]['details']['id']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to submit your request. Please try again.',
                    'error' => $result
                ], 500);
            }
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your request. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}