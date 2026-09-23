<?php

require_once __DIR__ . "/../config/config.php";

$conn = pg_connect(
    "host=" . DB_HOST .
    " port=" . DB_PORT .
    " dbname=" . DB_NAME .
    " user=" . DB_USER .
    " password=" . DB_PASS
);

if (!$conn) {
    die("Database connection failed.");
}

?>