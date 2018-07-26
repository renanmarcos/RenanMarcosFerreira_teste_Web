<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css">
        <title>FastCar - Passageiros</title>
    </head>

    <body>
        <?php include 'inc/navbar-passageiros.php'?>
        
        <div class="container">
            <?php include 'inc/showcase.php'?>
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <?php include 'inc/content-passageiros.php'?>
                </div>
                <div class="col-md-4 col-lg-4">
                    <?php 
                        session_start();
                        if (isset($_SESSION['email'])) {
                            include 'inc/sidebar-logged.php';
                        } else {
                            include 'inc/sidebar-login.php';
                        }
                        
                    ?>
                </div>
            </div>
        </div>       

        <br>
        <footer class="footer">
            <div class="container">
                <span class="text-muted">Copyright <?php echo date('Y'); ?> &copy; FastCar.</span>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/login.js"></script>
    </body>
</html>