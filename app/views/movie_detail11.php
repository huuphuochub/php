<!-- Header style trang con -->

<style>
     .header {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          background-color: rgb(21, 21, 21);
          transition: opacity 0.5s, transform 0.5s;
          z-index: 1000;
     }

     .hidden {
          display: none;
     }
</style>
<script>
     const header = document.querySelector('.header');
     let lastScrollTop = 0;

     window.addEventListener('scroll', function () {
          const scrollTop = window.scrollY;
          if (scrollTop > lastScrollTop) {
               // Cuộn xuống, ẩn header
               header.style.opacity = '0';
               header.style.transform = 'translateY(-100%)';
          } else {
               // Cuộn lên, hiện header
               header.style.opacity = '1';
               header.style.transform = 'translateY(0)';
          }
          lastScrollTop = scrollTop;
     });

</script>

<!-- end -->

<section class="movie-banner">
     <div class="hero-wrapper">
          <div class="movie-banner-item">
               <img src="../public/img/Images/<?php echo htmlspecialchars($movie['banner_image']); ?>"
                    alt="<?php echo htmlspecialchars($movie['name']); ?>">
          </div>

          <div class="movie-card">
               <img src="../public/img/Images/<?php echo htmlspecialchars($movie['image']); ?>"
                    alt="<?php echo htmlspecialchars($movie['name']); ?>">

               <div class="movie-card-content">
                    <h2>
                         <?php echo htmlspecialchars($movie['name']); ?>
                    </h2>


                    <!-- Các thể loại sản phẩm -->
                    <ul class="movie-card-btns">
                         <?php foreach ($categories as $categories): ?>
                              <li class="movie-card-btn">
                                   <?php echo htmlspecialchars($categories['name']); ?>
                              </li>
                         <?php endforeach; ?>
                    </ul>
                    <?php echo htmlspecialchars($movie['description']); ?>
                    <h3><br></h3>
                    <?php foreach ($castImages as $image) {
                    echo '<div class="movie-cast-item">';
                         echo '<img src="../public/img/Movie-Data/Pirates-of-the-Caribbean-Salazar\'s-Revenge/' . htmlspecialchars($image['image']) . '"
                              alt="' . htmlspecialchars($image['description']) . '">';
                         echo '</div>';
                    } ?>
               </div>
          </div>

     </div>
</section>


<div class="movie-card-booking">
     <form>
          <h3>Đặt Vé</h3>
         

          <div class="form-group">
               <button type="submit" class="shared-button book-button"><a href="index.php?page=chongio&movie=<?php echo urlencode($movie['name']); ?>" class="shared-button book-button">Đặt ngay</a>
</button>
          </div>
          <div class="form-group">
               <button type="button" id="favorite-button" class="shared-button favorite-button">Yêu thích</button>
          </div>
     </form>
     <p class="movie-card-description-booking">
          Một lưu ý quan trọng khi đặt vé xem phim là hãy kiểm tra kỹ thông tin về suất chiếu, thời gian và rạp
          chiếu trước khi xác nhận đặt vé. Điều này giúp bạn tránh những sai sót không mong muốn và đảm bảo bạn có
          trải nghiệm xem phim thoải mái và thú vị.
     </p>
</div>




<?php

$trailerSections = [
     'International Trailer' => '',
     'Official Trailer' => 'margin',
     'Teaser Trailer' => 'margin'
];

foreach ($videos as $youtube_links) {
     if (array_key_exists($youtube_links['trailer_type'], $trailerSections)) {
          $sectionClass = $trailerSections[$youtube_links['trailer_type']];
          ?>

          <section class="international-trailer <?php echo htmlspecialchars($sectionClass); ?>">
               <div class="trailer-title">
                    <h3>
                         <?php echo htmlspecialchars(strtolower($youtube_links['trailer_type'])); ?>
                    </h3>
               </div>
               <div class="international-vid">
                    <iframe width="560" height="315" src="<?php echo htmlspecialchars($youtube_links['youtube_url']); ?>"
                         title="YouTube video player" frameborder="0"
                         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                         allowfullscreen></iframe>
               </div>
          </section>

          <?php
     }
}
?>