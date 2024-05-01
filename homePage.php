<?php
    session_start();
    include('connect.php');

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
    <div class="links">
        <a class="productBtn" href="add.php">Add new Product</a>
        <a class="productBtn" href="logOut.php">Log Out</a>
    </div>
    <?php
    $select = mysqli_query($conn, "SELECT * FROM products");
    ?>
    <div class="display">
        <table class="displayProduct">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>sale</th>
                    <th>seller</th>
                    <th>img</th>
                    <th>quantity</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>category</th>
                    <th colspan="2">controls</th>
                </tr>
            </thead>
            <?php
                while($row = mysqli_fetch_assoc($select)){
                
            ?>
            <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['sale'] ?></td>
                    <td><?php echo $row['seller'] ?></td>
                    <td><img src="uploade_image/<?php echo $row['image']; ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td colspan="2">
                    <a href="update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                    <a href="homepage.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>