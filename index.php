<?php
// Set CORS headers for every request
header("Access-Control-Allow-Origin: https://www.owlbear.rodeo");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit(0);
}

// Serve static files directly (images, JS, CSS, JSON)
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|json|ico)$/', $_SERVER["REQUEST_URI"])) {
    // Ensure we serve static files with CORS headers
    header("Access-Control-Allow-Origin: https://www.owlbear.rodeo");
    return false; // Serve the requested static file
}

// Fallback to serving index.html for all other routes
include_once("index.html");
?>
