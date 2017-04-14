<?php

class Session{

     function salir()
     {
         session_destroy();
     }
 };
$userSession = new Session();
?>