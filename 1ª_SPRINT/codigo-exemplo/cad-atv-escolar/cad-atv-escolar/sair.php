<?php
    session_start();
    session_destroy();
    header('Location: login.html?auth_error=Você saiu da sessão');

?>