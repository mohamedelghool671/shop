<?php
if (isset($_SESSION['errors'])) {
  ?>
  <div class="alert alert-danger" role="alert">
    <ul>
      <?php 
      foreach ($_SESSION['errors'] as $error) {
        echo "<li>$error</li>";
      }
      unset($_SESSION['errors']);
      ?> 
    </ul>
  </div>
  <?php
}
?>