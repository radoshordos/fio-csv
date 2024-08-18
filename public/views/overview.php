<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oscar Overview</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Přehled ocenění podle roku</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Rok</th>
            <th>Ženy</th>
            <th>Muži</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($years as $year => $roles): ?>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= htmlspecialchars($year) ?></td>
                    <td>
                        <?= htmlspecialchars($role['female']->getName()) ?> (<?= htmlspecialchars($role['female']->getAge()) ?>)<br>
                        <?= htmlspecialchars($role['female']->getMovie()) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($role['male']->getName()) ?> (<?= htmlspecialchars($role['male']->getAge()) ?>)<br>
                        <?= htmlspecialchars($role['male']->getMovie()) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="mt-5 mb-4">Filmy s oběma hlavními rolemi</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Název filmu</th>
            <th>Rok</th>
            <th>Herečka</th>
            <th>Herec</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($filmsWithBoth as $film): ?>
            <tr>
                <td><?= htmlspecialchars($film['movie']) ?></td>
                <td><?= htmlspecialchars($film['year']) ?></td>
                <td><?= htmlspecialchars($film['actress']) ?></td>
                <td><?= htmlspecialchars($film['actor']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
