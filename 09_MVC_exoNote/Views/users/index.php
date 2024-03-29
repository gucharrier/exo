<?php 

$currentPage = 1;
if(!empty($_GET['page']) && ctype_digit($_GET['page'])){
  $currentPage = $_GET['page'];
}
$pagination = PAGINATION;
if(!empty($_GET['pagination']) && ctype_digit($_GET['pagination'])){
  $pagination = $_GET['pagination'];
}


?>
<div class="section">
  <div class="is-flex">
    <div>
      <h1 class="title">Liste des Utilisateurs </h1>
    </div>
    <div>
      <a href="index.php?ctrl=user&action=create" class="button is-primary"><p class="title is-1">+</p></a>
    </div>
  </div>

  <div class="card is-shadowless">
    <div class="card-content">
      <table class="table is-hoverable is-fullwidth">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Profil</th>
            <th>Edition</th>
          </tr>
        </thead>
        <tbody>
          <?php 

            if(!empty($users)) :
              foreach($users as $user) : 

          ?>
          <tr>
            <th><?= $user->getId() ?></th>
            <td><?= $user->getNom() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><a href="index.php?ctrl=user&action=show&id=<?= $user->getId() ?>" class="button is-info is-small">Voir Utilisateur</a></td>
            <td><a href="index.php?ctrl=user&action=edit&id=<?= $user->getId() ?>" class="button is-warning is-small">Edit Utilisateur</a></td>
          </tr>   
          <?php 
            endforeach;
          ?>
        </tbody>
      </table>
      <?php
        else: 
      ?>
          <p>Aucun Utilisateur</p>
      <?php
        endif
      ?>
      
      <?php 
      $pageTotales = ceil($nbUsers['nbUsers']/$pagination);
      ?>

      <nav class="pagination is-centered" >

      <a <?= ($currentPage > 1) ? 'href="?page='. $currentPage - 1 .'"' : '' ?> class="pagination-previous " <?= ($currentPage > 1) ? '' : 'disabled' ?> >Page précédente</a>

      <a <?= ($currentPage < $pageTotales) ? 'href="?page='. $currentPage + 1 .'"' : '' ?> class="pagination-next" <?= ($currentPage < $pageTotales) ? '' : 'disabled' ?>>Page suivante</a>

      <ul class="pagination-list">

          <?php 
            for($i = 1; $i <= $pageTotales; $i++){
        
              if($i == $currentPage){
                echo '<li><a class="pagination-link is-current">'.$i.'</a></li>';
              }else{
                echo '<li><a href="?page='.$i.'" class="pagination-link">'.$i.'</a></li>';
              }
            }
        ?>
      </ul>

      </nav>
    </div>
  </div>
</div>

<?php 
        require 'inc/foot.php'; 
?>