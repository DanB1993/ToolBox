<?php

namespace DanBaker\ToolBox\Helpers;

class SecurityHelper
{
    /**
     * Generate a cryptographically secure random token.
     *
     * @param int $length
     * @return string
     */
    public static function generateToken(int $length = 32): string
    {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * Verify a password against a given hash.
     *
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public static function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /**
     * Hash a password securely.
     *
     * @param string $password
     * @return string
     */
    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Escape HTML entities securely to prevent XSS attacks.
     *
     * @param string $input
     * @return string
     */
    public static function escapeHtml(string $input): string
    {
        return htmlspecialchars($input, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Sanitize a string input by removing potentially malicious content.
     *
     * @param string $input
     * @return string
     */
    public static function sanitizeInput(string $input): string
    {
        // Remove HTML tags and encode special characters
        return filter_var(strip_tags($input), FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * Check if a string is a valid UUID (v1–v5).
     *
     * @param string $value
     * @return bool
     */
    public static function isUuid(string $value): bool
    {
        return (bool) preg_match(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $value
        );
    }
}