<?php

setcookie("auth[username]","Admin",time() - (60*60*24*30));
header("Location: index.php");
?>