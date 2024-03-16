<div class="nav-wrapper">
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
                    phim thịnh hành
               </a>
          </li>
          <li class="nav-item">
               <a href="#section-tv">
                    <span class="nav-icon"><ion-icon name="tv-outline"></ion-icon></span>
                   phim mới
               </a>
          </li>

          <li class="nav-item">
               <a href="#genre-section">
                    <span class="nav-icon"><ion-icon name="grid-outline"></ion-icon></span>
                    thể loại
               </a>
          </li>

          <li class="nav-item">
               <a href="#setting-section"">
                              <span class=" nav-icon"><ion-icon name="settings-outline"></ion-icon></span>
                    cài đặt
               </a>
          </li>
          <li class="nav-item">
               <a href="#messages-section">
                    <span class="nav-icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                    nhận xét
               </a>
          </li>
          <li class="nav-item">
               <a href="#about-section">
                    <span class="nav-icon"><ion-icon name="help-circle-outline"></ion-icon></span>
                    giới thiệu
               </a>
          </li>

          <li class="nav-item">
               <a href="#account-section">
                    <span class="nav-icon"><ion-icon name="person-outline"></ion-icon></span>
                    tài khoản
               </a>
          </li>

     </ul>
</div>

<!--END NAV -->

<!-- SLIDE SECTION -->
<div class="big-section" id="big-section">
     <!-- BIG SLIDES -->
     <div class="slide-container" id="big-slider">

          <?php foreach ($slideBanners as $banner): ?>
               <div class="big-slide-item <?= $banner === reset($slideBanners) ? 'active' : '' ?>">
                    <img src="../public/img/Images/<?= $banner['image'] ?>" alt="<?= htmlspecialchars($banner['title']) ?>">

                    <div class="big-slide-item-content">
                         <div class="item-content-wrapper">
                              <div class="item-content-title">
                                   <?= htmlspecialchars($banner['title']) ?>
                              </div>

                              <!-- ... Các phần khác như ratings, duration, etc. -->

                              <div class="item-content-description">
                                   <?= htmlspecialchars($banner['description']) ?>
                              </div>
                         </div>
                    </div>

                    <div class="play-movies">
                         <div class="ring"></div>
                         <a href="<?= $banner['link'] ?>">
                              <i class='bx bxs-right-arrow'></i>
                         </a>
                         <div class="btn-watch">
                              <span>watch trailer</span>
                         </div>
                    </div>
               </div>
          <?php endforeach; ?>


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

<!--END SLIDE SECTION -->



<!-- LATEST SECTION -->
<div class="section" id="latest-section">
     <div class="section-wrapper" id="section-wrapper">
          <div class="section-header">
               Phim thịnh hành
          </div>

          <div class="movies-slide row" id="movie-container">
          <?php foreach ($topViewedMovies as $movie): ?>
    <a href="index.php?page=product_detail&id=<?php echo htmlspecialchars($movie['id']); ?>"
       class="movie-item col-3-5 m-5 s-11 to-top show-on-scroll">
       <div>
            <img src="../public/img/Images/<?php echo htmlspecialchars($movie['image']); ?>"
                 alt="<?php echo htmlspecialchars($movie['name']); ?>">
            <div class="movie-item-content">
                 <div class="movie-item-title">
                      <?php echo htmlspecialchars($movie['name']); ?>
                 </div>
                 <div class="movies-infors-card">
                      <div class="movies-infor">
                           <ion-icon name="bookmark-outline"></ion-icon>
                           <span>
                                <?php echo htmlspecialchars($movie['rating']); ?>
                           </span>
                      </div>
                      <div class="movies-infor">
                           <ion-icon name="time-outline"></ion-icon>
                           <span>
                                <?php echo htmlspecialchars($movie['duration']); ?>
                           </span>
                      </div>
                      <div class="movies-infor">
                           <ion-icon name="cube-outline"></ion-icon>
                           <span>
                                <?php echo htmlspecialchars($movie['quality']); ?>
                           </span>
                      </div>
                      
                      <!-- <div class="movies-infor">
                           <ion-icon name="eye-outline"></ion-icon>
                           <span>
                                <?php echo htmlspecialchars($movie['views']); ?> Views
                           </span>
                      </div> -->
                 </div>
            </div>
       </div>
       <div class="movie-item-overlay">
       </div>
       <div class="movie-item-act">
            <i class='bx bxs-right-arrow'></i>
            <div>
                 <i class='bx bxs-share-alt'></i>
                 <i class='bx bxs-heart'></i>
                 <i class='bx bx-plus-medical'></i>
            </div>
       </div>
    </a>
<?php endforeach; ?>


               <div class="btn-load btn-load-tb" id="load-more-button">
                    <span>xem thêm</span>
               </div>
          </div>
     </div>
</div>

<!-- END LATEST SECTION -->

<!-- TV SERIES -->
<div class="section-tv" id="section-tv">
     <div class="section-wrapper">
          <div class="section-header">
               <span>phim mới nhất</span>
               <!-- <div class="btn-load-2">
                              <span>load more</span>
                         </div> -->
          </div>

          <div class="movies-slide row" id="tv-slider">
              
          <?php foreach ($recentMovies as $movie): ?>
    <a href="index.php?page=product_detail&id=<?php echo htmlspecialchars($movie['id']); ?>"
         class="movie-item col-3-5 m-5 s-11 to-top show-on-scroll">
         <div>
              <img src="../public/img/Images/<?php echo htmlspecialchars($movie['image']); ?>"
                   alt="<?php echo htmlspecialchars($movie['name']); ?>">
              <div class="movie-item-content">
                   <div class="movie-item-title">
                        <?php echo htmlspecialchars($movie['name']); ?>
                   </div>
                   <div class="movies-infors-card">
                        <div class="movies-infor">
                             <ion-icon name="bookmark-outline"></ion-icon>
                             <span>
                                  <?php echo htmlspecialchars($movie['rating']); ?>
                             </span>
                        </div>
                        <div class="movies-infor">
                             <ion-icon name="time-outline"></ion-icon>
                             <span>
                                  <?php echo htmlspecialchars($movie['duration']); ?>
                             </span>
                        </div>
                        <div class="movies-infor">
                             <ion-icon name="cube-outline"></ion-icon>
                             <span>
                                  <?php echo htmlspecialchars($movie['quality']); ?>
                             </span>
                        </div>
                        
                        <!-- <div class="movies-infor">
                             <ion-icon name="calendar-outline"></ion-icon>
                             <span>
                                  <?php echo htmlspecialchars($movie['creation_date']); ?>
                             </span>
                        </div> -->
                   </div>
              </div>
         </div>
         <div class="movie-item-overlay">
         </div>
         <div class="movie-item-act">
              <i class='bx bxs-right-arrow'></i>
              <div>
                   <i class='bx bxs-share-alt'></i>
                   <i class='bx bxs-heart'></i>
                   <i class='bx bx-plus-medical'></i>
              </div>
         </div>
    </a>
<?php endforeach; ?>



               <div class="btn-load ">
                    <span>xem thêm</span>
               </div>

          </div>
     </div>
</div>

<!-- TV SERIES -->


<!-- Genre -->
<div class="genre">
     <div class="section-wrapper" id="genre-section">
          <div class="section-header">thể loại</div>
          <div class="genre-list">
               <?php foreach ($categories as $categories): ?>
                    <a href="#">
                         <?php echo htmlspecialchars($categories['name']); ?>
                    </a>
               <?php endforeach; ?>
          </div>
     </div>
</div>
<!-- END Genre -->


<!-- Setting -->
<div class="setting">
     <div class="section-wrapper" id="setting-section">
          <div class="section-header">cài đặt</div>
          <div class="setting-options">
               <div class="setting-option">
                    <label for="theme">Nền:</label>
                    <select id="theme" name="theme">
                         <option value="main">Blue</option>
                         <option value="red">Red</option>
                    </select>
               </div>
               <div class="setting-option">
                    <label for="language">Ngôn ngữ:</label>
                    <select id="language" name="language">
                         <option value="vietnamese">Vietnamese</option>
                         <option value="english">English</option>
                         <option value="spanish">Spanish</option>
                         <option value="french">French</option>
                    </select>
               </div>
               <div class="setting-option">
                    <label for="notifications">Thông báo:</label>
                    <input type="checkbox" id="notifications" name="notifications">
               </div>
          </div>
          <button type="submit">Lưu cài đặt</button>
     </div>
</div>

<!-- END Setting  -->


<!-- ĐỔI MÀU THEME -->
<SCript>
     document.getElementById('theme').addEventListener('change', function () {
    const theme = this.value;

    // Lấy ra thẻ <style> trong HTML
    const styleElement = document.querySelector('style');

    // Xoá nếu có một thẻ <style> đã tồn tại
    if (styleElement) {
        styleElement.parentNode.removeChild(styleElement);
    }

  
    const newStyleElement = document.createElement('style');

 
    if (theme === 'main') {
        newStyleElement.textContent = `
            :root {
                --main-color: #00f7ff; /* Main color */
              
            }
        `;
    } else if (theme === 'red') {
        newStyleElement.textContent = `
            :root {
                --main-color: red; /* Red color */
                
            }
        `;
    }

    // Thêm thẻ <style> vào <head> của trang web
    document.head.appendChild(newStyleElement);
});
</SCript>

<!-- SPECIAL MOVIES -->
<div class="special">
     <div class="section-wrapper">
          <div class="section-header">
               phim đặc biệt
          </div>
          <?php foreach ($hotBanners as $banner): ?>
               <div class="big-slide-item special-movie active to-top show-on-scroll">
                    <img src="../public/img/Images/<?= $banner['image'] ?>" alt="<?= htmlspecialchars($banner['title']) ?>">

                    <div class="big-slide-item-content">
                         <div class="item-content-wrapper">
                              <div class="item-content-title ">
                                   <?= htmlspecialchars($banner['title']) ?>
                              </div>

                              <div class="movies-infors">
                                   <div class="movies-infor">
                                        <ion-icon name="bookmark-outline"></ion-icon>
                                        <span>
                                             <?php echo htmlspecialchars($banner['rating']); ?>
                                        </span>
                                   </div>
                                   <div class="movies-infor">
                                        <ion-icon name="time-outline"></ion-icon>
                                        <span>
                                             <?php echo htmlspecialchars($banner['duration']); ?>
                                        </span>
                                   </div>
                                   <div class="movies-infor">
                                        <ion-icon name="cube-outline"></ion-icon>
                                        <span>
                                             <?php echo htmlspecialchars($banner['quality']); ?>
                                        </span>
                                   </div>

                              </div>

                              <div class="item-content-description ">
                                   <?= htmlspecialchars($banner['description']) ?>
                              </div>
                         </div>
                    </div>

                    <div class="play-movies ">
                         <div class="ring"></div>
                         <a href="<?= $banner['link'] ?>">
                              <i class='bx bxs-right-arrow'></i>
                         </a>
                         <div class="btn-watch">
                              <span>watch trailer</span>
                         </div>
                    </div>
               </div>
          <?php endforeach; ?>
     </div>
</div>

<!--END SPECIAL MOVIES -->

<!-- MESS -->

<div class="messages">
     <div class="section-wrapper" id="messages-section">
          <div class="section-header">nhận xét</div>
          <div class="message-list">
               <div class="message">
                    <div class="message-sender">N</div>
                    <div class="message-content">Hello there! How are you doing today?</div>
               </div>
               <div class="message">
                    <div class="message-sender">N1</div>
                    <div class="message-content">Hi, I wanted to discuss the project progress.</div>
               </div>
               <div class="message">
                    <div class="message-sender">N2</div>
                    <div class="message-content">Sure, let's schedule a meeting tomorrow.</div>
               </div>
          </div>
     </div>
</div>


<!-- END MESS -->

<!-- About -->
<div class="about">
     <div class="section-wrapper" id="about-section">
          <div class="section-header">giới thiệu</div>
          <div class="about-content">
               <div class="section-a">
                    <h2>Our Mission</h2>
                    <p>We are dedicated to providing high-quality products and services to our customers.</p>
               </div>
               <div class="section-a">
                    <h2>Our Team</h2>
                    <p>We have a team of experienced professionals who are passionate about what they do.</p>
               </div>
               <div class="section-a">
                    <h2>Company History</h2>
                    <p>Founded in 2023, our company has a rich history of success and growth in the industry.</p>
               </div>
          </div>
     </div>
</div>



<!-- END About -->


<!-- Account -->

<div class="account">
    <div class="section-wrapper" id="account-section">
        <div class="section-header">tài khoản</div>
        <div id="account-content">
            <?php if (isset($_SESSION['user'])): ?>
                <h2>Thông tin</h2>
                <p>Name: <?php echo htmlspecialchars($_SESSION['user']['name']); ?></p>
                <p>Email: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
            <?php else: ?>
                    <a href="index.php?page=login" class="btn btn-hover">
                         <span>Đăng nhập</span>
                    </a> 
            <?php endif; ?>

            <!-- <h2>Log Out</h2>
            <p>Click the button below to log out:</p>
            <form action="logout.php">
                <input type="submit" value="Log Out">
            </form> -->
        </div>
    </div>
</div>
