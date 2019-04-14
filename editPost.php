<?php 
    require('config/db.php');

    if(isset($_POST['submit'])){
        //Get Form Data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);

        $query = "UPDATE posts SET title = '$title', author = '$author', body = '$body'
                WHERE id = $update_id
            ";

        if(mysqli_query($conn, $query)){
            header("Location: ./");
        }
        else{
            echo "Error: ". mysqli_error($conn);
        }
    }


    //To get the data filled into the form fields
    //Get ID
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //Creating queries
    $query = "SELECT * FROM posts WHERE id= $id";

    //Get Results
    $result = mysqli_query($conn, $query);
    //var_dump($result);
    
    //Fetch Data
    $post = mysqli_fetch_assoc($result);
    //var_dump($posts);

    //Free Results
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
?>

<?php include('nav.php'); ?>
        <div class="container">
            <h1>Add Posts</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title'] ?>">
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" value="<?php echo $post['author'] ?>">
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" class="form-control"><?php echo $post['body'] ?></textarea>
                </div>
                <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
        <script
			  src="https://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
              crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>