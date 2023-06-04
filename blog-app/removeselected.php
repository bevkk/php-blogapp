<?php
$page = $_GET['page'];
$filePath = "blogs/" . $page . ".php";
if (file_exists($filePath)) {
    unlink($filePath); 
}
header("Location: /blog-app/remove-blog.php");
exit;
?>