<?php
    require 'layouts/partials/head.php';
    require 'layouts/partials/header.php';
    echo('
        <div class="card" style="width: 18rem;">
            <img src="img/'.$moto->getImg().'" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">'.$moto->getModel().'</h4>
                <h5 class="card-title">'.$moto->getMarque().'</h5>
                <p>'.$moto->getDescription().'</p>
                <a href="index.php" class="btn btn-primary">Retour à la liste</a>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
    </body>
    </html>
    ');
 ?>   
