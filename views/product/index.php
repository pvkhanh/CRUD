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
                <h4 class="m-0"><strong>List Products</strong></h4>
            </div>

            <a href="index.php?controller=product&action=create" class="btn btn-primary mb-3">Create Product</a>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle bg-white">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Describe</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $prd): ?>
                        <tr>
                            <td><?= $prd['id_product'] ?></td>
                            <td><?= $prd['product_name'] ?></td>
                            <td><?= $prd['describe'] ?></td>
                            <td><?= $prd['price'] ?></td>
                            <td>
                                <a href="index.php?controller=product&action=edit&id=<?= $prd['id_product'] ?>"
                                    class="btn btn-info btn-sm me-1">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal<?= $prd['id_product'] ?>">
                                    Delete
                                </button>
                                <div class="modal fade" id="confirmDeleteModal<?= $prd['id_product'] ?>" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Confirmation</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                Are you sure you want to delete product
                                                <strong><?= htmlspecialchars($prd['product_name']) ?>?</strong>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="index.php?controller=product&action=delete&id=<?= $prd['id_product'] ?>"
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