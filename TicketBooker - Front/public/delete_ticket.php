<?php
// Check if the index parameter is set
if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // Load existing tickets from profiletickets.json
    $json = file_get_contents("profiletickets.json");
    $tickets = json_decode($json, true);

    // If the ticket with the specified index exists, remove it from the array
    if (isset($tickets[$index])) {
        unset($tickets[$index]);

        // Save the updated tickets back to profiletickets.json
        file_put_contents("profiletickets.json", json_encode(array_values($tickets), JSON_PRETTY_PRINT));
        
        // Return success response
        echo "Ticket deleted successfully.";
    } else {
        // Return error response if ticket with the specified index is not found
        http_response_code(404);
        echo "Ticket not found.";
    }
} else {
    // Return error response if index parameter is not set
    http_response_code(400);
    echo "Index parameter is missing.";
}
?>
