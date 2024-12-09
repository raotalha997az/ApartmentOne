<?php

namespace App\Services;

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

            // Store token and refresh token in cache
            Cache::put('api_token', $data['token'], $data['expires'] - 60);
            Cache::put('refresh_token', $data['refreshToken']);

            return $data;
        }

        return $response->json();
    }

    // Refresh Token API Call
    public function refreshToken()
    {
        $refreshToken = Cache::get('refresh_token');

        if (!$refreshToken) {
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
            return $data;
        }

        return null;
    }

    // Get API Token
    public function getApiToken()
    {
        if (!Cache::has('api_token')) {
            $this->refreshToken();
        }

        return Cache::get('api_token');
    }
}
