<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['doc'])) {
    // $user_id = 1; // Replace with actual user ID

    // Handle file uploads
    $uploadedFiles = uploadDocuments($_FILES['doc'], $_POST['doc_name'],$_POST['user_id']);

    // Display upload results
    foreach ($uploadedFiles as $result) {
        if (is_array($result)) {
            echo "Document uploaded successfully: " . $result['doc_name'] . "<br>";
        } else {
            echo "Error uploading document: " . $result . "<br>";
        }
    }
} 
?>