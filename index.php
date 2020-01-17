<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>

<body>
    <div class="sizing" style="width:33%;margin:0 auto;">
        <form method="post" action="blog_post.php">
            <div class="form-group">
                <label>Titre de l'article</label>
                <input type="text" class="form-control" placeholder="Titre" name="titre">
            </div>
            <div class="form-group">
                <label>Description de l'article</label>
                <input type="text" class="form-control" placeholder="Description" name="description">
                <button type="submit" class="btn btn-primary mb-2" name="envoyer">Créer un article</button>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-body">

            <?php
    require('database.php'); //include for getAllPosts method in database.php !!

    $posts = getAllPosts();
    //var_dump($posts);
    $req = $db->query('SELECT * FROM posts ORDER BY id DESC');

    if ($posts) {

        while ($donnees = $req->fetch()){
        echo '
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="card-body">
                            <span class="badge badge-pill badge-info">'.$donnees['id'].'</span>
                        </div>
                    </div>
                        <div class="col-sm-4">'.$donnees['title'].'</div>
                        <div class="col-sm-5">'.$donnees['content'].'</div>
                        <div class="col-sm-2"><a href="deletePost();" class="btn btn-danger">Supprimer</a> 
                        <a href="" class="btn btn-primary">Editer</a></div>
                    </div>
                </div>
            </div>';
        }    
    } 
    
    else {
        echo '<span class="badge badge-danger">Pas encore de post en database !</span>';
    }
    ?>
        </div>
    </div>
</body>

</html>