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

<?php if($admin==1){
    $servername = "localhost";
    $dbname = "blogg_app";
    $dbusername = "root";
    $dbpassword = "";
    
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $_GET["username"];
        if($username!="admin"){
            $sql = "DELETE FROM users WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Kullanıcı başarıyla silindi.";
            sleep(2);
            header("Location:/blog-app/remove-user.php?username={$username}");

            
        } else {
            echo "There is no user has " . $username . " username";
            sleep(2);
            header("Location:/blog-app/remove-user.php?usernameerr={$username}");

        }
        }else{
            echo "You can't delete user ADMIN";
            sleep(2);
            header("Location: notfound.php");
        }
        
    }
    catch(PDOException $e){
        echo "Bir hata oluştu: " . $e->getMessage();
    }

    
}
?>