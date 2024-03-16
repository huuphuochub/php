<div class="containerr">
    <div class="nav">
        <a href="#" class="logo">
            <i style="margin-right: 10px;" class='bx bx-movie-play bx-tada main-color'></i>Fl<span
                class="main-color">i</span>x
        </a>

        <form action="" class="search-box">
            <input type="text" name="search" placeholder="Search Your Movie ....." class="nav-search">
            <button type="password">
                <i class='bx bx-search-alt'></i>
            </button>
        </form>

        <div class="nav-sign">
            <!-- <a href="#" class="btn btn-hover">
                <span>Sign in</span>
            </a> -->
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


<div class="nav-wrapperr">
    <ul class="nav-menu" id="nav-menu">
        <li class="nav-item active">
            <a href="#big-section">
                <span class="nav-icon"><ion-icon name="home-outline"></ion-icon></span>
                Home
            </a>
        </li>

        <li class="nav-item">
            <a href="#latest-section">
                <span class="nav-icon"><ion-icon name="film-outline"></ion-icon></span>
                Movies
            </a>
        </li>
        <li class="nav-item">
            <a href="#section-tv">
                <span class="nav-icon"><ion-icon name="tv-outline"></ion-icon></span>
                Tv Series
            </a>
        </li>

        <li class="nav-item">
            <a href="#genre-section">
                <span class="nav-icon"><ion-icon name="grid-outline"></ion-icon></span>
                Genre
            </a>
        </li>

        <li class="nav-item">
            <a href="#setting-section"">
                              <span class=" nav-icon"><ion-icon name="settings-outline"></ion-icon></span>
                setting
            </a>
        </li>
        <li class="nav-item">
            <a href="#messages-section">
                <span class="nav-icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                messages
            </a>
        </li>
        <li class="nav-item">
            <a href="#">
                <span class="nav-icon"><ion-icon name="help-circle-outline"></ion-icon></span>
                about
            </a>
        </li>

        <li class="nav-item">
            <a href="#">
                <span class="nav-icon"><ion-icon name="person-outline"></ion-icon></span>
                Account
            </a>
        </li>

    </ul>
</div>
<style>
    .containerr,
    .nav-wrapperr,
    .sectionn,
    .slide-containerr {
        display: none;
    }
    footer{
        margin-top: 400px;
    }
</style>
<!--END NAV -->

<!-- SLIDE SECTION -->
<div class="big-sectionn" id="big-section">
    <!-- BIG SLIDES -->
    <div class="slide-containerr" id="big-slider">

        <div class="big-slide-item active">
            <img src="./assets/img/Images/p-2.jpg" alt="Poster">

            <div class="big-slide-item-content">
                <div class="item-content-wrapper">
                    <div class="item-content-title">
                        Pirate caribbean
                    </div>

                    <div class="movies-infors">
                        <div class="movies-infor">
                            <ion-icon name="bookmark-outline"></ion-icon>
                            <span>9.5</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="time-outline"></ion-icon>
                            <span>120 mins</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="cube-outline"></ion-icon>
                            <span>FHD</span>
                        </div>
                    </div>

                    <div class="item-content-description ">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quas, possimus eius. Deserunt non odit, cum vero reprehenderit
                        laudantium odio vitae autem quam, incidunt molestias ratione mollitia accusantium,
                        facere ab suscipit.
                    </div>
                </div>
            </div>

            <div class="play-movies">
                <div class="ring"></div>
                <a href="https://www.youtube.com/watch?v=Hgeu5rhoxxY&t=10s">
                    <i class='bx bxs-right-arrow'></i>
                </a>
                <div class="btn-watch">
                    <span>watch trailer</span>
                </div>
            </div>
        </div>

        <div class="big-slide-item">
            <img src="../assets/img/Images/p-6.jpg" alt="Poster">

            <div class="big-slide-item-content">
                <div class="item-content-wrapper">
                    <div class="item-content-title ">
                        black widow
                    </div>

                    <div class="movies-infors">
                        <div class="movies-infor">
                            <ion-icon name="bookmark-outline"></ion-icon>
                            <span>9.5</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="time-outline"></ion-icon>
                            <span>120 mins</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="cube-outline"></ion-icon>
                            <span>FHD</span>
                        </div>
                    </div>

                    <div class="item-content-description ">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quas, possimus eius. Deserunt non odit, cum vero reprehenderit
                        laudantium odio vitae autem quam, incidunt molestias ratione mollitia accusantium,
                        facere ab suscipit.
                    </div>
                </div>
            </div>

            <div class="play-movies ">
                <div class="ring"></div>
                <a href="https://www.youtube.com/watch?v=ybji16u608U">
                    <i class='bx bxs-right-arrow'></i>
                </a>
                <div class="btn-watch">
                    <span>watch trailer</span>
                </div>
            </div>
        </div>

        <div class="big-slide-item">
            <img src="./assets/img/Images/transformer-banner.jpg" alt="Poster">

            <div class="big-slide-item-content">
                <div class="item-content-wrapper">
                    <div class="item-content-title">
                        Transformer
                    </div>

                    <div class="movies-infors ">
                        <div class="movies-infor">
                            <ion-icon name="bookmark-outline"></ion-icon>
                            <span>9.5</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="time-outline"></ion-icon>
                            <span>120 mins</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="cube-outline"></ion-icon>
                            <span>FHD</span>
                        </div>
                    </div>

                    <div class="item-content-description  ">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quas, possimus eius. Deserunt non odit, cum vero reprehenderit
                        laudantium odio vitae autem quam, incidunt molestias ratione mollitia accusantium,
                        facere ab suscipit.
                    </div>
                </div>
            </div>

            <div class="play-movies ">
                <div class="ring"></div>
                <a href="https://www.youtube.com/watch?v=Q3VKie4pChs">
                    <i class='bx bxs-right-arrow'></i>
                </a>
                <div class="btn-watch">
                    <span>watch trailer</span>
                </div>
            </div>
        </div>

        <div class="big-slide-item">
            <img src="./assets/img/Images/p-3.jpg" alt="Poster">

            <div class="big-slide-item-content">
                <div class="item-content-wrapper">
                    <div class="item-content-title ">
                        bloodShot
                    </div>

                    <div class="movies-infors">
                        <div class="movies-infor">
                            <ion-icon name="bookmark-outline"></ion-icon>
                            <span>9.5</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="time-outline"></ion-icon>
                            <span>120 mins</span>
                        </div>
                        <div class="movies-infor">
                            <ion-icon name="cube-outline"></ion-icon>
                            <span>FHD</span>
                        </div>
                    </div>

                    <div class="item-content-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Quas, possimus eius. Deserunt non odit, cum vero reprehenderit
                        laudantium odio vitae autem quam, incidunt molestias ratione mollitia accusantium,
                        facere ab suscipit.
                    </div>
                </div>
            </div>

            <div class="play-movies ">
                <div class="ring"></div>
                <a href="https://www.youtube.com/watch?v=vOUVVDWdXbo">
                    <i class='bx bxs-right-arrow'></i>
                </a>
                <div class="btn-watch">
                    <span>watch trailer</span>
                </div>
            </div>
        </div>

        <ul class="slide-control">
            <li class="slide-prev">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </li>

            <li class="slide-next">
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </li>
        </ul>

    </div>
</div>


<div class="genre">
    <div class="section-wrapper" id="genre-section">
        <div class="section-header">Genre</div>
        <div class="genre-list">
            <a href="#">Action</a>
            <a href="#">Comedy</a>
            <a href="#">Drama</a>
            <a href="#">Horror</a>
            <a href="#">Science Fiction</a>
        </div>
    </div>
</div>

<!-- LATEST SECTION -->
<div class="section" id="latest-section">
    <div class="section-wrapper" id="section-wrapper">
        <div class="section-header">

        </div>

        <div class="movies-slide row" id="movie-container">
        <?php if (!empty($searchMovies)): ?>
            <?php foreach ($searchMovies as $movie): ?>
                <a href="index.php?page=product_detail&id=<?php echo htmlspecialchars($movie['id']); ?>" class="movie-item col-3-5 m-5 s-11 to-top show-on-scroll">
                <div>
                    <img src="img/Images/<?=$movie['image']?>" alt="">
                    <div class="movie-item-content">
                        <div class="movie-item-title">
                        <?=$movie['name']?>

                        </div>

                        <div class="movies-infors-card">
                            <div class="movies-infor">
                                <ion-icon name="bookmark-outline"></ion-icon>
                                <span><?=$movie['rating']?></span>
                            </div>
                            <div class="movies-infor">
                                <ion-icon name="time-outline"></ion-icon>
                                <span><?=$movie['duration']?></span>
                            </div>
                            <div class="movies-infor">
                                <ion-icon name="cube-outline"></ion-icon>
                                <span><?=$movie['quality']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="movie-item-overlay">
                </div>
                <div class="movie-item-act">
                    <!-- <div class="ring"></div> -->
                    <i class='bx bxs-right-arrow'></i>

                    <div>
                        <i class='bx bxs-share-alt'></i>
                        <i class='bx bxs-heart'></i>
                        <i class='bx bx-plus-medical'></i>
                    </div>
                </div>

            </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có phim.</p>
        <?php endif; ?>

            

           
        </div>
    </div>
</div>
 <!-- TV SERIES -->
    