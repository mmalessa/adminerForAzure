<?php
require_once('plugins/login-ssl.php');

$ca = $_ENV['DB_SSL_CA'];

return new AdminerLoginSsl(
    ["ca" => $ca]
);