<?php

namespace DanBaker\ToolBox\Traits\Security;

trait EscapeHtml
{
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
}