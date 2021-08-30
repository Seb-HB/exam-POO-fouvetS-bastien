
<?php
require 'layouts/partials/head.php';
?>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter une Moto</h3>  
                    </div>
                    <div class="card-body">
                        <form method="POST" action="index.php?add=1" enctype="multipart/form-data">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="marque" name='marque' required>   
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="model" name="model" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="type" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Enduro">Enduro</option>
                                    <option value="Custom">Custom</option>
                                    <option value="Sportive">Sportive</option>
                                    <option value="Roadster">Roadster</option>
                                </select>    
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="file" class="form-control"  name="img">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="description" name="description" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Ajouter" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <?php
                            if (isset($errors)&& count($errors)>0){
                                foreach($errors as $error){
                                    echo('<p class="text-danger">'.$error.'</p>');
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>