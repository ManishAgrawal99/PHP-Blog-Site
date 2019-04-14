<?php 
    require('config/db.php');

    //Creating queries
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    //Get Results
    $result = mysqli_query($conn, $query);
    //var_dump($result);
    
    //Fetch Data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);

    //Free Results
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
?>

<?php include('nav.php'); ?>
        <div class="container">
            <h1>Posts</h1>
            <?php foreach($posts as $post) : ?>
                <div class="card card-body bg-light mb-2">
                    <h3><?php echo $post["title"]; ?></h3>
                    <small>
                        Created on <?php echo $post['created_at']; ?> by <?php echo $post["author"]; ?>
                    </small>
                    <p><?php echo $post["body"]; ?></p>
                    <a href="post.php?id= <?php echo $post['id']; ?>" class="btn btn-default">
                        Read More
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <script
			  src="https://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
              crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>