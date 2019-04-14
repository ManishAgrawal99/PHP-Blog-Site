<?php
	require('config/db.php');

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

	<?php include('nav.php'); ?>
		<div class="container">
			<a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
			<h1><?php echo $post['title']; ?></h1>	
			<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
			<p><?php echo $post['body']; ?></p>
			<hr>

			<a href="./editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Edit</a>
		</div>
        <script
			  src="https://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
              crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>