<?php
include 'conn.php';
// session_start();
include 'navbar.php';
$flag=0;
$cid="SELECT max(Course_ID) as CID from Course where Department_ID=".$_SESSION['did'].";";
$cidres=mysqli_query($conn,$cid);
$row=mysqli_fetch_array($cidres);
$id=intval($row['CID'])+1;
$totalidindept=$id%100;
$checkallcid="SELECT Course_ID as CID from Course where Department_ID=".$_SESSION['did'].";";
$checkallcidres=mysqli_query($conn,$checkallcid);
$aviid=array();
$checkidstart=$id-$totalidindept+1;
while($row=mysqli_fetch_array($checkallcidres))
    array_push($aviid,$row['CID']);
$aviidcon=array();
for($i=$checkidstart;$i<=$id;$i++){
    if(in_array($i,$aviid))
        continue;
    else
        array_push($aviidcon,$i);
}
if(count($aviidcon)>1){
    $id=$aviidcon;
$flag=1;}
?>

<link rel="stylesheet" href="../css/c-add-cidvf.css">
<div class="addcourse">
    <h1>Add Course</h1>
    <form method="post" id="f1" action="c-add-nac.php"> 
        Course ID:
        <?php
        if ($flag == 1){
            echo '<select name="cid">';
            foreach ($id as $value) {
                $sql="SELECT course_name as cn from history_course where course_Id=$value";
                $hcnrow=mysqli_fetch_array(mysqli_query($conn,$sql));
                echo '<option value="' . $value . '">' . $value. ':' . $hcnrow['cn'] . '</option>';
            }
            echo '</select>';
        }
        else
            echo '<input type="number" value="'. $id .'" name="cid">';
        ?>
        <input type="submit" id="sub" value="Next">
    </form>
    <button onclick="window.location.href='c-add.php'"> cancel</button>
</div>