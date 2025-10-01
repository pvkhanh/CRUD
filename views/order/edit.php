<div class="card bg-light">
    <div class="card-body">

        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <?php if (!isset($order) || !is_array($order)): ?>
        <div class="alert alert-warning">Không tìm thấy đơn để sửa.</div>
        <?php else: ?>
        <div class="bg-secondary-subtle p-3 rounded mb-4">
            <h4 class="m-0"><strong>Edit Order #<?= $order['id_order'] ?></strong></h4>
        </div>
        <form method="post" action="index.php?controller=order&action=edit&id=<?= $order['id_order'] ?>">
            <div class="mb-3">
                <label for="id_user" class="form-label">Select User</label>
                <select name="id_user" id="id_user" class="form-select" required>
                    <option value="">-- Choose User --</option>
                    <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id_user'] ?>"
                        <?= $user['id_user'] == $order['id_user'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user['name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="id_product" class="form-label">Select Product</label>
                <select name="id_product" id="id_product" class="form-select" required>
                    <option value="">-- Choose Product --</option>
                    <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id_product'] ?>"
                        <?= $product['id_product'] == $order['id_product'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($product['product_name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                    value="<?= $order['quantity'] ?>" required>
            </div>
            <button type=" submit" class="btn btn-success">Save</button>
            <a href="index.php?controller=order&action=index" class="btn btn-secondary">Cancel</a>
        </form>
        <?php endif; ?>
        <?php if (isset($success)): ?>
        <script>
        setTimeout(function() {
            window.location.href = " index.php?controller=order&action=index";
        }, 1000);
        </script>
        <?php endif; ?>
    </div>
</div>