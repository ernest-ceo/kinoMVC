<?php
if(!isset($_GET['vkey']))
{
        ?>
    <section class="page-section" id="contact">
        <div class="container">
        <h2 class="page-section-heading text-center text-light mb-0">Proszę podać adres e-mail do zresetowania hasła</h2>
        
            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                   <form action="reset.php" method="post">

                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="userEmail">Adres e-mail</label>
                                <input class="form-control" type="text" id="userEmail" name="userEmail" placeholder="Adres e-mail" required="required" data-validation-required-message="Proszę podać adres e-mail użyty podczas rejestracji." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        

                        <div class="form-group"><button class="btn btn-primary btn-xl" type="submit" name="reset" value="Zresetuj">Zresetuj</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>













        <?php
}
if(isset($_GET['vkey']))
{
    ?>





    <section class="page-section" id="contact">
        <div class="container">
           <h2 class="page-section-heading text-center text-light mb-0">Proszę wprowadzić dane</h2>
           

            </div>
            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="reset.php" method="post">
                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="newPassword">Nowe hasło</label>
                                <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="Nowe hasło" required="required" data-validation-required-message="Proszę wypełnić pole." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group controls mb-0 pb-2">
                                <label class="text-light" for="newPasswordValidate">Potwierdź nowe hasło</label>
                                <input class="form-control" type="password" id="newPasswordValidate" name="newPasswordValidate" placeholder="Potwierdź nowe hasło" required="required" data-validation-required-message="Proszę wypełnić pole." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <input type="hidden" name="vkey" value="<?=$_GET['vkey']?>">

                        

                        <div class="form-group"><button class="btn btn-primary btn-xl" type="submit" name="setNewPassword">Ustaw</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>






    <?php
}
if(isset($_SESSION['info']))
{
    ?>
    <?=$_SESSION['info'];?>
    <?php
    unset($_SESSION['info']);
}