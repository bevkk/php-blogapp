<?php require "./views/_headers.php" ?>
<?php require "./views/_navbar.php" ?>

<?php

    if(isset($_POST["login"])){
        if((isset($_POST["username"]) && $_POST["username"]=="") || isset($_POST["password"]) && $_POST["password"]==""){
            echo "<div class='alert alert-danger mb-0 text-center'>Can't leave username or password blank.</div>";
        }else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $servername = "localhost";
            $dbname = "blogg_app";
            $dbusername = "root";
            $dbpassword = "";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
                $stmt->bindParam(':username', $username);
            
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if ($result) {
                    $tabPassword = $result['password'];
                } else {
                    echo "<div class='alert alert-danger mb-0 text-center'>Wrong username or password please try again.</div>";
                }
            } catch (PDOException $e) {
                echo "Bir hata oluştu: " . $e->getMessage();
            }
            if(isset($tabPassword)){
                if($tabPassword == $password){
                    setcookie("auth[username]",$username,time() + (60*60*24*30));
                    header("Location: index.php");
                }else{
                    echo "<div class='alert alert-danger mb-0 text-center'>Wrong username or password please try again.</div>";
                }
            }
            $conn = null;
            
        }
        
    }
?>
<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="card col mx-5 index-main pt-3">
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Submit</button>
            </form>
            </div>
        </div>
      </div>

      

      
</body>
</html>