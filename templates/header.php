
<?php 

session_start();
// $_SESSION['name']='ahmed';
if($_SERVER['QUERY_STRING'] == 'noname'){
    unset($_SESSION['name']);
    // session_unset();
}
$name= $_SESSION['name'] ?? 'Guest';

$gender=$_COOKIE['gender'] ??'Unknown';

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deisty Pizza</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .brand{
            background-color: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .brand-logo{
            text-align: center !important;
        }
        .pizza{
            width: 100px;
            margin: 30px auto -30px;
            position: relative;
            top: -30px;
            display: block;
        }

    </style>
</head>
<body class="grey lighten-4" >
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Deisty Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Hello <?php echo htmlspecialchars($name); ?></li>
                <li class="grey-text"> ( <?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a pizza</a></li>
            </ul>
        </div>
    </nav>