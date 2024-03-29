<?php 

class NainController 
{
    public function nainsList()
    {


        $model = new NainModel;
        if (isset($_GET["v_id"]))
        {
            $datas = $model->readOrigin($_GET["v_id"]);
        }
        else
        {
            $datas = $model->readAll();
        }
        // debug($datas);
        $nains = [];
        if(count($datas) > 0)
        {
            foreach($datas as $data)
            {
                $nains[] = new Nain($data);
            }
        }
        $nbNains = $model->countNbNains();
        include './Views/nains/nainsList.php';
    }
    public function nainView()
    {
        isset($_GET['id']) ? $_GET['id'] = $_GET['id'] : $_GET['id'] = 1;
        $nainModel = new NainModel;
        $nain = $nainModel->readOne($_GET['id']);
        $nain = new Nain($nain);
        include './Views/nains/nainView.php';
    }
    public function create()
    {
        include './Views/nains/create.php';
    }



    public function edit(){
        isset($_GET['id']) ? $id = $_GET['id'] : $id = 1;
        $model = new NainModel;
        $datas = $model->readOne($id);

        if(count($datas) > 0){
            $nain = new Nain($datas);
        }

        
        $villeModel = new VilleModel;
        $villeDatas = $villeModel->readAll();
        $villes = [];
        if(count($villeDatas)>0)
        {
            foreach($villeDatas as $ville)
            {
                $villes[] = new Ville($ville);
            }
        }

        $groupeModel = new GroupeModel;
        $groupeDatas = $groupeModel->readAll();
        $groupes = [];
        if(count($groupeDatas)>0)
        {
            foreach($groupeDatas as $groupe)
            {
                $groupes[] = new Ville($groupe);
            }
        }


        include './Views/nains/edit.php';
    }

    public function update($id, $request)
    {
        $model = new NainModel;
        $upd = $model->update($id, $request);

        if($upd){
            header('Location: ./index.php?editNain=success');
        }else {
            header('Location: ./index.php?editNain=error');
        }
    }



}