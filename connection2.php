<?php
if (isset($_POST['email'])) {
    $servername = "sql6.freemysqlhosting.net";
    $username = "sql6639180";
    $password = "39mWrBLjxU";
    $dbname = "sql6639180";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Connection to the database failed due to" . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `member` WHERE email = '$email' AND password = '$password' ";

    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        header('Location: welcome.php'); // Redirect to a welcome page upon successful login
    } else {
        echo "Invalid Email or Password";
    }

    $con->close();
}
?>
