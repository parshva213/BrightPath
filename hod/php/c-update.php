<?php
include 'navbar.php';
include 'conn.php';
?>
<link rel="stylesheet" href="../css/c-update.css">
<div class="main">
    <form method="post" action="c-u-form.php">
        <table>
            <?php
                $sql="SELECT * from Course where department_id =". $_SESSION['did'].";";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    ?>  
                    <tr>
                        <th>Select</th>
                        <th>Course ID</th>
                        <th>Course Name</th>
                        <th>Cridets</th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td>
                                <input type="radio" name='orderlist' value="<?php echo $row['Course_ID']?>">
                            </td>
                            <td><?php echo $row['Course_ID'] ?></td>
                            <td><?php echo $row['Course_Name'] ?></td>
                            <td><?php echo $row['Credits'] ?></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
        <input type="submit" name="update">
    </form>
        <button onclick="window.location.href='c-view.php'"> Course Page</button>
</div>