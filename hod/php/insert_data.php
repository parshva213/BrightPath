<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = trim($_POST['student_id'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $department_id = intval($_POST['department_id'] ?? 0);

    mysqli_query($conn,"Start Transaction;");

    // Get a class from the selected department where studets < 5
    $sq = "SELECT max(class_id) as cd FROM class WHERE department_id = '$department_id'";
    $cd= mysqli_fetch_assoc(mysqli_query($conn,$sq))['cd'];
    $sq="SELECT * from class where total_students < 5 and class_id = '$cd';";
    $res = mysqli_query($conn, $sq);

    if ($res && mysqli_num_rows($res) > 0) {
        $class = mysqli_fetch_array($res);
        $cid = $class['Class_ID'];
        $cname = $class['Class_Name'];
        $fid = $class['Faculty_ID'];
        $ts = $class['Total_Students'];
    } else {
        $cid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT max(class_id) as cid from class"))['cid'] + 1;
        $found_unique = false;
        $dept_name=mysqli_fetch_assoc(mysqli_query($conn,"SELECT name From department where department_id = '$department_id';"))['name'];
        for ($ascii_code=65; $ascii_code < 91; $ascii_code++) { 
            if ($found_unique === true)
                break;
            else{
                $suffix = mysqli_fetch_assoc(mysqli_query($conn,"SELECT CHAR('$ascii_code') as suf from dual;"))['suf'];
                $cname=$dept_name . '-4' . $suffix;
                $exist_class="SELECT COUNT(*) as ec FROM class WHERE Department_ID = '$department_id' AND Class_Name = '$cname' ;";
                $ec=mysqli_fetch_assoc(mysqli_query($conn,$exist_class))['ec'];
                if ($ec == 0)
                    $found_unique = true;
                else
                    $ascii_code += 1;
            }
        }
        $fid = ($res = mysqli_query($conn,"SELECT Faculty_ID as fid from Faculty WHERE Faculty_ID NOT IN (SELECT Faculty_ID from class);"))? mysqli_fetch_assoc($res)['fid'] : 0;
        $ts=1;
    }
    if(empty($cid) || empty($cname) || $fid == 0 || $ts == 0){
        if(empty($cname))
            echo "<script>alert('Class name not fetch')</script>";
        elseif(empty($fid))
            echo "<script>alert('faculty not found')</script>";
        else
            echo "<script>alert('Empty class not found')</script>";
        echo "<script>alert('server error')</script>";
        echo "<script>window.history.back();</script>";
    }else{
        // Insert student
        $insert_student = "INSERT INTO students (Student_ID, Name, Email, Department_ID, password) VALUES ('$student_id', '$name', '$email', '$department_id', '$student_id')";

        if (mysqli_query($conn, $insert_student)) {
            $insert_student_in_class = "INSERT INTO class (Class_ID, Class_Name, Department_ID, Faculty_ID, Student_ID, Total_Students) VALUES ('$cid','$cname','$department_id','$fid','$student_id','$ts')";
            if(mysqli_query($conn,$insert_student_in_class)){
                mysqli_query($conn,"commit;");
                header("Location: studentlist.php");
                exit();
            }else{
                mysqli_query($conn,"rollback;");
                echo "<script>alert('Error inserting student into class Try again Letter')</script>";
                header("Location: conform_student.php");
                exit();
            }

        }else{
            mysqli_query($conn,"rollback;");
            echo "<script>alert('Error inserting student Try again Letter')</script>";
            header("Location: conform_student.php");
            exit();
        }
    }
}