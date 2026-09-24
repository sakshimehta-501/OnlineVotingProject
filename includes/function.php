<?php

//sanitizes user input 
function clean(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    
}
//Shortcut for safely print html
function e(?string $value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

//redirect helpers
function redirect(string $path): void
{
    header("Location: " . $path);
    exit;
}

/* AES-256-GCM. APP_ENCRYPTION_KEY must be 32 bytes or 64 hex characters. */
function encryption_key(): string
{
    static $key = null;
    if ($key !== null) return $key;

    $value = $_ENV['APP_ENCRYPTION_KEY'] ?? $_SERVER['APP_ENCRYPTION_KEY'] ?? '';
    if ($value === '') throw new RuntimeException('APP_ENCRYPTION_KEY is not configured.');

    if (ctype_xdigit($value) && strlen($value) === 64) {
        $value = hex2bin($value);
    }

    if ($value === false || strlen($value) !== 32) {
        throw new RuntimeException('APP_ENCRYPTION_KEY must be 32 bytes or 64 hexadecimal characters.');
    }

    return $key = $value;
}

function encrypt_data(string $value): string
{
    $iv = random_bytes(12);
    $tag = '';

    $ciphertext = openssl_encrypt(
        $value,
        'aes-256-gcm',
        encryption_key(),
        OPENSSL_RAW_DATA,
        $iv,
        $tag
    );

    if ($ciphertext === false) throw new RuntimeException('Unable to encrypt data.');

    return base64_encode($iv . $tag . $ciphertext);
}

function decrypt_data(?string $value): string
{
    if ($value === null || $value === '') return '';

    $decoded = base64_decode($value, true);
    if ($decoded === false || strlen($decoded) < 28) {
        throw new RuntimeException('Invalid encrypted data.');
    }

    $iv = substr($decoded, 0, 12);
    $tag = substr($decoded, 12, 16);
    $ciphertext = substr($decoded, 28);

    $plaintext = openssl_decrypt(
        $ciphertext,
        'aes-256-gcm',
        encryption_key(),
        OPENSSL_RAW_DATA,
        $iv,
        $tag
    );

    if ($plaintext === false) throw new RuntimeException('Unable to decrypt data.');
    return $plaintext;
}

/* HMAC-SHA256 is used only for searchable/unique encrypted fields. */
function lookup_hash(string $value): string
{
    $secret = $_ENV['APP_LOOKUP_KEY'] ?? $_SERVER['APP_LOOKUP_KEY'] ?? '';
    if ($secret === '') throw new RuntimeException('APP_LOOKUP_KEY is not configured.');

    return hash_hmac('sha256', strtolower(trim($value)), $secret);
}