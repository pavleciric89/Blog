<?php

// pripremamo upit
$sql = "SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 5" ;
$statement = $connection->prepare($sql);

// izvrsavamo upit
$statement->execute();

// zelimo da se rezultat vrati kao asocijativni niz.
// ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
$statement->setFetchMode(PDO::FETCH_ASSOC);

// punimo promenjivu sa rezultatom upita
$posts = $statement->fetchAll();

// koristite var_dump kada god treba da proverite sadrzaj neke promenjive
  /* echo '<pre>';
   var_dump($posts);
   echo '</pre>';*/

?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest posts</h4>
        <ul>
        <?php
           foreach ($posts as $post) {
        ?>
            <li><a href="http://localhost:8080/single-post.php?post_id=<?php echo $post['id']; ?>" ><?php echo $post['title']; ?></a></li>
        <?php }?>
        </ul>
    </div>
    <div class="sidebar-module">
    
    </div>
    <div class="sidebar-module">
        
    </div>
</aside><!-- /.blog-sidebar -->