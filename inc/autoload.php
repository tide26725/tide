<?php
// ฟังกืชั่นนี้ทำงานทันทีเมื่อมีการเรียกใช้ class อัตโนมัติ

spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once $_SERVER["DOCUMENT_ROOT"]."/tide/class/".$className.'.class.php';
});



?>