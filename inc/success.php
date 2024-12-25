<?php
if (isset($_SESSION['success'])) {
  ?>
  <div class="alert alert-success" role="alert">
    <ul>
      <?php 
        echo "<li>{$_SESSION['success']}</li>";
        unset($_SESSION['success']);
      ?> 
    </ul>
  </div>
  <?php
}
?>
