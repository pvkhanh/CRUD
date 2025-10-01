<div class="card bg-light">
    <div class="card-body">

        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <?php if (!isset($user) || !is_array($user)): ?>
        <div class="alert alert-warning">Không tìm thấy người dùng để sửa.</div>
        <?php else: ?>

        <div class="bg-secondary-subtle p-3 rounded mb-4">
            <h4 class="m-0"><strong>Edit User #<?= $user['id_user'] ?></strong></h4>
        </div>

        <form method="post" action="index.php?controller=user&action=edit&id=<?= $user['id_user'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>"
                    class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php?controller=user&action=index" class="btn btn-secondary">Cancel</a>
        </form>

        <?php endif; ?>
        <?php if (isset($success)): ?>
        <script>
        setTimeout(function() {
            window.location.href = "index.php?controller=user&action=index";
        }, 1000);
        </script>
        <?php endif; ?>

    </div>
</div>