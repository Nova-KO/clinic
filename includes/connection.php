<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'id8650063_suarezclinicdb' ) or die(mysqli_error($db));
?>