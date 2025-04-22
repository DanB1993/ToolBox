<?php

namespace DanBaker\ToolBox\Clients;

/**
 * A lightweight HTTP client for performing GET, POST, PUT, and DELETE requests
 * with support for headers and cookies.
 */

class HttpClientTools
{
    protected array $headers = [];
    protected string $setResponse = '';
    protected string $setErrors = '';
    protected array $setInfo = [];
    protected string $setUrl = '';
    protected int $timeout = 15;

    protected function buildHeaders(array $headers): array
    {
        $formatted = [];

        foreach ($headers as $key => $value) {
            $formatted[] = "$key: $value";
        }

        return $formatted;
    }

    /**
     * Set the request headers.
     *
     * @param array $headers
     * @return self
     */
    public function headers(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Set the request URL.
     *
     * @param string $url
     * @return self
     */
    public function url(string $url): self
    {
        $this->setUrl = $url;
        return $this;
    }

    /**
     * Set the request timeout in seconds.
     *
     * @param int $seconds
     * @return self
     */
    public function timeout(int $seconds): self
    {
        $this->timeout = $seconds;
        return $this;
    }

    /**
     * Get the response body.
     *
     * @param bool $raw Return raw string or decoded JSON array.
     * @return array|string
     */
    public function response(bool $raw = false): array|string|null
    {
        return $raw ? $this->setResponse : json_decode($this->setResponse, true);
    }

    /**
     * Get cURL error message if any.
     *
     * @param bool $raw Return error as raw JSON string or plain string.
     * @return array|string|null
     */
    public function errors(bool $raw = false): array|string|null
    {
        if (!empty($this->setErrors)) {
            return $raw ? json_encode($this->setErrors) : $this->setErrors;
        }
        return '';
    }

    /**
     * Get cURL request info.
     *
     * @param bool $raw Return info as raw JSON string or array.
     * @return array|string
     */
    public function info(bool $raw = false): array|string
    {
        return $raw ? json_encode($this->setInfo) : $this->setInfo;
    }

    /**
     * Perform a GET request.
     *
     * @return void
     */
    public function get(): void
    {
        $this->request('GET', null);
    }

    /**
     * Perform a POST request.
     *
     * @param array|string $data
     * @return void
     */
    public function post(array|string $data = []): void
    {
        $this->request('POST', $data);
    }

    /**
     * Perform a PUT request.
     *
     * @param array|string $data
     * @return void
     */
    public function put(array|string $data = []): void
    {
        $this->request('PUT', $data);
    }

    /**
     * Perform a DELETE request.
     *
     * @param array $headers (not used, maintained for signature compatibility)
     * @return void
     */
    public function delete($headers = []): void
    {
        $this->request('DELETE', null);
    }

    /**
     * Set cookies for the request.
     *
     * @param array $cookies Associative array of cookie data. Each value can be a string or array of options.
     * @return self
     */
    public function cookies(array $cookies): self
    {
        $cookieParts = [];

        foreach ($cookies as $name => $cookie) {
            if (is_array($cookie)) {
                $value = $cookie['value'] ?? '';
                $cookieString = "$name=$value";

                if (!empty($cookie['expires'])) {
                    $cookieString .= '; Expires=' . gmdate('D, d-M-Y H:i:s T', $cookie['expires']);
                }
                if (!empty($cookie['path'])) {
                    $cookieString .= '; Path=' . $cookie['path'];
                }
                if (!empty($cookie['domain'])) {
                    $cookieString .= '; Domain=' . $cookie['domain'];
                }
                if (!empty($cookie['secure'])) {
                    $cookieString .= '; Secure';
                }
                if (!empty($cookie['httponly'])) {
                    $cookieString .= '; HttpOnly';
                }

                $cookieParts[] = $cookieString;
            } else {
                $cookieParts[] = "$name=$cookie";
            }
        }

        $this->headers[] = 'Cookie: ' . implode('; ', $cookieParts);

        return $this;
    }

    protected function request(string $method, array|string|null $data = null): void
    {
        $ch = curl_init();

        $options = [
            CURLOPT_URL => $this->setUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->buildHeaders($this->headers),
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => $this->timeout,
        ];

        if (in_array($method, ['POST', 'PUT']) && $data !== null) {
            $options[CURLOPT_POSTFIELDS] = is_array($data) ? http_build_query($data) : $data;
        }

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        $errors = curl_error($ch);

        if (!empty($errors)) {
            $this->setErrors = $errors;
        } else {
            $this->setResponse = $response;
        }

        $info = curl_getinfo($ch);
        $this->setInfo = $info;

        curl_close($ch);

    }
}
