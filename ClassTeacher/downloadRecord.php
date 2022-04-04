<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

?>
        <table border="1">
        <thead>
            <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Họ</th>
            <th>Ngày sinh</th>
            <th>Số báo danh</th>
            <th>Khối</th>
            <th>Lớp</th>
            <th>Năm học</th>
            <th>Học kì</th>
            <th>Điểm danh</th>
            <th>Ngày</th>
            </tr>
        </thead>

<?php 
$filename="diem danh";
$ngayTao = date("d-m-Y");

$cnt=1;			
$ret = mysqli_query($conn,"SELECT diemdanh.Id,diemdanh.trangThai,diemdanh.ngayTao,khoi.khoiLop,
        lop.tenLop,namhoc.namHoc,namhoc.maHocKy,hocky.tenHK,
        hocsinh.firstName,hocsinh.lastName,hocsinh.ngaysinh,hocsinh.admissionNumber
        FROM diemdanh
        INNER JOIN khoi ON khoi.Id = diemdanh.maKhoi
        INNER JOIN lop ON lop.Id = diemdanh.maLop
        INNER JOIN namhoc ON namhoc.Id = diemdanh.maNamHoc
        INNER JOIN hocky ON hocky.Id = namhoc.maHocKy
        INNER JOIN hocsinh ON hocsinh.admissionNumber = diemdanh.admissionNo
        where diemdanh.ngayTao = '$ngayTao' and diemdanh.maKhoi = '$_SESSION[maKhoi]' and diemdanh.maLop = '$_SESSION[maLop]'");

if(mysqli_num_rows($ret) > 0 )
{
while ($row=mysqli_fetch_array($ret)) 
{ 
    
    if($row['trangThai'] == '1'){$trangThai = "Có mặt"; $colour="#00FF00";}else{$trangThai = "Vắng mặt";$colour="#FF0000";}

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$firstName= $row['firstName'].'</td> 
<td>'.$lastName= $row['lastName'].'</td> 
<td>'.$ngaysinh= $row['ngaysinh'].'</td> 
<td>'.$admissionNumber= $row['admissionNumber'].'</td> 
<td>'.$khoiLop= $row['khoiLop'].'</td> 
<td>'.$tenLop=$row['tenLop'].'</td>	
<td>'.$namHoc=$row['namHoc'].'</td>	 
<td>'.$tenHK=$row['tenHK'].'</td>	
<td>'.$trangThai=$trangThai.'</td>	 	
<td>'.$ngayTao=$row['ngayTao'].'</td>	 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>