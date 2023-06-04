<?php
    $admin = 0;
    if(isset($_COOKIE["auth"])){
        if($_COOKIE["auth"]["username"] == "admin" || $_COOKIE["auth"]["username"] == "Admin"){
            $admin = 1;
            

        }else{
            echo "normal kullanıcılar admin sayfasına giremez.";
            header("Location: notfound.php");
        }
    }
    else{
        echo "normal kullanıcılar admin sayfasına giremez.";
        header("Location: notfound.php");
    }

?>



<?php if($admin==1): ?>
    <?php require "./views/_headers.php"; ?>
    
    <?php require "./views/_navbar.php"; ?>
    
    <?php require "./views/_listusers.php"; ?>
    
<?php endif; ?>