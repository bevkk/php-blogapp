<?php require "./views/_headers.php" ?>
<?php require "./views/_navbar.php" ?>
<body>
      <div class="container-fluid mt-5 mb-5" id="main-cont">
        <div class="row">
            <div class="card col-8 ml-5 index-main">
              <?php if(!isset($_GET["q"])): ?>
                <?php require "./views/_blog-list.php" ?>
              <?php elseif(isset($_GET["q"])): ?>
                <?php require "./views/_blog-list-searched.php" ?>
              <?php endif; ?>
            </div>
            <?php require "./views/_search.php" ?>
        </div>
      </div>

<?php require "./views/_footer.php" ?>

</body>
</html>