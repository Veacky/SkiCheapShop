<?php if(is_object($data)){?>
<div class="row">
  <div class="col-md-6 item-info">
    <h2 class="page-title"><?php echo $data->brand; ?> - <?php echo $data->model; ?></h2>
    <div class="row">
      <div class="col-6">Category : <a href='<?php echo "?r=category/view&id=".$data->category->idcategory ?>'><?php echo $data->category->name; ?></a></div>
      <div class="col-6">Seller : <a href='<?php echo "?r=people/view&id=".$data->seller->idpeople ?>'><?php echo $data->seller->name; ?></a></div>
    </div>
    <div class="row">
      <div class="col-6">Condition : <?php echo ucfirst($data->state); ?></div>
      <div class="col-6">  Price : <span class="price"><?php echo $data->price; ?>€</span></div>
    </div>
    </p>
    <div class="row">
      <div class="col-12"><p>
        <?php echo $data->description; ?>
      </p></div>
    </div>

    <div class="row">
      <?php
      if(isset($_SESSION["user"]) && $_SESSION["user"]->idpeople == $data->seller->idpeople){
        echo "<div class='col-6'><a class='btn btn-secondary' href='?r=item/modify&id=".$data->iditem."'>Modify</a></div>";
        echo "<div class='col-6'><a class='btn btn-secondary' title='Be sure, it is a no way back !' href='?r=item/delete&id=".$data->iditem."'>Delete</a></div>";
      }
      ?>
    </div>

  </div>
  <div class="col-md-6 item-image">
    <img src="https://via.placeholder.com/500"/>
  </div>
</div>
<?php } ?>
