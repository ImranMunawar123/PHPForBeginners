<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <a href="/notes" style="color: dodgerblue; text-decoration: underline">Go Back</a>
            <p><?= htmlspecialchars($note['body']) ?></p>

            <footer class="mt-6">
                <a href="/note/edit?id=<?= $note['id'] ?>" class="text-sm font-semibold rounded-md bg-gray-600 text-white border border-current px-3 py-2">Edit</a>
                <form class="mt-6" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button class="text-sm font-semibold rounded-md bg-red-600 text-white border border-current px-3 py-2">Delete</button>
                </form>
            </footer>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>


// Register User


// Login User


// Logout User


// Middleware


// Refactor Login Code

