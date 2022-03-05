<nav class="navbar navbar-expand-lg navigation">
  <a class="navbar-brand color_logo" href="#">ODOO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link color_word " href="/?controller=home&action=index">Trang Chủ</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link color_word" href="/?controller=tax_month&action=index">Tính Thuế</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link color_word" href="/?controller=department&action=index">Phòng Ban</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color_word" href="/?controller=tax_month&action=list">Danh Sách</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color_word" href="/?controller=tax_month&action=import_from_excel">Import excel</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle color_word" href="/?controller=summary&action=index" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quyết Toán
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/?controller=summary&action=by_department">Theo Phòng Ban</a>
          <a class="dropdown-item" href="/?controller=summary&action=by_user">Theo Cá Nhân</a>
        </div>
      </li>
    </ul>
  </div>
</nav>