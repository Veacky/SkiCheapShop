<div class="items">
	<h2><?php if(isset($data["title"])) { echo $data["title"]; } else { echo "All items";} ?></h2>
	<table class="table">
	  <thead>
	    <tr class="col-names">
	      <th scope="col">Brand - Model</th>
	      <th scope="col">Category</th>
	      <th scope="col">Condition</th>
				<th scope="col">Price</th>
	    </tr>
	  </thead>
		<tbody>
		<?php
		foreach($data as $item){
			if(is_object($item)){
				echo "<tr class='table-row item'>";
				echo "<td class='table-cel'><a href='?r=item/view&id=".$item->iditem."'>".$item->brand." - ".$item->model."</a></td>";
				echo "<td class='table-cel'><a href='?r=category/view&id=".$item->category->idcategory."'>".$item->category->name."</a></td>";
				echo "<td class='table-cel'>".$item->state."</td>";
				echo "<td class='table-cel'>€".$item->price."</td>";
				echo "</tr>";
			}
		}
		?>
		</tbody>
	</table>
</div>
