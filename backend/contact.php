<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.html#contact');
    exit;
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$service = trim((string)($_POST['service'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$honeypot = trim((string)($_POST['company'] ?? ''));

if ($honeypot !== '') {
    // Silently accept bot submissions without storing them.
    header('Location: ../index.html?sent=1#contact');
    exit;
}

$allowedServices = [
    'Business website',
    'Custom web application',
    'Management system',
    'Maintenance and support',
    'Something else',
];

if (
    $name === '' || mb_strlen($name) > 100 ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 190 ||
    !in_array($service, $allowedServices, true) ||
    $message === '' || mb_strlen($message) > 5000
) {
    http_response_code(400);
    exit('Please check the form fields and try again. Use your browser Back button to return to the form.');
}

require __DIR__ . '/config.php';

$stmt = $pdo->prepare(
    'INSERT INTO enquiries (name, email, service, message, created_at) VALUES (:name, :email, :service, :message, NOW())'
);
$stmt->execute([
    ':name' => $name,
    ':email' => $email,
    ':service' => $service,
    ':message' => $message,
]);

header('Location: ../index.html?sent=1#contact');
exit;
