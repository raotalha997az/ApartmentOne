<?php

namespace App\Services;

use Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class LoginService
{
    protected $baseUrl;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
        $this->clientId = env('CLIENT_ID');
        $this->clientSecret = env('CLIENT_SECRET');
    }

    // Login API Call
    public function login($email, $password)
    {
        $response = Http::post("{$this->baseUrl}/users/login", [
            'username' => $this->clientId,
            'password' => $this->clientSecret,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Ensure tokens are saved
            Cache::put('api_token', $data['token'], $data['expires'] - 60); // Subtract 60s to avoid early expiration
            Cache::put('refresh_token', $data['refreshToken']);

            Log::info('Login successful. Tokens stored in cache.', [
                'api_token' => $data['token'],
                'refresh_token' => $data['refreshToken'],
            ]);
            return $data;
        }

        Log::error('Login API failed.', ['response_body' => $response->body()]);
        return $response->json();
    }

    // Refresh Token API Call
    public function refreshToken()
{
    $refreshToken = Cache::get('refresh_token');

    if (!$refreshToken) {
        Log::error('No refresh token found in cache. Ensure login API is called first to set it.');
        return null;
    }

    $response = Http::post("{$this->baseUrl}/users/refresh-token", [
        'refreshToken' => $refreshToken,
    ]);

    if ($response->successful()) {
        $data = $response->json();

        // Update tokens in cache
        Cache::put('api_token', $data['token'], $data['expires'] - 60);
        Cache::put('refresh_token', $data['refreshToken']);
        Log::info('Token refreshed successfully.', ['new_token' => $data['token']]);
        return $data;
    }

    Log::error('Failed to refresh token.', ['response_body' => $response->body()]);
    return null;
}



    // Get API Token
    public function getApiToken()
    {
        // Check if the token exists and is still valid
        $token = Cache::get('api_token');

        if (!$token) {
            // Attempt to refresh the token
            $refreshResponse = $this->refreshToken();

            if ($refreshResponse) {
                return Cache::get('api_token'); // Return the new token
            } else {
                throw new \Exception('Unable to refresh token. Please log in again.');
            }
        }

        return $token;
    }

    public function makeAuthenticatedRequest($method, $url, $data = [])
        {
            try {
                // Get the valid token
                $token = $this->getApiToken();

                // Make the HTTP request with the token
                return Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                ])->{$method}($url, $data);
            } catch (\Exception $e) {
                // Handle token refresh failure
                throw new \Exception('Request failed: ' . $e->getMessage());
            }
        }


}
