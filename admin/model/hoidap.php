<?php
  function question() { 
    $sql = "SELECT * FROM `question` WHERE 1";
    $listques = pdo_query($sql);
    return $listques;
}
function delete_ques($id_ques) { 
  $sql = "DELETE FROM `question` WHERE id_ques=".$id_ques;
  pdo_execute($sql);
}
?>
