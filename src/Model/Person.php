<?php
namespace app\Model;

use app\Database\Db;

class Person extends Db {

    public function getAllPersons($filters=[]) {
        $where ="";

        //$filters_gender_id = isset($filters['gender_id']) ? $filters['gender_id'] :'';
        //$filters_club_id = isset($filters['club_id']) ? $filters['club_id'] :'';
        //$filters_search = isset($filters['search']) ? $filters['search'] :'';

        if(isset($filters['gender_id']) ? $filters['gender_id'] :'') {
             $where .= " AND persons.gender_id = :gender_id";
         } else {
             unset($filters['gender_id']);
         }

         if(isset($filters['club_id']) ? $filters['club_id'] :'') {
             $where .= " AND persons.club_id = :club_id";
         } else {
             unset($filters['club_id']);
         }

         if(isset($filters['search']) ? $filters['search'] :'') {
            $where .= " AND ( 
				persons.firstname LIKE :search 
				OR persons.nickname LIKE :search
			) ";
			$filters['search'] = "%{$filters['search']}%";
        } else {
            unset($filters['search']);
        }

        // if($filters_search) {
        //     $where .= "AND (persons.firstname Like :firstname
        //     OR persons.nickname Like :nickname) ";
        //     $filters_search = "%{$filters_search}%";
        // } else {
        //     unset($filters_search);
        // }

        $sql ="SELECT 
            persons.id,
            persons.firstname,
            persons.nickname,
            persons.dob,
            persons.salary,
            persons.avatar,
            refs.title as gender,
            clubs.title as club
        FROM persons 
            LEFT JOIN refs ON persons.gender_id = refs.id
            LEFT JOIN clubs ON persons.club_id = clubs.id
        WHERE
            persons.id > 0
            {$where}
            
        ORDER BY
            persons.gender_id,
            persons.dob";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($filters);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function addPerson($person) {
        $sql = "
        INSERT INTO persons (
            firstname, 
            nickname, 
            dob, 
            gender_id, 
            club_id, 
            avatar,
            salary

        ) VALUES (
            :firstname, 
            :nickname, 
            :dob, 
            :gender_id, 
            :club_id, 
            :avatar,
            :salary

        )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($person);
        return $this->pdo->lastInsertId();
    }

    public function deletePerson($id) {
        $sql = "
        DELETE FROM persons WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public function getPersonById($id) {
        $sql ="SELECT 
            persons.id,
            persons.firstname,
            persons.nickname,
            persons.dob,
            persons.salary,
            persons.gender_id,
            persons.avatar,
            persons.club_id
        FROM persons 

        WHERE persons.id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }

    public function updatePerson($person) {
        $sql = "
        UPDATE persons SET 
            firstname = :firstname, 
            nickname = :nickname, 
            dob = :dob, 
            gender_id = :gender_id, 
            club_id = :club_id, 
            avatar = :avatar,
            salary = :salary
        WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($person);
        return true;
    }

}
?>