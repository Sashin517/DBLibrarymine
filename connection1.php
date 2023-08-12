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
        echo "User already exists!";
    } else {
        $sql = "INSERT INTO `member` (`email`, `password`) VALUES ('$email', '$password');";

        if ($con->query($sql) === true) {
            echo "You're Successfully Registered";
            header('Location: login.php');
        } else {
            echo "Error: $sql <br>" . $con->error;
        }
    }

    $con->close();
}
?>
