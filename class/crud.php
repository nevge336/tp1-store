<?php

class Crud extends PDO{
    
    public function __construct()
    {
        parent::__construct('mysql:host=localhost; dbname=mlab; port=3306; charset=utf8', 'root', '');
    }
    

    /**
     *  nom de tableau, id, type d'ordre
     * 
     *  fonction qui retourne une liste par ordre ascendant
     */
    public function select($table, $field = 'id', $order = 'ASC'){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }
    
    
    /**
     *  
     * fonction qui retourne les propriétés d'une ligne du tableau selon le "id"
     */
    public function selectId($table, $value, $field = 'id', $url='client-index'){
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            header("location:$url.php");
            exit;
        }
    }
    
    
    /**
     * 
     * Fonction qui insert les modification dans la base de données 
     * elle retourne le id de l'item modifié.
     */
    public function insert($table, $data){
        
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql ="INSERT INTO $table ($fieldName) VALUES ($fieldValue)";
        // return $sql;
        
        $stmt = $this->prepare($sql);
        //doit boucler pour avoir accès à toutes les values 
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        
        if($stmt->execute()){
            return $this->lastInsertId();
        } else {
            print_r($stmt->errorInfo());
        }
    }

     //on peut ajouter l'url
    /**
     * 
     */
    public function delete($table, $value, $url, $field = 'id')
    {
        $sql = "DELETE FROM $table WHERE id = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();

        header("location:$url.php");
    }



    /**
     * 
     */
    public function update($table, $data, $url, $field = 'id')
    {
        $fieldName = null;
        foreach ($_POST as $key => $value) {
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field";

        //return $sql;

        $stmt = $this->prepare($sql);

        //doit boucler pour avoir accès à toutes les values 
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if ($stmt->execute()) {
            header("location:$url.php");
        } else {
            print_r($stmt->errorInfo());
        }
    }
}

/**
 * header('Location: ' . $_SERVER['HTTP_REFERER']);
 */
?>