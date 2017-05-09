<h2><?php echo ['title']?></h2>
<small class="post-data">Posted on<?php echo ['created_at']; 
?></small><br>
<div class="post-body">
<?php echo post['body'];?>
</div>

<hr>
<?php echo form_open('/posts/delete/'.$post['id']);?>
<a class="btn brn-default " href="posts/edit/<?php echo $post['id'];?>">Edit</a>
<input type="submit" value="Delete" class="btn btn danger">	
</form>
