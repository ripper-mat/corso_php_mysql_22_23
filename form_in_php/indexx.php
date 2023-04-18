<?php
use crud\UserCRUD;
require "./autoload.php";
require "./config.php";

$users = (new UserCRUD())->read();
// print_r($users);

?>





<?php require "./class/view/head-view.php" ?>


<table class="table">
    
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Comune</th>
        <th>Azioni</th>
    </tr>
    <tr>
        <?php foreach ($users as $user) { ?>
            <tr>
            <td><?=$user->user_id?></td>
            <td><?=$user->first_name?></td>
            <td><?=$user->last_name?></td>
            <td><?=$user->birth_city?></td>
         <td>
            <a href="edit-user.php?user_id=<?=$user->user_id?>" class="btn btn-primary ">🦧Modifica</a>
            <a href="delete-user.php?user_id=<?=$user->user_id?>" class="btn btn-danger ">☠Elimina</a>
            <!-- <button class="btn btn-danger ">☠Elimina</button> -->
        </td>
            </tr>
        <?php } ?>

    </tr>
</table>

<?php require "./class/view/footer-view.php"?>