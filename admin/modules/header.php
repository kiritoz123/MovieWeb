<nav>
  <ul>
    <li>
    <?php



if (isset($_SESSION['loai_nguoi_dung']) && $_SESSION['loai_nguoi_dung'] === 'admin') {

    $avatar = isset($_SESSION['avatar']) ? $_SESSION['avatar'] : '';
    $ten_nguoi_dung = isset($_SESSION['ten_nguoi_dung']) ? $_SESSION['ten_nguoi_dung'] : '';


    echo '<a href="#" class="logo">';
    echo '<img src="../assets/images/' . $avatar . '" alt="Avatar">';
    echo '<span class="nav-item">' . $ten_nguoi_dung . '</span>';
    echo '</a>';
} else {

    echo '<a href="#" class="logo">';
    echo '<img src="./pic/logo.jpg" alt="Logo">';
    echo '<span class="nav-item">Admin</span>';
    echo '</a>';
}
?>

    </li>
    <li>
      <a href="index.php?action=dashboard&query=lietke">
        <i class="fas fa-tachometer-alt"></i>
        <span class="nav-item">Dashboard</span>
      </a>
    </li>
    <li class="submenu" id="themPhimMoi">
  <a href="#">
    <i class="fas fa-film"></i>
    <span class="nav-item">Quản lý phim</span>
    <i class="fas fa-caret-down"></i>
  </a>
  <ul class="submenu-content">
  <li class="dropdown_321"><a href="index.php?action=quanlyphim&query=them" id="themPhimLe">Thêm phim mới</a></li>
  <li class="dropdown_321"><a href="index.php?action=quanlyphim&query=lietke" id="danhSachPhim">All FILM </a></li>
  <li class="dropdown_321"><a href="index.php?action=quanlyphimbo&query=lietke" id="themPhimBo">Danh sách phim bộ</a></li>
  <li class="dropdown_321"><a href="index.php?action=quanlyphimle&query=lietke" id="themPhimLe">Danh sách phim lẻ</a></li>

</ul>


</li>


<li class="submenu" id="theLoai">
    <a href="index.php?action=quanlytheloai&query=lietke">
      <i class="fas fa-list"></i>
      <span class="nav-item">Thể Loại</span>
    </a>
  </li>
  <li class="submenu" id="quocGia">
    <a href="index.php?action=quanlyquocgia&query=lietke">
      <i class="fas fa-globe"></i>
      <span class="nav-item">Quốc gia</span>
    </a>
  </li>

  <li class="submenu" id="daoDien">
    <a href="#">
      <i class="fas fa-cogs"></i>
      <span class="nav-item">Đạo diễn</span>
      <i class="fas fa-caret-down"></i>
    </a>
    <ul class="submenu-content">
      <li class="dropdown_321"><a href="index.php?action=quanlydaodien&query=them" id="daoDien1">Thêm đạo diễn</a></li>
      <li class="dropdown_321"><a href="index.php?action=quanlydaodien&query=lietke" id="daoDien2">Danh sách đạo diễn</a></li>
    </ul>
  </li>

  <li class="submenu" id="dienVien">
    <a href="#">
      <i class="fas fa-user"></i>
      <span class="nav-item">Diễn viên</span>
      <i class="fas fa-caret-down"></i>
    </a>
    <ul class="submenu-content">
      <li class="dropdown_321"><a href="index.php?action=quanlydienvien&query=them" id="dienVien1">Thêm diễn viên</a></li>
      <li class="dropdown_321"><a href="index.php?action=quanlydienvien&query=lietke" id="dienVien2">Danh sách diễn viên</a></li>
    </ul>
  </li>
    <li>
      <a href="../index.php" class="logout">
        <i class="fas fa-sign-out-alt"></i>
        <span class="nav-item">Log out</span>
      </a>
    </li>
  </ul>
</nav>
