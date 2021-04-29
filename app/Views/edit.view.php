<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HippiBank: Edit</title>
    <link rel="stylesheet" href="public/css/edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <h1>Edit</h1>
            <form action="./update" method="POST">
                <input type="hidden" id="id" name="id" value="<?= $customer->id ?? '' ?>"><br>

                <label for="name">Name: *</label><br>
                <input type="text" id="name" name="name" value="<?=$customer->name ?? '' ?>" required><br>

                <label for="email">Email: *</label><br>
                <input type="text" id="email" name="email" value="<?=$customer->email ?? '' ?>" required><br>

                <label for="phone">Phonenumber: </label><br>
                <input type="tel" id="phone" name="phone" value="<?=$customer->phone ?? ''?>"><br>
                
                <label for="mortgage">Choose a Mortgage: *</label><br>
                <select name="mortgage" id="mortgage">
                    <?php foreach($mortgages as $mortgage): ?>
                        <option <?php 
                            if ($customer->mortgageId == $mortgage->id) 
                            { ?>
                                selected="true" 
                            <?php }; ?>
                        value="<?= $mortgage->id ?>"><?= $mortgage->package ?></option>
                    <?php endforeach; ?>
                </select> <br>
                        
                <label for="risklevel">Risklevel: </label>
                <input type="text" name="risklevel" id="risklevel" value="<?= $risklevels[$customer->risklevelId]->name ?>" disabled>

                <label for="created">Created on: </label>
                <input type="text" name="created" value="<?= $customer->start ?>" disabled>

                <label for="finished">Finished by: </label>
                <input type="text" name="finished" value="<?= $customer->finish ?>" disabled>

                <div>
                    <label for="completed">Pay Completed: </label>
                    <input type="checkbox" id="completed" name="completed" value="<?= $customer->completed ?? '' ?>">
                </div>
                
                <input type="submit" value="Update">
            </form>
            <ul id="errorList"></ul>
        </div>
    </div>
    <script src="public/js/edit.js"></script>
</body>
</html>