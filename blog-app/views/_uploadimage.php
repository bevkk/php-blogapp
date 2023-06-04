<div class="container-fluid mt-5">
                <div class="row">
    <?php require "./views/_adminbar.php"; ?>
                    
                    <div class="card col mx-5 index-main">
                        <div class="admin-header mt-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card title-card">
                                    <h1>Upload Images</h1>
                                </div><br>
                                <div>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning!</strong> You can only upload jpeg images.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <input class="form-control" type="text" placeholder="Image Name" id="imgName" name="imgName"><br>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" id="imgUpload" name="imgUpload">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="btnUpload" id="btnUpload">Upload!</button>
                                </form>
                                <?php
                                    if(isset($_POST['btnUpload']) && isset($_POST["imgName"])){
                                        if(empty($_POST["imgName"])){
                                            echo "please give your image a name";
                                        }else{
                                            $targetDir = "./blogs/img/";
                                            $targetFile = $targetDir . basename($_FILES["imgUpload"]["name"]);
                                            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
                                            $imgName = $_POST["imgName"]. '.' . $imageFileType;
                                            $targetFile = $targetDir . $imgName;
                                            if($imageFileType == "jpg") {
                                                if(move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $targetFile)){
                                                    echo "Your jpg file uploaded successfuly.";
                                                } else {
                                                    echo "You can only upload jpg files.";
                                                }
                                            } else {
                                                echo "You can only upload jpg files.";
                                            }
                                        }
                                       
                                    }
                                ?>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>