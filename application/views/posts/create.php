<h2><?= $title;?></h2>
<?php echo form_open_multipart('posts/create');?>
<?php echo validation_errors();?>

<!DOCTYPE h2 PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">	
<html>
<head>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 

 <div class="form-group">
    <label for="Mjesto Polaska">Mjesto Polaska</label>
    <input type="mjesto_polaska" class="form-control" id="mjesto_polaska" placeholder="Mjesto Polaska">
  </div>
  
  <div class="form-group">
    <label for="Mjesto Odredista">Mjesto Odredista</label>
    <input type="mjesto_odredista" class="form-control" id="mjesto_odredista" placeholder="Mjesto Odredista">
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
    <label for="Cijena">Cijena</label>
    <input type="cijena" class="form-control" id="cijena" placeholder="Cijena">
  </div>
	
	
	<div class="bootstrap-iso">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">
     <div class="form-group ">
      <label class="control-label " for="date">
       Datum Polaska
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar-minus-o">
        </i>
       </div>
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
      </div>
     </div>
     <div class="form-group">
      <div>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>


	<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">
     <div class="form-group ">
      <label class="control-label " for="date">
       Datum Povratka
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar-minus-o">
        </i>
       </div>
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
      </div>
     </div>
     <div class="form-group">
      <div>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

<div class="form-group">
<label for="Mjesto Odredista">Kategorija</label>
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



  <div>
      <button type="submit" class="btn btn-default">Dodaj</button>
  </div>
	<?php echo form_close();?>




</head>

</html>	
	
 