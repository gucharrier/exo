<?php 
if(!empty($nain)) :
?>
<div class="section">
  <div class="card is-shadowless">
    <div class="card-content">
      <div class="title">
        <?= $nain->getNom().", ".$nain->getBarbe() ?>
      </div>

      <p>Originaire de 
        <a href="index.php?ctrl=ville&action=villeView&id=<?= $nain->getV_id() ?>">
          <?= $nain->getVille() ?>
        </a>
      </p>

      <?php 
      if ($nain->getTaverne() != "0") :
      ?>
        <p>Boit dans 
          <a href="index.php?ctrl=taverne&action=taverneView&id=<?=$nain->getT_id()?>">
            <?=$nain->getTaverne()?>
          </a>
        </p>

      <?php 
      endif; 

      if($nain->getGroupe() != "0"):
      ?>
        <p>Travaille de <?= $nain->getDebut()." à ".$nain->getFin() ?>
          dans le tunnel de 
          <a href="index.php?ctrl=ville&action=villeView&id=<?= $nain->getDepartId()?>"><?= $nain->getDepart()?></a>
          à 
          <a href="index.php?ctrl=ville&action=villeView&id=<?=$nain->getArriveeId()?>"><?=$nain->getArrivee()?></a>
        </p>
        <p>Membre du groupe 
          <a href="index.php?ctrl=groupe&action=groupeView&id=<?= $nain->getGroupe() ?>">
            n° <?= $nain->getGroupe()?>
          </a>
        </p>  
      <?php 
      else : 
      ?>  
        <p>Aucun groupe</p>
      <?php 
      endif; 
      ?>  

<?php   else: ?>
          <p>Aucun nain</p>
<?php   endif; ?>
    </div>
  </div>
</div>
<?php require 'inc/foot.php'; ?>