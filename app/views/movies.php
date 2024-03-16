<div class="movies-container">
    <?php if (!empty($allMovies)): ?>
        <?php foreach ($allMovies as $movie): ?>
            <div class="movie">
                <h3><?php echo htmlspecialchars($movie['name']); ?></h3>
                <p><?php echo htmlspecialchars($movie['description']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không có phim.</p>
    <?php endif; ?>
</div>