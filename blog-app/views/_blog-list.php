<?php
$folder = 'blogs/'; 
$files = glob($folder . '*.php');

$blogs = array(); 

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
    $url = $blog['url'];
    $title = $blog['title'];
    $blogDate = date("d.m.Y", $blog['date']);

    echo "
        <div class=\"card mt-5 mb-5\">
        <img src=\"./blogs/img/default.jpg\" height=\"300px\">
        <h2><a href='/blog-app/blogs/{$url}.php'>{$title}</a></h2>
        <p>Release Date : {$blogDate}</p>
        </div>
    ";
}
?>