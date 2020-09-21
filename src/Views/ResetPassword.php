{% if options.errors %}
{% for error in options.errors %}
<p class='text-center text-danger table-dark'>{{error}}</p>
{% endfor %}
{% endif %}

{% if options.confirmations %}
{% for confirmation in options.confirmations %}
<p class='text-center text-success table-dark'>{{confirmation}}</p>
{% endfor %}
{% endif %}
    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-light mb-0">Proszę podać adres e-mail do zresetowania hasła</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form action="{{url}}ResetPassword" method="post">
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

