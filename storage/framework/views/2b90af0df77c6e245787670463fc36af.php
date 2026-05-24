<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Kelontong</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: PLUS JAKARTA SANS -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center relative overflow-hidden">
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/90 to-slate-900/95 mix-blend-multiply z-0"></div>

    <!-- Decorative Elements -->
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-indigo-500 rounded-full mix-blend-screen filter blur-3xl opacity-30 z-0 animate-pulse"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-purple-500 rounded-full mix-blend-screen filter blur-3xl opacity-30 z-0 animate-pulse animation-delay-2000"></div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-md p-8 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl transform transition-all">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-indigo-500 to-purple-500 text-white mb-4 shadow-lg ring-4 ring-indigo-500/30">
                <i class="ph-fill ph-storefront text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-white tracking-tight">Toko Kelontong</h2>
            <p class="text-slate-300 mt-2 text-sm font-medium">Selamat datang, silahkan masuk ke akun Anda.</p>
        </div>

        <?php if($errors->any()): ?>
        <div class="mb-6 p-4 rounded-xl bg-rose-500/20 border border-rose-500/50 backdrop-blur-md flex items-start text-rose-200">
            <i class="ph-fill ph-warning-circle text-xl mr-3 mt-0.5"></i>
            <ul class="text-sm space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-5">
            <?php echo csrf_field(); ?>
            <div>
                <label for="username" class="block text-sm font-medium text-slate-300 mb-1.5 ml-1">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph ph-user text-slate-400 text-lg"></i>
                    </div>
                    <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>" required autofocus class="block w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 text-white rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-500 shadow-inner" placeholder="Masukkan username Anda...">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-300 mb-1.5 ml-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph ph-lock-key text-slate-400 text-lg"></i>
                    </div>
                    <input type="password" id="password" name="password" required class="block w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 text-white rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-500 shadow-inner" placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between mt-2 ml-1">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 bg-white/5 border-white/10 rounded text-indigo-500 focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 block text-sm text-slate-300">
                        Ingat Saya
                    </label>
                </div>
                <div class="text-sm">
                    <a href="javascript:void(0)" onclick="alert('Silakan hubungi Administrator sistem atau Pemilik toko untuk mereset password Anda.')" class="font-medium text-indigo-400 hover:text-indigo-300 transition-colors">Lupa Password?</a>
                </div>
            </div>

            <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-slate-900 transition-all transform hover:-translate-y-0.5 mt-6">
                MASUK SEKARANG <i class="ph-bold ph-arrow-right ml-2 text-lg"></i>
            </button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\toko-kelontong\resources\views/auth/login.blade.php ENDPATH**/ ?>