

<?php $__env->startSection('content'); ?>
    <form action="" method="post">
        <input type="text" name="name" value="<?= $_post['name'] ?? null ?>" class="border <?php if(isset($errors['name'])): ?>border-red-500<?php endif; ?>" placeholder="kullanıcı adı">
        <?php if (isset($errors['name'])): ?><div class="bg-rose-500 text-white"><?=$errors['name'][0]?></div><?php endif; ?>
        <input type="text" name="password" class="border <?php if(isset($errors['password'])): ?>border-red-500<?php endif; ?>" placeholder="Parola">
        <?php if (isset($errors['password'])): ?><div class="bg-rose-500 text-white"><?=$errors['password'][0]?></div><?php endif; ?>
        <button type="submit">Giriş yap</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\rembp\app\View/auth/login.blade.php ENDPATH**/ ?>