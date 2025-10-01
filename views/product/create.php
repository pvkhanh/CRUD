<div class="card bg-light">
    <div class="card-body">
        <div class="bg-secondary-subtle p-3 rounded mb-4">
            <h4 class="m-0"><strong>Create Product</strong></h4>
        </div>

        <form method="post" action="index.php?controller=product&action=create">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="describe" class="form-label">Describe:</label>
                <input type="describe" name="describe" id="describe" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="price" name="price" id="price" class="form-control" required>
                    <span class="input-group-text">.00</span>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?controller=product&action=index" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>