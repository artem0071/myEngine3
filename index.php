<?php

require 'core/bootstrap.php';

$app = new App($_SERVER,require 'config.php');

$app->render();

$app::DB()->select();