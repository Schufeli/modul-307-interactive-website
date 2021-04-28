<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HippiBank</title>
</head>
<body>
    <form action="/dashboard/create" method="POST">
        <label for="name">Name: *</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email: *</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="phone">Phonenumber: </label><br>
        <input type="tel" id="phone" name="phone"><br>
        
        <label for="risklevel">Choose a Risklevel: *</label>
        <select name="risklebel" id="risklebel">
            <!-- php foreach for combobox -->
        </select> <br>
        <label for="mortgage">Choose a Mortgage: *</label>
        <select name="mortgage" id="mortgage">
            <!-- php foreach for combobox -->
        </select> <br>

        <input type="submit" value="Add">
    </form>
</body>
</html>