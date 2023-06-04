
<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>Remove Users</h1>
                                </div><br>
                                <div>
                                    <form action="remove-user.php" method="post">
                                    <div class="form-group">
                                            <h3>Search user by username</h3>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="title">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" name="removeUser">Add</button>

                                    </form>
                                </div>
                                <br>
                                <?php
    if(isset($_POST["removeUser"])){
        if((isset($_POST["username"]) && empty($_POST["username"]))){
            echo "<div class='alert alert-danger mb-0 text-center'>Please search for any user.</div>";
        }
        else{
    $servername = "localhost";
    $dbname = "blogg_app";
    $dbusername = "root";
    $dbpassword = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $sql = "SELECT id,username,password FROM users  WHERE username = :username";
                $stmt = $conn->prepare($sql);
                $username = $_POST["username"];
                $stmt->bindParam(':username', $username);
                $stmt->execute();
            
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if ($result) {
                    $tabPassword = $result['password'];
                    $tabID = $result['id'];
                    $tabUsername = $result['username'];
                    echo "
                    <table class=\"table\">
                    <thead>
                        <tr>
                        <th scope=\"col\">ID</th>
                        <th scope=\"col\">Username</th>
                        <th scope=\"col\">Password</th>
                        <th scope=\"col\">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope=\"row\">$tabID</th>
                        <td>$tabUsername</td>
                        <td>$tabPassword</td>
                        <td>
                    ";
                    if($username!="admin"){
                        echo "<a class=\"alert-danger\" href='/blog-app/removeselecteduser.php?username={$username}'>Remove User ?</a>";
                    }else{
                        echo "<a class=\"alert-danger\" href='#'>#</a>";
                    }
                    echo "
                    </td>
                    </tr>
                    </tbody>
                    </table>";
                } else {
                    echo "
                    <table class=\"table\">
                    <thead>
                        <tr>
                        <th scope=\"col\">ID</th>
                        <th scope=\"col\">Username</th>
                        <th scope=\"col\">Password</th>
                        <th scope=\"col\">#</th>
                        </tr>
                    </thead>
                    </table>

                    ";
                }
            } catch (PDOException $e) {
                echo "Bir hata oluştu: " . $e->getMessage();
            }

    $conn = null;
        }
}
?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>