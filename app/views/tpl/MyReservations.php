<div class="page-section">
    <div class="container">
        
    <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <h2 class="page-section-heading text-center text-light mb-0 popover-header">Twoje rezerwacje</h2><br>
        <form action="mojerezerwacje.php" method="post">
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
            </tr>
            </thead>
            <tbody>
            <?php
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
    </div>
    </div>
</div>