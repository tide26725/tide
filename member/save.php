<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/vendor/autoload.php"; ?>
<?php 
    use app\Model\Person;
    $personObj = new Person;

    if($_REQUEST['action']=='delete'){
        $personObj->deletePerson($_REQUEST['id']);

    } elseif($_REQUEST['action']=='edit') {
        $person = $_REQUEST;
        unset($person['action']);
        $personObj->updatePerson($person);

    } elseif($_REQUEST['action']=='add') {
        $person = $_REQUEST;
        unset($person['action']);
        unset($person['id']);
        $personObj->addPerson($person);

    } 

    header("location: index.php");

?>