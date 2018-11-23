<?php

namespace Challenger\models;

use \Challenger\db\Sql;
use \Challenger\Model;

class Request extends Model {

    const SESSION = 'Cart';

    public static function start($idclient) {

        if (!isset($_SESSION[Request::SESSION]))
        {
            $_SESSION[Request::SESSION] = [];

            $sql = new Sql;
            $sql->query("INSERT INTO `tb_requests` (`idclient`) VALUES (:idclient)", [
                ':idclient' => $idclient
            ]);
        }

        $sql = new Sql;
        $result = $sql->select("SELECT * FROM `tb_requests` ORDER BY `idrequest` DESC");

        return (int)$result[0]['idrequest'];
    }

    public function save() {

        $cart = json_decode($this->getcart(), true);

        foreach ($cart as $data) {
           
            $sql = new Sql;
            $sql->query("INSERT INTO `tb_requestsproducts` (`idrequest`,`idproduct`,`nrqtd`) VALUES (:idrequest,:idproduct,:nrqtd)", [
                ':idproduct' => (int)$data['idproduct'],
                ':nrqtd' => (int)$data['qtd'],
                ':idrequest' => (int)$this->getidrequest()
            ]);
        }

        unset($_SESSION[Request::SESSION]);
    }

    public function update() {

        //CRUD INCOMPLETO

    }

    public static function listAll() {

        $sql = new Sql;
        $results = $sql->select("SELECT * FROM `tb_requests` INNER JOIN `tb_clients` USING (idclient)");

        return $results;

    }

    public static function get($idrequest) {

        $sql = new Sql;
        $result = $sql->select("SELECT * FROM `tb_requests` INNER JOIN `tb_requestsproducts` USING (idrequest) INNER JOIN `tb_clients` USING (idclient) INNER JOIN `tb_products` USING (`idproduct`) WHERE idrequest = :idrequest", [
            ':idrequest' => $idrequest
        ]);

        return $result;

    }

    public static function delete($idproduct) {

        $sql = new Sql;
        $result = $sql->query("DELETE FROM `tb_products` WHERE `idproduct` = :idproduct", [
            ':idproduct' => $idproduct
        ]);

        return $result[0];

    }

}