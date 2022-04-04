
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

    $query = "SELECT k.khoiLop,l.tenLop 
    FROM giaovien g
    INNER JOIN khoi k ON k.Id = g.maKhoi
    INNER JOIN lop l ON l.Id = g.maLop
    Where g.Id = '$_SESSION[userId]'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rrw = $rs->fetch_assoc();


//session and Term
        $querey=mysqli_query($conn,"select * from namhoc where trangthaiHK ='1'");
        $rwws=mysqli_fetch_array($querey);
        $maNamHoc = $rwws['Id'];

        $ngayTao = date("d-m-Y");

        $qurty=mysqli_query($conn,"SELECT * from diemdanh  where maKhoi = '$_SESSION[maKhoi]' and maLop = '$_SESSION[maLop]' and ngayTao='$ngayTao'");
        $count = mysqli_num_rows($qurty);

        if($count == 0){ //if Record does not exsit, insert the new record

          //insert the students record into the attendance table on page load
          $qus=mysqli_query($conn,"select * from hocsinh  where maKhoi = '$_SESSION[maKhoi]' and maLop = '$_SESSION[maLop]'");
          while ($ros = $qus->fetch_assoc())
          {
              $qquery=mysqli_query($conn,"INSERT into diemdanh(admissionNo,maKhoi,maLop,maNamHoc,trangThai,ngayTao) 
              value('$ros[admissionNumber]','$_SESSION[maKhoi]','$_SESSION[maLop]','$maNamHoc','0','$ngayTao')");

          }
        }

  
      



if(isset($_POST['save'])){
    
    $admissionNo=$_POST['admissionNo'];

    $check=$_POST['check'];
    $N = count($admissionNo);
    $trangThai = "";


//check if the attendance has not been taken i.e if no record has a trangThai of 1
  $qurty=mysqli_query($conn,"SELECT * from diemdanh  where maKhoi = '$_SESSION[maKhoi]' and maLop = '$_SESSION[maLop]' and ngayTao='$ngayTao' and trangThai = '1'");
  $count = mysqli_num_rows($qurty);

  if($count > 0){

      $trangThaiMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Đã điểm danh hôm nay!</div>";

  }

    else //update the trangThai to 1 for the checkboxes checked
    {

        for($i = 0; $i < $N; $i++)
        {
                $admissionNo[$i]; //admission Number

                if(isset($check[$i])) //the checked checkboxes
                {
                      $qquery=mysqli_query($conn,"update diemdanh set trangThai='1' where admissionNo = '$check[$i]'");

                      if ($qquery) {

                          $trangThaiMsg = "<div class='alert alert-success'  style='margin-right:700px;'>Điểm danh thành công!</div>";
                      }
                      else
                      {
                          $trangThaiMsg = "<div class='alert alert-danger' style='margin-right:700px;'>Đã có lỗi!</div>";
                      }
                  
                }
          }
      }

   echo $count;

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <title>Bảng điều khiển</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet">



   <script>
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.trangThai == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxClassArms2.php?cid="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Điểm danh (Ngày: <?php echo $todaysDate = date("m-d-Y");?>)</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Điểm danh</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->


              <!-- Input Group -->
        <form method="post">
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Danh sách học sinh khối <?php echo $rrw['khoiLop'].' - lớp'.$rrw['tenLop'];?></h6>
                  <h6 class="m-0 font-weight-bold text-danger">Chú ý: <i>Tích vào ô để điểm danh!</i></h6>
                </div>
                <div class="table-responsive p-3">
                <?php echo $trangThaiMsg; ?>
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>STT</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th>Số báo danh</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Điểm danh</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                  <?php
                      $query = "SELECT hs.Id,hs.admissionNumber,k.khoiLop,k.Id As maKhoi,l.tenLop,l.Id AS maLop,hs.firstName,
                      hs.lastName,hs.ngaysinh,hs.admissionNumber,hs.ngayTao
                      FROM hocsinh hs
                      INNER JOIN khoi k ON k.Id = hs.maKhoi
                      INNER JOIN lop l ON l.Id = hs.maLop
                      where hs.maKhoi = '$_SESSION[maKhoi]' and hs.maLop = '$_SESSION[maLop]'";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $trangThai="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td>".$sn."</td>
                                <td>".$rows['firstName']."</td>
                                <td>".$rows['lastName']."</td>
                                <td>".$rows['ngaysinh']."</td>
                                <td>".$rows['admissionNumber']."</td>
                                <td>".$rows['khoiLop']."</td>
                                <td>".$rows['tenLop']."</td>
                                <td><input name='check[]' type='checkbox' value=".$rows['admissionNumber']." class='form-control'></td>
                              </tr>";
                              echo "<input name='admissionNo[]' value=".$rows['admissionNumber']." type='hidden' class='form-control'>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                  </table>
                  <br>
                  <button type="submit" name="save" class="btn btn-dark">Xác nhận</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!--Row-->

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>