<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HippiBank</title>
</head>
<body>
    <?php
        foreach($errors as $error)
        {
            echo $error . '<br>';
        }
    ?>
    <form name="createForm" action="./create" method="POST">
        <label for="name">Name: *</label><br>
        <input type="text" id="name" name="name" value="<?=$name ?? ''?>" required><br>

        <label for="email">Email: *</label><br>
        <input type="text" id="email" name="email" value="<?=$email ?? ''?>" required><br>

        <label for="phone">Phonenumber: </label><br>
        <input type="tel" id="phone" name="phone" value="<?=$phone ?? ''?>"><br>
        
        <label for="risklevel">Choose a Risklevel: *</label>
        <select name="risklevel" id="risklevel" value="<?=$risklevels[$risklevel]->name ?? ''?>" required>
        <?php foreach($risklevels as $risklevel): ?>
                <option value="<?=$risklevel->id?>"><?=$risklevel->name?></option>
        <?php endforeach; ?> 
        </select> <br>
        <label for="mortgage">Choose a Mortgage: *</label>
        <select name="mortgage" id="mortgage" required>
            <?php foreach($mortgages as $mortgage): ?>
                <option value="<?=$mortgage->id?>"><?=$mortgage->package?></option>
            <?php endforeach; ?>
        </select> <br>
        <input type="submit" value="Add">
    </form>
</body>
</html>