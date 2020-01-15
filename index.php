<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="utf-8" />
    <title>blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
            </div>
            <div>
            <button type="submit" class="btn btn-success mb-2" name="envoyer">Créer</button>
            <button type="edit" class="btn btn-primary mb-2" name="editer">Editer</button>
            <button type="delete" class="btn btn-warning mb-2" name="delete" >Supprimer</button>
            </div>
        </form>
    </div>


   <?php


include('database.php');
echo "Tout est validé";
$bdd=connectbdd();
$reponse = $bdd->query('SELECT * FROM posts ORDER BY ID DESC LIMIT 0, 5');



while ($donnees = $reponse->fetch())
{
	echo '<br><strong>'.htmlspecialchars($donnees['titre']).'</strong>';
	echo ' : '.htmlspecialchars($donnees['description']).'<br>';

}

$reponse->closeCursor();

?>
<div class="sizing" style="width:33%;margin:0 auto;">
        <form method="post" action="database.php">
            <div class="form-group">
                <label>Delete de l'article</label>
                <input type="text" class="form-control" placeholder="Delete" name="id">
            </div>
            <div>
            <button type="delete" class="btn btn-warning mb-2" name="delete" >Supprimer</button>
            </div>
        </form>
    </div>


   <?php
    include('database.php');
echo "Cela a été supprimé";
$bdd=deletepost();
$reponse = $bdd->query("DELETE from posts where id=" . $_POST['id']);
header('Location: index.php');

?>
</body>

</html>
