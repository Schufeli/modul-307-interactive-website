<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HippiBank: Edit</title>
    <link rel="stylesheet" href="public/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <form action="/modul-307-interactive-website/update" method="POST">
        <input type="hidden" id="id" name="id"><br>

        <label for="name">Name: *</label><br>
        <input type="text" id="name" name="name" value="<?=$customer['name'] ?? '' ?>" required><br>

        <label for="email">Email: *</label><br>
        <input type="text" id="email" name="email" value="<?=$customer['email'] ?? '' ?>" required><br>

        <label for="phone">Phonenumber: </label><br>
        <input type="tel" id="phone" name="phone" value="<?=$customer['phone'] ?? ''?>"><br>
        
        <label for="mortgage">Choose a Mortgage: *</label>
        <select name="mortgage" id="mortgage">
            <?php foreach($mortgages as $mortgage): ?>
                <option value="<?= $mortgage->id ?>"><?= $mortgage->package ?></option>
            <?php endforeach; ?>
        </select> <br>

        <label for="paystatus">Pay-Status: </label>
        <input type="checkbox" id="paystatus" name="paystatus" value="<?=$customer['completed']?>" required><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>