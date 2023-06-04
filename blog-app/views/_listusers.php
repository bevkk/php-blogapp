<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                    
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>List Users</h1>
                                </div><br>
                                <div>
                                
                                    <?php
                                    
                                    $servername = "localhost";
                                    $dbname = "blogg_app";
                                    $dbusername = "root";
                                    $dbpassword = "";
                                    
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                    $users = array(); 
                                    
                                    try {
                                        $sql = "SELECT id, username, password FROM users";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                    
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    
                                        foreach ($results as $result) {
                                            $tabPassword = $result['password'];
                                            $tabID = $result['id'];
                                            $tabUsername = $result['username'];
                                    
                                            
                                            $users[] = array(
                                                'id' => $tabID,
                                                'username' => $tabUsername,
                                                'password' => $tabPassword
                                            );
                                        }
                                    
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
                                        ";
                                    
                                        foreach ($users as $user) {
                                            $tabID = $user['id'];
                                            $tabUsername = $user['username'];
                                            $tabPassword = $user['password'];
                                    
                                            echo "
                                            <tr>
                                                <th scope=\"row\">$tabID</th>
                                                <td>$tabUsername</td>
                                                <td>$tabPassword</td>
                                                <td>
                                            ";
                                    
                                            if ($tabUsername != "admin") {
                                                echo "<a class=\"alert-danger\" href='/blog-app/removeselecteduser.php?username={$tabUsername}'>Remove User ?</a>";
                                            } else {
                                                echo "<a class=\"alert-danger\" href='#'>#</a>";
                                            }
                                    
                                            echo "
                                                </td>
                                            </tr>
                                            ";
                                        }
                                    
                                        echo "
                                            </tbody>
                                        </table>
                                        ";
                                    } catch (PDOException $e) {
                                        echo "Bir hata oluştu: " . $e->getMessage();
                                    }
                                    
                                    $conn = null;
                                    
                                    ?>
                                
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>