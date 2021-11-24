<?php
namespace Health;
//check BMI, FAT
class Healthy {
    public $height;
    protected $weight;
    public $excercise;

    const MAX_WEIGHT = 200; //เปลี่ยนค่าไม่ได้

    public static $greetings ="รู้ตัวไหมคุณ";

    function __construct($h=0, $w=null, $ex=null){
        $this->height = $h;
        $this->weight = $w;
        $this->excercise = $ex;

        if($w > self::MAX_WEIGHT) {
            throw new Exception("กรุณาอย่าใส่น้ำหนักเกิน 200");
        }
        $this->weight = $w;
    }

    public function bmi() {
        $h = $this->height/100;
        $bmi = $this->weight/($h*$h);
        return $bmi;
    }

    public function fat() {
        $bmi = $this->bmi();
        if($bmi >= 30) {
            $result = "อ้วนมาก";
        }else if ($bmi >= 25) {
            $result = "อ้วน";
        }else if ($bmi >= 23) {
            $result = "น้ำหนักเกิน";
        }else if ($bmi >= 18.5) {
            $result = "น้ำหนักปกติ";
        }else {
            $result = "ผอมเกินไป";
        }
        return self::$greetings.$result;
    }
}
?>