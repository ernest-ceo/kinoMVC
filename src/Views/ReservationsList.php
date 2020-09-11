<div class="page-section">
    <div class="container">
        <div class="table-responsive table-responsive-sm table-dark table-responsive-md table-responsive-lg table-responsive-xl">
            <h2 class="page-section-heading text-center text-light mb-0 popover-header">Lista rezerwacji dokonanych przez użytkowników</h2>
            <table class="table table-dark table-responsive-md table-responsive-lg table-responsive-sm">
                <thead>
                <tr>
                    <th class="text-center">ID rezerwacji</th><th class="text-center">Użytkownik</th><th class="text-center">Film</th><th class="text-center">Data</th><th class="text-center">Godzina</th><th class="text-center">Sala</th><th class="text-center">Rząd</th><th class="text-center">Miejsce</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (is_array($options['reservationsList']) && sizeof($options['reservationsList']) != 0) {
                foreach ($options['reservationsList'] as $reservation)
                {
                    ?>

                    <tr>
                        <td class="text-center"><?=$reservation['id']?></td>
                        <td class="text-center"><?=$reservation['username']?></td>
                        <td class="text-center"><?=$reservation['title']?></td>
                        <td class="text-center"><?=$reservation['date']?></td>
                        <td class="text-center"><?=$reservation['time']?></td>
                        <td class="text-center"><?=$reservation['hall_id']?></td>
                        <td class="text-center"><?=$reservation['seat_row']?></td>
                        <td class="text-center"><?=$reservation['seat_number']?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
            } else {
                ?>
                </tbody>
                </table>
                <h6 class="text-center text-secondary mb-0 text-danger">Na ten seans nie dokonano rezerwacji.</h6>
                <?php
            }
            ?>
        </div>
    </div>
</div>