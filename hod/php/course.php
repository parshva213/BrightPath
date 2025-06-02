<?php


$select="SELECT * from course where course_id not in(select course_id from cvallow where status='not allow') and department_id=".$_SESSION ['did'].";";
$result=mysqli_query($conn,$select);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo $row['Course_ID'];
    }}


?>