<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <script src="../js/navbar.js"></script>
    <div class="navbar">
        <div class="left">
            <button class="navbtn">
                <a href="view.php" title="Home">
                    <img src="../images/logo.png" alt="logo">
                </a>
            </button>
        </div>
        <div class="right">
            <div class="r1">
                <div id="manage" class="navfild">
                    <button class="navbtn" onclick="manage()">Manage</button>
                    <div id="manage-content" class="content">
                        <button class="navbtn"><a href="studentlist.php">Student</a></button>
                        <button class="navbtn"><a href="classcheck.php">Class</a></button>
                    </div>
                </div>
                <div id="course" class="navfild">
                    <button class="navbtn" onclick="course()">Course</button>
                    <div id="course-content" class="content">
                        <button class="navbtn"><a href="#">View</a></button>
                        <button class="navbtn"><a href="#">Add</a></button>
                        <button class="navbtn"><a href="#">Remove</a></button>
                        <button class="navbtn"><a href="#">History</a></button>
                    </div>
                </div>
                <div id="attendance" class="navfild">
                    <button class="navbtn"><a href="#">Attendance Report</a></button>
                </div>
            </div>
            <div class="r2">
                    <div id="userinfo" class="navfild">
                        <button class="navbtn" onclick="useri()">
                            <?php 
                                session_start();
                                echo $_SESSION['name']; 
                            ?>
                        </button>
                        <div id="user-content" class="content">
                            <button class="navbtn"><a href="#">Profile</a></button>
                            <button class="navbtn"><a href="../logout.php">Logout</a></button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
