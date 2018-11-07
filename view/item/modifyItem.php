<?php if(isset($_SESSION["user"]) && $_SESSION["user"]->idpeople == $data->seller->idpeople ){ ?>
<h2>Modify an item</h2>

<div class = "container">
<div class ="login-form col-md-4 offset md-4">
<form method="post" action="?r=item/confirm&id=<?php echo $_GET["id"] ?>">
<div class = "form-group">
	<label name="brand">Brand :</label>
	<input type="text" name="brand" value="<?php echo $data->brand ?>" class= "form-control"/>
</div>
<div class = "form-group">
	<label name="model">Model :</label>
	<input type="text" name="model" value="<?php echo $data->model ?>"class= "form-control"/>
</div>
<div class = "form-group">
	<label name="category">Category :</label>
	<select name="category" class= "form-control">
	<?php foreach(Category::findAll() as $category){
		echo "<option value='".$category->idcategory."'";
		if($data->category == $category->idcategory){
			echo "selected";
		}
		echo ">".$category->name."</option>";
	} ?>
</select>
</div>
<div class = "form-group">
	<label name="state">Condition :</label>
	<select name="state" class= "form-control">
		<?php
		$states = array("New","Good","Used","Bad","Shitty");
		foreach ($states as $key => $value) {
			echo "<option value='".$value."'";
			if($data->state == $value){
				echo "selected";
			}
			echo ">".$value."</option>";
		}
		?>
	</select>
</div>
<div class = "form-group">
	<label name="description">Description :</label>
	<textarea name="description" class= "form-control"><?php echo $data->description ?></textarea>
</div>
<div class = "form-group">
 <label name="price">Price :</label>
	€<input type="number" name="price" value="<?php echo $data->price ?>"/ class= "form-control">
</div>
<button type="submit" name ="action" value="Modify" class = "btn btn-primary btn-block"> Modify</button>
</form>
</div>
</div>

<?php
} else {
	echo "<p>You must be logged in to modify an item.</p>";
} ?>
