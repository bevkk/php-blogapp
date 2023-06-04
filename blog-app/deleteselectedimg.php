<?php
$page = $_GET['page'];
$filePath = "blogs/img/" . $page . ".jpg";
if (file_exists($filePath)) {
    unlink($filePath); // Dosyayı sil
}
header("Location:http://localhost/blog-app/remove-img.php");
exit;
?>