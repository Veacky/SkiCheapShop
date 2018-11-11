
<h2><?php if(isset($data["title"])) { echo $data["title"]; } else { echo "All items";} ?></h2>
<table class="table">
	<div class="aboutitem">
  <thead>
    <tr class="bg-danger">
      <th scope="col">Brand and model</th>
      <th scope="col">Category</th>
      <th scope="col">Condition</th>
			<th scope="col">Price</th>
    </tr>
  </thead>
</div>
<tbody>

<?php
foreach($data as $item){
	if(is_object($item)){
		echo "<tr>";
		echo "<td><a href='?r=item/view&id=".$item->iditem."'>".$item->brand." - ".$item->model."</a></td>";
		echo "<td><a href='?r=category/view&id=".$item->category->idcategory."'>".$item->category->name."</a></td>";
		echo "<td>".$item->state."</td>";
		echo "<td>€".$item->price."</td>";
		echo "</tr>";
	}
}
?>
</tbody>
</table>
