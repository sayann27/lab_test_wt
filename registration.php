<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrations</title>
    <link rel="stylesheet" href="navbar_style.css">
    <style>
        body {
            background-color: black;
            color: white;
        }

        .heading {


            text-align: center;
            margin-top: 0px;
            font-size: 2.5rem;
        }

        h2 {


            text-align: center;
            margin-top: 5vh;

        }

        .form {
            max-width: 30%;
            margin: auto;
            text-align: center;
            font-size: 1.7rem;
            font-family: 'Times New Roman', Times, serif;
        }

        input {
            padding: 1%;

        }

        .form-item {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            margin-top: 5vh;
            padding: 2%;
            font-family: 'Times New Roman', Times, serif;
            font-size: 1.3rem;
            border-radius: 10px;
            border: 2px solid black;
        }

        .btn:hover {
            background-color: black;
            color: white;
            border: 2px solid white;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <ul class="flex-container">
            <li class="items"><a href="index.html">Home</a></li>
            <li class="items"><a href="registration.php">Registrations</a></li>
            <li class="items"><a href="applications.php">Applications</a></li>
        </ul>
    </nav>
    <div class="heading">Welcome to the Registrations page</div>
    <h2>Fill the form to register to the college</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
        <div class="form-item">
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            <label for="name">Phone</label>
            <input type="number" name="phone">
        </div>
        <div class="form-item">
            <label for="name">Email</label>
            <input type="email" name="email">
        </div>
        <div class="form-item">
            <label for="name">Address</label>
            <input type="text" name="address">
        </div>
        <button class="btn">Submit</button>

    </form>
    <?php
    if (isset($_POST['name'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "practice";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $sql = "INSERT INTO student(Name, Phone, Email, Address) VALUES ('$name', '$phone' ,'$email', '$address');";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='heading'>Registration successfull</div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }

    ?>
</body>

</html>