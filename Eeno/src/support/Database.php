<?php

namespace Eeno\Support;


class Database {

    protected $pdo = null , 
                $error = false;
    protected $query  , 
             $sql = '',
             $results = null;

    public function __construct($database , $host ='localhost', $user ='root' , $password = '')
    {
        $this->pdo = new \PDO('mysql:dbname='.$database.';host='.$host , $user , $password);        
    }


    /**
     * 
     * Execute the raw sql query
     */
    public function raw($sql, $params= array())
    {
        $this->error = false;
        $this->sql = $sql;

        $this->query = $this->pdo->prepare($sql);

        $i=1;
        foreach ($params as $param ) 
            $this->query->bindValue($i++ , $param);

        if(!$this->query->execute())
        {
            $this->error = true;
            $this->results = null;
        }
        $this->results = $this->query->fetchAll(\PDO::FETCH_OBJ);
        $this->count = $this->query->rowCount();

    }


    /**
     * 
     * Is any error in query
     */
    public function error()
    {
        return $this->error;
    }


    public function count()
    {
        return $this->count;
    }
    

}