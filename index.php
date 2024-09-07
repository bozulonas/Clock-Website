<?php
// Allow requests from any origin (you can specify a domain instead of '*')
header("Access-Control-Allow-Origin: *");

// Specify the allowed HTTP methods (GET, POST, etc.)
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Specify the allowed headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Allow specific methods and headers for preflight requests
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    exit(0);
}

// Serve your index.html
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Serve static resources directly
} else {
    include_once("index.html"); // Serve your main HTML file
}
?>
