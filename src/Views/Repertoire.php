<?php
declare(strict_types=1);

if(isset($_SESSION['info']))
{
    echo $_SESSION['info'];
    unset($_SESSION['info']);
}

if(!isset($_SESSION['username']) OR (isset($_SESSION['banned']) AND $_SESSION['banned']===1))
{
    ?>
    <div class="page-section">
        <div class="container">



            <div class="table-responsive table-responsive-sm table-dark table-responsive-md table-responsive-lg table-responsive-xl">
                <h2 class="page-section-heading text-center text-light mb-0 popover-header">Zapraszamy do przejrzenia repertuaru naszego kina</h2>
                <a class="btn bg-dark text-light" href="<?=$showResult1?>"><?=$resultRangeName1?></a>
                <a class="btn bg-dark text-light" href="<?=$showResult2?>"><?=$resultRangeName2?></a>
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
                    <?php
                    if (is_array($shows) &&sizeof($shows) != 0) {
                    foreach ($shows as $show)
                    {
                        ?>
                        <tr>
                            <td class="text-center"><?=$show['title']?></td>
                            <td class="text-center"><?=$show['date']?></td>
                            <td class="text-center"><?=$show['time']?></td>
                            <td class="text-center"><?=$show['genre']?></td>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                } else {
                    ?>

                    <tr>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>

                    </tr>
                    </tbody>
                    </table>
                    <br>
                    <h6 class="text-center text-secondary mb-0 text-danger">Dla wybranego okresu brak seansów w repertuarze.</h6>
                    <br>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="page-section">
        <div class="container">




            <div class="table-responsive table-responsive-sm table-dark table-responsive-md table-responsive-lg table-responsive-xl">
                <h2 class="page-section-heading text-center text-light mb-0 popover-header">Zapraszamy do przejrzenia repertuaru naszego kina</h2>
                <a class="btn bg-dark text-light" href="<?=$showResult1?>"><?=$resultRangeName1?></a>
                <a class="btn bg-dark text-light" href="<?=$showResult2?>"><?=$resultRangeName2?></a>



                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th class="text-center">Tytuł</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Godzina</th>
                        <th class="text-center">Gatunek</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (is_array($shows) && sizeof($shows) != 0) {
                    foreach ($shows as $show)
                    {
                        ?>
                        <tr>
                            <td class="text-center"><?=$show['title']?></td>
                            <td class="text-center"><?=$show['date']?></td>
                            <td class="text-center"><?=$show['time']?></td>
                            <td class="text-center"><?=$show['genre']?></td>
                            <td class="text-center"><a class="btn btn-primary btn-xl" href="rezerwacja.php?id=<?=$show['id']?>">Zarezerwuj miejsca</a></td>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                } else {
                    ?>
                    <tr>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>

                    </tr>



                    </tbody>
                    </table>

                    <h6 class="text-center text-secondary mb-0 text-danger">Dla wybranego okresu brak seansów w repertuarze.</h6>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}