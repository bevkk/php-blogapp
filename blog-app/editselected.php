<?php
    $admin = 0;
    if(isset($_COOKIE["auth"])){
        if($_COOKIE["auth"]["username"] == "admin" || $_COOKIE["auth"]["username"] == "Admin"){
            $admin = 1;
            

        }else{
            header("Location: notfound.php");
        }
    }
    else{
        header("Location: notfound.php");
    }

?>
<?php if($admin==1): ?>
<?php 

    $page = $_GET['page'];
    $filePath = "blogs/" . $page . ".php";

    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);
    } else {
        $content = "";
    }

?>
    <?php require "./views/_headers.php"; ?>
    <?php require "./views/_navbar.php"; ?>
    <?php require "./views/_editselected.php"; ?>
    
    
<?php endif; ?>