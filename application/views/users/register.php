<h2><?=$title;?></h2>
<?php echo  validation_errors();?>

<?php echo form_open('users/register');?>

<div class="form_group">
	<label>Name</label>
	<input type="text" class="form_control" name="name" placeholder="Name">
</div>

<div class="form_group">
	<label>Surname</label>
	<input type="text" class="form_control" name="surname" placeholder="Surname">
</div>

<div class="form_group">
	<label>Address</label>
	<input type="text" class="form_control" name="address" placeholder="Address">
</div>

<div class="form_group">
	<label>Email</label>
	<input type="email" class="form_control" name="email" placeholder="Email">
	
</div>

<div class="form_group">
	<label>Phone Number</label>
	<input type="text" class="form_control" name="phoneNumber" placeholder="Phone Number">
</div>

<div class="form_group">
	<label>Username</label>
	<input type="text" class="form_control" name="username" placeholder="Username">
</div>

<div class="form_group">
	<label>Password</label>
	<input type="password" class="form_control" name="password" placeholder="Password">
</div>

<div class="form_group">
	<label>Confirm Password</label>
	<input type="password" class="form_control" name="password2" placeholder="Confirm Password">
</div>

<button type="Submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>