<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - PhotoFolio Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="assets/css/common.css">
</head>
<body class="h-full flex items-center justify-center bg-gray-900 p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-gradient-to-tr from-cyan-400 to-blue-500 shadow-lg">
                    <i class="ph ph-camera-plus text-white text-2xl"></i>
                </span>
                <span class="text-2xl font-bold text-white tracking-tight">PhotoFolio</span>
            </div>
        </div>
        
        <!-- Login Card -->
        <div class="login-card rounded-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-gray-400">Sign in to your account to continue</p>
            </div>
            
            <form id="loginForm" class="space-y-6">
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-user text-gray-400"></i>
                        </div>
                        <input type="text" id="username" name="username" class="input-field w-full pl-10 pr-4 py-3 rounded-lg" placeholder="Enter your username">
                    </div>
                    <p id="username-error" class="error-message">Username is required</p>
                </div>
                
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" class="input-field w-full pl-10 pr-12 py-3 rounded-lg" placeholder="Enter your password">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-300 focus:outline-none">
                                <i class="ph ph-eye"></i>
                            </button>
                        </div>
                    </div>
                    <p id="password-error" class="error-message">Password is required</p>
                </div>
                
                <!-- Login Button -->
                <div>
                    <button type="submit" class="login-btn w-full py-3 px-4 rounded-lg text-white font-medium shadow-lg flex items-center justify-center">
                        <span>Sign In</span>
                        <i class="ph ph-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include JavaScript files -->
    <script src="assets/js/common.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html> 
