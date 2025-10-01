<div class="card bg-light">
    <div class="card-body">

        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <?php if (!isset($product) || !is_array($product)): ?>
        <div class="alert alert-warning">Không tìm thấy sản phẩm để sửa.</div>
        <?php else: ?>

        <div class="bg-secondary-subtle p-3 rounded mb-4">
            <h4 class="m-0"><strong>Edit Product #<?= $product['id_product'] ?></strong></h4>
        </div>

        <form method="post" action="index.php?controller=product&action=edit&id=<?= $product['id_product'] ?>">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" name="product_name" id="product_name"
                    value="<?= htmlspecialchars($product['product_name']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="describe" class="form-label">Describe:</label>
                <input type="describe" name="describe" id="describe"
                    value="<?= htmlspecialchars($product['describe']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="price" name="price" id="price" value="<?= htmlspecialchars($product['price']) ?>"
                        class="form-control" required>
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php?controller=product&action=index" class="btn btn-secondary">Cancel</a>
        </form>

        <?php endif; ?>
        <?php if (isset($success)): ?>
        <script>
        setTimeout(function() {
            window.location.href = "index.php?controller=product&action=index";
        }, 1000);
        </script>
        <?php endif; ?>

    </div>
</div>