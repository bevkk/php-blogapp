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
    <?php if(isset($_GET["username"])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            The user <strong><?php echo $_GET["username"]; ?></strong> successfully deleted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif(isset($_GET["usernameerr"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            The user <strong><?php echo $_GET["username"]; ?></strong> already deleted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php require "./views/_removeuser.php"; ?>
    
<?php endif; ?>