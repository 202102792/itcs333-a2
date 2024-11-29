<?php

// The API link we are getting the data from
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Get the data from the API
$response = file_get_contents($url);

// Convert the JSON response into a PHP array
$data = json_decode($response, true);

// Check if the data is valid and has results
if(!$data || !isset($data["results"])) {
    die("Error fetching the data from the API"); // Stop the code if something went wrong
}

// Save the results part of the data into a variable
$result = $data['results'];

?>
