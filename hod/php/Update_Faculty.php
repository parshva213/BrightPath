<?php
include "conn.php";
include "navbar.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('Faculty ID is required.'); window.location.href='facultyavability.php';</script>";
    exit();
}

$fid = $_GET['id'];
$sql = "SELECT * FROM faculty WHERE Faculty_ID = $fid";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 1) {
    echo "<script>alert('Faculty not found.'); window.location.href='facultyavability.php';</script>";
    exit();
}

$faculty = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" href="../css/update_faculty.css">
<div class="main">
    <div class="update-container">
        <h2>Update Faculty</h2>
        <form id="updateFacultyForm" method="post">
            <label for="ID">Name:</label>
            <input type="text" name="ID" id="ID" value="<?php echo $faculty['Faculty_ID']; ?>" disabled>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $faculty['Name']; ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $faculty['Email']; ?>">

            <label for="department">Department:</label>
            <select name="department" id="department">
                <?php
                $dsql = "SELECT * FROM department";
                $dresult = mysqli_query($conn, $dsql);
                while ($drow = mysqli_fetch_assoc($dresult)) {
                    $selected = ($drow['Department_ID'] == $faculty['Department_ID']) ? 'selected' : '';
                    echo "<option value='{$drow['Department_ID']}' $selected>{$drow['Name']}</option>";
                }
                ?>
            </select>

            <button type="submit" name="update">Update Faculty</button>
        </form>
    </div>
</div>

<script src="../js/update_faculty.js"></script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dept = $_POST['department'];
    $pass = $_POST['password'];

    $updatesql = "UPDATE faculty SET Name='$name', Email='$email', Department_ID=$dept";
    if (!empty($pass)) {
        $updatesql .= ", Password='$pass'";
    }
    $updatesql .= " WHERE Faculty_ID=$fid";

    if (mysqli_query($conn, $updatesql)) {
        echo "<script> window.location.href='facultyavability.php';</script>";
    } else {
        echo "<script>alert('Error updating faculty.');</script>";
    }
}
?>
