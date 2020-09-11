<?php
if(isset($options['errors']))
{
    foreach($options['errors'] as $error)
    {
        ?>
        <p class='text-center text-danger table-dark'><?=$error?></p>
        <?php
    }
    unset($options['errors']);
}
?>
    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-light mb-0">Proszę podać adres e-mail do zresetowania hasła</h2>

            <!-- Contact Section Form-->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="<?=_BASE_URL_.'ResetPassword'?>" method="post">
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

