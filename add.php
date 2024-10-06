<?php 
include('config/db_connect.php');
    $email=$title=$Ingredients='';
    $errors = array('email'=>'','title'=>'','Ingredients'=>'');

    if (isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['Ingredients']);
        if(empty($_POST['email'])){
            $errors['email'] = 'the email is require'.'<br />';
        }else{
            $email = $_POST['email'];
            echo htmlspecialchars($_POST['email']);
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] ='email must be a valid email address'.'<br />';
            }
        }
        if(empty($_POST['title'])){
            $errors['title'] = 'the title is require'.'<br />';
        }else{
            // echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
                $errors['title']= 'title must at least only be letter and spaces';
            }
        }
        if(empty($_POST['Ingredients'])){
            $errors['Ingredients'] = 'the Ingredients is require'.'<br />';
        }else{
            // echo htmlspecialchars($_POST['Ingredients']);
            $Ingredients= $_POST['Ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$Ingredients)){
                $errors['Ingredients']= ' Ingredients must be a comma sparated list '; 
            }
        }
        if(array_filter($errors)){
            // echo 'the error in the form';
        }else{
            $email= mysqli_real_escape_string($conn, $_POST['email']);
            $title= mysqli_real_escape_string($conn, $_POST['title']);
            $Ingredients= mysqli_real_escape_string($conn, $_POST['Ingredients']);
            $sql="INSERT INTO pizzas(title,email,Ingredients) VALUES('$title','$email','$Ingredients')";
            if(mysqli_query($conn, $sql)){
                header('location:index.php');
            }else{
                echo'query error ' .mysqli_error($conn);
            }
            // echo'form is valid';
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form action= "<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="white">
        <label for="">Your email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars( $email )?>" >
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label for="">Pizza title: </label>
        <input type="text" name="title" value="<?php echo htmlspecialchars ($title) ?>" >
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label for="">Ingredients (comma sparated): </label>
        <input type="text" name="Ingredients" value="<?php echo htmlspecialchars ($Ingredients) ?>">
        <div class="red-text"><?php echo $errors['Ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('templates/footer.php') ?>
</body>
</html>