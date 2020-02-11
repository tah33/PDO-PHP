<?php
include 'header.php';
include 'createModal.php';
include 'config.php';

    $obj = new oopcrud;

?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD For CookBook</title>
</head>
<body>
	<a href="#" data-target="#addProduct" data-toggle="modal" class="btn btn-sm btn-primary btn-flat" data->Add Product</a>
<table class="table table-hovered">
	<thead>
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Amount</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($obj->show("products") as $key => $product) {
	?>
	<tr>
		<td><?php echo $key+1?></td>
		<td><?php echo $product['name']?></td>
		<td><?php echo $product['amount']?></td>
		<td><?php echo $product['price']?></td>
		<td><a href="#" data-target="#viewModal" data-id="<?php echo $product['id']?>" data-toggle="modal" class="btn btn-flat btn-sm btn-primary view-row">View</a><a href="#" data-target="#editModal" data-toggle="modal" class="btn btn-flat btn-sm btn-warning edit-row" data-id="<?php echo $product['id']?>">Edit</a><a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-flat btn-sm btn-danger">Delete</a></td>
	</tr>
<?php
include 'viewModal.php';
include 'editModal.php';

 }?>

	</tbody>
</table>
</body>
</html>

<script type="text/javascript">
	 jQuery(document).ready(function ($) {
	$(document).on('click','.view-row',function() {
		var id = $(this).data('id');
		$.ajax({
			url : "view.php",
			method:"POST",
			data:{id:id},
			success:function(result){

				let res = JSON.parse(result);

				$('#name').text(res.name);
                $('#amount').text(res.amount);
                $('#price').text(res.price);
			}
		});
	});
	$(document).on('click','.edit-row',function(){
		var id = $(this).data('id');
		$.ajax({
			url : 'view.php',
			method : 'POST',
			data : {id : id},
			success:function(result){
				var res = JSON.parse(result);
				$('#id').val(res.id);
				$('#_name').val(res.name);
				$('#_amount').val(res.amount);
				$('#_price').val(res.price);
			}
		});
	});
});
</script>