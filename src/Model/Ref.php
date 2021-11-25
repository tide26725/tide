<?php
namespace app\Model;

use app\Database\Db;

class Ref extends Db {

    public function getRefsByGroupId($id) {
        $sql ="
        SELECT 
            refs.id,
            refs.title
        FROM 
            refs 
        WHERE 
            refs.ref_group_id = '{$id}'
        ORDER BY
            id";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}
?>