<?php
include 'lib/session.php';
session::init();
include_once("lib/database.php");
include_once("helpers/format.php");
Spl_autoload_register(function ($className) {
    include_once("classes/" . $className . ".php");
});
$db = new database();
$fm = new format();
$ct = new cart();
$cat = new category();
$brand = new brand();
$pro = new product();
$city = new city();
$user = new User();
$bill = new bill();
?>

<?php
$buyer = session::get('customer_user');
?>
<?php
session_start();
session_destroy();
header('Location: login.php');
exit;
?>