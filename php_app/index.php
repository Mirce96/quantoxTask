<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>PHP Backend Developer Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/main.css" />
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="title">
            <?php
            if(!empty($_SESSION['username']))
            {
            ?>
            <h2>
              Welcome <?php echo $_SESSION['username'] ?>
            </h2>
          </div>
          <ul>
            <a href="logout.php" class="logout_btn" role="button" aria-pressed="true">Log out</a>
          </ul>
          <?php } else { ?>
            <div class="col-md-12">
              <div class="buttons">
                <a href="login.php" class="log_btn" role="button" aria-pressed="true">Login</a>
                <a href="register.php" class="reg_btn" role="button" aria-pressed="true">Register</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="search_section">
    <div class="col-md-12">
      <form action="search.php" method="post" id="index-form">
        <div class="form-group">
          <label for="search-param" id="search">
            Search:
          </label>
          <input class="form-control" type="text" id="search-param" name="search-param" required autocomplete="off" />
        </div>
        <button class="search_btn" type="submit">Search</button>
      </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" ></script>
  </body>
</html>
