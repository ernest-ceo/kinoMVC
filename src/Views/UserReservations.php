<section class="page-section">
    <div class="container">
        <div class="table-responsive table-dark table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <h2 class="page-section-heading text-center text-light mb-0 popover-header">Historia rezerwacji użytkownika</h2>
            <!-- <form action="" method="post"> -->
            <table class="table table-dark table-responsive-md table-responsive-lg table-responsive-sm">

                <thead>
                <tr>
                    <th class="text-center">ID rezerwacji</th>
                    <th class="text-center">Nazwa użytkownika</th>
                    <th class="text-center">Adres e-mail</th>
                    <th class="text-center">Zablokowany</th>
                    <th class="text-center">Tytuł filmu</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Godzina</th>
                    <th class="text-center">Sala</th>
                    <th class="text-center">Rząd</th>
                    <th class="text-center">Miejsce</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (is_array($options['reservationsHistory']) && sizeof($options['reservationsHistory']) != 0) {
                foreach ($options['reservationsHistory'] as $reservation)
                {
                    ?>

                    <tr>
                        <td class="text-center"><?=$reservation['id']?></td>
                        <td class="text-center"><?=$reservation['username']?></td>
                        <td class="text-center"><?=$reservation['email']?></td>
                        <td class="text-center"><?=$reservation['banned']?></td>
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
            <!-- </form> -->

            <?php
            } else {
                ?>
                </tbody>
                </table>
                <!-- </form> -->
                <br>
                <h6 class="text-center text-secondary mb-0 text-danger">Historia rezerwacji użytkownika jest pusta.</h6><br>

                <?php
            }
            ?>
        </div>
    </div>
</section>