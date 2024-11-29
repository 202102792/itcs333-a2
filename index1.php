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

<html>
    <head>
        <title>Students Statistics</title> <!-- Page title -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Make the page responsive -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> <!-- Add some nice styles -->
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <!-- Table column names -->
                    <th>Year</th>
                    <th>Semester</th>
                    <th>The Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>Number of Students</th>
                </tr> 
            </thead>
            <tbody>
               <?php 
               // Loop through all the students and display their data
               foreach($result as $student) {
                ?>
                <tr>
                    <!-- Show the data in table rows -->
                    <td><?php echo $student["year"]; ?></td> <!-- Year -->
                    <td><?php echo $student["semester"]; ?></td> <!-- Semester -->
                    <td><?php echo $student["the_programs"]; ?></td> <!-- Program name -->
                    <td><?php echo $student["nationality"]; ?></td> <!-- Nationality -->
                    <td><?php echo $student["colleges"]; ?></td> <!-- College -->
                    <td><?php echo $student["number_of_students"]; ?></td> <!-- Student count -->
                </tr>
                <?php
               }
               ?>
            </tbody>
        </table>
    </body>
</html>
