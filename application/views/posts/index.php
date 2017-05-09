<?php foreach($posts as $post) :?>
	<h3><?php echo  $post['mjesto_polaska']; ?></h3>
	<small class="post-date">Posted on:<?php echo $post['created_at'];?></small><br>
	</br>
<p><a class="btn btn-default"    href="<?php echo site_url('/posts'.$post['mjesto_polaska']);?>">Read More</a></p>
<p><a class="btn btn-default"    href="<?php echo site_url('/posts'.$post['id']);?>">Delete</a></p>
<?php endforeach;?>