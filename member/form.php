
<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/vendor/autoload.php"; ?>
<?php 
use app\Model\Person;
use app\Model\Club;
use app\Model\Ref;

$person['firstname']="";
$person['nickname']="";
$person['dob']="";
$person['gender_id']="";
$person['club_id']="";
$person['salary']="";

if($_REQUEST['action']=='edit') {
    $personObj = new Person;
    $person = $personObj->getPersonById($_REQUEST['id']);
} 


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
            height: 100px;
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
                            <h4>แบบฟอร์ม <?php echo ($_REQUEST['action']=='edit') ? "แก้ไขข้อมูลสมาชิก":"เพิ่มสมาชิกใหม่" ?></h4>
                            <a href="index.php" class="btn btn-success">ย้อนกลับ</a>
                        </div>
                        <div class="card-body">
                            <form action="save.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="<?php echo ($_REQUEST['action']=='edit') ? "edit":"add"; ?>">
                                <input type="hidden" name="id" value="<?php echo $person['id'];?>">
                                <div class="form-group">
                                    <label for="firstname">ชื่อจริง</label>
                                   <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $person['firstname']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nickname">ชื่อเล่น
                                    </label>
                                   <input type="text" name="nickname" id="nickname" class="form-control" value="<?php echo $person['nickname']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dob">วันเกิด
                                    </label>
                                   <input type="text" name="dob" id="dob" class="form-control" value="<?php echo $person['dob']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="gender">เพศ
                                    </label>
                                    <select name="gender_id" class="form-control" id="">
                                        <option value="">เลือก</option>
                                        <?php 
                                        $refObj = new Ref;
                                        $genders = $refObj->getRefsByGroupId(2);
                                        foreach($genders as $gender) {
                                            $selected = ($gender['id']==$person['gender_id']) ? "selected" : "";
                                            echo "<option value='{$gender['id']}' {$selected}>{$gender['title']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="club_id">ชมรม
                                    </label>
                                    <select name="club_id" id="" class="form-control">
                                        <option value="">เลือก</option>
                                        <?php
                                        $clubObj = new Club;
                                        $clubs = $clubObj->getAllClubs();
                                        foreach($clubs as $club) {
                                            $selected = ($club['id']==$person['club_id']) ? "selected" : "";
                                            echo "<option value='{$club['id']}' {$selected}>{$club['title']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="salary">เงินเดือน
                                    </label>
                                   <input type="text" name="salary" id="salary" class="form-control" value="<?php echo $person['salary']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="upload">รูปภาพ
                                    </label>
                                   <input type="file" name="upload" id="upload" class="form-control">
                                   <input type="hidden" name="avatar" id="avatar" value="<?php echo $person['avatar']; ?>">
                                   <img src="<?php echo $person['avatar']; ?>" class = "avatar" >
                                </div>
                                <button class="vtn btn-success" type="submit">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</body>
</html>