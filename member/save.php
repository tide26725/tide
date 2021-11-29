<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/vendor/autoload.php"; ?>
<?php 
    use app\Model\Person;
    $personObj = new Person;

    if($_FILES['upload']['name']) {
        $ext = end(explode(".",$_FILES['upload']['name']));
        $avatar = "/tide/member/avatars/".md5(uniqid()) . ".{$ext}";
        move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].$avatar);
    }

    //echo $_FILES['upload']['tmp_name'];
    
    //echo $ext;
    //var_dump($_FILES);

    
    //echo $avatar;

    


    if($_REQUEST['action']=='delete'){
        $person = $personObj->getPersonById($_REQUEST['id']);
        if($person['avatar']) {
            //ลบรูปเก่า
            unlink($_SERVER['DOCUMENT_ROOT'].$person['avatar']);
        }
        $personObj->deletePerson($_REQUEST['id']);

    } elseif($_REQUEST['action']=='edit') {
        $person = $_REQUEST;
        unset($person['action']);

        if ($_FILES['upload']['name']) {
            if($person['avatar']) {
                //ลบรูปเก่า
                unlink($_SERVER['DOCUMENT_ROOT'].$person['avatar']);
            }
            

            $person['avatar'] =  $avatar ;
        }
        
        $personObj->updatePerson($person);

    } elseif($_REQUEST['action']=='add') {
        $person = $_REQUEST;
        unset($person['action']);
        unset($person['id']);

        $person['avatar'] = $avatar;
        $personObj->addPerson($person);

    } 

    header("location: index.php");

?>