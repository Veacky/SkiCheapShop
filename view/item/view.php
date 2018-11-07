<?php if(is_object($data)){?>
<h2><?php echo $data->brand; ?> - <?php echo $data->model; ?></h2>
<p>
  Category : <a href='<?php echo "?r=category/view&id=".$data->category->idcategory ?>'><?php echo $data->category->name; ?></a>
</p>
<p>
  Condition : <?php echo $data->state; ?>
</p>
<p>
  Price : <?php echo $data->price; ?>€
</p>
</p>
<p>
  Seller : <a href='<?php echo "?r=people/view&id=".$data->seller->idpeople ?>'><?php echo $data->seller->name; ?></a>
</p>
<p>
<?php echo $data->description; ?>
</p>

<div class="buttons">
<p>
  <?php
  if(isset($_SESSION["user"]) && $_SESSION["user"]->idpeople == $data->seller->idpeople){
    echo "<a href='?r=item/modify&id=".$data->iditem."'>Modify</a>";
    echo "</br>";
    echo "<a href='?r=item/delete&id=".$data->iditem."'>Delete</a>";
  }
  ?>
</p>
<?php } ?>
</div>
