<div class="page-section">

    <div class="container">
    <h2 class="page-section-heading text-center text-light mb-0 popover-header">Seanse w Kinie Jastrząb</h2>
        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th class="text-center">ID seansu</th>
                    <th class="text-center">Tytuł</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Godzina</th>
                    <th class="text-center">Sala</th>
                    <th class="text-center"></th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($filmShowsArray as $filmShow)
                {
                    ?>
                        <tr>
                            <td class="text-center"><?=$filmShow['id']?></td>
                            <td class="text-center"><?=$filmShow['title']?></td>
                            <td class="text-center"><?=$filmShow['date']?></td>
                            <td class="text-center"><?=$filmShow['time']?></td>
                            <td class="text-center"><?=$filmShow['hall_id']?></td>
                            <td><a class="btn btn-primary btn-xl" href="seanse.php?id=<?=$filmShow['id']?>">Pokaż rezerwacje</a></td>
                        </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>