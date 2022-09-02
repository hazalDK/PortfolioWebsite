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
        // Bubble sort
        function bubblesort(&$Array, $n) {
            $temp;
            for($i=0; $i<$n; $i++) {
                for($j=0; $j<$n-$i-1; $j++) {
                    if($Array[$j]<$Array[$j+1]) {
                        $temp = $Array[$j];
                        $Array[$j] = $Array[$j+1];
                        $Array[$j+1] = $temp;
                    }
                }
            }
        }

        // $servername = "127.0.0.1";
        // $username = "root";
        // $password = "";
        // $dbname = "ecs417";
        // // Creates connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        //Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"],1);
        $active_group = 'default';
        $query_builder = TRUE;
        // Connect to DB
        $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = $conn->query('SELECT * FROM posts;');
        $sort = array();
        while($row = mysqli_fetch_assoc($sql)){
            $sort[] = $row;
            $len = count($sort);
            bubbleSort($sort, $len);
        }

        foreach ($sort as $key => $value) {
            echo '<div id="posts">';
            echo "<h3>".$value['title']."</h3> <p id='timeDate'> ".$value['time']." ".$value['date']."</p>";
            echo "<hr>";
            echo "<p>".$value['text']."</p>";
            echo '</div>';
        } 
        $conn->close();
    ?>
</body>
</html>