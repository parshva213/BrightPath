<?php
include 'navbar.php';
include 'conn.php';
?>
<link rel="stylesheet" href="../css/c-u-form.css">
<div class="main">
    <form method='post' action="c-u-f-conform.php">
        <?php 
            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                if(!$_POST['orderlist']){
                    header("Location: c-update.php");
                    exit();
                }
                $sql="SELECT * from course where course_id = ".$_POST['orderlist'].";";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
            ?>
                Course_ID:
                <input type="number" value="<?php echo $row['Course_ID'] ?>" disabled>
                <input type="number" value="<?php echo $row['Course_ID'] ?>" name='cid' hidden> 
                Course_Name:
                <input type="text" value="<?php echo $row['Course_Name'] ?>" name="cname">
                Credits:
                <input type="number" value="<?php echo $row['Credits'] ?>" name="credits">
                <input type="button" value="back" onclick="window.location.href='c-update.php'">
                <input type="submit" value="Update">                
            <?php
            }else{
                if(!$_POST['orderlist']){
                    header("Location: c-update.php");
                    exit();
                }
            }
        ?>
    </form>
        <button onclick="window.location.href='c-update.php'"> cancel</button>
</div>