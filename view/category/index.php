  <h2 class="page-title">List of categories</h2>
  <div class="row categories">
			<?php
			foreach($data as $category) {
        echo "<a href='?r=category/view&id=".$category->idcategory."'><div class='category'>";
        echo "<div class='image'><img src='images/categories/".$category->name.".jpg'></div>";
				echo "<h3>".ucfirst($category->name)."</h3>";
				echo "</div></a>";
			}
			?>
	</div>
