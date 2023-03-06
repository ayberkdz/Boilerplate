

<?php $__env->startSection('title', 'Anasayfa'); ?>

<?php $__env->startSection('content'); ?>

    <?php if($msg = cookie('msg')): ?>
        <div id="msg" class="w-full p-4 bg-emerald-400 text-black">
            <?php echo $msg; ?>

        </div>
        <script>
            setTimeout(() => document.querySelector('#msg').classList.add('hidden'), 1500);
        </script>
    <?php endif; ?>

    <?php if(auth()->guard()->check()): ?>
        <span class="text-indigo-500 font-bold">Hoşgeldin, <?php echo e(auth()->getName()); ?></span>
        <a href="<?= site_url() ?>logout">[Çıkış yap]</a>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <span class="text-cyan-500 font-bold">Hoşgeldin ziyaretçi</span>
        <a href="<?= site_url() ?>login">[Giriş yap]</a>
        <a href="<?= site_url() ?>register">[Kayıt ol]</a>
    <?php endif; ?>

    <form hidden action="" method="post">
        <ul>
            <li>
                <input type="text" name="username" value="<?= $_post['username'] ?? null ?>" class="border border-gray-500 <?php if(isset($errors['username'])): ?>border-red-500<?php endif; ?>" placeholder="username">
            </li>
            <li>
                <input type="text" name="password" class="border border-gray-500 <?php if(isset($errors['password'])): ?>border-red-500<?php endif; ?>" placeholder="password">
            </li>
            <li>
                <input type="text" name="repassword" class="border border-gray-500 <?php if(isset($errors['repassword'])): ?>border-red-500<?php endif; ?>" placeholder="re-password">
            </li>
            <li>
                <button type="submit" class="bg-indigo-500 rounded-md text-white p-2.5">Gönder</button>
            </li>
        </ul>
    </form>


    <?php if(auth()->guard()->check()): ?>
        <form action="" method="post" class="bg-gray-300 p-4 rounded-md" enctype="multipart/form-data">
            <ul>
                <li>
                    <input type="file" name="image" class="<?php if(isset($errors['image'])): ?>border-red-500<?php endif; ?>">
                    <?php if (isset($errors['image'])): ?><div class="bg-rose-500 text-white"><?=$errors['image'][0]?></div><?php endif; ?>
                </li>
                <li>
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                    <?php if (isset($errors['content'])): ?><div class="bg-rose-500 text-white"><?=$errors['content'][0]?></div><?php endif; ?>
                </li>
                <li>
                    <button type="submit">Kaydet</button>
                </li>
            </ul>
            
            
        </form>
    <?php endif; ?>

    <ul id="result">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php if($post->image): ?>
                    <div>
                        <img src="<?= site_url() ?>public/upload/<?php echo e(json_decode($post->image)->small); ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php echo e($post->id); ?> <br>
                <?php echo e($post->content); ?> <br>
                Ekleyen: <?php echo e($post->user->name); ?> <br>
                Tarih: <?= timeAgo($post->created_at) ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\rembp\app\View/home.blade.php ENDPATH**/ ?>