<?php 
include("config/db_connect.php");
$sql = "SELECT title, Ingredients,id FROM pizzas ORDER BY created_at";
$result = mysqli_query($conn, $sql);
$pizzas= mysqli_fetch_all( $result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
// explode(",", $pizzas[0]["Ingredients"]);
// print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>
<h4 class="center text-grey">Pizzas!</h4>
<div class="container">
    <div class="row">
        <?php foreach($pizzas as $pizza):?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="config/img/pizza.svg" alt="" class="pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']);?></h6>
                            <!-- <div><?php echo htmlspecialchars('Ingredients'); ?></div> -->
                            <ul>
                                <?php foreach(explode(',', $pizza['Ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                    <?php endforeach; ?>
                                    
                            </ul>
                        </div>
                        <div class="card-action  right-align">
                            <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if(count($pizzas)>=3): ?>
                <p>there are 3 or more pizzas</p>
                <?php else:?>
                    <p>ther are less then 3 pizzas</p>
                    <?php endif;?>
                
    </div>
</div>

<?php include('templates/footer.php') ?>
</body>
</html>