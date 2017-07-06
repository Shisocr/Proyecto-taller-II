<?php
//Esta clase hace la coneccion a la base de datos, utilizamos PDO que es la manera estandar de conectar a cualquier base de datos. Con funcion getConection() instaciamos la coneccion de manera mas segura, y retornamos una variable de nombre conection que tiene la coneccion y lista para mandarle sentencias SQL, en la function queryList(a,b) esta funcion espera recibir dos parametros una sentencia SQL y otra un Array de parametro, hace el bindparam para mantener la base de datos segura en todo momento, y retornamos el resultado de la base de datos True/False or NULL.

class PDOconnect{

    const HOST= CON_HOST;
    const DB= CON_DB;
    const USERNAME= CON_USERNAME;
    const PASSWORD= CON_PASSWORD;

    private function getConnection(){
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $host = self::HOST;
        $db = self::DB;
        $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        return $connection;
        }
    
    public function queryList($sql, $args){
      $connection = $this->getConnection();
      $stmt = $connection->prepare($sql);
      $stmt->execute($args);
      return $stmt;
    }
}

?>
