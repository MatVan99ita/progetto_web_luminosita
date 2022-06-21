
<?php

print_r($_POST);
$dbh->logUser($_POST["mail"], $_POST["pass"]);

?>