<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Attendance Dashboard | By Code Info</title>
  <link rel="stylesheet" href="css/style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https:
  <script src="https:

<!-- Thêm thư viện Select2 -->
<link rel="stylesheet" href="https:
<script src="https:

</head>
<body>
  <div class="container">
<?php 
           if (session_status() == PHP_SESSION_NONE) {
            session_start();
           }
if(isset($_SESSION['loai_nguoi_dung']) && $_SESSION['loai_nguoi_dung'] !== 'admin') {
  echo '<script>alert("Bạn không phải là admin. Vui lòng quay lại trang chủ."); window.location.href="../index.php";</script>';
  exit();
}elseif(isset($_SESSION['loai_nguoi_dung'])=='admin'){

}else{
  echo '<script>alert("Bạn không phải là admin. Vui lòng quay lại trang chủ."); window.location.href="../index.php";</script>';

}
include("modules/header.php");
include("modules/main.php");

?>
   
  </div>

</body>
</html>
</span>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      var themPhimMoi = document.getElementById("themPhimMoi");
      var submenuContent = themPhimMoi.querySelector(".submenu-content");

      themPhimMoi.addEventListener("click", function (event) {
        event.stopPropagation();

        var isOpen = themPhimMoi.classList.contains("open");


        if (isOpen) {
          themPhimMoi.classList.remove("open");
        } else {
          themPhimMoi.classList.add("open");
        }
      });

      document.addEventListener("click", function () {

        themPhimMoi.classList.remove("open");
      });


      submenuContent.addEventListener("click", function (event) {
        event.stopPropagation();
      });
    });
    document.addEventListener("DOMContentLoaded", function () {
      var theLoai = document.getElementById("theLoai");

      theLoai.addEventListener("click", function (event) {
        event.stopPropagation();

        var isOpen = theLoai.classList.contains("open");


        if (isOpen) {
          theLoai.classList.remove("open");
        } else {
          theLoai.classList.add("open");
        }
      });

      document.addEventListener("click", function () {

        theLoai.classList.remove("open");
      });
    });
  </script>
   <script>
    document.addEventListener("DOMContentLoaded", function () {

      var quocGia = document.getElementById("quocGia");


      quocGia.addEventListener("click", function (event) {
        event.stopPropagation();

        var isOpen = quocGia.classList.contains("open");


        if (isOpen) {
          quocGia.classList.remove("open");
        } else {
          quocGia.classList.add("open");
        }
      });


      document.addEventListener("click", function () {
        quocGia.classList.remove("open");
      });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {

      var daoDien = document.getElementById("daoDien");


      daoDien.addEventListener("click", function (event) {
        event.stopPropagation();

        var isOpen = daoDien.classList.contains("open");


        if (isOpen) {
          daoDien.classList.remove("open");
        } else {
          daoDien.classList.add("open");
        }
      });


      document.addEventListener("click", function () {
        daoDien.classList.remove("open");
      });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {

      var dienVien = document.getElementById("dienVien");


      dienVien.addEventListener("click", function (event) {
        event.stopPropagation();

        var isOpen = dienVien.classList.contains("open");


        if (isOpen) {
          dienVien.classList.remove("open");
        } else {
          dienVien.classList.add("open");
        }
      });


      document.addEventListener("click", function () {
        dienVien.classList.remove("open");
      });
    });
  </script>