<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'phpweb';
$sqlFile = __DIR__ . 'install/phpweb.sql';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if it doesn't exist
    $stmt = $pdo->query("SHOW DATABASES LIKE '$dbname'");
    if ($stmt->rowCount() == 0) {
        $pdo->exec("CREATE DATABASE `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    }

    $pdo->exec("USE `$dbname`");

    // Optional: Check if key table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() == 0) {
        $sql = file_get_contents($sqlFile);
        $pdo->exec($sql);
    }

    // Drop a flag file so it doesn't rerun
    file_put_contents(__DIR__ . '/.installed', "installed on " . date('Y-m-d H:i:s'));

} catch (PDOException $e) {
    die("Setup failed: " . $e->getMessage());
}
?>
