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
        <div class="nav">
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
                        <button class="navbtn" onclick="window.location.href='m-view.php'">Manage</button>
                    </div>
                    <div id="course" class="navfild">
                        <button class="navbtn" onclick="window.location.href='c-view.php'">Course</button>
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
        <!-- <div class="but">
            <button class="navbtn" onclick="window.history.back()">&larr;</button>
            <button class="navbtn" onclick="window.history.forward()">&rarr;</button>
        </div> -->
    </div>
</body>
</html>
