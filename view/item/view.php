<?php if(is_object($data)){?>
<h2 class="page-title"><?php echo $data->brand; ?> - <?php echo $data->model; ?></h2>
<div class="row">
  <div class="col-3">Category : <a href='<?php echo "?r=category/view&id=".$data->category->idcategory ?>'><?php echo $data->category->name; ?></a></div>
  <div class="col-3">Seller : <a href='<?php echo "?r=people/view&id=".$data->seller->idpeople ?>'><?php echo $data->seller->name; ?></a></div>
</div>
<div class="row">
  <div class="col-3">Condition : <?php echo $data->state; ?></div>
  <div class="col-3">  Price : <span class="price"><?php echo $data->price; ?>€</span></div>
</div>
</p>
<div class="row">
  <div class="col-12"><p>
    <?php echo $data->description; ?>
  </p></div>
</div>

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
