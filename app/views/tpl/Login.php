<?php

if(isset($_SESSION['username']))
{
    header('location: index.php');
} else {
?>

<!-- <section class="page-section"> -->
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-light mb-0">Wprowadź dane do zalogowania</h2>
            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="zaloguj.php" method="post">
                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="username">Nazwa użytkownika</label>
                                <input class="form-control" type="text" id="username" name="username" placeholder="Nazwa użytkownika" required="required" data-validation-required-message="Proszę podać nazwę użytkownika." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        

                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="password">Hasło</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Hasło" required="required" data-validation-required-message="Proszę podać hasło." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        
                        <div class="form-group"><button class="btn btn-primary btn-xl" type="submit" name="logIn" value="logIn">Zaloguj</button></div>
                            
                    </form>
                    <p class="text-left"><a href="reset.php">Zapomniałem hasła</a></p>

                </div>
            </div>
        </div>
<!-- </section> -->





    
    <?php
}
if(isset($_SESSION['info']))
{
    ?>
    <?=$_SESSION['info']?>
    <?php
    unset($_SESSION['info']);
}
?>