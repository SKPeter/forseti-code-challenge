<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Forseti Code Challenge: Buscador de Notícias Comprasnet</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Buscador de Notícias Comprasnet</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a class="btn btn-primary btn-lg" href="?mode=fetch">Buscar notícias</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Notícia</th>
                        <th>Publicado em</th>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article) { ?>
                        <tr>
                            <td><?php echo $article["id"] ?></td> 
                            <td><a href=<?php echo $article["url"] ?>> <?php echo $article["title"] ?></a></td> 
                            <td><?php echo $article["date_time"] ?></td> 
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>