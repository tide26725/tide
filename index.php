<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/inc/autoload.php"; ?>
<?php //require $_SERVER["DOCUMENT_ROOT"]."/tide/class/health/dietary.class.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <body class="font-mali">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="card mb-3">
                        <h4 class="card-header bg-primary text-white">OOP</h4>
                        <div class="card-body">
                            <?php

                                use Health\Healthy;
                                use Health\Dietary;

                                $jane = new Healthy(173, 52);
                                //$jane->height = 173;
                                //$jane->weight = 52;
                                $noon = new Healthy(165, 55);
                                //$noon->height = 165;
                                //$noon->weight = 55;
                                $bow = new Dietary(164, 66, 3);
                                $bow->nickname = "โบว์";
                                $bow->setAge(10);
                                $bow->gender = "f";

                                echo "<p>เจน มีความสูง: {$jane->height} cm.
                                
                                BMI: {$jane->bmi()}
                                ผล: {$jane->fat()}</p>";

                                echo "<p>นุ่น มีความสูง: {$noon->height} cm. 
                                
                                BMI: {$noon->bmi()}
                                ผล: {$noon->fat()}</p>";

                                echo "<p>{$bow->nickname} อายุ: {$bow->getAge()} มีความสูง: {$bow->height} cm. 
                                มีน้ำหนัก: {$bow->getWeight()} kg.
                                BMI: {$bow->bmi()}
                                ผล: {$bow->fat()}
                                BMR: {$bow->bmr()}
                                TDEE: {$bow->tdee()}</p>";
                                
                                echo "<h2>น้ำหนักสูงสุดไม่เกิน";
                                echo Healthy::MAX_WEIGHT;
                                echo "</h2>";

                                echo "<h2>-----";
                                echo Healthy::$greetings;
                                echo "</h2>";

                                Dietary::cheers();
                                $bow->bye();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</body>
</html>