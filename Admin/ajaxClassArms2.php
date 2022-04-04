<?php

include '../Includes/dbcon.php';

    $cid = intval($_GET['cid']);//

        $queryss=mysqli_query($conn,"select * from lop where maKhoi=".$cid."");                        
        $countt = mysqli_num_rows($queryss);

        echo '
        <select required name="maLop" class="form-control mb-3">';
        echo'<option value="">--Chọn lớp--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['Id'].'" >'.$row['tenLop'].'</option>';
        }
        echo '</select>';
?>

