<h2>Přehled Oscarů podle roku</h2>
<table class="table table-bordered mt-4">
    <thead>
    <tr>
        <th>Rok</th>
        <th>Ženy</th>
        <th>Muži</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($oscarData as $year => $data): ?>
        <tr>
            <td><?php echo htmlspecialchars($year); ?></td>
            <td>
                <?php if (!empty($data['female'])): ?>
                    <?php foreach ($data['female'] as $female): ?>
                        <?php echo htmlspecialchars($female['name']) . " (" . htmlspecialchars($female['age']) . ")<br>" . htmlspecialchars($female['movie']) . "<br>"; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if (!empty($data['male'])): ?>
                    <?php foreach ($data['male'] as $male): ?>
                        <?php echo htmlspecialchars($male['name']) . " (" . htmlspecialchars($male['age']) . ")<br>" . htmlspecialchars($male['movie']) . "<br>"; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h2>Filmy s Oscary za mužskou i ženskou hlavní roli</h2>
<table class="table table-bordered mt-4">
    <thead>
    <tr>
        <th>Název filmu</th>
        <th>Rok</th>
        <th>Herečka</th>
        <th>Herec</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($movieData as $movie): ?>
        <tr>
            <td><?php echo htmlspecialchars($movie['title']); ?></td>
            <td><?php echo htmlspecialchars($movie['year']); ?></td>
            <td><?php echo htmlspecialchars($movie['female']); ?></td>
            <td><?php echo htmlspecialchars($movie['male']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>