<!DOCTYPE html>
<?php
    session_start();
    include('connect.php');
    $id = $_GET['edit'];
    if(isset($_POST['edit_product'])){
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productSale = $_POST['productSale'];
        $productSeller = $_POST['productSeller'];
        $productQuantity = $_POST['productQuantity'];
        $productCategory = $_POST['productCategory'];
        $productDescription = $_POST['productDescription'];
        $productImage = $productImageTmp = $productImageFolder = "";
        if(isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
            $productImage = $_FILES['productImage']['name'];
            $productImageTmp = $_FILES['productImage']['tmp_name'];
            $productImageFolder = 'uploade_image/'.$productImage;
        }
        if(empty($productName) || empty($productPrice) || empty($productQuantity) || empty($productSale) || empty($productSeller) ||empty($productDescription)){
            $message[] = 'Please fill out all';
        }
        else{
            $edit = "UPDATE products SET name='$productName', description='$productDescription', price='$productPrice', sale='$productSale', seller='$productSeller', quantity='$productQuantity', category='$productCategory', image='$productImage' WHERE ID = $id";
            $upload = mysqli_query($conn, $edit);
            if($upload){
                move_uploaded_file($productImageTmp, $productImageFolder);
                header('location:homepage.php');
            }
            else{
                $message[] = 'Could not edit the product';
            }
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <?php
                $select = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
                while($row = mysqli_fetch_assoc($select)){
            ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h1>Edit product</h1>
                
                <label for="productName">
                    name
                    <input type="text" id="productName" value="<?php echo $row['name']; ?>" name="productName" placeholder="Enter product name" class="box">
                </label>
                <label for="productPrice">
                    price
                    <input type="number" id="productPrice" value="<?php echo $row['price']; ?>" name="productPrice" placeholder="Enter product price" class="box">
                </label>
                <label for="productSale">
                    sale
                    <input type="number" id="productSale" value="<?php echo $row['sale']; ?>" name="productSale" placeholder="Enter product sale" class="box">
                </label>
                <label for="productSeller">
                    seller
                    <input type="text" id="productSeller" value="<?php echo $row['seller']; ?>" name="productSeller" placeholder="Enter product seller" class="box">
                </label>
                <label for="productQuantity">
                    quantity
                    <input type="number" id="productQuantity" value="<?php echo $row['quantity']; ?>" name="productQuantity" placeholder="Enter product quantity" class="box">
                </label>
                <label for="productCategory">
                    category
                    <input type="text" id="productCategory" value="<?php echo $row['category']; ?>" name="productCategory" placeholder="Enter product category" class="box">
                </label>
                <textarea placeholder="Enter product description" name="productDescription" class="box"><?php echo $row['description']; ?></textarea>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="productImage" class="box" style="border: none; padding: 0;">
                <input type="submit" name="edit_product" value="Edit Product" class="button">
                <a href="homePage.php" class="button">Go Back</a>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>