<?php 

if (isset($_POST['update'])) {
    include 'config.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    
    $obj = new oopcrud;
    $columns = $obj->getColumns("products");
    
    $values = array($name,$amount,$price );

    $obj->update($id,array_slice(array_keys(array_unique($columns)),1),$values,"products");
    header("location:index.php");
}
?>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="editModal.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="hidden" class="form-control" name="id" id="id">
            <input type="text" class="form-control" name="name" id="_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quantity:</label>
            <input type="number" class="form-control" name="amount" id="_amount">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Price:</label>
            <input type="number" class="form-control" name="price" id="_price">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Close</button>
        <input type="submit" name="update" value="Update Product" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>