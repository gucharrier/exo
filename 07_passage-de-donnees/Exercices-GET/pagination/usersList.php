<?php 
  $title = 'Utilisateurs';
  $currentPage = 'users';

  require 'inc/head.php'; 
  require 'inc/navbar.php';

  $users = [
    [
      'id' => 1,
      'name' => 'Sony',
      'job' => 'Chômeur',
      'hobby' => 'DROP DATABASE'
    ],
    [
      'id'=> 2,
      'name' => 'Olivier',
      'job' => 'Homme de joie',
      'hobby' => 'Croziflette'
    ],
    [
      'id'=> 3,
      'name' => 'Adrien',
      'job' => 'En prison',
      'hobby' => 'savonette peau sensible'
    ],
    [
      'id' => 4,
      'name' => 'Arturo',
      'job' => 'Designer(bientot Dev)',
      'hobby' => 'Bootstrap'
    ],
    [
      'id'=> 5,
      'name' => 'Guillaume',
      'job' => 'Ninja',
      'hobby' => 'PHP'
    ],
    [
      'id'=> 6,
      'name' => 'Thibaut',
      'job' => 'Pythoniste',
      'hobby' => 'Mets Adrien en prison'
    ],
    [
      'id'=> 7,
      'name' => 'Fabrice',
      'job' => 'éparpilleur',
      'hobby' => 'Se perdre'
    ],
    [
      'id' => 8,
      'name' => 'Boubacar',
      'job' => 'Documentaliste',
      'hobby' => 'La DOC'
    ],
    [
      'id'=> 9,
      'name' => 'Virginie',
      'job' => 'Epicier',
      'hobby' => 'Cherche son ordi'
    ],
    [
      'id'=> 10,
      'name' => 'Anne',
      'job' => 'Dealer de bonbon',
      'hobby' => 'Les arlequins et les bétises'
    ],
    [
      'id'=> 11,
      'name' => 'Benjamin',
      'job' => 'Casper',
      'hobby' => 'Absent, j\'ai mécanique'
    ],
    [
      'id'=> 12,
      'name' => 'Mickael',
      'job' => 'Le chineur',
      'hobby' => 'Les bons tuyaux'
    ],
    [
      'id'=> 13,
      'name' => 'Ryan',
      'job' => 'Le jeunot',
      'hobby' => 'Découvre la vie'
    ],
    [
      'id' => 14,
      'name' => 'Désirée',
      'job' => 'Reine des ternaires',
      'hobby' => 'Les ternaires c\'est la vie'
    ],
    [
      'id'=> 15,
      'name' => 'Dhéya',
      'job' => 'Nimois',
      'hobby' => 'J\'adore les pauses'
    ],
   
  ];


  # 1 - Afficher tous les utilisateurs
  # 2 - La pagination
      /*
        - Nombre d'utilisateurs par page 

        - Nombre d'utilisateurs totales 

        - Nombres totales de page (Nombre d'utilisateurs totales et Nombre d'utilisateurs par page)
         (fonction PHP pour arrondir)

        - Page actuelle / courante

        - Index de départ dans le tableau 

        - Utilisateurs à afficher sur la page courante (fonction PHP pour découper le tableau)
      
      */

      # Nombre d'utilisateurs par page
      $userPerPage = 5;

      # Nombre d'utilisateurs totales 
      $totalUsers = count($users);

      # Nombres totales de page (Nombre d'utilisateurs totales et Nombre d'utilisateurs par page)
      # (fonction PHP pour arrondir)
      $totalPages = ceil($totalUsers / $userPerPage);

      # Page actuelle / courante
      $currentUsersPage = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 1;

      # equivalent a la ternaire du dessus ( deja tres bien si vous avez fait ça )
      // if(isset($_GET['page'])){
      //   $currentUsersPage = $_GET['page'];
      // }else{
      //   $currentUsersPage = 1;
      // }

      # Index de départ dans le tableau 
      $startIndex = ($currentUsersPage - 1) * $userPerPage;
      /*
       Exemple : 
       si on est sur la page 1 alors $currentUsersPage = 1  
        $startIndex = (1 - 1) * 5; donc $startIndex = 0

       si on est sur la page 2 alors $currentUsersPage = 2  
        $startIndex = (2 - 1) * 5; donc $startIndex = 5

       si on est sur la page 3 alors $currentUsersPage = 3  
        $startIndex = (3 - 1) * 5; donc $startIndex = 10

      */

      # Utilisateurs à afficher sur la page courante (fonction PHP pour découper le tableau)
      $usersOnPage = array_slice($users, $startIndex, $userPerPage);

      /*
       Exemple : 
       si on est sur la page 1 alors $startIndex = 0  
        $usersOnPage = array_slice($users, 0 , 5); donc vous donne les utilisateurs compris entre
        les indexs du tableau $users 0 et 4

       si on est sur la page 2 alors $startIndex = 5  
        $usersOnPage = array_slice($users, 5 , 5); donc vous donne les utilisateurs compris entre
        les indexs du tableau $users 5 et 9

       si on est sur la page 3 alors $startIndex = 10  
        $usersOnPage = array_slice($users, 10 , 5); donc vous donne les utilisateurs compris entre
        les indexs du tableau $users 10 et 14

      */

?>

<h1 class="display-1 text-center my-5">Liste des Utilisateurs</h1>

<div class="container w-50">
  
<table class="table">
<caption> <?= $startIndex+1 ?> - <?= $startIndex + $userPerPage ?> des <?= $totalUsers ?> utilisateurs </caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Job</th>
      <th scope="col">Hobby</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($usersOnPage as $user) : ?>
      <tr>
        <th scope="row"><?= $user['id']?></th>
        <td><?= $user['name']?></td>
        <td><?= $user['job']?></td>
        <td><?= $user['hobby']?></td>
      </tr>
    <?php endforeach; ?>

    <?php 
      // foreach($users as $user) { 
      //   echo '<tr>
      //     <th >'.$user['id'].'</th>
      //     <td> '.$user['name'].'</td>
      //     <td> '.$user['job'].'</td>
      //     <td> '.$user['hobby'].'</td>
      //   </tr>';
      // } 
    ?>

  </tbody>
</table>
<nav aria-label="...">
  <ul class="pagination pagination-sm d-flex justify-content-center">

    <?php for($i = 1; $i <= $totalPages; $i++) : ?>

    <li class="page-item <?= $i == $currentUsersPage ? 'active' : '' ?>">

      <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>

    </li>

    <?php endfor; ?>
  </ul>
</nav>
  

</div>

<?php require 'inc/foot.php'; ?>



