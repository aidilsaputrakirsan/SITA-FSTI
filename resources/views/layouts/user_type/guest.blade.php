<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | SITA FSTI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Informasi Tugas Akhir FSTI" name="description" />
    <meta content="SITA ITK" name="author" />
    <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.ico')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/preloader.min.css')}}" type="text/css" />
    <link href="{{ asset('dist/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dist/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dist/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    
    <style>
        :root {
            --primary-blue: #2e3192;
            --primary-cyan: #1bcedf;
            --text-dark: #333;
            --text-light: #666;
            --border-color: #e0e0e0;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-cyan) 100%);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .login-container {
            max-width: 420px;
            width: 100%;
            animation: fadeInUp 0.8s ease-out;
            z-index: 10;
            position: relative;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15), 
                        0 0 0 1px rgba(255, 255, 255, 0.2) inset;
            transition: all 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 50px rgba(0, 0, 0, 0.2);
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-img {
            height: 60px;
            margin-bottom: 15px;
        }
        
        .logo-text {
            font-size: 28px;
            font-weight: 700;
            color: #2e3192;
            letter-spacing: -0.5px;
        }
        
        .welcome-text {
            text-align: center;
            margin-bottom: 10px;
        }
        
        .welcome-text h3 {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 5px;
            background: linear-gradient(45deg, var(--primary-blue), var(--primary-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .welcome-text p {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }
        
        .form-control {
            height: 45px;
            border-radius: 12px;
            border: 2px solid var(--border-color);
            padding-left: 20px;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-control::placeholder {
            color: #aaa;
            opacity: 1;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(46, 49, 146, 0.2),
                        0 0 8px rgba(46, 49, 146, 0.3);
            outline: none;
            transform: translateY(-2px);
        }
        
        .form-label {
            font-weight: 500;
            color: #444;
            margin-bottom: 8px;
        }
        
        .input-group .btn {
            border-radius: 0 10px 10px 0;
            border: 2px solid #e0e0e0;
            border-left: none;
            background: transparent;
            color: #666;
        }
        
        .input-group .form-control {
            border-right: none;
        }
        
        .input-group .form-control:focus {
            border-right: none;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-blue), var(--primary-cyan));
            background-size: 200% 200%;
            border: none;
            border-radius: 12px;
            height: 48px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transform: translateX(-100%);
            transition: all 0.5s;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(46, 49, 146, 0.4);
            background-position: right;
        }
        
        .btn-primary:hover::before {
            transform: translateX(100%);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .form-check-label {
            color: #666;
            font-size: 14px;
        }
        
        .footer-text {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
        
        .footer-text a {
            color: #2e3192;
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer-text a:hover {
            text-decoration: underline;
        }
        
        /* Particle Background */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 1;
        }
        
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: twinkle 3s ease-in-out infinite;
        }
        
        .particle:nth-child(odd) {
            animation-delay: 0.5s;
        }
        
        .particle:nth-child(even) {
            animation-delay: 1s;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body>
    <div class="particles" id="particles"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <img src="{{ asset('dist/assets/images/logo-sm.svg')}}" alt="SITA FSTI" class="logo-img">
                <div class="logo-text">SITA FSTI</div>
            </div>
            
            <div class="welcome-text">
                <h3>Selamat Datang!</h3>
                <p>Sistem Informasi Manajemen Tugas Akhir<br>Fakultas Sains dan Teknologi (FSTI) ITK</p>
            </div>
            
            @livewire('alert')
            
            <form class="needs-validation" role="form" method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    @error('username')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-toggle">
                        <button class="btn btn-outline-secondary" type="button" id="password-toggle">
                            <i class="mdi mdi-eye-outline"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-check">
                        <label class="form-check-label" for="remember-check">
                            Ingat saya
                        </label>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Masuk</button>
                </div>
            </form>
            
            <div class="footer-text">
                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> 
                <a href="https://is.itk.ac.id">Sistem Informasi ITK</a><br>
                Developed by <a href="https://is.itk.ac.id/profile/dosen/detail/sri-rahayu-natasia-skomp-msi-msc">Sri Rahayu Natasia</a></p>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('dist/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/pace-js/pace.min.js') }}"></script>
    
    <script>
        // Password toggle
        document.getElementById('password-toggle').addEventListener('click', function() {
            const passwordInput = document.querySelector('input[name="password"]');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('mdi-eye-outline');
                icon.classList.add('mdi-eye-off-outline');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('mdi-eye-off-outline');
                icon.classList.add('mdi-eye-outline');
            }
        });
        
        // Create particle effect
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 3 + 2) + 's';
                particle.style.animationDelay = Math.random() * 3 + 's';
                particlesContainer.appendChild(particle);
            }
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Add floating animation to logo
            const logo = document.querySelector('.logo-img');
            logo.style.animation = 'float 3s ease-in-out infinite';
            
            // Add typing effect to subtitle
            const subtitle = document.querySelector('.welcome-text p');
            const text = subtitle.textContent;
            subtitle.textContent = '';
            let index = 0;
            
            function typeWriter() {
                if (index < text.length) {
                    subtitle.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 30);
                }
            }
            setTimeout(typeWriter, 500);
        });
        
        // Floating animation for logo
        const floatKeyframes = `
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
        `;
        const styleSheet = document.createElement('style');
        styleSheet.textContent = floatKeyframes;
        document.head.appendChild(styleSheet);
    </script>
</body>
</html>