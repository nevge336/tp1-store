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


    public function selectSql($table, $field = 'id', $sqlInnerJoin, $order = 'ASC'){
        $sql = "SELECT * FROM $table $sqlInnerJoin ORDER BY $field $order";
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
 * Fonction avec un clé primaire composée
 *//*
    public function selectComposedId($table, $product_id) {
        $sql = "SELECT * FROM $table WHERE ps_sale_id = :sale_id AND ps_product_id = :product_id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':sale_id', $sale_id);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }*/
    

    /**
     * Fonction qui retourne une ligne  une requête sql et 2 inner join
     */
    public function selectIdSql($table, $value, $field = 'id', $url='client-index', $sqlInnerJoin){
        try {
            $sql = "SELECT * FROM $table $sqlInnerJoin WHERE $field = :$field";
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$field", $value);
            $stmt->execute();
            
            $count = $stmt->rowCount();
            
            if($count == 1){
                return $stmt->fetch();
            } else {
                // Gestion d'erreur ou message approprié ici
                throw new Exception("Aucun résultat trouvé.");
            }
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données ici
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }



    /**
     * Fonction qui retourne une ligne  une requête sql et 1 inner join
     */
    public function selectInnerJoinIdSimple($table, $value, $field = 'id', $url='client-index', $table2, $value2, $value1){
        try {
            $sql = "SELECT * FROM $table INNER JOIN $table2 ON $value2 = $value1 WHERE $field = :$field";
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$field", $value);
            $stmt->execute();
            
            $count = $stmt->rowCount();
            
            if($count == 1){
                return $stmt->fetch();
            } else {
                // Gestion d'erreur ou message approprié ici
                throw new Exception("Aucun résultat trouvé.");
            }
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données ici
            echo "Erreur de base de données : " . $e->getMessage();
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
     * Fonction pour effacer un item de la table
     */
    public function delete($table, $value, $url, $field)
    {
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();

        header("location:$url.php");
    }



    /**
     * Fonction pour modifier une entrée 
     */
    public function update($table, $data, $url, $field)
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

    
    public function updateCPK($table, $data, $url, $field1, $field2)
    {
        try {
            $fieldName = null;
            foreach ($data as $key => $value) {
                $fieldName .= "$key = :$key, ";
            }
    
            $fieldName = rtrim($fieldName, ', ');
    
            $sql = "UPDATE $table SET $fieldName WHERE $field1 = :field1 AND $field2 = :field2";
    
            $stmt = $this->prepare($sql);
    
            // Assurer que $field1 et $field2 sont des variables sécurisées
            $stmt->bindValue(":field1", $field1);
            $stmt->bindValue(":field2", $field2);
    
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
    
            if ($stmt->execute()) {
                header("location:$url.php");
            } else {
                throw new Exception("Erreur lors de la mise à jour.");
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de base de données ici
            echo "Erreur de base de données : " . $e->getMessage();
        } catch (Exception $e) {
            // Gérer les autres erreurs ici, comme rediriger avec un message d'erreur
            echo "Erreur : " . $e->getMessage();
        }
    }
    


    

    
}



/**
 * header('Location: ' . $_SERVER['HTTP_REFERER']);
 */
?>