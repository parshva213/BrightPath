<?php
    include 'conn.php';
    include 'session.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        
        $un=$_POST['username'];
        $ps=$_POST['password'];
        if(empty($un) || empty($ps)){
            header('Location: login2.php');
            exit();
        }
        else{
            // echo "is not empty"; 
            $sql='SELECT * FROM hod WHERE hod_id='.$un.';';
            $result=mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)>0){
                $row=mysqli_fetch_array($result);
                if ($ps===$row['Password']){
                    session_start();
                    $_SESSION['hid']=$row['HOD_ID'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['email']=$row['Email'];
                    $_SESSION['did']=$row['Department_ID'];
                    header("Location: ../hod/php/view.php");
                    exit();
                }else{
                    header('Location: login2.php');
                    exit();
                }
            }else{
                $sql='SELECT * FROM faculty WHERE faculty_id='.$un.';';
                $result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_array($result);
                    if ($ps===$row['Password']){
                        session_start();
                        $_SESSION['fid']=$row['Faculty_ID'];
                        $_SESSION['name']=$row['Name'];
                        $_SESSION['email']=$row['Email'];
                        $_SESSION['did']=$row['Department_ID'];
                        $_SESSION['hid']=$row['HOD_ID'];
                        header("Location: ../faculty/php/view.php");
                        exit();
                    }else{
                        header('Location: login2.php');
                        exit();
                    }
                }
                else{
                    $sql='SELECT * FROM students WHERE Student_id='.$un.';';
                    $result=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)>0){
                        $row=mysqli_fetch_array($result);
                        if ($ps===$row['Password']){
                            session_start();
                            $_SESSION['sid']=$row['Student_ID'];
                            $_SESSION['name']=$row['Name'];
                            $_SESSION['email']=$row['Email'];
                            $_SESSION['did']=$row['Department_ID'];
                            header("Location: ../students/php/view.php");
                            exit();
                        }else{
                            header('Location: login2.php');
                            exit();
                        }
                    }else{
                        header('Location: login2.php');
                        exit();
                    }
                }
            }
        }
    }

?>