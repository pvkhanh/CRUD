<div class="card bg-light">
    <div class="card-body">
        <div class="bg-secondary-subtle p-3 rounded mb-4">
            <h4 class="m-0"><strong>Create Order</strong></h4>
        </div>

        <form method="post" action="index.php?controller=order&action=create">
            <div class="mb-3">
                <label for="id_user" class="form-label">Select User</label>
                <select name="id_user" id="id_user" class="form-select" required>
                    <option value="">-- Choose User --</option>
                    <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id_user'] ?>">
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
                    <option value="<?= $product['id_product'] ?>">
                        <?= htmlspecialchars($product['product_name']) ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?controller=product&action=index" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>