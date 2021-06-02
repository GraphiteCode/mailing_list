<?php
require_once 'model/class.dbh.php';

class Subs extends Dbh
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function checkDuplicates($email)
    {
        $sql = "SELECT count(*) FROM subscribers WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $this->duplicates = $stmt->fetchColumn();
    }

    public function insertSubs($email)
    {
        $sql = "INSERT INTO subscribers (email) VALUES (:email) ";
        $this->pdo->prepare($sql)->execute([$email]);
    }
}
