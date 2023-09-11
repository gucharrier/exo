<?php

class NainModel extends CoreModel {


    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT n_id AS id, n_nom AS nom FROM nain ')) !== false){
                if($req->execute()){
                    $nains = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nains;
                }
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }

    }
    public function readOne(int $id)
    {
        try 
        {
            if(($req = $this->getDb()->prepare('SELECT n_id AS id, n_nom AS nom FROM nain WHERE n_id = :id')) !== false){
                
                if(($req->bindValue('id', $id)) !==false){
                    if($req->execute()){
                        $nain = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $nain;
                    }
                }
                
            }
            return false;

        } catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }


    public function countNbNains()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(n_id) AS nbNAins FROM nain ')) !== false)
            {
                if($req->execute()){
                    $nbNains = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbNains;
                }
            }
            return false;

        } catch(PDOException $e){
            die($e->getMessage());
        }

    }
}