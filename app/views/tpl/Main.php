<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kino Jastrząb</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="images/hawk_ico.jpg" />
    <!-- <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" /> -->
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assete/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="background-image-div" class="background-image-div">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a href="index.php">
                    <img class=" navbar-brand" src="images/Logo2.png" alt="Kino Jastrząb - Logo" title="Kino Jastrząb - Logo"/>        
                </a>
                <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <?php
                        if(isset($greetingMessage))
                        {
                            echo "<h4>".$greetingMessage."</h4>";
                        }
                        else 
                        {
                            if(isset($_SESSION['username']))
                            {
                                echo "<h4>Witaj ".$_SESSION['username']."!</h4>";
                            } else {
                                echo "<h4>Witaj!</h4>";
                            }

                        }
                ?>
                </a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                                <?php
                                    include_once 'Menu.php';
                                    if(isset($_SESSION['username']))
                                    {
                                ?>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-center" href="zaloguj.php?logout=1">Wyloguj</a></li>
                            <?php
                                    }
                            ?>
                    </ul>
                </div>
            </div>
        </nav>
                                                
        <section class="page-section">
            <div class="container">
                <br>
                <!-- here main content -->
                <?php
                if(is_array($content))
                {
                    include $content[0];
                }
                else
                {
                    echo $content;
                }
                ?>

            </div>                
                <?php
                include_once 'app/views/Footer.php';
                ?>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </div>
</body>
</html>