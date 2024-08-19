<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Films with Both Person Awards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <td><?= $film ?></td>
                <td><?= $entries[0]->year ?></td>
                <td><?= $entries[0]->name ?></td>
                <td><?= $entries[1]->name ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
