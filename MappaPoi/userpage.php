<?php

session_start();

if (!isset($_SESSION["user_id"])){
    header("Location: login.php");
    die();
}

if (isset($_POST["edit"]) && $_POST["edit"]){
    $content = new stdClass();
    $content->username = $_POST["username"];
    $content->name = $_POST["name"];
    $content->surname = $_POST["surname"];
    $content->email = $_POST["email"];
    $content->password = $_POST["password"];
    $content->cdl_id = $_POST["cdl_id"];
    
    API_request("user/". $_SESSION["user_id"], $content, "PUT");
}

function API_request($path, $content = "", $method = "GET") {
    $url = "http://teambanana/api/". $path;
    //$content = new \stdClass();
    //$content->username = $_POST["username"];
    //$content->password = $_POST["password"];
    $opts = array('http' =>
        array(
            'method'  => $method,
            'header'  => 'Content-Type: application/json',
            'content' => json_encode($content)
        )
    );
    $resource = stream_context_create($opts);
    $result = file_get_contents($url, false, $resource);
    return json_decode($result);
}

function print_cdl($cdl_id) {
    $cdl = API_request("cdl");
    $list = "";
    foreach($cdl as $corso){
        $selected = ($corso->id == $cdl_id) ? 'selected="selected"' : "";
        $list .= '<option value="'. $corso->id .'" '. $selected .'>'. $corso->name .'</option>';
    }
    echo '<select name="cdl_id">'. $list .'</select><br>';
}

?>

<html>
<head>
        <title>User Page</title>
</head>
<body>
	<div>
		<a href="logout.php">LogOut</a>
	</div>
	
	<div style="border-style: solid; display: inline-block;">
	<h3>User Info</h3>
	
	<?php
	function print_field($name, $value, $type="text"){
	    echo $name .': <input type="'. $type .'" name="'. $name .'" value="'. $value .'"><br>';
	}
	   $user = API_request("user/".$_SESSION["user_id"]);
	   echo '<form method="POST">';
	   echo '<input type="hidden" name="edit" value="true">';
	   print_field("username", $user->username);
	   print_field("name", $user->name);
	   print_field("surname", $user->surname);
	   print_field("email", $user->email);
	   print_cdl($user->cdl_id);
	   print_field("password", $user->password, "password");
	   echo '<input type="submit" value="Edit">';
	   echo '</form>';
	?>
	</div>

	<div>
		<h3><a href="UserInterface.php">Mappa POI</a></h3>
	</div>

</body>
</html>
