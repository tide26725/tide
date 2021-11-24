<?php require $_SERVER["DOCUMENT_ROOT"]."/tide/vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Connetion</title>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Firstname</th>
                                        <th>Nickname</th>
                                        <th>DOB</th>
                                        <th>Gender_id</th>
                                        <th>Club_id</th>
                                        <TH>Salary</TH>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        use app\Model\Person;

                                        $personObj = new Person();
                                        
                                        $persons = $personObj->getAllPersons();
                                        $n=0;
                                        foreach($persons as $person) {
                                            $n++;
                                            echo "
                                            <tr>
                                                <td>{$n}</td>
                                                <td>{$person['firstname']}</td>
                                                <td>{$person['nickname']}</td>
                                                <td>{$person['dob']}</td>
                                                <td>{$person['gender']}</td>
                                                <td>{$person['club']}</td>
                                                <td>{$person['salary']}</td>
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