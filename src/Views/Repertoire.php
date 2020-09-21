    <div class="page-section">
        <div class="container">
            <div class="table-responsive table-responsive-sm table-dark table-responsive-md table-responsive-lg table-responsive-xl">
                <h2 class="page-section-heading text-center text-light mb-0 popover-header">Zapraszamy do przejrzenia repertuaru naszego kina</h2>
                <a class="btn bg-dark text-light" href="{{url}}repertoire/showByRange/day">Dzisiaj</a>
                <a class="btn bg-dark text-light" href="{{url}}repertoire/showByRange/week">Najbliższy tydzień</a>
                <a class="btn bg-dark text-light" href="{{url}}repertoire/showByRange/month">Najbliższy miesiąc</a>
                <table class="table table-dark ">
                    <thead>
                    <tr>
                        <th class="text-center">Tytuł</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Godzina</th>
                        <th class="text-center">Gatunek</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% if shows %}
                    {% for show in shows %}
                        <tr>
                            <td class="text-center">{{show.title}}</td>
                            <td class="text-center">{{show.date}}</td>
                            <td class="text-center">{{show.time}}</td>
                            <td class="text-center">{{show.genre}}</td>
                        </tr>
                    {% endfor %}
                    {% else %}
                    <tr>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                    </tr>
                    {% endif %}
                    </tbody>
                </table>
                {% if not shows %}
                <br>
                <h6 class="text-center text-secondary mb-0 text-danger">Dla wybranego okresu brak seansów w repertuarze.</h6>
                <br>
                {% endif %}
            </div>
        </div>
    </div>
