<?php 
include 'navbar.php';
?>
<link rel="stylesheet" href="../css/course.css">
<div class="main">
    <div class="line">
        <div class="card" onclick="window.location.href='cc-view.php'">
            <h2>Content</h2>
        </div>
        <div class="card" onclick="window.location.href='cc-manage.php'">
            <h2>Manage</h2>
        </div>
    </div>
    <div class="line">
        <div class="card" onclick="window.location.href='c-add-cidvf.php'">
            <h2>Add</h2>
        </div>
        <div class="card" onclick="window.location.href='c-update.php'">
            <h2>Update</h2>
        </div>
        <div class="card" onclick="window.location.href=''">
            <h2>History</h2>
        </div>
    </div>
</div>