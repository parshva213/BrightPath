<?php
include 'conn.php';
session_start();

if (!isset($_GET['id']) || !isset($_GET['table'])) {
    echo "Invalid access.";
    exit();
}

$id = $_GET['id'];
$table = $_GET['table'];
if ($table == 'hod') $col = "HOD_ID" ;
elseif ($table == 'faculty') $col = "Faculty_ID";
else $col = "Student_ID";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['password'];
    $cpass = $_POST['confirm_password'];

    if ($pass === $cpass) {
        $sql = "UPDATE $table SET password = '$pass' WHERE $col = '$id'";

        if (mysqli_query($conn, $sql)) {
            // Password updated successfully
            session_start();
            $session_query = "SELECT * FROM $table WHERE $col = '$id'";
            $session_result = mysqli_query($conn, $session_query);
            if (mysqli_num_rows($session_result) > 0) {
                $row = mysqli_fetch_array($session_result);
                if ($table == 'hod') {
                    $_SESSION['hid']=$row['HOD_ID'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['email']=$row['Email'];
                    $_SESSION['did']=$row['Department_ID'];
                } elseif ($table == 'faculty') {
                    $_SESSION['fid'] = $row['Faculty_ID'];
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['did'] = $row['Department_ID'];
                    $_SESSION['hid'] = $row['HOD_ID'];
                } else {
                    $_SESSION['sid'] = $row['Student_ID'];
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['did'] = $row['Department_ID'];
                }
            }
            echo "<script>alert('Password updated successfully'); window.location.href='../$table/php/view.php';</script>";
        } else {
            echo "<script>alert('Error updating password');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Password</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.9;
        }
        .back-btn {
            background-color: #6c757d;
            margin-top: 10px;
        }
        .show-pass {
            margin-bottom: 16px;
            display: flex;
            align-items: center;
        }
        .show-pass input {
            margin-right: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Set New Password</h2>
    <form method="POST">
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <div class="show-pass">
            <input type="checkbox" onclick="togglePassword()"> Show Password
        </div>

        <button type="submit">Set Password</button>
        <button type="button" class="back-btn" onclick="window.history.back()">Back</button>
    </form>
</div>

<script>
    function togglePassword() {
        const pwd = document.getElementById("password");
        const cpwd = document.getElementById("confirm_password");
        pwd.type = pwd.type === "password" ? "text" : "password";
        cpwd.type = cpwd.type === "password" ? "text" : "password";
    }
</script>
</body>
</html>
