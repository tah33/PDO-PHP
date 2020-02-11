<?php

if (isset($_GET['id'])) {
include 'config.php';

    $obj = new oopcrud;
    $obj->delete($_GET['id'],'products');
}
header("location:index.php");
?>