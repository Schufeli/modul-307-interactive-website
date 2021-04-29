<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/create.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>HippiBank</title>
</head>
<body>
    <div class="container">
    <div class="wrapper">
    <form name="createForm" action="./create" method="POST">
        <label for="name">Name: *</label><br>
        <input type="text" id="name" name="name" value="<?=$name ?? ''?>" required><br>

        <label for="email">Email: *</label><br>
        <input type="text" id="email" name="email" value="<?=$email ?? ''?>" required><br>

        <label for="phone">Phonenumber: </label><br>
        <input type="tel" id="phone" name="phone" value="<?=$phone ?? ''?>"><br>
        
        <label for="risklevel">Choose a Risklevel: *</label>
        <select name="risklevel" id="risklevel" required onchange="calculateFinishDate()">
            <?php foreach($risklevels as $risklevel): ?>
                <option 
                <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    if ($_POST['risklevel'] == $risklevel->id) 
                    { ?>
                        selected="true" 
                    <?php }; 
                }?> value="<?=$risklevel->id?>"><?=$risklevel->name?></option>
            <?php endforeach; ?> 
        </select> <br>
        <label for="mortgage">Choose a Mortgage: *</label>
        <select name="mortgage" id="mortgage" required>
            <?php foreach($mortgages as $mortgage): ?>
                <option 
                <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST') 
                {
                    if ($_POST['mortgage'] == $mortgage->id) 
                    { ?>
                        selected="true" 
                    <?php }; 
                }?> 
                
                value="<?=$mortgage->id?>">
                    <?=$mortgage->package?>
                </option>
            <?php endforeach; ?>
        </select> <br>
        <label for="dateOuput">Pay-Date</label>
        <input id="dateOutput" type="text" disabled><br><br>
        <input type="submit" value="Add">
    </form>
    <ul id="errorList"></ul>
    </div>
    </div>
    <script src="public/js/create.js"></script>
</body>
</html>