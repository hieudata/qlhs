
<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';



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
    function typeDropDown(str) {
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
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCallTypes.php?tid="+str,true);
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
            <h1 class="h3 mb-0 text-gray-800">Tìm tên học sinh</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tìm tên học sinh</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Tìm tên học sinh</h6>
                    <?php echo $trangThaiMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Chọn học sinh<span class="text-danger ml-2">*</span></label>
                        <?php
                        $qry= "SELECT * FROM hocsinh where maKhoi = '$_SESSION[maKhoi]' and maLop = '$_SESSION[maLop]' ORDER BY firstName ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="admissionNumber" class="form-control mb-3">';
                          echo'<option value="">--Chọn học sinh--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['admissionNumber'].'" >'.$rows['firstName'].' '.$rows['lastName'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Kiểu<span class="text-danger ml-2">*</span></label>
                          <select required name="type" onchange="typeDropDown(this.value)" class="form-control mb-3">
                          <option value="">--Chọn--</option>
                          <option value="1" >Tất cả</option>
                        </select>
                        </div>
                    </div>
                      <?php
                        echo"<div id='txtHint'></div>";
                      ?>
            
                    <button type="submit" name="view" class="btn btn-dark">Xem</button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-dark">Hiển thị</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>STT</th>
                        <th>Họ</th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th>Số báo danh</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Năm học</th>
                        <th>Học kì</th>
                        <th>Tình trạng</th>
                        <th>Ngày</th>
                      </tr>
                    </thead>
                   
                    <tbody>

                  <?php

                    if(isset($_POST['view'])){

                       $admissionNumber =  $_POST['admissionNumber'];
                       $type =  $_POST['type'];

                       if($type == "1"){ //All Attendance

                        $query = "SELECT diemdanh.Id,diemdanh.trangThai,diemdanh.ngayTao,khoi.khoiLop,
                        lop.tenLop,namhoc.namHoc,namhoc.maHocKy,hocky.tenHK,
                        hocsinh.firstName,hocsinh.lastName,hocsinh.ngaysinh,hocsinh.admissionNumber
                        FROM diemdanh
                        INNER JOIN khoi ON khoi.Id = diemdanh.maKhoi
                        INNER JOIN lop ON lop.Id = diemdanh.maLop
                        INNER JOIN namhoc ON namhoc.Id = diemdanh.maNamHoc
                        INNER JOIN hocky ON hocky.Id = namhoc.maHocKy
                        INNER JOIN hocsinh ON hocsinh.admissionNumber = diemdanh.admissionNo
                        where diemdanh.admissionNo = '$admissionNumber' and diemdanh.maKhoi = '$_SESSION[maKhoi]' and diemdanh.maLop = '$_SESSION[maLop]'";

                       }
                       if($type == "2"){ //Single Date Attendance

                        $singleDate =  $_POST['singleDate'];

                         $query = "SELECT diemdanh.Id,diemdanh.trangThai,diemdanh.ngayTao,khoi.khoiLop,
                        lop.tenLop,namhoc.namHoc,namhoc.maHocKy,hocky.tenHK,
                        hocsinh.firstName,hocsinh.lastName,hocsinh.ngaysinh,hocsinh.admissionNumber
                        FROM diemdanh
                        INNER JOIN khoi ON khoi.Id = diemdanh.maKhoi
                        INNER JOIN lop ON lop.Id = diemdanh.maLop
                        INNER JOIN namhoc ON namhoc.Id = diemdanh.maNamHoc
                        INNER JOIN hocky ON hocky.Id = namhoc.maHocKy
                        INNER JOIN hocsinh ON hocsinh.admissionNumber = diemdanh.admissionNo
                        where diemdanh.ngayTao = '$singleDate' and diemdanh.admissionNo = '$admissionNumber' and diemdanh.maKhoi = '$_SESSION[maKhoi]' and diemdanh.maLop = '$_SESSION[maLop]'";
                        

                       }
                       if($type == "3"){ //Date Range Attendance

                         $fromDate =  $_POST['fromDate'];
                         $toDate =  $_POST['toDate'];

                         $query = "SELECT diemdanh.Id,diemdanh.trangThai,diemdanh.ngayTao,khoi.khoiLop,
                        lop.tenLop,namhoc.namHoc,namhoc.maHocKy,hocky.tenHK,
                        hocsinh.firstName,hocsinh.lastName,hocsinh.ngaysinh,hocsinh.admissionNumber
                        FROM diemdanh
                        INNER JOIN khoi ON khoi.Id = diemdanh.maKhoi
                        INNER JOIN lop ON lop.Id = diemdanh.maLop
                        INNER JOIN namhoc ON namhoc.Id = diemdanh.maNamHoc
                        INNER JOIN hocky ON hocky.Id = namhoc.maHocKy
                        INNER JOIN hocsinh ON hocsinh.admissionNumber = diemdanh.admissionNo
                        where diemdanh.ngayTao between '$fromDate' and '$toDate' and diemdanh.admissionNo = '$admissionNumber' and diemdanh.maKhoi = '$_SESSION[maKhoi]' and diemdanh.maLop = '$_SESSION[maLop]'";
                        
                       }

                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $trangThai="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                              if($rows['trangThai'] == '1'){$trangThai = "Có Mặt"; $colour="#2ecc71";}else{$trangThai = "Vắng";$colour="#e74c3c";}
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
                                <td>".$rows['namHoc']."</td>
                                <td>".$rows['tenHK']."</td>
                                <td style='text-align: center; color: black; background-color:".$colour."'>".$trangThai."</td>
                                <td>".$rows['ngayTao']."</td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                    }
                      ?>
                    </tbody>
                  </table>
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