<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/vendor/autoload.php"; ?>
<?php
use app\Model\User;

$user_obj = new User;
$result = $user_obj->createUser($_POST);
if($result) {
    header("location: /tide/member/index.php");
} else {
    header("location: register.php?msg=error");
}
?>