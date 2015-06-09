<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Adam Gromowski">
    

    <title>Panel użytkowników</title>

    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

        <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading">Zaloguj się</h2>
            <label for="inputLogin" class="sr-only">Login użytkownika</label>
            <input type="login" id="inputLogin" name="inputLogin" class="form-control" placeholder="Login użytkownika" required autofocus>
            <button id="buttonSearch" class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
        </form>
        
        <?php
            require 'Controller/WebController.php';
            
            $run = new WebController();
            $run->controller();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
