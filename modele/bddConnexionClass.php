<?php

/**
 *
 */
class DataConnection
{
  protected $host     = "mysql:host=localhost";
  protected $dbname   = "dbname=blogJeanForteroche";
  protected $encode   = "charset=utf8";
  protected $user     = "root";
  protected $password = "root";

  public function bdd()
  {
    $bdd = new PDO($this->host.';'.$this->dbname.';'.$this->encode, $this->user,$this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
  }
}
