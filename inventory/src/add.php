<?php

include('connect.php');

if (isset($_POST['add'])) {

    $image = $_FILES['product_image']['name'];
    $image_tmp = $_FILES['product_image']['tmp_name'];

    if (!empty($image_tmp)) {
        move_uploaded_file($image_tmp, "image/" . $image);
    }

    $product_code = mysqli_real_escape_string($conn, $_POST['product_code']);
    $product_remarks = mysqli_real_escape_string($conn, $_POST['product_remarks']);
    $product_quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);

    $query = "INSERT INTO items (product_image, product_code, product_remarks, product_quantity)
              VALUES    ('$image', '$product_code', '$product_remarks', '$product_quantity')";


    if (mysqli_query($conn, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Form not submitted properly.";
}
?>
