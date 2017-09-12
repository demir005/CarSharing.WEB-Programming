	<h2>Informacije:</h2>
     <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    
    
    <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
 </style>
 
    
<h5>Mjesto Polaska: </h5>
    <?php if($posts): ?>
    <div class="well">
      <h5><?php echo $posts['mjestoPolaska']?></h5>
     </div>
        <?php  else : ?>
 <?php endif;?>
 
 <h5>Mjesto Odredista: </h5>
    <?php if($posts): ?>
    <div class="well">
        <h5><?php  echo $posts['mjestoOdredista']; ?>
     </div>
            <?php  else : ?>
 <?php endif;?>
 
 <h5>Datum Polaska: </h5>
    <?php if($posts): ?>
    <div class="well">
        <h5><?php  echo $posts['datumPolaska']; ?>
     </div>
            <?php  else : ?>
 <?php endif;?>
 
  <h5>Datum Povratka: </h5>
    <?php if($posts): ?>
    <div class="well">
        <h5><?php  echo $posts['datumPovratka']; ?>
     </div>
            <?php  else : ?>
 <?php endif;?>
 
  <h5>Cijena: </h5>
    <?php if($posts): ?>
    <div class="well">
        <h5><?php  echo $posts['cijena']; ?>
     </div>
            <?php  else : ?>
 <?php endif;?>
 
  <h5>Broj Slobodnih Mjesta: </h5>
    <?php if($posts): ?>
    <div class="well">
        <h5><?php  echo $posts['brojMjesta']; ?>
     </div>
            <?php  else : ?>
 <?php endif;?>
 
   <h5>Opis: </h5>
    <?php if($posts): ?>
    <div class="well">
        <h5><?php  echo $posts['opis']; ?>
     </div>
            <?php  else : ?>
 <?php endif;?>
 
 

<div class="post-body">
    <hr>
    <?php if($this->session->userdata('user_id') == $posts['user_id']): ?>
	<hr>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $posts['mjestoOdredista']; ?>">Edit</a>
	<?php echo form_open('/posts/delete/'.$posts['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
	</form>
<?php endif; ?>

<hr>
<h3>Comments</h3>
    <?php if($comments): ?>
    <?php foreach ($comments as $comment):?>
    <div class="well">
        <h5><?php  echo $comment['body']; ?>[by  <strong><?php echo $comment['name']?></strong>]</h5>
     </div>
            <?php endforeach;?>
            <?php  else : ?>
    <p>No Comments to display</p>
 <?php endif;?>




<hr>
<h3>Add Comment</h3>
<?php echo validation_errors();?>
<?php echo form_open('comments/create/'.$posts['id']); ?>

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">

<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control">

<div class="form-group">
<label>Body</label>
<textarea name="body" class="form-control"></textarea>
</div>

<button class="btn btn-primary" type="submit">Submit</button>
<?php echo form_close(); ?>
</div>
</div>
</hr>
