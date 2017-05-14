<?php foreach($posts as $post) :?>
<h3><?php echo  $post['mjestoOdredista']; ?></h3>
	<div class="row">
	<div class="col-md-3">
	<img  class="post-thumb thumbnail" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?>">
</div>
<div class="col-md-9">
	<small class="post-date">Posted on:<?php echo $post['createdAt'];?>in: <strong><?php echo $post['name'];?></small><br></strong>
	</br>
	<p><a class="btn btn-default"    href="<?php echo site_url('/posts/' .$post['mjestoOdredista']); ?>">Read More</a></p>
	</div>
	</div>




<?php endforeach;?>