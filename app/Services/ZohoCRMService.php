<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ZohoCRMService
{
    protected $clientId;
    protected $clientSecret;
    protected $refreshToken;
    protected $dataCenter;
    protected $apiDomain;
    
    public function __construct()
    {
        $this->clientId = config('services.zoho.client_id');
        $this->clientSecret = config('services.zoho.client_secret');
        $this->refreshToken = config('services.zoho.refresh_token');
        $this->dataCenter = config('services.zoho.data_center', 'com');
        $this->apiDomain = "https://www.zohoapis.{$this->dataCenter}";
    }
    
    /**
     * Get access token (cached for 50 minutes)
     */
    protected function getAccessToken()
    {
        return Cache::remember('zoho_access_token', 3000, function () {
            $response = Http::asForm()->post("https://accounts.zoho.{$this->dataCenter}/oauth/v2/token", [
                'refresh_token' => $this->refreshToken,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'refresh_token',
            ]);
            
            $data = $response->json();
            
            if (isset($data['access_token'])) {
                return $data['access_token'];
            }
            
            Log::error('Failed to get Zoho access token', ['response' => $data]);
            throw new \Exception('Failed to get access token: ' . json_encode($data));
        });
    }
    
    /**
     * Create a lead in Zoho CRM
     */
    public function createLead($data)
    {
        $accessToken = $this->getAccessToken();
        
        // Map form data to Zoho CRM fields
        $leadData = [
            'data' => [
                [
                    'Last_Name' => $data['full_name'] ?? 'Unknown',
                    'First_Name' => $data['full_name'] ?? 'Unknown', // Zoho splits name
                    'Email' => $data['email'] ?? null,
                    'Phone' => $data['contact_number'] ?? null,
                    'Company' => $data['company'] ?? 'N/A',
                    'Designation' => $data['job_title'] ?? null,
                    'Description' => $this->formatDescription($data),
                    'Lead_Source' => 'Website Form',
                ]
            ]
        ];
        
        $response = Http::withHeaders([
            'Authorization' => 'Zoho-oauthtoken ' . $accessToken,
        ])->post("{$this->apiDomain}/crm/v2/Leads", $leadData);
        
        $result = $response->json();
        
        Log::info('Zoho CRM Lead Created', ['response' => $result]);
        
        return $result;
    }
    
    /**
     * Format description from form data
     */
    protected function formatDescription($data)
    {
        $description = "Demo Request Details:\n\n";
        
        if (!empty($data['project_type'])) {
            $description .= "Project Type: {$data['project_type']}\n";
        }
        
        if (!empty($data['budget_range'])) {
            $description .= "Budget Range: {$data['budget_range']}\n";
        }
        
        if (!empty($data['timeline'])) {
            $description .= "Estimated Timeline: {$data['timeline']}\n";
        }
        
        if (!empty($data['job_title'])) {
            $description .= "Role: {$data['job_title']}\n";
        }
        
        return $description;
    }
}