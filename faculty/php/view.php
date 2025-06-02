<link rel="stylesheet" href="../css/view.css">
<div class="main">
    <div class="line1">
        <div class="card">
            <h2>Welcome, <?php session_start(); echo $_SESSION['name'];?></h2>
        </div>
    </div>
    <div class="line2">
        <div class="card" onclick="window.location.href='studentlist.php'">
            <h2>Manage</h2>
        </div>
        <div class="card" onclick="window.location.href='c-view.php'">
            <h2>Course</h2>
        </div>
        <div class="card">
            <h2>Attendance</h2>
        </div>
    </div>
    <div class="line3">
        <div class="card" onclick="window.location.href='../profile.php'">
            <h2>Profile</h2>
        </div>
        <div class="card" onclick="window.location.href='../logout.php'">
            <h2>Logout</h2>
        </div>
    </div>
</div>