<?php

function conexion() {
    // Retrieve database credentials from environment variables
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_user = getenv('DB_USER') ?: 'root';
    $db_password = getenv('DB_PASSWORD') ?: '';
    $db_name = getenv('DB_NAME') ?: 'basesegura';

    // Use a try-catch block for better error handling
    try {
        $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

        // Check for connection errors
        if ($conexion->connect_errno) {
            throw new Exception("Failed to connect to MySQL: " . $conexion->connect_error);
        }

        // Set the character set
        if (!$conexion->set_charset("utf8")) {
            throw new Exception("Error loading character set utf8: " . $conexion->error);
        }

        return $conexion;

    } catch (Exception $e) {
        // Log the error message instead of displaying it
        error_log($e->getMessage());
        return null;
    }
}

?>
