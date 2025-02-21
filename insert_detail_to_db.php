<?php
include './dbConnection.php';

$fname = $lname = $phone = $email = $message = "";
$fnameErr = $lnameErr = $phoneErr = $emailErr = $messageErr = "";

if (isset($_POST['submit'])) {
    # code...
        // Validate First Name
        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
        } else {
            $fname = htmlspecialchars($_POST["fname"]);
        }

          // Validate Last Name
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
    } else {
        $lname = htmlspecialchars($_POST["lname"]);
    }

        // Validate Phone (10 digits)
        if (empty($_POST["phoneNumber"])) {
            $phoneErr = "Phone number is required";
        } elseif (!preg_match("/^[0-9]{10}$/", $_POST["phoneNumber"])) {
            $phoneErr = "Enter a valid 10-digit phone number";
        } else {
            $phone = htmlspecialchars($_POST["phoneNumber"]);
        }

      // Validate Email
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Enter a valid email address";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

      // Validate Message
      if (empty($_POST["massage"])) {
        $messageErr = "Message is required";
    } else {
        $message = htmlspecialchars($_POST["massage"]);
    }

      // If all fields are valid, insert into database
      if (empty($fnameErr) && empty($lnameErr) && empty($phoneErr) && empty($emailErr) && empty($messageErr)) {
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $phone_number = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $massage = $_POST['massage'];
        
        // Insert into database query
        $sql = "INSERT INTO `appointment`(`first name`, `last name`, `phone`, `massage`, `email` ) VALUES ('$first_name','$last_name','$phone_number','$massage','$email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // <!-- pop up a notification  -->
            echo ' <div id="popup" class="fixed top-10 right-10 bg-green-500 text-white p-4 rounded-lg shadow-lg opacity-0 transition-opacity duration-500">
              ✅ Appointment Successfully Booked!
          </div>';
           
        } else {
            echo "Error: ". $sql. "<br>". mysqli_error($conn);
        }
    }

   
}
?>