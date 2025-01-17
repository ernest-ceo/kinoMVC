{% if options.errors %}
{% for error in options.errors %}
<p class='text-center text-danger table-dark'>error</p>
{% endfor %}
{% endif %}


<div class="page-section">
    <div class="container">
        <div class="table-responsive table-dark table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <h2 class="page-section-heading text-center text-light mb-0 popover-header">Informacje o użytkownikach</h2>
            <form action="{{_BASE_URL_}}users?>" method="post">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nazwa użytkownika</th>
                        <th class="text-center">Adres e-mail</th>
                        <th class="text-center">Zbanowany?</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>

                    {% if options.users %}
                    {% for user in options.users %}
                    <tr>
                            <td class="text-center">{{user.id}}</td>
                            <td class="text-center">{{user.username}}</td>
                            <td class="text-center">{{user.email}}</td>
                            <td class="text-center">{{user.banned}}</td>
                            <td class="text-center"><button class="btn btn-danger" type="submit" name="banning" value="{{user.id}}">Zablokuj</button></td>
                            <td class="text-center"><button class="btn btn-success" type="submit" name="unbanning" value="{{user.id}}">Odblokuj</button></td>
                            <td class="text-center"><a class="btn btn-primary" href="{{_BASE_URL_}}users/showReservationsHistory/{{user.id}}">Historia rezerwacji</a></td>
                        </tr>
                    {% endfor %}
                    
                    </tbody>
                </table>
            </form>
            {% else %}
                </tbody>
                </table>
                </form>
                <h6 class="text-center text-secondary mb-0 text-danger">Brak danych do wyświetlenia.</h6>
            {% endif %}
        </div>
    </div>
</div>