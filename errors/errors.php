<?php if (count($errors) > 0) : ?>
    <div>
        <?php foreach ($errors as $error) : ?>
            <?php if (strpos($error, "Username already exists") !== false): ?>
                <!-- Specific styling for username exists error -->
                <p class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded relative"><?php echo htmlspecialchars($error); ?></p>
            <?php else: ?>
                <!-- General error styling -->
                <p class="bg-gray-100 text-gray-700 border border-gray-400 px-4 py-3 rounded relative"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>