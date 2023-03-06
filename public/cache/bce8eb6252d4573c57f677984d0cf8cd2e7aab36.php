

<?php $__env->startSection('content'); ?>
    <form action="" method="post">
        <input type="text" name="name" value="<?= $_post['name'] ?? null ?>" class="border <?php if(isset($errors['name'])): ?>border-red-500<?php endif; ?>" placeholder="kullanıcı adı">
        <input type="text" name="password" class="border <?php if(isset($errors['password'])): ?>border-red-500<?php endif; ?>" placeholder="Parola">
        <button type="submit">Kayıt pl</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\rembp\app\View/auth/register.blade.php ENDPATH**/ ?>