<?php

class UserModel extends CoreModel {

    public function readAll()
    {
        try 
        {
            if(($req = $this->getDb()->query('SELECT id, nom, email FROM user')) !== false)
            {
                    if($req->execute())
                    {
                        $users = $req->fetchAll(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $users;
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
            if(($req = $this->getDb()->prepare(
                '   SELECT id, nom, email, mdp
                    FROM user
                    WHERE id = :id')) !== false)
            { 
                if(($req->bindValue('id', $id)) !==false)
                {
                    if($req->execute())
                    {
                        $user = $req->fetch(PDO::FETCH_ASSOC);
                        $req->closeCursor();
                        return $user;
                    }
                }   
            }
            return false;
        } 
        catch(PDOException $e) 
        {
            die($e->getMessage());
        }
    }

    public function insert($request)
    {
        try{
            $query = 'INSERT INTO user (nom, email, mdp) VALUES (:nom,:email,:mdp)';
            if(($this->_req = $this->getDb()->prepare($query)) !== false)
            {
                if(($this->_req->bindValue('nom', $request['nom']) 
                && $this->_req->bindValue('email', $request['email'])
                && $this->_req->bindValue('mdp', $request['mdp'])))
                {
                    $this->_req->execute();
                    $this->_req->closeCursor();
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function update($id, $request)
    {

        try{
            $query = 'UPDATE user SET nom = :nom, email = :email WHERE id = :id';
            if(($this->_req = $this->getDb()->prepare($query)) !== false)
            {
                if(($this->_req->bindValue('nom', $request['nom']) 
                && $this->_req->bindValue('email', $request['email'])
                && $this->_req->bindValue('id', $id )))
                {
                    if($this->_req->execute())
                    {
                        $res = $this->_req->rowCount();
                        return $res;
                    }
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }


    public function countNbUsers()
    {
        try
        {
            if(($req = $this->getDb()->prepare(' SELECT COUNT(id) AS nbUsers FROM user ')) !== false)
            {
                if($req->execute())
                {
                    $nbUsers = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $nbUsers;
                }
            }
            return false;
        } 
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
}