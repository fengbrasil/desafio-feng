<?php

namespace Challenger\models;

use \Challenger\db\Sql;
use \Challenger\Model;

class Product extends Model {

    public function save() {

        $sql = new Sql;
        $sql->query("INSERT INTO `tb_products` (`product`,`desproduct`,`vlprice`) VALUES (:product,:desproduct,:vlprice)", [
            ':product' => $this->getproduct(),
            ':desproduct' => $this->getdesproduct(),
            ':vlprice' => formatPriceToDB($this->getvlprice())
        ]);

    }

    public function update() {

        $sql = new Sql;
        $sql->query("UPDATE `tb_products` SET `product` = :product, `desproduct` = :desproduct, `vlprice` = :vlprice WHERE `idproduct` = :idproduct", [
            ':product' => $this->getproduct(),
            ':desproduct' => $this->getdesproduct(),
            ':vlprice' => formatPriceToDB($this->getvlprice()),
            ':idproduct' => $this->getidproduct()
        ]);

    }

    public static function listAll() {

        $sql = new Sql;
        $results = $sql->select("SELECT * FROM `tb_products`");

        return $results;

    }

    public static function get($idproduct) {

        $sql = new Sql;
        $result = $sql->select("SELECT * FROM `tb_products` WHERE `idproduct` = :idproduct", [
            ':idproduct' => $idproduct
        ]);

        return $result[0];

    }

    public static function delete($idproduct) {

        $sql = new Sql;
        $result = $sql->query("DELETE FROM `tb_products` WHERE `idproduct` = :idproduct", [
            ':idproduct' => $idproduct
        ]);

        return $result[0];

    }

}