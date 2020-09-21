{% if options.errors %}
{% for error in options.errors %}
<p class='text-center text-danger table-dark'>error</p>
{% endfor %}
{% endif %}
<section class="page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-light mb-0">Proszę wprowadzić dane</h2>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="{{url}}ResetPassword/setNewPassword" method="post">
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
                <input type="hidden" name="vkey" value="{{options.vkey}}">
                <div class="form-group"><button class="btn btn-primary btn-xl" type="submit" name="setNewPassword">Ustaw</button></div>
            </form>
        </div>
    </div>
    </div>
</section>