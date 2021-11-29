<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/vendor/autoload.php"; ?>
<?php
use app\Model\Ref;
use app\Model\Club;
use app\Model\Person;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบข้อมูลสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .avatar {
        height: 50px;
    }
</style>
</head>
<body>
    <body class="font-mali">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white d-flex justify-content-between">
                            <h4>ระบบข้อมูลสมาชิก  CRUD</h4>
                            <a href="form.php?action=add" class="btn btn-success">เพิ่มสมาชิกใหม่</a>
                        </div>
                        <div class="card-body">
                            <form action="" class="form-inline mb-3" method="GET">
                                <div class="input-group mr-2">
                                    <div class="input-group-perpend">
                                        <div class="input-group-text">ค้นหา</div>
                                    </div>
                                    <input type="text" name="search" id="search" class="form-control" value="<?php echo isset($_REQUEST['search']) ? $_REQUEST['search'] : '';?>">
                                </div>
                                <div class="input-group mr-2">
                                    <div class="input-group-perpend">
                                        <div class="input-group-text">เพศ</div>
                                    </div>
                                    <select name="gender_id" class="form-control" id="">
                                        <option value="">ทั้งหมด</option>
                                        <?php 
                                        $refObj = new Ref;
                                        $genders = $refObj->getRefsByGroupId(2);
                                        foreach($genders as $gender) {
                                            $selected = ($gender['id']==$_REQUEST['gender_id']) ? "selected" : "";
                                            echo "<option value='{$gender['id']}' {$selected}>{$gender['title']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group mr-2">
                                    <div class="input-group-perpend">
                                        <div class="input-group-text">ชมรม</div>
                                    </div>
                                    <select name="club_id" id="" class="form-control">
                                        <option value="">ทั้งหมด</option>
                                        <?php
                                        $clubObj = new Club;
                                        $clubs = $clubObj->getAllClubs();
                                        foreach($clubs as $club) {
                                            $selected = ($club['id']==$_REQUEST['club_id']) ? "selected" : "";
                                            echo "<option value='{$club['id']}' {$selected}>{$club['title']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">ตกลง</button>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Avatar</th>
                                        <th>Firstname</th>
                                        <th>Nickname</th>
                                        <th>DOB</th>
                                        <th>Gender_id</th>
                                        <th>Club_id</th>
                                        <TH>Salary</TH>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $personObj = new Person();
                                        
                                        $filters = array_intersect_key($_REQUEST, array_flip(['search','gender_id','club_id']));
                                        $persons = $personObj->getAllPersons($filters);
                                        $n=0;
                                        foreach($persons as $person) {
                                            $n++;
                                            echo "
                                            <tr>
                                                <td>{$n}</td>
                                                <td><img src='{$person['avatar']}' class='avatar'></td>
                                                <td>{$person['firstname']}</td>
                                                <td>{$person['nickname']}</td>
                                                <td>{$person['dob']}</td>
                                                <td>{$person['gender']}</td>
                                                <td>{$person['club']}</td>
                                                <td>{$person['salary']}</td>
                                                <td><a href='form.php?id={$person['id']}&action=edit' class='mr-2 btn btn-info'>แก้ไข</td>
                                                <td><a href='save.php?id={$person['id']}&action=delete' class='btn btn-danger'>ลบ</td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</body>
</html>