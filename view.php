<?php
$data = '';
if (isset($_POST['id'])) {
    include 'config.php';

    $obj = new oopcrud;
    $data = $obj->profile($_POST['id'],'products');
    
    echo json_encode($data);
}
?>