<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="addblog.css">
    <link rel="stylesheet" href="phase1.css">
    <script src="addblog.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <ul>
                    <h2>Hazal Kara ฅ^•ﻌ•^ฅ</h2>
                    <li><a href="AboutMe.html">Home</a></li>
                    <li><a href="SkillsAndAchievement.html">Skills and Acheivment</a></li>
                    <li><a href="EducationAndQualification.html">Education and Experience</a></li>
                    <li><a href="Portfolio.html">Portfolio</a></li>
                    <li><a href="Blog.php">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </ul>
        </nav>
    </header>
    <section>
        <div>

            <?php 
            if(empty($_SESSION['name'])){
                header("Location: Blog.php"); 
            }
            else{
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo '<form method="post" action="newblog.php" id="form">';
                        echo '<fieldset>';
                            echo '<legend>Add blog</legend>';
                            echo '<p id="blogTitle">
                                <label>Blog Title</label><br>
                                <input type="text" id="title" name="title" value = "'. $_POST['title'].'">
                                <small></small>
                            </p>';
                            echo '<p id="blogContent">
                                <label>Content</label><br>
                                <textarea name="content" id="content" cols="79" rows="8">'.$_POST['content'].'</textarea>
                                <small></small>
                            </p>';
                            echo '<div class="container">
                                <button type="submit">Post</button>
                                <button type="button" name = "preview" id="preview" onclick="formpreview(this.form)" action>Preview</button>
                                <button type="button" id="clear">Clear</button>
                            </div>';
                        echo '</fieldset>';
                    echo '</form>';
                }
                else{
                    echo '<form method="post" action="newblog.php" id="form">';
                        echo '<fieldset>';
                            echo '<legend>Add blog</legend>';
                            echo '<p id="blogTitle">
                                <label>Blog Title</label><br>
                                <input type="text" id="title" name="title" placeholder="Title">
                                <small></small>
                            </p>';
                            echo '<p id="blogContent">
                                <label>Content</label><br>
                                <textarea name="content" id="content" cols="79" rows="8" placeholder="Enter the text here"></textarea>
                                <small></small>
                            </p>';
                            echo '<div class="container">
                                <button type="submit">Post</button>
                                <button type="button" name = "preview" id="preview" onclick="formpreview(this.form)" action>Preview</button>
                                <button type="button" id="clear">Clear</button>
                            </div>';
                        echo '</fieldset>';
                    echo '</form>';
                }
            }
            ?>
        </div>
    </section>
    <footer id="contact">
        <h2>Contact Details</h2>
        <ul>
            <li>꒰ Email : ec21625@qmul.ac.uk ꒱</li>
            <li>꒰ Phone number : 020 7882 5555 ꒱</li>
            <li>꒰ linkedIn: <a href="https://www.linkedin.com/in/hazal-kara-6b3b69226/">Hazal Kara</a> ꒱</li>
            <li>꒰ GitHub username : <a href="https://github.com/hazalDK">HazalDK</a> ꒱</li>
        </ul>
    </footer>
</body>
</html>