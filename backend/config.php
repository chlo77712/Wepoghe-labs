<?php
declare(strict_types=1);

/*
 * Local development:
 * 1. Create a MySQL database using database/schema.sql.
 * 2. Set the credentials below for your own XAMPP/database setup.
 * 3. Never publish real database credentials in a public repository.
 */
$dbHost = 'localhost';
$dbName = 'wepoghe_labs';
$dbUser = 'root';
$dbPass = ''; // Typical XAMPP default; change if your local MySQL uses a password.

try {
    $pdo = new PDO(
        "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    error_log('Wepoghe Labs database connection failed: ' . $e->getMessage());
    http_response_code(500);
    exit('The contact form is temporarily unavailable. Please email wepoghesamuel@gmail.com.');
}
