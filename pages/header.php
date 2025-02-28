<?php 
ob_start();
session_start();
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {

  session_unset();
  session_destroy();
}
?>
<header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="index.php" class="logo">
        
      </a>

      <div class="header-actions">
<a href="index.php?quanly=timkiem">
        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button></a>
      
        <div class="lang-wrapper">
          <label for="language">
            <ion-icon name="globe-outline"></ion-icon>
          </label>
      
          <select name="language" id="language">
            <option value="en">EN</option>
            <option value="au">AU</option>
            <option value="ar">AR</option>
            <option value="tu">TU</option>
          </select>
        </div>
      
        <?php if (isset($_SESSION['id_nguoidung'])) : ?>
    <!-- Hiển thị avatar và tên người dùng -->
    <div class="user-info">
      <div class="taikhoan123">
        <img src="./assets/images/<?php echo $_SESSION['avatar']; ?>" alt="Avatar" class="avatar">
        <span class="user-name" id="dropdownButton"><?php echo $_SESSION['ten_nguoi_dung']; ?> <i class="fa-solid fa-chevron-down">  </i></span> 
        <!-- Dropdown menu -->
      </div>
        <div class="dropdown-content">
          <?php
          
          if(isset($_SESSION['loai_nguoi_dung']) && $_SESSION['loai_nguoi_dung'] == 'admin') {
            echo ' <a href="./admin/index.php?action=dashboard&query=lietke"><i class="fas fa-user"></i> Quản lý</a>
            ';
          }else{}
            ?>
       
        <a href="index.php?quanly=thongtintaikhoan"><i class="fas fa-user"></i> Tài Khoản</a>
            <a href="index.php?quanly=bosuutap"><i class="fas fa-images"></i> Bộ sưu tập</a>
            <a href="#" id="logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        </div>
    </div>
    <!-- JavaScript code -->

<?php else : ?>
    <!-- Hiển thị nút đăng nhập nếu không có session -->
    <a href="index.php?quanly=dangnhap"><button type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</button></a>
<?php endif; ?>
<!-- JavaScript code -->

      </div>
      
      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar id="main-navbar">

        <div class="navbar-top">

          <a href="index.php" class="logo">
            
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li>
            <a href="./index.php" class="navbar-link">Trang chủ</a>
          </li>

          <li>
            <a href="index.php?quanly=hot" class="navbar-link">Phim Hot</a>
          </li>

          <li>
            <a href="index.php?quanly=loc&loai_phim=1" class="navbar-link">Phim Bộ</a>
          </li>

          <li>
            <a href="index.php?quanly=loc&loai_phim=0" class="navbar-link">Phim Lẻ</a>
          </li>

          <li>
            <a href="index.php?quanly=loc&sap_xep=nam_san_xuat" class="navbar-link">Phim Mới</a>
          </li>

        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>
      <script>
document.addEventListener('DOMContentLoaded', function () {
  const menuOpenBtn = document.querySelector('.menu-open-btn');
  const menuCloseBtn = document.querySelector('.menu-close-btn');
  const navbar = document.querySelector('.navbar');

  menuOpenBtn.addEventListener('click', function () {
    console.log('Menu Opened');
    navbar.classList.add('menu-opened');
  });

  menuCloseBtn.addEventListener('click', function () {
    console.log('Menu Closed');
    navbar.classList.remove('menu-opened');
  });
});

</script>
    </div>
  </header>
<!-- ... (phần HTML hiện tại) ... -->



  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var dropdownButton = document.getElementById('dropdownButton');
    var dropdownContent = document.querySelector('.dropdown-content');

    dropdownButton.addEventListener('click', function () {
      dropdownContent.classList.toggle('active');
    });


    document.addEventListener('click', function (event) {
      if (!event.target.closest('.user-info')) {
        dropdownContent.classList.remove('active');
      }
    });
  });
</script>
<script>
        document.getElementById('logout').addEventListener('click', function() {
            var confirmLogout = confirm('Bạn muốn đăng xuất không?');
            if (confirmLogout) {
                window.location.href = "index.php?dangxuat=1";
            }
        });
    </script>