<div class="featured-project">
    <div class="featured-project__primary">
        <div class="featured-project__media-wrap">
            <img class="featured-project__image" src="<?php echo $project['image']['sizes']['large']; ?>" alt="<?php echo $project['title']; ?>">
        </div>
    </div>

    <a href="<?php echo $project['link']; ?>" class="featured-project__content">
        <?php if ($project['content']): ?>
            <?php echo $project['content']; ?>
        <?php endif; ?>
        <span  class="text-link featured-project__cta">View Project ⟶</span>
    </a>
</div>