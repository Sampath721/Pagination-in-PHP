<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', 'Sam133@331');
    $inc=3;
    $pagenum = isset($_GET['page']);
    if($pagenum){
        $pagenum = $_GET['page'];

    }
    if (!$conn) {
        echo 'failed';
    } else {
        if ($pagenum == "" || $pagenum=="1") {
            $pagestart = 0;

        } else {
            $pagestart = ($pagenum-1) * 3;
        
        }
        $conn->select_db('users');
        $sql2 = "SELECT name FROM pagination";
        $result1 = mysqli_query($conn, $sql2);
        $sql = "SELECT * FROM pagination LIMIT $pagestart,$inc";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_num_rows($result1);
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['name'] . "   " . $row['college'] . "<br>";
        }


        $totaldata = mysqli_num_rows(($result));
        $value = ceil($result1 / 3);
    }

    ?>


    <?php for($i = 1; $i <= $value; $i++) { ?>
        <a href="./index.php?page=<?php echo $i ?>"> <?= $i?></a>
    <?php }; ?>
</body>

</html>