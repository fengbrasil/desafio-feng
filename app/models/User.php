<?php

namespace Challenger\models;

use \Challenger\db\Sql;
use \Challenger\Model;

class User extends Model {

    const SESSION = "User";

    public static function getFromSession()
    {

        $user = new User();

        if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0)
        {
            $user->setData($_SESSION[User::SESSION]);
        }

        return $user;

    }

    public static function checkLogin()
    {
        
        if (
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]["iduser"] > 0
        )
        {
            return false;
        } else
        {
            return true;
        }
    }

    public static function login($login, $password)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.deslogin = :LOGIN
        ", array(
            ":LOGIN" => $login
        ));

        if (count($results) === 0)
        {
            echo "<script>alert('Usuário inexistente ou senha inválida.')</script>";
            echo "<script>window.history.back();</script>";
            exit;
        }

        $data = $results[0];

        if (password_verify($password, $data["despassword"]))
        {
            $user = new User();

            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;

        } else {
            echo "<script>alert('Usuário inexistente ou senha inválida.')</script>";
            echo "<script>window.history.back();</script>";
            exit;
        }

    }

    public static function verifyLogin()
    {
        
        if (!User::checkLogin())
        {
            header("Location: /login");
            exit;
        }
        return true;
    }

    public static function getFromDB()
    {
        $sql = new Sql;

        $result = $sql->select("SELECT * FROM `tb_users` INNER JOIN `tb_persons` USING(`idperson`) WHERE `iduser` = :iduser", [
            ':iduser' => (int)$_SESSION[User::SESSION]['iduser']
        ]);

        return $result; 
        
    }

    public static function logout()
    {
        $_SESSION[User::SESSION] = null;
    }

    public static function listAll()
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
    }

    public function get($iduser)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", [
            ":iduser"=>$iduser
        ]);
        
        return $results[0];

    }

    public function update()
    {
        $sql = new Sql;

        $sql->query(
            "UPDATE `tb_persons`
            SET `desperson` = :desperson, `desocupation` = :desocupation, `desemail` = :desemail, `desavatar` = :desavatar
            WHERE `idperson` = :idperson", [
                ':desperson' => $this->getdesperson(),
                ':desocupation' => $this->getdesocupation(),
                ':desemail' => $this->getdesemail(),
                ':desavatar' => $this->getdesavatar(),
                ':idperson' => (int)$this->getidperson()
            ]);


        $sql = new Sql;

        $sql->query(
            "UPDATE `tb_users`
            SET
            `deslogin` = :deslogin,
            `accesslevel` = :accesslevel
            WHERE `iduser` = :iduser
            ", [
                ':deslogin' => $this->getdeslogin(),
                ':accesslevel' => $this->getaccesslevel(),
                ':iduser' => (int)$this->getiduser()
            ]);
    }

    public function delete()
    {
        $sql = new Sql;
        $result = $sql->select("SELECT * FROM `tb_persons` WHERE `idperson` = :idperson",[
            ':idperson' => (int)$this->getidperson()
        ]);
        if ($result[0]['desavatar'] != '')
        {
            $directory = $_SERVER['DOCUMENT_ROOT']
            .getSiteInfo('despath')
            .DIRECTORY_SEPARATOR."images"
            .DIRECTORY_SEPARATOR."users";

            unlink($directory.DIRECTORY_SEPARATOR."picture".DIRECTORY_SEPARATOR.$result[0]['desavatar']);
            unlink($directory.DIRECTORY_SEPARATOR."thumbnail".DIRECTORY_SEPARATOR.$result[0]['desavatar']);
        }

        $sql = new Sql;
        $sql->query("DELETE FROM `tb_users` WHERE `idperson` = :idperson", [
            ':idperson' => (int)$this->getidperson()
        ]);

        $sql = new Sql;
        $sql->query("DELETE FROM `tb_persons` WHERE `idperson` = :idperson", [
            ':idperson' => (int)$this->getidperson()
        ]);

    }

    public function setPhoto($file, $delete = false)
    {
        $directory = $_SERVER['DOCUMENT_ROOT']
        .getSiteInfo('despath')
        .DIRECTORY_SEPARATOR."images"
        .DIRECTORY_SEPARATOR."users";

        if ($delete)
        {
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM tb_users INNER JOIN tb_persons USING(idperson) WHERE `iduser` = :iduser", [
                ":iduser"=>$this->getiduser()
            ]);
            $oldPicture = $results[0]['desavatar'];
        }

        $this->setdesavatar(Picture::uploadPicture($file, $directory, $oldPicture, true));
    }
}
?>