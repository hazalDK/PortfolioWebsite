<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="phase1.css">
    <link rel="stylesheet" href="blog.css">
    <script src="darkMode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script> 
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
            <form method="post" action="Blog.php" id="extra1">
                <label for="date">Filter by months:</label>
                <select id="date" name="date">
                    <option name="date" value="All" selected="selected">All</option>
                    <option name='date' value="January">January</option>
                    <option name='date' value="February">February</option>
                    <option name='date' value="March">March</option>
                    <option name='date' value="April">April</option>
                    <option name='date' value="May">May</option>
                    <option name='date' value="June">June</option>
                    <option name='date' value="July">July</option>
                    <option name='date' value="August">August</option>
                    <option name='date' value="September">September</option>
                    <option name='date' value="October">October</option>
                    <option name='date' value="November">November</option>
                    <option name='date' value="December">December</option>
                </select>
                <button type="submit">Click!</button>
            </form>
            <?php
                include "login.php";
            ?>
            </form>
        </aside>
        <article>
            <h2>Blog Posts</h2>
            <?php 
                if(!empty($_POST['date'])){
                    include 'viewblog.php';
                }
                else{
                    include 'showblog.php';
                }
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