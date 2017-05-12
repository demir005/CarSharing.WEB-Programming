<?php foreach($posts as $post) :?>
<h3><?php echo  $post['mjestoOdredista']; ?></h3>

<small class="post-date">Posted on:<?php echo $post['createdAt'];?>in: <strong><?php echo $post['name'];?></small><br></strong>
</br>

<p><a class="btn btn-default"    href="<?php echo site_url('/posts/' .$post['mjestoOdredista']); ?>">Read More</a></p>



<?php endforeach;?>