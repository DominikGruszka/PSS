<?php
require_once 'init.php';
require_once 'routing.php';

 // Ładowanie sesji
\core\SessionUtils::loadMessages();
\core\App::getRouter()->go();
