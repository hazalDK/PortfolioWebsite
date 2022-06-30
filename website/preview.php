<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="phase1.css">
    <link rel="stylesheet" href="blog.css">
    <script src="preview.js" defer></script>

</head>
<body>
    <header>
        <nav>
            <ul>
                <h2>Hazal Kara ฅ^•ﻌ•^ฅ</h2>
                <li><a href="AboutMe.html">Home</a></li>
                <li><a href="SkillsAndAchievement.html">Skills and Acheivment</a></li>
                <li><a href="EducationAndQualification.html">Education and Experience</a></li>
                <li><a href="Portfolio.html">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section id="blog">
        <aside>
            <form id="extra1">
                <p>Warning : Filter is not available in preview!</p>
                <label for="date">Filter by months:</label>
                <select id="date" name="date">
                    <option value="All">All</option>
                    <option value="January">January</option>
                    <option value="Febraury">Febraury</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <button type="button">Click!</button>
            </form>
            <?php
                include "login.php";
            ?>
            </form>
        </aside>
        <article>
            <h2>Blog Posts</h2>
            <?php 
                echo "<form method='POST' action='addblog.php' id='form'>";
                echo '<div id="posts">';
                echo "<h3>".$_POST['title']."</h3><p id='timeDate'> ".date("H:i:s")." ".date("Y-m-d")."</p>";
                echo "<input id='Title' type = 'hidden' name = 'title' value='".$_POST['title']."'>";
                echo "<hr>";
                echo "<p>".$_POST['content']."</p>";
                echo "<input id='Content' type = 'hidden' name = 'content' value='".$_POST['content']."'>";
                echo "</div>";
                include 'showblog.php';
                echo "<button type='submit'>Submit</button>";
                echo "<button type='button' id='preview' onclick='formEdit(this.form)'>Edit</button>";
                echo "</form>"
            ?>

        </article>
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