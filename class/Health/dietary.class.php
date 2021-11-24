<?php
namespace Health;

trait Quote {
    public static function cheers() {
        echo "<h2>ขยันมากๆเลย พยามเข้านะ</h2>";
    }

    public function bye() {
        echo "<h2>แล้วเจอกันนะ</h2>";
    }
}


//check BMR, TDEE
class Dietary extends Healthy {

    use quote;

    public $nickname;
    private $age;
    public $gender;

    function __construct ($h, $w, $ex, $nickname=null, $age=null, $gender="m" ){
        $this->nickname = $nickname;
        $this->age = $age;
        $this->gender = $gender;
        parent::__construct($h, $w, $ex);
    }


    //setter
    public function setAge($age) {
        if($age <= 0){
            throw new Exception("กรุณาใส่อายุที่มากกว่า 0");
        }
        $this->age = $age;
    }
    //getter
    public function getAge() {
        return $this->age;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function bmr() {
        if($this->gender == "m") {
            $bmr = 66 + (13.7*$this->weight)+(5*$this->height)-(6.8*$this->age);
        } else {
            $bmr = 655 + (9.6*$this->weight)+(1.8*$this->height)-(4.7*$this->age);
        }
        return $bmr;
    }

    public function tdee() {
        
        switch ($this->excercise) {
            case 1;
            $tdee = $this->bmr()*1.2;
            break;
            case 2;
            $tdee = $this->bmr()*1.3;
            break;
            case 3;
            $tdee = $this->bmr()*1.4;
            break;
            case 4;
            $tdee = $this->bmr()*1.5;
            break;
            case 5;
            $tdee = $this->bmr()*1.6;
            break;
        }
        return $tdee;
    }

}
?>