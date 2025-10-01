<div class="card bg-light">
    <div class="card-body">
        <div class="bg-secondary-subtle p-3 rounded mb-4">
            <h4 class="m-0"><strong>Create User</strong></h4>
        </div>

        <form method="post" action="index.php?controller=user&action=create">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?controller=user&action=index" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>