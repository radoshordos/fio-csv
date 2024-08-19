<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload CSV Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Upload Person Data</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="female_csv" class="form-label">Female Person CSV</label>
            <input type="text" class="form-control" id="female_csv" name="female_csv" value="https://people.sc.fsu.edu/~jburkardt/data/csv/oscar_age_female.csv" required readonly>
        </div>
        <div class="mb-3">
            <label for="male_csv" class="form-label">Male Person CSV</label>
            <input type="text" class="form-control" id="male_csv" name="male_csv" value="https://people.sc.fsu.edu/~jburkardt/data/csv/oscar_age_male.csv" required readonly>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
</body>
</html>
