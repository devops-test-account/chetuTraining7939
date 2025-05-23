<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Log;

class ApiGateway
{
    /**
     * Call an API endpoint safely.
     *
     * @param string $method HTTP method (GET, POST, etc.)
     * @param string $url Full URL of the target API
     * @param array $payload Request payload (for POST/PUT)
     * @param array $headers Custom headers
     * @param int $timeout Request timeout in seconds
     * @return array ['success' => bool, 'data' => mixed, 'status' => int]
     */
    public static function call(string $method, string $url, array $payload = [], array $headers = [], int $timeout = 5): array
    {
        $method = strtolower($method);

        $headers = array_merge([
            'Accept' => 'application/json',
            ...(session()->has('auth_token') ? ['Authorization' => 'Bearer ' . session()->get('auth_token')] : []),
        ], $headers);

        try {
            $http = Http::withHeaders($headers)->timeout($timeout);

            switch ($method) {
                case 'get':
                    $response = $http->get($url, $payload);
                    break;
                case 'post':
                    $response = $http->post($url, $payload);
                    break;
                case 'put':
                    $response = $http->put($url, $payload);
                    break;
                case 'delete':
                    $response = $http->delete($url, $payload);
                    break;
                default:
                    throw new \InvalidArgumentException("Unsupported HTTP method: {$method}");
            }

            return [
                'data' => $response->json(),
            ];
        } catch (RequestException $e) {
            Log::error("API request failed: {$e->getMessage()}", [
                'url' => $url,
                'method' => $method,
                'payload' => $payload,
            ]);

            return [
                'success' => false,
                'data' => ['message' => 'Request failed', 'error' => $e->getMessage()],
                'status' => 500,
            ];
        } catch (\Exception $e) {
            Log::critical("Unexpected error during API call: {$e->getMessage()}", [
                'url' => $url,
                'method' => $method,
                'payload' => $payload,
            ]);

            return [
                'success' => false,
                'data' => ['message' => 'Unexpected error occurred', 'error' => $e->getMessage()],
                'status' => 500,
            ];
        }
    }
}
