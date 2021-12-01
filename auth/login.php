<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="font-mali vh-100 d-flex justify-content-center align-items-center">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h4>เข้าสู่ระบบ</h4>
        </div>
        <div class="card-body">
            <form action="checkLogin.php" class="mb-3" method="post">
                <?php
                if(isset($_GET['msg']) ? $_GET['msg'] : '') {
                    echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้องกรุณาลองอีกครั้ง</h5>";
                }
                ?>
                <div class="form-body">
                    <label for="name">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="form-body">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="register.php">สมัครใช้งาน</a>
        </div>
    </div>
    
</body>
</html>