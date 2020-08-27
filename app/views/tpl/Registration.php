<?php

if(isset($_SESSION['username']))
{
    header('location: index.php');
} else {
?>
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-light mb-0">Wprowadź dane niezbędne do rejestracji konta</h2>

            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="zarejestruj.php" method="post">
                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="username">Nazwa użytkownika:</label>
                                <input class="form-control" type="text" id="username" name="username" placeholder="Nazwa użytkownika" required="required" data-validation-required-message="Proszę podać nazwę użytkownika." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="newPassword">Hasło:</label>
                                <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="Hasło" required="required" data-validation-required-message="Proszę podać hasło." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
 
                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="newPasswordValidate">Powtórz hasło:</label>
                                <input class="form-control" type="password" id="newPasswordValidate" name="newPasswordValidate" placeholder="Powtórz hasło" required="required" data-validation-required-message="Proszę powtórzyć hasło z powyższego pola." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="userEmail">Adres e-mail:</label>
                                <input class="form-control" type="email" id="userEmail" name="userEmail" placeholder="Adres e-mail" required="required" data-validation-required-message="Proszę podać adres e-mail." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-xl" type="submit" name="register" value="register">Zarejestruj</button></div><br><br>
                            
                    </form>

                </div>
            </div>
        </div>
<?php
    if(isset($_SESSION['info']))
    {
        ?>
        <?=$_SESSION['info']?><br><br><br><br>
        <?php
        unset($_SESSION['info']);
    }
}
?>