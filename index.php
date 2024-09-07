<?php
// Allow requests from the Owlbear domain
header("Access-Control-Allow-Origin: https://www.owlbear.rodeo");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight requests (OPTIONS method)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit(0);
}

// Serve static files or index.html
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|json|ico)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Serve static resources directly (like manifest.json, JS, CSS)
} else {
    include_once("index.html"); // Serve your main HTML file
}
?>
