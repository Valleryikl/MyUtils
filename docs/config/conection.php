<?php
$dsn = 'mysql:dbname=utils;host=127.0.0.1';
$user = 'valeria';
$password = '3005';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}