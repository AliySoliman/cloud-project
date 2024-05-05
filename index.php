<?php
// Database connection details (consider storing in a separate file for security)
$db_host = 'db';  // Service name
$db_user = 'Ali_Soliman';
$db_password = '22011564';
$db_name = 'students';

// Error reporting for development (remove for production)
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// Connect to the database
$connect = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$students_name = "students";
$query = "SELECT * FROM $students_name";

$response = mysqli_query($connect, $query);

// Function to display student information in a consistent format
function displayStudent($student) {
    echo '<div class="student-card">';
    #echo '<img src="images/' . $student['image'] . '" alt="' . $student['name'] . '">'; // Assuming an 'image' column exists
    echo '<h3>' . $student['name'] . '</h3>';
    echo '<p><b>ID:</b> ' . $student['id'] . '</p>';
    echo '<p><b>Age:</b> ' . $student['age'] . '</p>';
    echo '</div>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Information:</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>

    <h1>Students Information:</h1>

    <?php
    if (mysqli_num_rows($response) > 0) {
        // Process results
        while ($student = mysqli_fetch_assoc($response)) {
            displayStudent($student);
        }
    } else {
        echo '<p>No students found in the database.</p>';
    }

    mysqli_close($connect);
    ?>

</body>
</html>