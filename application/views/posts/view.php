<h2>Info o voznji:</h2>

<div class="post-body">

</div>

<hr>
<?php echo form_open('/posts/delete/'.$post['id']);?>
 
<a class="btn btn-default " href="posts/edit/">Edit</a>
<input type="submit" value="Delete" class="btn btn-danger">	
</form>
<hr>
<h3>Comments</h3>
	<?php if($comments):?>
	<?php foreach ($comments as $comment):?>
	<div class="well">
	 	<h5><?php  echo $comment['body']; ?>[by <strong><?php echo $comment['name']?></strong>]</h5>
	 </div>
			<?php endforeach;?>
			<?php  else : ?>
	<p>No Comments to display</p>
	
	<?php endif;?>
	
	

<hr>
<h3>Add Comment</h3>
<?php echo validation_errors();?>

<?php echo form_open('comments/create/'.$post['id']); ?>

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">

<div class="form-group">
<label>Email</label>
<input type="text" name="name" class="form-control">

<div class="form-group">
<label>Body</label>
<textarea name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['mjestoOdredista'];?>">
<button class="btn btn-primary" type="submit">Submit</button>

</form>
