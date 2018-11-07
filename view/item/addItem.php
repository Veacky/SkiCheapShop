<?php if(isset($_SESSION["user"])){ ?>
<h2>Add an item</h2>

<form>
  <div class="form-group">
    <label name="brand">Brand :</label>
    <input type="text" class="form-control" name="brand"/>
  </div>
  <div class="form-group">
    <label name="model">Model :</label>
		<input type="text" class="form-control" name="model"/>
  </div>
    <select class="form-control" name="category">
			<?php foreach(Category::findAll() as $category){
				echo "<option value=".$category->idcategory.">".$category->name."</option>";
			} ?>
    </select>
  </div>
  <div class="form-group">
    <label name="state">Condition :</label>
    <select class="form-control">
			<option value="new">"New"</option>
			<option value="good">"Good"</option>
			<option value="used">"Used"</option>
			<option value="bad">"Bad"</option>
			<option value="shitty">"Shitty"</option>
    </select>
  </div>
  <div class="form-group">
  <label name="description">Description :</label>
    <textarea name="description" class="form-control" rows="3"></textarea>
  </div>
	<div class="form-group">
  <label name="price">Price :</label> €
    <input type="number" name="price"class="form-control"/>
  </div>
	<button type="submit" name ="action" value="Add" class = "btn btn-primary btn-block"> Add </button>
</form>
<?php
} else {
	echo "<p>You must be logged in to add an item.</p>";
} ?>
