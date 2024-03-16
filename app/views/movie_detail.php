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
                    <div>
                    <?php
          
          ?>
                         <h3>Đạo diễn: <?php echo htmlspecialchars($movie['director']); ?></h3>
                         <h3>Diễn viên: <?php echo htmlspecialchars($movie['actor']); ?></h3>
                         <h3>Thời lượng: <?php echo htmlspecialchars($movie['duration']); ?></h3>
                         <h3>Độ phân giải: <?php echo htmlspecialchars($movie['quality']); ?></h3> 
                    </div>
                    <?php echo htmlspecialchars($movie['description']); ?>

                    <h3><br></h3>
               </div>
          </div>

     </div>
</section>


<div class="movie-card-booking">
     <div class="form-group">
          <a href="index.php?page=chongio&movie=<?php echo urlencode($movie['name']); ?>" class="shared-button book-button">Đặt ngay</a>
     </div>
</div>


<!-- <section class="international-trailer <?php echo htmlspecialchars($sectionClass); ?>">
     <div class="international-vid">
          <iframe width="560" height="315" src=" <?php echo htmlspecialchars($movie['video_url']); ?>"
               title="YouTube video player" frameborder="0"
               allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
               allowfullscreen></iframe>
     </div>
</section> -->

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