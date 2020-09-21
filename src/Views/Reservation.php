<section class="page-section">
    <div class="container">
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

    </div>
    </div>
    <section class="page-section">
        <div class="container">

            <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                <h2 class="page-section-heading text-center text-light mb-0 popover-header">Wybór rezerwacji</h2>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th class="text-center">Rząd</th>
                        <th class="text-center">Miejsce</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    {% if options.freeSeats %}
                    {% for freeSeat in options.freeSeats %}
                        <tr>
                            <td class="text-center">
                                {{freeSeat.seat_row}}
                            </td>
                            <td class="text-center">
                                {{freeSeat.seat_number}}
                            </td>
                            <td class="text-center">
                                <a href="{{url}}MakeReservation/bookASeat/{{freeSeat.id}}/{{options.show_id}}">
                                    <button class="btn btn-primary btn-xl">Wybierz miejsce</button>
                                </a>
                            </td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
                {% else %}
                    </tbody>
                    </table>
                    <h6 class="text-center text-secondary mb-0 text-danger">
                        Ten seans został wyprzedany. Zachęcamy do przejrzenia
                        <a href="{{url}}repertoire">repertuaru</a>
                        , aby wybrać inny termin.
                    </h6>
                {% endif %}
            </div>
        </div>
        </div>
        <br>
        <br>
        <br>
        <br>