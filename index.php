<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `iqra_university`.`registration` (`name`, `age`, `gender`, `email`,`password`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email','$password', '$phone', '$other', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="img.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IQRA UNIVERSITY</h3>
        <p>Enter your details and submit this form to confirm your resgistration!</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="password" name="password" id="email" placeholder="Enter your password">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Tell us something about yourself"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script>
          // Get the submit message element
          var submitMsg = document.querySelector('.submitMsg');
        
        // If the message element exists
        if(submitMsg) {
            // Hide the message after 5 seconds
            setTimeout(function() {
                submitMsg.style.display = 'none';
                window.location.href = "http://localhost/php-form-project/";
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    </script>
    
</body>
</html>
