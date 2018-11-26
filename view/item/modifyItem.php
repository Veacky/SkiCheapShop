<?php if(isset($_SESSION["user"]) && $_SESSION["user"]->idpeople == $data->seller->idpeople ){ ?>
<h2 class="page-title">Modify an item</h2>

<div class ="login-form col-12">
<form method="post" action="?r=item/confirm&id=<?php echo $_GET["id"] ?>">
<div class="row">
<div class = "form-group col-6">
	<label name="brand">Brand :</label>
	<input type="text" name="brand" value="<?php echo $data->brand ?>" class= "form-control"/>
</div>
<div class = "form-group col-6">
	<label name="model">Model :</label>
	<input type="text" name="model" value="<?php echo $data->model ?>"class= "form-control"/>
</div>
</div>
<div class="row">
<div class = "form-group col-6">
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
<div class = "form-group col-6">
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
</div>
<div class="row">
<div class = "form-group col-12">
	<label name="description">Description :</label>
	<textarea name="description" class= "form-control"><?php echo $data->description ?></textarea>
</div>
</div>
<div class="row">
<div class = "form-group col-3">
 <label name="price">Price :</label>
	€<input type="number" name="price" value="<?php echo $data->price ?>"/ class= "form-control">
</div>
</div>
<div class="row">
<button type="submit" name ="action" value="Modify" class = "btn btn-primary btn-block col-3 col-centered">Modify</button>
</div>
</form>
</div>

<?php
} else {
	echo "<p>You must be logged in to modify an item.</p>";
} ?>
