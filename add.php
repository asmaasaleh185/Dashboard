<?php
    session_start();
    include('connect.php');
    if(isset($_POST['add_product'])){
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productSale = $_POST['productSale'];
        $productSeller = $_POST['productSeller'];
        $productQuantity = $_POST['productQuantity'];
        $productCategory = $_POST['productCategory'];
        $productDescription = $_POST['productDescription'];
        if(isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
            $productImage = $_FILES['productImage']['name'];
            $productImageTmp = $_FILES['productImage']['tmp_name'];
            $productImageFolder = 'uploade_image/'.$productImage;
        }
        if(empty($productName) || empty($productPrice) || empty($productQuantity) || empty($productSale) || empty($productSeller) ||empty($productDescription)){
            $message[] = 'Please fill out all';
        }
        else{
            $insert = "INSERT INTO products(name, description, price, sale, seller, quantity, category, image) VALUES ('$productName', '$productDescription', '$productPrice', '$productSale', '$productSeller', '$productQuantity', '$productCategory', '$productImage')";
            $upload = mysqli_query($conn, $insert);
            if($upload){
                move_uploaded_file($productImageTmp, $productImageFolder);
                $message[] = 'New product added successfully';
                header('location:homepage.php');
            }
            else{
                $message[] = 'Could not add the product';
            }
        }
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM products WHERE id = $id");
        header('location:homepage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<span class="message">' . $message . '</span>';
            }
        }
    ?>
    <div class="container">
        <div class="productForm">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h1>Add new product</h1>
                
                <label for="productName">
                    name
                    <input type="text" id="productName" name="productName" placeholder="Enter product name" class="box">
                </label>
                <label for="productPrice">
                    price
                    <input type="number" id="productPrice" name="productPrice" placeholder="Enter product price" class="box">
                </label>
                <label for="productSale">
                    sale
                    <input type="number" id="productSale" name="productSale" placeholder="Enter product sale" class="box">
                </label>
                <label for="productSeller">
                    seller
                    <input type="text" id="productSeller" name="productSeller" placeholder="Enter product seller" class="box">
                </label>
                <label for="productQuantity">
                    quantity
                    <input type="number" id="productQuantity" name="productQuantity" placeholder="Enter product quantity" class="box">
                </label>
                <label for="productCategory">
                    category
                    <input type="text" id="productCategory" name="productCategory" placeholder="Enter product category" class="box">
                </label>
                <textarea placeholder="Enter product description" name="productDescription" class="box"></textarea>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="productImage" class="box" style="border: none; padding: 0;">
                <input type="submit" name="add_product" value="Add Product" class="button">
                <a href="homePage.php" class="button">Go Back</a>
            </form>
        </div>
    </div>

</body>
</html>