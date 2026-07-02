<?php
    include("connect.php");

    $id = "";
    $product_code = "";
    $product_remarks = "";
    $product_quantity = "";
    $product_image = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET["id"])){
            header("location: index.php");
        }
    $id = $_GET['id'];

    $sql = "SELECT * FROM items WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        if(!$row){
            header("location: index.php");
            exit();
        }

    $product_code = $row["product_code"] ?? '';
    $product_remarks = $row["product_remarks"] ?? '';
    $product_quantity = $row["product_quantity"] ?? '';
    $product_image = $row["product_image"] ?? '';

    }else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    $id = $_POST["id"];
    $product_code = $_POST["code"];
    $product_remarks = $_POST["remarks"];
    $product_quantity = $_POST["quantity"];

    $sql = "SELECT product_image FROM items WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $product_image = $row['product_image'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $imageName = $_FILES['image']['name'];
            $imageTmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($imageTmp, 'image/' . $imageName);
            $product_image = $imageName;
        }

    $sql = "UPDATE items 
            SET product_code = '$product_code', 
                product_remarks = '$product_remarks', 
                product_quantity = '$product_quantity', 
                product_image = '$product_image' 
            WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: index.php");
        exit();
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>