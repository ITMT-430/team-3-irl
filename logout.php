<?php//LOGOUT OF ALL SESSIONS::

if(isset($_REQUEST['logout'])) {
    phpCAS::logout();
}

?>