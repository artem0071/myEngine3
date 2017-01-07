<?php

session_start();

require 'core/bootstrap.php';

$app = new App($_SERVER);

$app->render();