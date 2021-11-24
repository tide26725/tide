<?php
namespace app\Model;

use app\Database\Db;

class Person extends Db {

    public function getAllPersons() {
        $sql ="SELECT 
            persons.id,
            persons.firstname,
            persons.nickname,
            persons.dob,
            persons.salary,
            refs.title as gender,
            clubs.title as club
        FROM persons 
            LEFT JOIN refs ON persons.gender_id = refs.id
            LEFT JOIN clubs ON persons.club_id = clubs.id
        ORDER BY
            persons.gender_id,
            persons.dob";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}
?>