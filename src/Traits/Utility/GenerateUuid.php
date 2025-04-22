<?php

namespace DanBaker\ToolBox\Traits\Utility;

trait GenerateUuid
{
    /**
     * Generate a UUID v4.
     *
     * @return string
     */
    public static function v4(): string
    {
        $data = random_bytes(16);

        // Set version to 0100 (UUID v4)
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

        // Set variant to 10xx
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    /**
     * Generate a UUID v3 (name-based using MD5).
     *
     * @param string $namespace UUID string
     * @param string $name
     * @return string
     */
    public static function v3(string $namespace, string $name): string
    {
        if (!self::isValid($namespace)) {
            throw new \InvalidArgumentException('Invalid namespace UUID');
        }

        $nhex = str_replace('-', '', $namespace);
        $nstr = hex2bin($nhex) . $name;
        $hash = md5($nstr);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', [
            substr($hash, 0, 8),
            substr($hash, 8, 4),
            substr($hash, 12, 4),
            substr((hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000, 0, 4),
            substr($hash, 20, 12)
        ]);
    }

    /**
     * Generate a UUID v5 (name-based using SHA-1).
     *
     * @param string $namespace UUID string
     * @param string $name
     * @return string
     */
    public static function v5(string $namespace, string $name): string
    {
        if (!self::isValid($namespace)) {
            throw new \InvalidArgumentException('Invalid namespace UUID');
        }

        $nhex = str_replace('-', '', $namespace);
        $nstr = hex2bin($nhex) . $name;
        $hash = sha1($nstr);

        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hash, 0, 8),
            substr($hash, 8, 4),
            substr($hash, 12, 4),
            substr($hash, 16, 4),
            substr($hash, 20, 12)
        );
    }

    /**
     * Generate a UUID v1 (simulated time-based, without MAC address).
     *
     * @return string
     */
    public static function v1(): string
    {
        $time = microtime(true) * 10000000 + 0x01B21DD213814000;

        $timeHex = str_pad(dechex((int) $time), 16, '0', STR_PAD_LEFT);

        $timeLow = substr($timeHex, 8, 8);
        $timeMid = substr($timeHex, 4, 4);
        $timeHi = substr($timeHex, 0, 4);

        $clockSeq = random_int(0, 0x3FFF);
        $node = bin2hex(random_bytes(6));

        return sprintf(
            '%s-%s-1%s-%04x-%s',
            $timeLow,
            $timeMid,
            substr($timeHi, 1),
            $clockSeq | 0x8000,
            $node
        );
    }

    /**
     * Generate a UUID v7 (timestamp-based, sortable).
     *
     * @return string
     */
    public static function v7(): string
    {
        $time = (int)(microtime(true) * 1000);
        $timeHex = str_pad(dechex($time), 12, '0', STR_PAD_LEFT);

        $rand = bin2hex(random_bytes(10));

        return sprintf(
            '%s-%s-7%s-%s-%s',
            substr($timeHex, 0, 8),
            substr($timeHex, 8, 4),
            substr($rand, 0, 3),
            substr($rand, 3, 4),
            substr($rand, 7, 12)
        );
    }

    /**
     * Validate UUID format.
     *
     * @param string $uuid
     * @return bool
     */
    protected static function isValid(string $uuid): bool
    {
        return preg_match(
            '/^[a-f0-9]{8}-[a-f0-9]{4}-[1-5][a-f0-9]{3}-[89ab][a-f0-9]{3}-[a-f0-9]{12}$/i',
            $uuid
        ) === 1;
    }
}
