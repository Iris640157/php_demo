<?php
/**
 * Front controller: bootstrap once, then dispatch by folder structure (url = path).
 */
require __DIR__ . '/includes/connection.php';

$base = __DIR__;
$path = trim($_GET['url'] ?? '/', '/');

// Root: serve public front
if ($path === '' || $path === 'index.php') {
    $path = 'public/index.php';
} else {
    // Folder structure: "admin" -> admin/index.php, "admin/user/create.php" -> as-is
    $path = str_replace('..', '', $path); // block traversal
    if (substr($path, -4) !== '.php') {
        $path = rtrim($path, '/') . '/index.php';
    }
}

$fullPath = $base . '/' . $path;
$realPath = realpath($fullPath);

if ($realPath === false || strpos($realPath, $base) !== 0 || !is_file($realPath) || substr($realPath, -4) !== '.php') {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    echo '404 Not Found';
    return;
}

require $realPath;