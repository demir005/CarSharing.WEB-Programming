<h2><?= $title;?></h2>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  
  </script>


<?php echo form_open_multipart('posts/create/');?>
<?php echo validation_errors();?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">

				<div class="form-group">
					<label>Mjesto Polaska</label>
					<input type="text" class="form-control" name="mjestoPolaska" placeholder="Mjesto Polaska">
				</div>
				
				
				<div class="form-group">
					<label>Mjesto Odredista</label>
					<input type="text" class="form-control" name="mjestoOdredista" placeholder="Mjesto Odredista">
				</div>
				
				<div class="form-group">
					<label>Datum Polaska</label>
					 <input type="date" id="datepicker" min=<?php echo date('Y-m-d');?> class="form-control" name="datumPolaska" placeholder ="Datum Polaska" >
				</div>
				
				<div class="form-group">
					<label>Datum Povratka</label>
					 <input type="date" id="datepicker1" min=<?php echo date('Y-m-d');?> class="form-control" name="datumPovratka" placeholder="Datum Povratka">
				</div>
				
				
			
				<div class="form-group">
				<label>Cijena</label>
				<input type="text" class="form-control" name="cijena" placeholder="Cijena">
				</div>
				
				<div class="form-group">
			  <label for="select">Broj slobodnih mjesta</label>
				  <select class="form-control" id="select" name="brojMjesta">
				    <option>1</option>
				    <option>2</option>
				    <option>3</option>
				    <option>4</option>
				  </select>
				</div>
				
				
			<div class="form-group">
			<label for="kategorije">Kategorija</label>
			 <?php 
			 echo '<select class="form-control" id="kategorije" name="category_id">';
			 foreach($categories as $category) :
			 	echo '<option value="' . $category['id'] . '">' . $category["name"] . '</option>';
			 endforeach;
			 echo '</select>';
			 ?>
			</div>
			
			<script>
			$(function(){
				  $('#kategorije').on('change', function(){
				    var selected = $(this).find('option:selected').text();
				    if (selected == 'Ponuda') {
				      $('input[name=userfile]').parent().show();
				    } else {
				      $('input[name=userfile]').parent().hide();
				    }
				  });
				});
			</script>
			
			<div class="form-group">
			 <label>Postavi sliku:</label>
			 <input type="file" name="userfile" size="20">
			 </div>
			 
			 <div class="form-group">
			  <label>Opis:</label>
			  <textarea class="form-control" rows="5" id="comment" name="opis"></textarea>
			</div>
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
				
			</div>
	</div>
	


 

	
 