<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra 1</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="phase1.css">
    <link rel="stylesheet" href="blog.css">
</head>
<body>
    <?php

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
            
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";

        // Testing Purposes
        // $date = $_POST["date"];
        // echo $date;

        function sorting($n){
            $sort = array();
            $i = 0;
            while($row = mysqli_fetch_assoc($n)){
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
        }


        // Creates connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // blog sorting into months
        if($_POST["date"] == 'January'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 1');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'February'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 2');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'March'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 3');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'April'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 4');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'May'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 5');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'June'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 6');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'July'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 7');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'August'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 8');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'September'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 9');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'October'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 10');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'November'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 11');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'December'){
            $sql = $conn->query('SELECT * FROM posts WHERE MONTH(Date) = 12');
            sorting($sql);
            $conn->close();
        }
        else if($_POST['date'] == 'All'){
            $sql = $conn->query('SELECT * FROM `posts`');
            sorting($sql);
            $conn->close();
        }
    ?>
</body>
</html>