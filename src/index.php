<?php

use Model\ReaderCsv;
use Model\Sorting;

include_once "Model/Person.php";
include_once "Model/ReaderCsv.php";
include_once "Model/Sorting.php";
?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIO CSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <h1>Přehled oscarů za nejlepší mužskou a ženskou hlavní roli.</h1>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <input type="url" class="form-control" name="url_male" id="url_male" value="https://people.sc.fsu.edu/~jburkardt/data/csv/oscar_age_male.csv" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <input type="url" class="form-control" name="url_female" id="url_female" value="https://people.sc.fsu.edu/~jburkardt/data/csv/oscar_age_female.csv" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <select class="form-select" name="sort_type" id="sort_type" aria-label="Zobrazit úkol">
                    <option value="1" <?php echo isset($_POST["sort_type"]) && $_POST["sort_type"] == 1 ? 'selected' : "" ?>>1) Tabulka s přehledem oscarů podle roku</option>
                    <option value="2" <?php echo isset($_POST["sort_type"]) && $_POST["sort_type"] == 2 ? 'selected' : "" ?>>2) Tabulka se seznamem filmů, které obdržely oscary za mužskou i ženskou hlavní roli</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col m-3">
                <button type="submit" class="btn btn-primary">Stáhnout data</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col m-3">
            <?php

            if (isset($_POST["sort_type"])) {

                $csv = new ReaderCsv();
                $male = $csv->readCsv($csv->loadSource($_POST['url_male']));
                $female = $csv->readCsv($csv->loadSource($_POST['url_female']));
                $sort = new Sorting($male, $female);
                $sm = $sort->getOscarsByYearMale();

                if ($_POST["sort_type"] == 1) { ?>
                    <table class="table table-striped">
                        <?php foreach ($sort->getOscarsByYearFemale() as $row) { ?>
                            <tr>
                                <td><?= $row['year'] ?></td>
                                <td><?= $sm[$row['year']]['fullname'] ?><br><?= $sm[$row['year']]['movie'] ?></td>
                                <td><?= $row['fullname'] ?><br><?= $row['movie'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php }
                elseif ($_POST["sort_type"] == 2) { ?>
                    <table class="table table-striped">
                        <?php foreach ($sort->filmsWithBothAwards() as $row) { ?>
                            <tr>
                                <td><?= $row['movie'] ?></td>
                                <td><?= $row['year'] ?></td>
                                <td><?= $row['female'] ?></td>
                                <td><?= $row['male'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php }


            }


            ?>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>