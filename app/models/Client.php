<?php

namespace Challenger\models;

use \Challenger\db\Sql;
use \Challenger\Model;

class Client extends Model {

    public function save() {

        $sql = new Sql;
        $sql->query("INSERT INTO `tb_clients` (`desclient`,`climail`,`cliphone`) VALUES (:desclient,:climail,:cliphone)", [
            ':desclient' => $this->getdesclient(),
            ':climail' => $this->getclimail(),
            ':cliphone' => $this->getcliphone()
        ]);

    }

    public function update() {

        $sql = new Sql;
        $sql->query("UPDATE `tb_clients` SET `desclient` = :desclient, `climail` = :climail, `cliphone` = :cliphone WHERE `idclient` = :idclient", [
            ':desclient' => $this->getdesclient(),
            ':climail' => $this->getclimail(),
            ':cliphone' => $this->getcliphone(),
            ':idclient' => $this->getidclient()
        ]);

    }

    public static function listAll() {

        $sql = new Sql;
        $results = $sql->select("SELECT * FROM `tb_clients`");

        return $results;

    }

    public static function get($idclient) {

        $sql = new Sql;
        $result = $sql->select("SELECT * FROM `tb_clients` WHERE `idclient` = :idclient", [
            ':idclient' => $idclient
        ]);

        return $result[0];

    }

    public static function delete($idclient) {

        $sql = new Sql;
        $result = $sql->query("DELETE FROM `tb_clients` WHERE `idclient` = :idclient", [
            ':idclient' => $idclient
        ]);

        $sql = new Sql;
        $results = $sql->select("SELECT * FROM `tb_requests` WHERE `idclient` = :idclient", [
            ':idclient' => $idclient
        ]);

        foreach ($results as $key => $value)
        {
            $sql = new Sql;
            $result = $sql->query("DELETE FROM `tb_requestsproducts` WHERE `idrequest` = :idrequest", [
                ':idrequest' => (int)$value['idrequest']
            ]);
        }

        $sql = new Sql;
        $result = $sql->query("DELETE FROM `tb_requests` WHERE `idclient` = :idclient", [
            ':idclient' => $idclient
        ]);

    }

}