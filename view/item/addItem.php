<?php if(isset($_SESSION["user"])){ ?>

<div class = "container">
<div class ="login-form col-md-4 offset md-4">
<h2>Add an item</h2>
<form method="post" action="?r=item/confirm">
<div class = "form-group">
	<label name="brand">Brand :</label>
	<input type="text" name="brand"  class= "form-control"/>
</div>
<div class = "form-group">
	<label name="model">Model :</label>
	<input type="text" name="model"  class= "form-control"/>
</div>
<div class = "form-group">
	<label name="category">Category :</label>
	<select name="category"  class= "form-control">
</div>
<div class = "form-group">
	<?php foreach(Category::findAll() as $category){
		echo "<option value=".$category->idcategory.">".$category->name."</option>";
	} ?>
</select>
</div>
<div class = "form-group">
	<label name="state">Condition :</label>
	<select name="state"  class= "form-control">
		<option value="new">"New"</option>
		<option value="good">"Good"</option>
		<option value="used">"Used"</option>
		<option value="bad">"Bad"</option>
		<option value="shitty">"Shitty"</option>
	</select>
</div>
<div class = "form-group">
	<label name="description">Description :</label>
	<textarea name="description"  class= "form-control"></textarea>
</div>
<div class = "form-group">
	<label name="price">Price :</label>
	€<input type="number" name="price"  class= "form-control"/>
</div>
	<button type="submit" name ="action" value="Add" class = "btn btn-primary btn-block"> Add </button>
</form>
</div>
</div>
<?php
} else {
	echo "<p>You must be logged in to add an item.</p>";
} ?>
