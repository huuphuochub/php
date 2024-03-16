<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Flix Hub</title>

     <link rel="shortcut icon" href="../public/img/Images/logo-foursquare.svg">

     <!-- CSS -->
     <link rel="stylesheet" href="../public/css/component.css">
     <link rel="stylesheet" href="../public/css/styles.css">
     <link rel="stylesheet" href="../public/css/grid.css">

     <!-- GOOGLE FONTS -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
          rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans:ital,wght@0,400;1,300&family=Playfair+Display:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&family=Shizuru&display=swap"
          rel="stylesheet">

     <!-- LINK CAROUSEL -->
     <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">



     <!-- BOX ICON  -->
     <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="./assets/fontawesome-free-5.15.4-web/css/all.min.css">
     <link rel="stylesheet" href="./themify-icons/themify-icons.css">
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
     <!-- NAV -->

     <div class="menu-tablet hidden" id="menu-tablet">
          <ul class="menu-tb-list">
               <li><a href="#">
                         home
                    </a></li>
               <li><a href="#">
                         Movies
                    </a></li>
               <li><a href="#">
                         tv series
                    </a></li>
               <li><a href="#">
                         Genre
                    </a></li>
               <li><a href="#">
                         setting
                    </a></li>

               <li><a href="#">
                         Account
                    </a></li>

          </ul>
     </div>


     <div class="navigation hidden">
          <ul>
               <li class="item active">
                    <a>
                         <span class="icon"><i class='bx bx-home-circle'></i></span>
                         <span class="text">Home</span>
                    </a>
               </li>


               <li class="item">
                    <a>
                         <span class="icon"><ion-icon name="film-outline"></ion-icon></span>
                         <span class="text">Movie</span>
                    </a>
               </li>

               <li class="item">
                    <a>
                         <span class="icon"><ion-icon name="tv-outline"></ion-icon></i></span>
                         <span class="text">TVSeries</span>
                    </a>
               </li>


               <li class="item">
                    <a>
                         <span class="icon"><i class='bx bx-user'></i></span>
                         <span class="text">Profile</span>
                    </a>
               </li>

               <li class="item">
                    <a>
                         <span class="icon"><i class='bx bx-cog'></i></span>
                         <span class="text">Settings</span>
                    </a>
               </li>
               <div class="indicator"></div>
          </ul>
     </div>


     <div class="progress-bar" id="progress-bar">
          <a href="#" id="progress-val">
               <ion-icon name="logo-foursquare"></ion-icon>
          </a>
     </div>
     <div class="container header">
          <div class="nav">
               <a href="index.php" class="logo">
                    <i style="margin-right: 10px;" class='bx bx-movie-play bx-tada main-color'></i>Flix<span
                         class="main-color">H</span>ub
               </a>

               <form action="index.php?page=search-movie" class="search-box">
                    <input type="hidden" name='page' value='search-movie'>
                    <input type="text" name="keyword" placeholder="Tìm kiếm phim ....." class="nav-search">
                    <button type="submit">
                         <i class='bx bx-search-alt'></i>
                    </button>
               </form>

               <div class="nav-favorite">
                    <a href="#" class="favorite-button">
                         <i class='bx bx-heart'></i>
                         <span class="favorite-count">0</span>
                    </a>
               </div>

               <div class="nav-sign">
               <?php if (isset($_SESSION['user'])):?>
                    <a href="logout.php" class="btn btn-hover">
                         <span>Đăng xuất</span>
                    </a>
                    <?php if($_SESSION['user']['role']==0):?>
                         <a href="admin/index.php" class="btn btn-hover">
                         <span>Trang Admin</span>
                         </a>
                    <?php endif; ?>
               <?php else: ?>
                    <a href="index.php?page=login" class="btn btn-hover">
                         <span>Đăng nhập</span>
                    </a>
               <?php endif; ?>
               </div>

               <div class="menu-toggle">
                    <ion-icon name="menu-outline" class="open"></ion-icon>
                    <ion-icon name="close-outline" class="close"></ion-icon>
               </div>
          </div>
     </div>
