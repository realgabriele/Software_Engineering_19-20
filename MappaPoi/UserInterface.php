<?php
    session_start();
    
    $show_user = "";
    if (isset($_SESSION['user_id'])){
        $result = json_decode(file_get_contents("http://teambanana/api/user/".$_SESSION['user_id']));
        $show_user =  'ciao <a href="userpage.php">'. $result->username .'</a>';
    } else {
        $show_user = '<a href="login.php">login</a>';
    }
    
?>

<head>
<link rel='stylesheet' type='text/css' href='style.css'>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>

<div id="container">
    <div id="left-menu">
        <button onclick="userif.mappa.showPoi(userif.poi)">Show POI</button>
<?php echo $show_user ?>
    </div>
    
    <div id="mappa">
        <div id='map'></div>
    </div>
</div>

<?php 
if (isset($_SESSION['user_id'])){
    $result = json_decode(file_get_contents("http://teambanana/api/user/".$_SESSION['user_id']));
    echo "  <script>
                var user = {username:'$result->username', name:'$result->name', cdl_id:'$result->cdl_id'};
            </script>";
} else {
    echo "  <script>
                var user = null;
            </script>";
}
?>

<script type='text/javascript' src='User.js'></script>
<script type='text/javascript' src='Leftmenu.js'></script>
<script type='text/javascript' src='Poi.js'></script>
<script type='text/javascript' src='Mappa.js'></script>
<script type='text/javascript' src='UserInterface.js'></script>



</body>
