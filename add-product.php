<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="handle-add-product.php" method="POST">
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="description">Description: </label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label for="price">Price: </label>
            <input type="number" name="price">
        </div>
        <input type="submit" name="submit" value="send"/>
    </form>

    <?php if(isset($_SESSION['errors'])) { ?>
        <?php foreach($_SESSION['errors'] as $errors) { ?>
            <?php foreach($errors as $message) { ?>
                <div><?=$message?></div>
            <?php } ?>
        <?php } unset($_SESSION['errors']) ?>
    <?php } else if(isset($_SESSION['success'])) { ?>
        <?php foreach($_SESSION['success'] as $index => $item) { ?>
            <div><?=$index?>:<?=$item?></div>
        <?php } unset($_SESSION['success']) ?>
    <?php } ?>
</body>
</html>