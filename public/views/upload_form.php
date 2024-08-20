<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FioCsv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col text-center">
                <h1>Přehled oscarů za nejlepší mužskou a ženskou hlavní roli.</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="male_csv" class="form-label">CSV soubor oscar_age_male.csv</label>
                    <div class="input-group">
                        <span class="input-group-text"><?php echo App\Services\CsvLoader::SOURCE_URL; ?></span>
                        <input type="text" readonly class="form-control readonly" id="male_csv" name="male_csv" value="oscar_age_male.csv">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="female_csv" class="form-label">CSV oscar_age_female.csv</label>
                    <div class="input-group">
                        <span class="input-group-text"><?php echo App\Services\CsvLoader::SOURCE_URL; ?></span>
                        <input type="text" readonly class="form-control readonly" id="female_csv" name="female_csv" value="oscar_age_female.csv">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-12 py-1">
                    <label for="action_csv" class="form-label">Zvolte akci</label>
                </div>
                <div class="mb-12 py-1">
                    <select class="form-select form-select-lg mb-3" name="action_csv" id="action_csv" aria-label="Zobrazit úkol">
                        <option value="1" <?php echo isset($_POST["action_csv"]) && $_POST["action_csv"] == 1 ? 'selected' : "" ?>>1) Tabulka s přehledem oscarů podle roku</option>
                        <option value="2" <?php echo isset($_POST["action_csv"]) && $_POST["action_csv"] == 2 ? 'selected' : "" ?>>2) Tabulka se seznamem filmů, které obdržely oscary za mužskou i ženskou hlavní roli</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m-3 text-center">
                <button type="submit" class="btn btn-primary">Stáhnout data a zobrazit výsledek</button>
            </div>
        </div>
    </form>
    <hr/>

    <?php
    var_export($films);
    ?>

    <?php if (isset($films)) {

        foreach ($films as $film => $entries) { ?>
            <tr>
                <td><?= $entries[0]->film ?></td>
                <td><?= $entries[0]->year ?></td>
                <td><?= $entries[0]->name ?></td>
                <td><?= $entries[1]->getFullNameWithAgeAndMovie() ?></td>
            </tr>
        <?php }
    } ?>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
