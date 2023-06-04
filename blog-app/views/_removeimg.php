<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                    
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>Remove Images</h1>
                                </div><br>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> if you click on any image and delete it there is no turning back
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div>
                                <?php
                                    $folder = 'blogs/img/';
                                    $files = glob($folder . '*.jpg');
                                    foreach ($files as $file) {
                                        $url = basename($file, '.jpg');
                                        $imgDate = filectime($file);
                                        $date = date("d.m.Y",$imgDate);
                                        $img = $folder . $url . ".jpg";
                                        $title = ucwords(str_replace('-', ' ', $url));
                                        echo "
                                        <div class=\"card\">
                                        <img src=\"$img\" height=\"250\" width=\"600\"></img>
                                        <h2><a href='/blog-app/deleteselectedimg.php?page={$url}'>{$title}</a></h2>
                                        <p>Upload Date: {$date}</p>
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