<?php 
    if(!empty($_SESSION['alert-success'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['alert-success']; ?>
            </div>
        <?php
        $_SESSION['alert-success'] = null;
    }
?>


<?php 
    if(!empty($_SESSION['alert-warning'])) {
        ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_SESSION['alert-warning']; ?>
            </div>
        <?php
        $_SESSION['alert-warning'] = null;
    }
?>

<?php 
    if(!empty($_SESSION['alert-danger'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['alert-danger']; ?>
            </div>
        <?php
        $_SESSION['alert-danger'] = null;
    }
?>