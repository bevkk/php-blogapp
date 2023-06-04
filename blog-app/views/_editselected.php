<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editPage'])) {
        $content = $_POST['content'];
        $page = $_GET["page"];
        
        $fileName = "blogs/$page.php";
        $myFile = fopen($fileName, 'w');
        fwrite($myFile, $content);
        fclose($myFile);
    }    
}
?>



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
                                <form action="editselected.php?page=<?php echo $page; ?>" method="post">
                                    <div>
                                        <div class="form-group">
                                            <input type="hidden" name="page" value="<?php echo $page; ?>">
                                            <label for="exampleFormControlTextarea1"><?php echo "<h4 class=\"display-4\">$page Edit</h4> "; ?></label>
                                            <textarea class="form-control" name="content" rows="10" cols="50"><?php echo htmlspecialchars($content); ?></textarea>
                                        </div>
                                    <button type="submit" class="btn btn-primary" name="editPage" id="editPage">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>