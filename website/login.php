<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="phase1.css">
    <link rel="stylesheet" href="blog.css"> -->
</head>
<body>
    <?php 

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
        
        if(isset($_POST['submit'])){

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_SESSION['name'] = null;
                $sql = $conn->query('SELECT `password` FROM `user` WHERE `user`.`email` = "' .$_POST['email']. '" AND `user`.`password` = "'.$_POST['password'].'" ;');
                $num_rows=mysqli_num_rows($sql);
                if ($num_rows>0){

                    $result = $conn->query('SELECT SUBSTRING(firstName, 1, 100) FROM `user` WHERE `user`.`email` = "' .$_POST['email'].'";');
                    $name = $result->fetch_array()[0] ?? '';
                    $_SESSION['name'] = $name;  
                }
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            if ($_SESSION['name'] != null) {
                header("Location: addblog.php"); 
                die();
            }
            else{
                print('<p>Login Failed! User not found</p>');
            }

            $conn->close();
        }

        if(empty($_SESSION['name'])){ //logged out session
            ?>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <?php
                echo '<fieldset id="login">'; 
                        echo '<legend>Login</legend>';
                        echo '<p>
                            <label>Email address</label><br>
                            <input type="email" name="email" placeholder="Email" required><br>
                            <small>Email : example@gmail.com</small>
                        </p>';
                        echo '<p>
                            <label>Password</label><br>
                            <input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" ><br>
                            <small>Password : Example12</small>
                            </p>';
                        echo '<div>
                            <button name="submit" type="submit" >Login</button>
                        </div>';
                        echo '<h4>Your password must contain:</h4>';
                        echo '<ul>
                            <li>꒰ A Lowercase Letter ꒱</li>
                            <li>꒰ A Uppercase Letter ꒱</li>
                            <li>꒰ A Number ꒱</li>
                            <li>꒰ A Minimum of 8 Characters ꒱</li>
                        </ul>';
                    echo '</fieldset>';
                    echo '</form>';
            } 
            else if(isset($_SESSION['name']) && !empty($_SESSION['name'])){  //logged in session
                    echo '<div id="welcome">';
                        echo "<h3>Welcome back ".$_SESSION['name']." ^-^</h3> <br>";
                        echo '<form action="addblog.php">';
                            echo '<button>Add Post</button>';
                        echo '</form>';
                        echo '<form action="logout.php">';
                           echo '<button>Logout</button>';
                        echo '</form>';
                    echo '</div>';
            }
    ?>
</body>
</html>