<?php 
$table = 'hod';
header('Location: ../php/fpset.php?id="' . $_SESSION['id'] . '"&table="' . $table . '"');
exit();
?>