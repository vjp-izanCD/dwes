<?php
  function mostrarPartners($partners) {
    foreach ($partners as $partner) {
      echo "<ul class=\"list-inline\">";
      echo "<li><img src=\"images/index/" . $partner->getLogo() . "\" alt=\"" . $partner->getDescripcion() . "\" title=\"" . $partner->getNombre() . "\"></li>";
      echo "<li>" . $partner->getNombre() . "<li>";
      echo "</ul>";
    }
  }
?>