<?php
    $parts = parse_url(getenv('DATABASE_URL'));
    extract($parts);
    $path = ltrim($path, "/");
    $conn = new PDO("pgsql:host={$host};port={$port};dbname={$path}", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>