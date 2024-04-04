<?php
session_start();
unset($_SESSION['U_Email']);
echo "
<script>
location.assign('index.php');
</script>";
?>