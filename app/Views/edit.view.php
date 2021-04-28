<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HippiBank</title>
</head>
<body>
    <form action="/modul-307-interactive-website/update" method="POST">
        <label for="name">Name: *</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email: *</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="phone">Phonenumber: </label><br>
        <input type="tel" id="phone" name="phone"><br>
        
        <label for="mortgage">Choose a Mortgage: *</label>
        <select name="mortgage" id="mortgage">
            <!-- php foreach for combobox -->
        </select> <br>

        <label for="paystatus">Pay-Status: </label>
        <input type="checkbox" id="paystatus" name="paystatus"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>