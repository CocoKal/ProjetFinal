<!-- Header -->

<header class="header">
  <div class="header_content d-flex flex-row align-items-center justify-content-start">
    <div class="logo"><a href="http://localhost/Tests/ProjetFinal/index.php">Sophie Tells</a></div>
    <div class="ml-auto d-flex flex-row align-items-center justify-content-start">
      <nav class="main_nav">
        <ul class="d-flex flex-row align-items-start justify-content-start">
          <li class="active"><a href="http://localhost/Tests/ProjetFinal/index.php">Acceuil</a></li>
          <li><a href="http://localhost/Tests/ProjetFinal/index.php?view=about">À propos</a></li>
          <li><a href="http://localhost/Tests/ProjetFinal/index.php?view=contact">Contacts</a></li>
        </ul>
      </nav>
      <div>
        <?php
          if (!isset($_SESSION["username"])) {
            echo '<a href="http://localhost/Tests/ProjetFinal/index.php?view=login">';
          }
          else {
            echo '<a href="http://localhost/Tests/ProjetFinal/index.php?view=account">';
          }
        ?>
          <button class="header_phone booking_button trans_200">
              <?php
                if (isset($_SESSION["username"])) echo $_SESSION["username"];
                else echo "Se Connecter";
               ?>
          </button>
        </a>
      </div>

      <!-- Hamburger Menu -->
      <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
    </div>
  </div>
</header>

<!-- Menu -->

<div class="menu trans_400 d-flex flex-column align-items-end justify-content-start">
  <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
  <div class="menu_content">
    <nav class="menu_nav text-right">
      <ul>
        <li><a href="http://localhost/Tests/ProjetFinal/index.php">Home</a></li>
        <li><a href="http://localhost/Tests/ProjetFinal/index.php?view=about">About us</a></li>
        <li><a href="http://localhost/Tests/ProjetFinal/index.php?view=contact">Contact</a></li>
        <li>
          <?php
            if (!isset($_SESSION["username"])) {
              echo '<a href="http://localhost/Tests/ProjetFinal/index.php?view=login">';
              echo "Se Connecter";
            }
            else {
              echo '<a href="http://localhost/Tests/ProjetFinal/index.php?view=account">';
              echo $_SESSION["username"];
            }
           ?>
        </a>
      </li>
      </ul>
    </nav>
  </div>
</div>
