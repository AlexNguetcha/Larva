<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>

<body>
    <div class="contain">
        <table class="table table-striped table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                </tr>
            </thead>
            <?php for ($i = 0; $i < count($params["users"]); $i++) : $user = $params["users"][$i]; ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getAge() ?></td>
                </tr>

            <?php endfor; ?>
        </table>
    </div>


    <script src="http://localhost/vendor/components/jquery/jquery.js"></script>
    <script src="http://localhost/vendor/rsportella/popper/packages/popper/src/index.js"></script>
    <script src="http://localhost/vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>