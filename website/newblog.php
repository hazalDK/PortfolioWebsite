<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";
        
        // Creates connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            date_default_timezone_set('UTC');
            $date= date("Y-m-d"); 
            $time = date("H:i:s");
            $title = $_POST["title"];
            $text = $_POST["content"];
            $date_time = time();
            $sql = "INSERT INTO POSTS (date, time, title, text, DateTime) 
            VALUES ('$date','$time','$title', '$text', '$date_time')";

        if ($conn->query($sql) === TRUE) {
            header('location: Blog.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }
    ?>
</body>
</html>