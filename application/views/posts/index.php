<h2><?= $title?></h2>
<?php foreach($posts as $post) :?>
<h3><?php echo  $post['mjesto_polaska']; ?></h3>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
<br>
<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['mjesto_polaska']);?>">Read More</a></p>
<?php endforeach;?> 