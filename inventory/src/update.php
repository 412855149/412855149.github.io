<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include 'connect.php';

    if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $remarks = $_POST['product_remarks'];
    $code = $_POST['product_code'];
    $quantity = $_POST['product_quantity'];

    $imgName = '';
    if ($_FILES['product_image']['name']) {
        $imgName = basename($_FILES['product_image']['name']);
        $target = "image/" . $imgName;
        move_uploaded_file($_FILES['product_image']['tmp_name'], $target);
        $sql = "UPDATE items SET product_remarks='$remarks', product_code='$code', product_quantity='$quantity', product_image='$imgName' WHERE id=$id";
    } else {
        $sql = "UPDATE items SET product_remarks='$remarks', product_code='$code', product_quantity='$quantity' WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
    }
?>