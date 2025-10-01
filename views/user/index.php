<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="card bg-light">
        <div class="card-body">
            <div class="bg-secondary-subtle p-3 rounded mb-4">
                <h4 class="m-0"><strong>List Users</strong></h4>
            </div>

            <a href="index.php?controller=user&action=create" class="btn btn-primary mb-3">Create User</a>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?= $u['id_user'] ?></td>
                            <td><?= $u['name'] ?></td>
                            <td><?= $u['email'] ?></td>
                            <td>
                                <a href="index.php?controller=user&action=edit&id=<?= $u['id_user'] ?>"
                                    class="btn btn-info btn-sm me-1">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal<?= $u['id_user'] ?>">
                                    Delete
                                </button>
                                <div class="modal fade" id="confirmDeleteModal<?= $u['id_user'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Confirmation</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                Are you sure you want to delete user
                                                <strong><?= htmlspecialchars($u['name']) ?>?</strong>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="index.php?controller=user&action=delete&id=<?= $u['id_user'] ?>"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>