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
    <h1>Films with Both Person Awards</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Film</th>
            <th>Year</th>
            <th>Female Person</th>
            <th>Male Person</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($films as $film => $entries): ?>
            <tr>
                <td><?= $entries[0]->film ?></td>
                <td><?= $entries[0]->year ?></td>
                <td><?= $entries[0]->name ?></td>
                <td><?= $entries[1]->getFullNameWithAgeAndMovie() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
