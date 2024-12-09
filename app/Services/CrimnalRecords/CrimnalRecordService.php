<?php

namespace App\Services\CrimnalRecords;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CrimnalRecordService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function fetchCreditReport(array $userData)
{
    // Example token, replace this with the actual token logic
    $token = Cache::get('api_token'); // Assuming you've stored an API token in cache

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->post("{$this->baseUrl}/criminal/new-request", $userData);

    if ($response->successful()) {
        return $response->json();
    }

    throw new \Exception("Failed to fetch credit report: " . $response->body());
}


}
