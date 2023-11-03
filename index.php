<?php
$host = 'example.com';  // Replace with the hostname or IP address of the server
$port = 80;  // Replace with the port number

// Create a socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    echo "Failed to create socket: " . socket_strerror(socket_last_error());
} else {
    // Connect to the server
    if (socket_connect($socket, $host, $port) === false) {
        echo "Failed to connect to $host:$port: " . socket_strerror(socket_last_error());
    } else {
        // Send data to the server
        $message = "Hello, Server!";
        socket_write($socket, $message, strlen($message));
        
        // Receive data from the server
        $response = socket_read($socket, 1024);  // Read up to 1024 bytes
        echo "Server response: $response";
        
        // Close the socket
        socket_close($socket);
    }
}
?>
