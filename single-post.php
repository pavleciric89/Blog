<?php include 'db.php' ?>

<!doctype html>

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>

<?php include 'header.php' ?>

<main role="main" class="container">

    <div class="row">       

      	<div class="col-sm-8 blog-main">
      		
      		<!-- /.single-post -->
			    <?php
			    	 if (isset($_GET['post_id'])){ 

			        $sql = "SELECT Id, Title, Body, Author, Created_at FROM posts WHERE id = {$_GET['post_id']}";
			        $statement = $connection->prepare($sql);
			        $statement->execute();
			        $statement->setFetchMode(PDO::FETCH_ASSOC);
					$singlePost = $statement->fetchAll()[0];
					
				    }   
					
				?>
<article class="va-c-article">
    <header>
        <h1><?php echo($singlePost['Title']) ?></h1>

        <!-- zameniti  datum i ime sa pravim imenom i datumom blog post-a iz baze -->
            <div class="va-c-article__meta"><?php echo($singlePost['Created_at']) ?> by <?php echo($singlePost['Author']) ?></div>
    </header>

    <div>
        <!-- zameniti ovaj privremeni (testni) text sa pravim sadrzajem blog post-a iz baze -->
        <p><?php echo($singlePost['Body']) ?></p>

    </div>
</article>
<?php
    $error = '';
    if (!empty($_GET['error'])) {
        $error = 'All fields are required';
    }
?>
<?php if (!empty($error)) { ?>
    <span class="alert alert-danger"><?php echo $error; ?></span>
<?php } ?>
<form action= "createComment.php" method ="post">
    <div class="form-group">
        <input type="text" name="author"placeholder = "Author" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="message" rows="3" cols="20" placeholder="Comment "class="form-control"></textarea>
    </div>
    <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="post_id">
    <input type="submit" value="Submit" class="btn btm-primary">
</form>
<?php include 'comments.php' ?>


			   

		            
		        
		</div><!-- /.blog-main -->

        <?php include 'sidebar.php' ?>
       

</div><!-- /.row -->

</main><!-- /.container -->

</body>

</html>