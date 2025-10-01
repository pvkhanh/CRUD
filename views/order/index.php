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
                <h4 class="m-0"><strong>List Orders</strong></h4>
            </div>

            <a href="index.php?controller=order&action=create" class="btn btn-primary mb-3">Create Order</a>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>User Name</th>
                            <th>Total Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $od): ?>
                        <tr>
                            <td><?= $od['id_order'] ?></td>
                            <td><?= htmlspecialchars($od['product_name']) ?></td>
                            <td><?= $od['quantity'] ?></td>
                            <td><?= htmlspecialchars($od['user_name']) ?></td>
                            <td>
                                <?= $od['quantity'] * $od['price'] ?>
                            </td>
                            <td>
                                <a href="index.php?controller=order&action=edit&id=<?= $od['id_order'] ?>"
                                    class="btn btn-info btn-sm me-1">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal<?= $od['id_order'] ?>">
                                    Delete
                                </button>
                                <div class="modal fade" id="confirmDeleteModal<?= $od['id_order'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Confirmation</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                Are you sure you want to delete order
                                                <strong><?= htmlspecialchars($od['product_name']) ?>?</strong>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="index.php?controller=order&action=delete&id=<?= $od['id_order'] ?>"
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