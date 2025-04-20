<?php

namespace DanBaker\ToolBox\Traits\HTTP;

trait Client
{
    protected array $defaultHeaders = [];

    public function withHeaders(array $headers): static
    {
        $this->defaultHeaders = $headers;
        return $this;
    }

    public function get(string $url, array $headers = []): array
    {
        return $this->request('GET', $url, null, $headers);
    }

    public function post(string $url, array|string $data = [], array $headers = []): array
    {
        return $this->request('POST', $url, $data, $headers);
    }

    public function put(string $url, array|string $data = [], array $headers = []): array
    {
        return $this->request('PUT', $url, $data, $headers);
    }

    public function delete(string $url, array $headers = []): array
    {
        return $this->request('DELETE', $url, null, $headers);
    }

    protected function request(string $method, string $url, array|string|null $data = null, array $headers = []): array
    {
        $ch = curl_init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->buildHeaders($headers),
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 15,
        ];

        if (in_array($method, ['POST', 'PUT']) && $data !== null) {
            $options[CURLOPT_POSTFIELDS] = is_array($data) ? http_build_query($data) : $data;
        }

        curl_setopt_array($ch, $options);

        $body = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'status' => $status,
            'error' => $error ?: null,
            'body' => $body,
            'json' => json_decode($body, true),
        ];
    }

    protected function buildHeaders(array $headers): array
    {
        $allHeaders = array_merge($this->defaultHeaders, $headers);
        $formatted = [];

        foreach ($allHeaders as $key => $value) {
            $formatted[] = "$key: $value";
        }

        return $formatted;
    }
}
