<?php
ob_start();
?>
<a href="?route=addPerson" class="btn btn-primary">New</a>
<table class="table table-striped">
    <thead>
        <th>id</th>
        <th>first name</th>
        <th>last name</th>
        <th>date of birth</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($personnes as $persone): ?>
            <tr>
                <th><?= $persone->id ?></th>
                <td><?= $persone->firstName ?></td>
                <td><?= $persone->lastName ?></td>
                <td><?= $persone->dateOfBirth ?></td>
                <td>
                    <a href="?route=editPerson&id=<?= $persone->id ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="?route=deletePerson&id=<?= $persone->id ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
$content = ob_get_clean();
