<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GET & POST</title>
</head>
<body class="font-mail">
    <div class="container">
        <div class="row mt-5">
            
            <div class="col">
                <div class="card">
                <h4 class="card-header bg-da text-white">Server Side</h4>
                    <div class="card-body">
                        <?php
                        print_r($_POST);
                            echo "<h4>{$_POST['nickname']}</h4>";
                            echo "<h4>{$_POST['age']}</h4>";
                            echo "<h4>{$_POST['height']}</h4>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>