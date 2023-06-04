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
    <?php
    $img = "default.jpg";
    if(isset($_POST["postBlog"]) ){
        if((isset($_POST["title"]) &&  empty($_POST["title"])) || (isset($_POST["category"]) && $_POST["category"] == "Please Select.") || (isset($_POST["blogMain"]) && empty($_POST["blogMain"])) || (isset($_POST["url"]) && empty($_POST["url"]))){
            echo "<div class='alert alert-danger mb-0 text-center'>Please make sure there is no empty input.</div>";
        }
        else{
            $url = $_POST["url"];
            $title = $_POST["title"];
            $blogMain = $_POST["blogMain"];
            $category = $_POST["category"];
            if(!empty(($_POST["img"]))){
                $img = ($_POST["img"] . ".jpg");
            }
            $author = $_COOKIE["auth"]["username"];
            $blog = "
            <?php require \"views/_headers.php\" ?>
            <?php require \"views/_navbar.php\" ?>
                        <body>
                              <div class=\"container-fluid mt-5\">
                                <div class=\"row\">
                                    <div class=\"card col-8 ml-5 index-main mb-5\">
                                        <img src=\"img/$img\" class=\"mt-4\" alt=\"Responsive image\" height=\"250\">
                                      <h1 class=\"display-1\">$title</h1>
                                      <p>$blogMain</p>
                          <br><br><p class=\"lead\">Category&nbsp;&nbsp;:&nbsp;&nbsp;$category&nbsp;&nbsp;|&nbsp;&nbsp;Author&nbsp;&nbsp;:&nbsp;&nbsp;$author</p>

                        </div>
                        <?php require \"views/_search.php\" ?>
                    </div>
                  </div>
            
                  <?php require \"views/_footer.php\" ?>
            </body>
            </html>";
            $fileName = "blogs/$url.php";
            $myFile = fopen($fileName, 'w');
            fwrite($myFile, $blog);
            fclose($myFile);
        }
        header("Location:$fileName");
    }

?>
    <?php require "./views/_navbar.php"; ?>
    <?php require "./views/_addblog.php"; ?>
    
<?php endif; ?>