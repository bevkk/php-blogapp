<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                    
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>Remove Blog</h1>
                                </div><br>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> if you click on any blog and delete it there is no turning back
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
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
                                        <div class=\"card alert alert-danger\">
                                        <h2><a class=\"alert-link\" href='/blog-app/removeselected.php?page={$url}'>{$title}</a></h2>
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