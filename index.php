<?php
// Allow requests from specific domains
header("Access-Control-Allow-Origin: https://www.owlbear.rodeo");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Allow iframe embedding from specific domains (Owlbear Rodeo)
header("X-Frame-Options: ALLOW-FROM https://www.owlbear.rodeo");
header("Content-Security-Policy: frame-ancestors 'self' https://www.owlbear.rodeo");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit(0);
}

// Serve your index.html
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Serve the requested static resource
} else {
    include_once("index.html"); // Serve the main HTML file
}
?>
