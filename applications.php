<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link rel="stylesheet" href="navbar_style.css">
    <style>
        .heading {
            text-align: center;
            margin-top: 0px;
            font-size: 2.5rem;
        }
        .heading2{
            text-align: center;
            font-size: 2.5rem;
            margin-top: 5vh;
            margin-bottom: 5vh;
        }
        table{
            margin: auto;
            font-size: 2rem;
        }
        td{
            border: 2px solid white;
            padding: 10px;

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

    <div class="heading">Welcome to the Applications page</div>
    <div class="heading2">Details of all the registered students</div>

    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
        <?php
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
        $sql = "SELECT Name, Phone, Email, Address FROM student";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                echo "<tr>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Phone']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "</tr>"; 
            }
        }
        ?>
    </table>
</body>

</html>