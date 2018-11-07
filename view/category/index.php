


<div class="container-fluid bg-3 text-center">
  <h2>List of categories</h2>
  <div class="row">
    <div class="col-sm-3">
			<?php
			foreach($data as $category) {
				echo "<p>";
				echo "<a href='?r=category/view&id=".$category->idcategory."'>".$category->name."</a>";
				echo "</p>";
			}
			?>
    </div>
	</div>
</div>
