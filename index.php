<?php
require_once('vendor/autoload.php');

use App\Database\{
    DatabaseConnection,
    Testing
};
use App\config\Mail;

class post{

    public function __construct($title) {

        echo $title;

    }

}

new DatabaseConnection();
new Testing();
new Mail();


