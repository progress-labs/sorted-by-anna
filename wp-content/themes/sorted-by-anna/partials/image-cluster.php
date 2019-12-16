<?php 
/**
 * Image Cluster
 */


?>

<div class="image-cluster">
  <?php foreach (get_field('image_cluster') as $image) : 
    $src = $image['cluster_image']['sizes']['gallery_preview'] 
  ?>
  
    <div class="image-cluster__item">
      <div class="img-wrap">
        <img src="<?php echo $src; ?>">  
      </div>
    </div>

  <?php endforeach; ?>
</div>