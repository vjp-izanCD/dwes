<?php
  function mostrarPartners($partners) {
    foreach ($partners as $partner) {
      echo "<ul class=\"list-inline\">";
      echo "<li><img src=\"" . htmlspecialchars($partner->getUrlGallery())  . "\" alt=\"" . htmlspecialchars($partner->getDescripcion()) . "\" title=\"" . htmlspecialchars($partner->getDescripcion()) . "\" width=\"100px\"></li>";
      echo "<li>" . htmlspecialchars($partner->getNombre()) . "<li>";
      echo "</ul>";
    }
  }
?>