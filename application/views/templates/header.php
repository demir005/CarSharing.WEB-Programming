<html>
	<head>
	 	<title>Car Sharing</title>
	 	<link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css"/>	
	 	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
	</head>
	
<body>

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Car Sharing</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <?php if($this->session->userdata('logged_in')):?>
        <li class="active"><a href="<?php echo base_url()?>">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url();?>posts/create">Postavi Oglas</a></li>
         <li><a href="<?php echo base_url();?>categories/create">Postavi Kategoriju</a></li>
        <li><a href="<?php echo base_url();?>categories">Sve voznje</a></li>
 		<li><a href="<?php echo base_url();?>about">O nama</a></li>
 		<li><a href="<?php echo base_url();?>users/logout">Log out</a></li>
 		<?php endif;?>
 		
 		
 		<?php if(!$this->session->userdata('logged_in')):?>
	 		<li><a href="<?php echo base_url();?>users/register">Registracija</a></li>
	 		<li><a href="<?php echo base_url();?>users/login">Login</a></li>
 		<?php endif ;?>
 		
 		
 	 	
        <li class="dropdown">
      </form>
      <ul class="nav navbar-nav navbar-right">
    </div><!-- /.navbar-collapse -->
   
  </div><!-- /.container-fluid -->
</nav>

<div class="container">

<?php  if($this->session->flashdata('user_registred')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registred').'</p>'?>
<?php endif;?>

<?php  if($this->session->flashdata('post_created')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'?>
<?php endif;?>

<?php  if($this->session->flashdata('post_updated')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'?>
<?php endif;?>

<?php  if($this->session->flashdata('category_creted')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'?>
<?php endif;?> 

<?php  if($this->session->flashdata('post_deleted')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'?>
<?php endif;?> 

<?php  if($this->session->flashdata('login_failed')):?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'?>
<?php endif;?> 

<?php  if($this->session->flashdata('user_loggedin')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'?>
<?php endif;?> 

<?php  if($this->session->flashdata('user_loggedout')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'?>
<?php endif;?> 
