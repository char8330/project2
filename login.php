<?php echo $header ?>

<!-- HEADERS -->
<header>
    <h1 style="background-color: #53C7E9; color: #28829C">YOUR ACCOUNT</h1>
</header>
</br>
<header>
    <h3 style="color: #9C6128;">SIGN IN</h3>
</header>

</br>

<!-- sign in -->
<?php $f = "
<FORM NAME ='form1' METHOD ='POST'>
    <INPUT TYPE = 'text' name = 'username' placeholder ='username'>
    <INPUT TYPE = 'password'  name = 'password' placeholder ='password'>
    <INPUT TYPE = 'Submit' Name = 'Submit1' value = 'Enter'>
</FORM>";

$submitted_username = $submitted_pwd = '';
$first_login = true;
$authorized = false;

if (isset($_POST ['Submit1'])){
    $submitted_username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $submitted_pwd = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $first_login = false;
}

$users = array(
    //CT310 unknown password, known hash
    "ct310" => "a6cebbf02cc311177c569525a0f119d7",
    "cjh" => "20ee80e63596799a1543bc9fd88d8878",
    "jsearl" => "098f6bcd4621d373cade4e832627b4f6");

date_default_timezone_set("America/Denver");

foreach ($users as $usr => $passwd_hash) {
    if($submitted_username === $usr && $submitted_pwd === $passwd_hash) {
        $authorized = true;
        break;
    }
}

if (!$authorized && !$first_login) {
    echo $f;
    echo "</br>Permission Denied</br>";
    $t = date('l jS \of F Y h:i:s A');
    echo($t . "</br>");
} elseif ($authorized){
    echo "Welcome " . $usr . "!   <br>";$t=date('l jS \of F Y h:i:s A');
    echo($t . "</br>");
//attempt to stay logged in - set authorized in the session TODO: FIND OUT WHEN TO END SESSION 
Session::create(); 
Session::set('authorized', $authorized);
} else {
    echo $f;
}

echo $footer ?>
