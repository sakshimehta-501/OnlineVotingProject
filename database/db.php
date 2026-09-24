<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env from the project root
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// Connect to PostgreSQL
$conn = @pg_connect(
    "host=" . ($_ENV['DB_HOST'] ?? 'localhost') .
    " port=" . ($_ENV['DB_PORT'] ?? '5432') .
    " dbname=" . ($_ENV['DB_NAME'] ?? 'voting_system') .
    " user=" . ($_ENV['DB_USER'] ?? 'postgres') .
    " password=" . ($_ENV['DB_PASS'] ?? 'admin')
);

if (!$conn) {
    $conn = false;
}