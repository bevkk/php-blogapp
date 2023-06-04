<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                    
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>Edit Blog Page</h1>
                                </div><br>
                                <div>
                                <?php
                                    $folder = 'blogs/'; 
                                    $files = glob($folder . '*.php'); 

                                    foreach ($files as $file) {
                                        $url = basename($file, '.php');
                                        $blogDate = filectime($file);
                                        $date = date("d.m.Y",$blogDate);
                                        $title = ucwords(str_replace('-', ' ', $url)); 
                                        echo "
                                        <div class=\"card alert alert-success\">
                                        <h2><a class=\"alert-success\" href='/blog-app/editselected.php?page={$url}'>{$title}</a></h2>
                                        <p>Release Date: {$date}</p>
                                        </div>";
                                    }
                                ?>                               
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>