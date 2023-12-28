<?php


//In order to continue the session on this page, this includes session_start(). It indicates which session has to be ended.

include_once 'includes/session.php'?>

<?php

//The session is destroyed with session destroy(). The home page is then redirected via the header() function.

    session_destroy();
    header('Location: index.php');



?>