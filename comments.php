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
    <strong><p>Comments<p></strong>
        <ul>
            <?php foreach ($comments as $comment) { ?>
                
                <li>
                    <strong><div><?php echo $comment['Author']; ?></div></strong>
                    <div><?php echo $comment['Text']; ?></div>
                    <hr>
                    <form action="deleteComment.php" method="POST">
                        <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="post_id">
                        <input type="hidden" value="<?php echo $comment['Id']; ?>" name="comment_id">
                        <input type="submit" class="btn btn-default" id="delete" type="button" onclick="myFunctionDelete()" value="Delete comment" >
                    </form>
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