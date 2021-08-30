<?php
    require 'layouts/partials/head.php';
    require 'layouts/partials/header.php';
    require 'layouts/partials/display-errors.php';
 ?> 

<div class="displayInfos">
    <table class="table .table-striped">    
    <thead>
        <tr>
        <th scope="col">Photo</th>
        <th scope="col">Marque</th>
        <th scope="col">Modèle</th>
        <th scope="col">Type</th>
        <th scope="col">Plus</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($motos as $moto) {
                echo('
                <tr>
                    <td> <img src="img/'.$moto->getImg().'" alt="photo de la moto '.$moto->getModel().' de chez '.$moto->getMarque().'"></td>
                    <td>'.$moto->getMarque().'</td>
                    <td>'.$moto->getModel().'</td>
                    <td> <a href="index.php?type='.$moto->getType().'">'.$moto->getType().'</a></td>
                    <td><a href="index.php?detail='.$moto->getId().'">Détail</a> / <a href="index.php?del='.$moto->getId().'">Supprimer</a></td>
                </tr>
                
                ');
            }
        ?>
    </tbody>
    </table>
    



</div>

<?php
    require 'layouts/partials/footer.php';
?>