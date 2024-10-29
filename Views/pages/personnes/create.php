<?php
ob_start();
?>
<form action="./?route=<?= isset($action) && $action == "create" ? 'addPerson' : "editPerson&id=$id" ?>" method="post">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= isset($old['firstName']) ? $old['firstName'] : "" ?>" />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?= isset($old['lastName']) ? $old['lastName'] : "" ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="dateOfBirth">Date Of Birth:</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?= isset($old['dateOfBirth']) ? $old['dateOfBirth'] : "" ?>" />
            </div>
        </div>
        <div class="col-6 d-flex align-items-end">
            <div class="form-group">
                <button class="btn btn-<?= isset($action) && $action == "create" ? 'success' : 'warning' ?>" type="submit"><?= isset($action) && $action == "create" ? 'Add Persone' : 'Edit Person' ?></button>
            </div>
        </div>
    </div>
</form>
<?php
$content = ob_get_clean();
