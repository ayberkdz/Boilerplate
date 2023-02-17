


<?php $__env->startSection('title', 'Anasayfa'); ?>

<?php $__env->startSection('content'); ?>

<?php if(auth()->guard()->check()): ?>
<h1>Hoşgeldin, <?php echo e(auth()->getName()); ?>

</h1>

<a href="http://localhost/Core/logout">[Çıkış yap]</a>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
<h1>Hoşgeldin, ziyaretçi

    <a href="http://localhost/Core/login">[Giriş yap]</a>
    <a href="http://localhost/Core/register">[kayıt yap]</a>
</h1>
<?php endif; ?>

    <form action="" method="post" style="display: none;">
        <ul>
            <li>
                <input type="text" value="<?= $posts["username"] ?? null; ?>" name="username" class="<?php if(isset($errors["username"])): ?>
                has-error
            <?php endif; ?>" placeholder="kullanıcı adı" id="">
                <?php if(isset($errors["username"])): ?>
                <div style="color: red; font-weight: 700;"><?php echo e($errors["username"][0]); ?></div>
            <?php endif; ?>
            </li>
            <li>
                <input type="password" value="<?= $posts["password"] ?? null; ?>" name="password" class="<?php if(isset($errors["password"])): ?>
                has-error
            <?php endif; ?>" placeholder="Parola" id="">
                <?php if(isset($errors["password"])): ?>
                <div style="color: red; font-weight: 700;"><?php echo e($errors["password"][0]); ?></div>
            <?php endif; ?>
            </li>
            <li>
                <input type="password" value="<?= $posts["apassword"] ?? null; ?>" name="apassword" class="<?php if(isset($errors["apassword"])): ?>
                has-error
            <?php endif; ?>" placeholder="Parola (Tekrar)" id="">
                <?php if(isset($errors["apassword"])): ?>
                <div style="color: red; font-weight: 700;"><?php echo e($errors["apassword"][0]); ?></div>
            <?php endif; ?>
            </li>
            <li>
                <button type="submit">Gönder</button>
            </li>
        </ul>
    </form>

    <form action="" method="post">
        <textarea name="content" class="<?php if(isset($errors["content"])): ?>
                has-error
            <?php endif; ?>" id="" cols="30" rows="10">

        </textarea>
        <?php if(isset($errors["content"])): ?>
                <div style="color: red; font-weight: 700;"><?php echo e($errors["content"][0]); ?></div>
            <?php endif; ?>
        <br>
        <button type="submit">Kaydet</button>
    </form>

    <ul>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                #<?php echo e($post->id); ?> <br>
                <?php echo e($post->content); ?> <br>
                tarih : <?= timeAgo($post->created_at) ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\Core\app\views/home.blade.php ENDPATH**/ ?>