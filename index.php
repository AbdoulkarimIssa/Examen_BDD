<?php
require("controller/frontendController.php");

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listFilms') {
        listfilms();
    }
}
else {
    listfilms();
}