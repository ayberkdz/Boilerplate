<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="<?php echo e(js('tailwindcss.min.js')); ?>"></script>
    <script src="<?php echo e(js('jquery-3.6.0.min.js')); ?>"></script>

    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <main class="max-w-screen-lg mx-auto bg-gray-200 p-10">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH D:\wamp64\www\rembp\app\View/layout.blade.php ENDPATH**/ ?>