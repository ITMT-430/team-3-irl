<!DOCTYPE html>
<html>

<?php//LOGOUT OF ALL SESSIONS::

if(isset($_REQUEST['logout'])) {
    phpCAS::logout();
}
echo "Thanks and have a good day!!";

?>

<body>
	<h1>Thank you and Have a wonderful Day!!</h1>
</body>

</html>