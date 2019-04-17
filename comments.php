<?php
// pripremamo upit
$postId = $_GET['post_id'];
$sql = "SELECT Id, Author, Text  FROM comments WHERE Post_id = $postId" ;
$statement = $connection->prepare($sql);

// izvrsavamo upit
$statement->execute();

// zelimo da se rezultat vrati kao asocijativni niz.
// ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
$statement->setFetchMode(PDO::FETCH_ASSOC);

// punimo promenjivu sa rezultatom upita
$comments = $statement->fetchAll();
?>
<?php if (!empty($comments)) {?>
    <button class="btn btn-default" id=myButton1 onclick="myFunctionChange()" type="submit">Hide comments</button>

    <div id="comments">
    <p>Comments<p>
        <ul>
            <?php foreach ($comments as $comment) { ?>
                
                <li>
                    <div><?php echo $comment['Author']; ?></div>
                    <div><?php echo $comment['Text']; ?></div>
                    <hr>
                </li>
            <?php } ?>
        </ul>
</div>
<?php } ?>

<script>
function myFunctionChange() {
    
   if (document.getElementById("myButton1").innerHTML === "Hide comments"){
    document.getElementById("myButton1").innerHTML = "Show comments";
    document.getElementById("comments").style.display = 'none';

   } else {
    document.getElementById("myButton1").innerHTML = "Hide comments" ;
    document.getElementById("comments").style.display = 'block';
   }

   
} 

</script>