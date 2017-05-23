<h2><?= $title;?></h2>
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



<?php echo form_open_multipart('posts/create');?>
<?php echo validation_errors();?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">

				<div class="form-group">
					<label>Mjesto Polaska</label>
					<input type="text" class="form-control" name="mjesto_polaska" placeholder="Mjesto Polaska">
				</div>
				
				<div class="form-group">
					<label>Mjesto Odredista</label>
					<input type="text" class="form-control" name="mjesto_odredista" placeholder="Mjesto Odredista">
				</div>
				
					
	

				<div class="form-group">
				<label>Cijena</label>
				<input type="text" class="form-control" name="cijena" placeholder="Cijena">
				</div>
				
				<div class="form-group">
			  <label for="sel1">Broj slobodnih mjesta:</label>
				  <select class="form-control" id="sel1">
				    <option>1</option>
				    <option>2</option>
				    <option>3</option>
				    <option>4</option>
				  </select>
				</div>
				
				
			<div class="form-group">
			<label for="Kategorije">Kategorija</label>
			<div>
			<select name="category_id" class="form_control">
			<?php foreach($categories as $category):?>
			<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
			<?php endforeach;?>
			</select>
			</div>
			</div>
			
			<div class="form-group">
			 <label>Postavi sliku:</label>
			 <p><b>samo oni koji nude prevoz nek postave sliku svojeg vozila</b></p>
			 <input type="file" name="userfile" size="20">
			 </div>
			 
			 <div class="form-group">
			  <label for="comment">Opis:</label>
			  <textarea class="form-control" rows="5" id="comment"></textarea>
			</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				<?php form_close();?>
			</div>
	</div>
	


 

	
 