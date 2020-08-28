<div class="page-section">
    <div class="container">

        <div class="table-responsive table-responsive-sm table-dark table-responsive-md table-responsive-lg table-responsive-xl">
            <h2 class="page-section-heading text-center text-light mb-0 popover-header">Twoje rezerwacje</h2><br>
            <form action="konto.php" method="post">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>ID rezerwacji</th>
                        <th>Tytuł filmu</th>
                        <th>Data</th>
                        <th>Godzina</th>
                        <th>Sala</th>
                        <th>Rząd</th>
                        <th>Miejsce</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (is_array($reservationsList) && sizeof($reservationsList) != 0) {
                    foreach ($reservationsList as $reservation)
                    {
                        ?>

                        <tr>
                            <td class="text-center"><?=$reservation['id']?></td>
                            <td class="text-center"><?=$reservation['title']?></td>
                            <td class="text-center"><?=$reservation['date']?></td>
                            <td class="text-center"><?=$reservation['time']?></td>
                            <td class="text-center"><?=$reservation['hall_id']?></td>
                            <td class="text-center"><?=$reservation['seat_row']?></td>
                            <td class="text-center"><?=$reservation['seat_number']?></td>
                            <td><button class="btn btn-primary btn-xl"  type="submit" name="cancelReservation" value="<?=$reservation['id']?>">Odwołaj rezerwację</button></td>
                        </tr>


                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </form>
            <?php
            } else {
                ?>

                </tbody>
                </table>
                </form>
                <h6 class="text-center text-secondary mb-0 text-danger">Brak danych do wyświetlenia. Dokonaj rezerwacji</h6>
                <?php
            }
            ?>

        </div>
    </div>
</div>




<div class="page-section">
    <div class="container">
        <form action="konto.php" method="post">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <button class="btn btn-primary btn-xl" type="submit" name="deleteUser">Usuń swoje konto</button>
            </div>
        </form>
    </div>
</div>