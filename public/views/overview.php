<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Person Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Person Overview by Year</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Year</th>
            <th>Female Person</th>
            <th>Male Person</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($overview as $year => $entries): ?>
            <tr>
                <td><?= $year ?></td>
                <td>
                    <?= $entries['female']->name ?> (<?= $entries['female']->age ?>)<br>
                    <em><?= $entries['female']->film ?></em>
                </td>
                <td>
                    <?= $entries['male']->name ?> (<?= $entries['male']->age ?>)<br>
                    <em><?= $entries['male']->film ?></em>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
