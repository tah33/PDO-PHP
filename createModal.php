<?php 


if (isset($_POST['submit'])) {
include 'config.php';

    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    $obj = new oopcrud;
    $columns = $obj->getColumns("products");
    
    $values = array($name,$amount,$price );

    $obj->insert(array_slice(array_keys(array_unique($columns)),1),$values,"products");

    header("location:index.php");
}
?>
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quantity:</label>
            <input type="number" class="form-control" name="amount" id="quantity">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Price:</label>
            <input type="number" class="form-control" name="price">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value="Add Product" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>