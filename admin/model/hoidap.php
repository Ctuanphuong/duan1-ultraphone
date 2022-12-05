<?php
  function question() { 
    $sql = "SELECT * FROM `question` WHERE 1";
    $listques = pdo_query($sql);
    return $listques;
}
