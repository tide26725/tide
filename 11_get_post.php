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
                    <h4 class="card-header bg-danger text-white">Client Side (User)</h4>
                    <div class="card-body">
                        <div class="mb-4"><a href="/tide/11_get_post.php?nickname=แป้ง&age=23&height=34" class="btn btn-primary">กดตรงนี้</a></div>
                        <h4>Form POST</h4>
                        <form action="12_serverside.php" method="POST">
                            <div class="form-group">
                                <label for="">Nickname</label>
                                <input type="text" name="nickname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" name="age" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">ส่วนสูง</label>
                                <input type="text" name="height" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">บันทึก</button>
                        </form>
                    </div>
                </div>
            </div>
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