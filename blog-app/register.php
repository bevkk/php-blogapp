<?php require "./views/_headers.php" ?>
<?php require "./views/_navbar.php" ?>
<?php
$registered = 0;
if (isset($_POST["register"])) {
    if ((isset($_POST["username"]) && $_POST["username"] == "") || isset($_POST["password"]) && $_POST["password"] == "") {
        echo "<div class='alert alert-danger mb-0 text-center'>Can't leave username or password blank.</div>";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $servername = "localhost";
        $dbname = "blogg_app";
        $dbusername = "root";
        $dbpassword = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                echo "<div class='alert alert-danger mb-0 text-center'>This username is already taken.</div>";
            } else {
                $sql = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $lastId = $row['id'];
                    $newId = $lastId + 1;
                } else {
                    $newId = 1;
                }
                
                $sql = "INSERT INTO users (id, username, password) VALUES (:id, :username, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $newId);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                
                echo "<div class='alert alert-success mb-0 text-center'>Registration successful.</div>";
                $registered = 1;
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger mb-0 text-center'>An error occurred during registration: " . $e->getMessage() . "</div>";
        }
        
        $conn = null;
    }
}
?>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="card col mx-5 index-main pt-3">
            <form method="post" action="register.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <?php if($registered==1): ?>
                    <br><b>Your registration is completed! Click<a href="login.php">Here</a> to login.</b>
                <?php endif; ?>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
