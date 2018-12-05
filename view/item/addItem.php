<?php if(isset($_SESSION["user"])){ ?>
	<h2 class="page-title">Add an item</h2>

	<div class ="login-form col-12" >
		<form method="post" action="?r=item/confirm">  <!-- enctype="multipart/form-data"> -->
			<div class="row">
			<div class = "form-group col-md-6">
				<label name="brand">Brand</label>
				<input type="text" name="brand"  class= "form-control"/>
			</div>
			<div class = "form-group col-md-6">
				<label name="model">Model</label>
				<input type="text" name="model"  class= "form-control"/>
			</div>
			</div>
			<div class="row">
			<div class = "form-group col-md-6">
				<label name="category">Category</label>
				<select name="category"  class= "form-control">
						<?php foreach(Category::findAll() as $category){
							echo "<option value=".$category->idcategory.">".$category->name."</option>";
						} ?>
					</select>
			</div>
			<div class = "form-group col-md-6">
				<label name="state">Condition :</label>
				<select name="state"  class= "form-control">
					<option value="new">New</option>
					<option value="good">Good</option>
					<option value="used">Used</option>
					<option value="bad">Bad</option>
					<option value="shitty">Shitty</option>
				</select>
			</div>
			</div>
			<div class="row">
			<div class = "form-group col-12">
				<label name="description">Description</label>
				<textarea name="description" class="form-control"></textarea>
			</div>
			</div>
			<div class="row">
			<div class="form-group col-3">
				<label name="price">Price (€)</label>
				<input type="number" name="price" class="form-control"/>
			</div>
			</div>
			<!-- <div class="form-group">
				<input type="file" name="image" class="form-control"/>
			</div> -->
			<div class="row">
			<button type="submit" name="action" value="Add" class="btn btn-primary btn-block col-3 col-centered"> Add </button>
			</div>
		</form>
	</div>

<?php
} else {
	echo "<p>You must be logged in to add an item.</p>";
} ?>
