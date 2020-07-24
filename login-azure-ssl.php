<?php
$ca = $_ENV['DB_SSL_CA'];

class AdminerLoginAzureSsl
{
    /** @access protected */
    var $ssl;

    /**
     * @param array array("key" => filename, "cert" => filename, "ca" => filename)
     */
    function __construct($ssl)
    {
        $this->ssl = $ssl;
        $this->sslSet = false;
        if ($_POST["auth"]) {
            $_SESSION['azuressl'] = ($_POST["auth"]["azuressl"] == 1) ? true : false;
        }
    }

    function connectSsl()
    {
        if ($_SESSION['azuressl']) {
            return $this->ssl;
        }
        return;
    }

    function loginFormField($name, $heading, $value)
    {
        if ($name == 'password') {
            return $heading . $value
                . "<tr><th><acronym title='Azure SSL' lang='en'>Azure SSL</acronym>"
                . "<td><input type='checkbox' name='auth[azuressl]' value='1'>\n";
        }

    }
}

return new AdminerLoginAzureSsl(
    ["ca" => $ca]
);