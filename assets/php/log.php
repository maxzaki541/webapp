<?php
if(isset($_SESSION['error']) && $_SESSION['error'] != ""){
    ?>
    <div class="mb-3 col-lg-12">
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);

            ?>
        </div>
    </div>
    <?php
}
elseif(isset($_SESSION['suc'])){
    ?>
    <div class="mb-3 col-lg-12">
        <div class="alert alert-success">
            <?php
            echo $_SESSION['suc'];
            unset($_SESSION['suc']);
            ?>
        </div>
    </div>
    <?php
}
?>