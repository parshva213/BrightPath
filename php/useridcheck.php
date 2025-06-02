<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check User ID</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        .main {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }

        button[type="button"] {
            background-color: #6c757d;
            color: white;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<div class="main">
    <h1>Check User ID</h1>
    <form action="" method="get">
        <label for="userid"><b>User ID</b></label>
        <input type="text" placeholder="Enter User ID" name="userid" required>
        <button type="submit">Check</button>
        <button type="button" onclick="window.history.back()">Back</button>
    </form>
</div>

<?php
if (isset($_GET['userid'])) {
    $un = $_GET['userid']; 
    $un = mysqli_real_escape_string($conn, $un);

    $table = '';

    $sql = "SELECT * FROM hod WHERE HOD_ID = '$un'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['HOD_ID'];
        $table = 'hod';
    } else {
        $sql = "SELECT * FROM faculty WHERE Faculty_ID = '$un'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['Faculty_ID'];
            $table = 'faculty';
        } else {
            $sql = "SELECT * FROM students WHERE Student_ID = '$un'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $_SESSION['id'] = $row['Student_ID'];
                $table = 'students';
            }
        }
    }

    if (isset($_SESSION['id'])) {
        header("Location: fpset.php?id=" . $_SESSION['id'] . "&table=" . $table);
        exit();
    } else {
        echo "<script>alert('User ID not found');</script>";
        session_destroy();
    }
}
?>
</body>
</html>
