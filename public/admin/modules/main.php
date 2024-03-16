<div class="content-wrapper" style="min-height: 359px; background-color: #fff;">
    <?php
   if (isset($_GET['action']) && $_GET['query']) {
      $tam = $_GET['action'];
      $query = $_GET['query'];
   } else {
      $tam = '';
      $query = '';
   }
   if ($tam == 'quanlytheloaiphim' && $query == 'them') {
      $controller = new themtheloaiController($db);
      $controller->themthloai();
      break;

   } 
   else if ($tam == 'quanlytheloaiphim' && $query == 'lietke') {
      include("modules/quanlytheloai/lienke.php");
   }
   elseif ($tam == 'quanlytheloaiphim' && $query == 'sua') {
      include("modules/quanlytheloai/sua.php");
   } 
   elseif ($tam == 'quanlysp' && $query == 'them') {
      include("modules/quanlysp/them.php");
   } 
   elseif ($tam == 'quanlysp' && $query == 'lietke'){
      include("modules/quanlysp/lienke.php");
   }
   elseif ($tam == 'quanlysp' && $query == 'sua') {
      include("modules/quanlysp/sua.php");
   } 
   elseif ($tam == 'quanlydonhangddk' && $query == 'lietke') {
      include("modules/quanlydonhang/lietke-registered.php");
   } 
   elseif ($tam == 'quanlydonhangcdk' && $query == 'lietke') {
      include("modules/quanlydonhang/lietke-unregistered.php");
   }
   elseif ($tam == 'donhang' && $query == 'xemdonhang') {
      include("modules/quanlydonhang/xemdonhang.php");
   } 
   elseif ($tam == 'quanlyxuatchieu' && $query == 'them') {
         include("modules/quanlyxuatchieu/them.php");
   } 
   elseif ($tam == 'quanlyxuatchieu' && $query == 'sua') {
      include("modules/quanlyxuatchieu/sua.php");
   } 
   else if ($tam == 'quanlytheloaiphim' && $query == 'loi'){
      include("modules/quanlytheloai/loi.php");
   }
   elseif ($tam == 'quanlyxuatchieu' && $query == 'lietke') {
      include("modules/quanlyxuatchieu/lietke.php");
   }
   elseif ($tam == 'taikhoannguoidung' && $query == 'lietke') {
      include("modules/quanlytaikhoan/lietkekhachhang.php");
   }
   elseif ($tam == 'quanlytrailer' && $query == 'lietke') {
      include("modules/quanlytrailer/lietke.php");
   }
   elseif ($tam == 'quanlytrailer' && $query == 'them') {
      include("modules/quanlytrailer/them.php");
   }
   elseif ($tam == 'phanhoi' && $query == 'lietke') {
      include("modules/phanhoi/lietke.php");
   }
   elseif ($tam == 'add' && $query == 'them') {
      include("modules/themadmin/addadmin.php");
   }
   else {
      include("modules/dashboard.php");
   }
   ?>
</div>