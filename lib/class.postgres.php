<?php

class PostgreSQL{
    private $host;
    private $user;
    private $pass;
    private $dbName;
    private $link;
    private $port;


    function __construct($host, $port, $user, $pass, $dbName) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->port = $port;
        $this->connect();
    }



    function connect(){
        //echo "host=".$this->host." port=5432 dbname=".$this->dbName." user=".$this->user." password=".$this->pass;
        $this->link = pg_connect("host=".$this->host." port=".$this->port." dbname=".$this->dbName." user=".$this->user." password=".$this->pass);
    }

    function loadObjectList($query){
        $result = pg_query($this->link, $query);
        if($result){
            $array = array();
            while($row =  pg_fetch_object($result)){
                $array[] = $row;
            }
            return $array;
        } else return false;
    }

    function loadObject($query){
        $result = pg_query($this->link, $query);
        if($result){
            return pg_fetch_object($result);
        }else return false;
    }

    function fetch_assoc($query){
        $result = pg_query($this->link, $query);
        if($result){
            return pg_fetch_assoc($result);
        } else return false;
    }

    function fetch_array($query){
        $result = pg_query($this->link, $query);
        if($result){
            return pg_fetch_array($result,null,PGSQL_NUM);
        } else return false;
    }


}