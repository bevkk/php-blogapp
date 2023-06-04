<?php
$folder = 'blogs/';
$files = glob($folder . '*.php'); 
$blogs = array();
$searchKey = $_GET["q"];
$searched = array();

foreach ($files as $file) {
    $url = basename($file, '.php'); 
    $blogDate = filectime($file); 
    $title = ucwords(str_replace('-', ' ', $url)); 

    $blogs[] = array(
        'url' => $url,
        'title' => $title,
        'date' => $blogDate
    );
}

usort($blogs, function ($a, $b) {
    return $b['date'] - $a['date'];
});

foreach ($blogs as $blog) {
    if (strpos($blog['url'], $searchKey) !== false) {
        $searched[] = $blog;
    }
}
$size = sizeof($searched);
if($size == 0){
    echo "<br><h5 class=\"display-5\">No results for $searchKey</h5>";
}else{
    foreach ($searched as $search) {
        $url = $search['url'];
        $title = $search['title'];
        $blogDate = date("d.m.Y", $search['date']);
        
        echo "
            <div class=\"card mt-5 mb-5\">
            <img src=\"./blogs/img/default.jpg\" height=\"300px\">
            <h2><a href='/blog-app/blogs/{$url}.php'>{$title}</a></h2>
            <p>Release Date : {$blogDate}</p>
            </div>
        ";
    }
}
?>