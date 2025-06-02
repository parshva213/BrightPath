<?php
include 'conn.php';
// session_start();
include 'navbar.php';
$name=null;
$cridet=null;
$id=$_POST['cid'];
$sql="SELECT * from history_course where course_id = $id;";
$rsql=mysqli_query($conn,$sql);
if(mysqli_num_rows($rsql)>0)
    $row=mysqli_fetch_array($rsql);
$cname=(mysqli_num_rows($rsql)>0)?$row['Course_Name']:Null;
$cridet=(mysqli_num_rows($rsql)>0)?$row['Credits']:Null;
?>

<link rel="stylesheet" href="../css/c-add-nac.css">
<div class="addcourse">
    <h1>Add Course</h1>
    <form method="POST" id="f2" action="c-add.php"> 
        Course ID:
        <input type="number" value="<?php echo htmlspecialchars($id);?>" disabled>
        <input type="number" value="<?php echo htmlspecialchars($id);?>" name="cid" hidden>
        Course Name:
        <input type="text" value="<?php echo htmlspecialchars($cname);?>" name="cname">
        Course Cridets:
        <input type="number" value="<?php echo htmlspecialchars($cridet);?>" name="credits">
        <div class="but">
            <input type="button" id="sub" value="Back" onclick="window.location.href='c-add-cidvf.php'">
            <input type="submit" id="sub" value="submit" name="courseinsert">
        </div>
    </form>
    <button onclick="window.location.href='c-add.php'"> cancel</button>
</div>