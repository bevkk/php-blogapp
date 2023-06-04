<nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="index.php">
            <img src="img/blogger.png" width="50" height="50" alt="">
          </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php if(isset($_COOKIE["auth"]) && ($_COOKIE["auth"]["username"] == "admin" || $_COOKIE["auth"]["username"] == "Admin")): ?>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin Page</a>
              </li>
            <?php endif; ?>
          </ul>
          <?php if(!isset($_COOKIE["auth"])): ?>
            <a class="nav-link" href="login.php">Login</a>
            <a class="nav-link" href="register.php">Register</a>
          <?php else: ?>
            <?php echo $_COOKIE["auth"]["username"] . " | " ?>
            <a class="nav-link" href="logout.php">Logout</a>
          <?php endif; ?>
        </div>
</nav>