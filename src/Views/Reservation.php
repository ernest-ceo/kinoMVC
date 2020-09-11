<?php
declare(strict_types=1);
?>
<section class="page-section">
    <div class="container">
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
        if(isset($options['confirmations']))
        {
            foreach($options['confirmations'] as $confirmation)
            {
                ?>
                <p class='text-center text-success table-dark'><?=$confirmation?></p>
                <?php
            }
            unset($options['errors']);
            unset($options['confirmations']);
        }
        ?>
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
                    <?php
                    if (is_array($options['freeSeats']) && sizeof($options['freeSeats']) != 0) {
                    foreach($options['freeSeats'] as $freeSeat)
                    {
                        ?>
                        <tr>
                            <td class="text-center">
                                <?=$freeSeat['seat_row']?>
                            </td>
                            <td class="text-center">
                                <?=$freeSeat['seat_number']?>
                            </td>
                            <td class="text-center">
                                <a href="<?=_BASE_URL_.'MakeReservation/bookASeat/'.$freeSeat['id'].'/'.$options['show_id']?>">
                                    <button class="btn btn-primary btn-xl">Wybierz miejsce</button>
                                </a>
                            </td>

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
                    <h6 class="text-center text-secondary mb-0 text-danger">
                        Ten seans został wyprzedany. Zachęcamy do przejrzenia
                        <a href="<?=_BASE_URL_.'repertoire'?>">repertuaru</a>
                        , aby wybrać inny termin.
                    </h6>
                    <?php
                }
                ?>
            </div>
        </div>
        </div>
        <br>
        <br>
        <br>
        <br>