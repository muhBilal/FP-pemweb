<?php
$envFile = __DIR__ . '/../.env';

$env = file_get_contents($envFile);
$env = explode("\n", $env);
$env = array_filter($env);
$env = array_map(function ($item) {
    return explode('=', $item);
}, $env);
$env = array_column($env, 1, 0);

//$servername = $env['DB_HOST'];
//$username = $env['DB_USER'];
//$password = $env['DB_PASS'];
//$databasename = $env['DB_NAME'];

$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'pemweb';

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>