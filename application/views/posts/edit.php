<h2>Postavi Oglas</h2>
<?php echo form_open('posts/update');?>
<?php echo validation_errors();?>


	<input type="hidden" name="id" value="<?php echo $post['id'];?>
  <div class="form-group">
    <label for="Mjesto Polaska">Mjesto Polaska</label>
    <input type="mjesto_polaska" class="form-control" id="mjestopolaska" placeholder="Mjesto Polaska">
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
  <label for="comment">Opis:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>



  <div>
  	  <button type="Dodaj" class="btn btn-default">Dodaj</button>
  </div>

