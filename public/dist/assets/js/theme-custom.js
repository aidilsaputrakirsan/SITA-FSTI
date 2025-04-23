// Custom Theme JavaScript for SITASI ITK

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // Initialize variables
    const body = document.querySelector('body');
    const sidebar = document.querySelector('.vertical-menu');
    const sidebarToggle = document.getElementById('vertical-menu-btn');
    const fullScreenBtn = document.getElementById('fullscreen-button');
    const menuItems = document.querySelectorAll('#sidebar-menu .has-arrow');
    const cards = document.querySelectorAll('.card');
    
    // Function to toggle fullscreen
    function toggleFullscreen() {
        if (!document.fullscreenElement && 
            !document.mozFullScreenElement && 
            !document.webkitFullscreenElement && 
            !document.msFullscreenElement) {
            // Enter fullscreen
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
            if (fullScreenBtn) {
                fullScreenBtn.innerHTML = '<i class="fas fa-compress-alt"></i>';
            }
        } else {
            // Exit fullscreen
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
            if (fullScreenBtn) {
                fullScreenBtn.innerHTML = '<i class="fas fa-expand-arrows-alt"></i>';
            }
        }
    }
    
    // Toggle fullscreen when button is clicked
    if (fullScreenBtn) {
        fullScreenBtn.addEventListener('click', function(e) {
            e.preventDefault();
            toggleFullscreen();
        });
    }
    
    // Toggle sidebar
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.toggle('sidebar-enable');
            
            // For desktop devices
            if (window.innerWidth >= 992) {
                document.body.classList.toggle('vertical-collpsed');
            }
            
            // Add animation effect
            if (sidebar) {
                sidebar.classList.add('animated');
                setTimeout(function() {
                    sidebar.classList.remove('animated');
                }, 300);
            }
        });
    }
    
    // Add ripple effect to buttons
    function createRipple(event) {
        const button = event.currentTarget;
        
        const circle = document.createElement('span');
        const diameter = Math.max(button.clientWidth, button.clientHeight);
        const radius = diameter / 2;
        
        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${event.clientX - button.getBoundingClientRect().left - radius}px`;
        circle.style.top = `${event.clientY - button.getBoundingClientRect().top - radius}px`;
        circle.classList.add('ripple');
        
        const ripple = button.getElementsByClassName('ripple')[0];
        
        if (ripple) {
            ripple.remove();
        }
        
        button.appendChild(circle);
    }
    
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', createRipple);
    });
    
    // Add wave effect for menu items
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const subMenu = this.nextElementSibling;
            if (subMenu) {
                if (subMenu.classList.contains('mm-show')) {
                    subMenu.style.display = 'block';
                    
                    // Slide up animation
                    const slideUp = subMenu.animate(
                        [
                            { opacity: 1, transform: 'translateY(0)' },
                            { opacity: 0, transform: 'translateY(-10px)' }
                        ],
                        { duration: 300, easing: 'ease-in-out' }
                    );
                    
                    slideUp.onfinish = function() {
                        subMenu.classList.remove('mm-show');
                        subMenu.style.display = '';
                    };
                } else {
                    subMenu.classList.add('mm-show');
                    
                    // Slide down animation
                    subMenu.animate(
                        [
                            { opacity: 0, transform: 'translateY(-10px)' },
                            { opacity: 1, transform: 'translateY(0)' }
                        ],
                        { duration: 300, easing: 'ease-in-out' }
                    );
                }
            }
        });
    });
    
    // Init tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Custom scrollbar initialization (simplified)
    if (typeof SimpleBar !== 'undefined') {
        document.querySelectorAll('[data-simplebar]').forEach(element => {
            new SimpleBar(element);
        });
    }
    
    // Card entrance animations
    function animateCards() {
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('card-animated');
            }, 100 * index);
        });
    }
    
    // Add CSS for animated cards
    const style = document.createElement('style');
    style.textContent = `
        .card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .card-animated {
            opacity: 1;
            transform: translateY(0);
        }
    `;
    document.head.appendChild(style);
    
    // Run card animations
    animateCards();
    
    // Toggle active class on menu items based on URL
    function setActiveMenuItem() {
        const currentUrl = window.location.href;
        const menuLinks = document.querySelectorAll('#sidebar-menu a');
        
        menuLinks.forEach(link => {
            if (currentUrl.includes(link.getAttribute('href'))) {
                link.classList.add('active');
                
                // If it's inside a submenu, expand the parent
                const parentLi = link.parentElement.parentElement.parentElement;
                if (parentLi && parentLi.classList.contains('mm-collapse')) {
                    parentLi.classList.add('mm-show');
                    const parentLink = parentLi.previousElementSibling;
                    if (parentLink) {
                        parentLink.classList.add('active');
                        parentLink.setAttribute('aria-expanded', 'true');
                    }
                }
            }
        });
    }
    
    setActiveMenuItem();
    
    // Notification dropdown animation
    const notificationDropdowns = document.querySelectorAll('.notification-dropdown');
    notificationDropdowns.forEach(dropdown => {
        dropdown.addEventListener('show.bs.dropdown', function () {
            const dropdownMenu = this.querySelector('.dropdown-menu');
            dropdownMenu.classList.add('animated', 'fadeInDown');
        });
        
        dropdown.addEventListener('hide.bs.dropdown', function () {
            const dropdownMenu = this.querySelector('.dropdown-menu');
            dropdownMenu.classList.remove('animated', 'fadeInDown');
        });
    });
    
    // Smooth scroll to top
    const scrollToTop = document.createElement('div');
    scrollToTop.className = 'scroll-to-top';
    scrollToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
    document.body.appendChild(scrollToTop);
    
    // Add CSS for scroll to top button
    const scrollTopStyle = document.createElement('style');
    scrollTopStyle.textContent = `
        .scroll-to-top {
            position: fixed;
            right: 20px;
            bottom: -50px;
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 999;
            opacity: 0;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .scroll-to-top.show {
            bottom: 20px;
            opacity: 1;
        }
        .scroll-to-top:hover {
            background-color: #2653d4;
            transform: translateY(-3px);
        }
    `;
    document.head.appendChild(scrollTopStyle);
    
    // Show/hide scroll to top button
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollToTop.classList.add('show');
        } else {
            scrollToTop.classList.remove('show');
        }
    });
    
    // Scroll to top when clicked
    scrollToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Preloader
    const preloader = document.querySelector('.preloader');
    if (preloader) {
        window.addEventListener('load', function() {
            preloader.style.opacity = '0';
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 500);
        });
    }
    
    // Add page transition effects
    const contentArea = document.querySelector('.page-content');
    if (contentArea) {
        contentArea.classList.add('fade-in');
    }
    
    // Add CSS for page transitions
    const transitionStyle = document.createElement('style');
    transitionStyle.textContent = `
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(transitionStyle);
    
    // Update active menu item on window hashchange
    window.addEventListener('hashchange', setActiveMenuItem);
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth < 992 && document.body.classList.contains('vertical-collpsed')) {
            document.body.classList.remove('vertical-collpsed');
        }
    });
    
    // Add a simple theme switcher
    const createThemeSwitcher = () => {
        const themeSwitch = document.createElement('div');
        themeSwitch.className = 'theme-switch';
        themeSwitch.innerHTML = `
            <button class="theme-switch-btn" id="theme-toggle">
                <i class="fas fa-moon"></i>
            </button>
        `;
        document.body.appendChild(themeSwitch);
        
        // Add CSS for theme switcher
        const switcherStyle = document.createElement('style');
        switcherStyle.textContent = `
            .theme-switch {
                position: fixed;
                right: 20px;
                bottom: 70px;
                z-index: 999;
            }
            .theme-switch-btn {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: var(--primary-color);
                color: #fff;
                border: none;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .theme-switch-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }
            body.dark-mode {
                background-color: #222;
                color: #f8f9fa;
            }
            body.dark-mode .card {
                background-color: #333;
                color: #f8f9fa;
            }
            body.dark-mode .table {
                color: #f8f9fa;
            }
            body.dark-mode .table-hover tbody tr:hover {
                background-color: #444;
            }
        `;
        document.head.appendChild(switcherStyle);
        
        // Toggle dark mode
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                document.body.classList.toggle('dark-mode');
                const isDarkMode = document.body.classList.contains('dark-mode');
                
                // Save preference in localStorage
                localStorage.setItem('dark-mode', isDarkMode);
                
                // Update icon
                this.innerHTML = isDarkMode ? 
                    '<i class="fas fa-sun"></i>' : 
                    '<i class="fas fa-moon"></i>';
            });
            
            // Check for saved preference
            if (localStorage.getItem('dark-mode') === 'true') {
                document.body.classList.add('dark-mode');
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            }
        }
    };
    
    // Initialize theme switcher
    createThemeSwitcher();
    
    // Show welcome toast notification
    const showWelcomeToast = () => {
        const toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
        toastContainer.innerHTML = `
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">SITASI ITK</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Welcome to SITASI ITK! Your final project management system.
                </div>
            </div>
        `;
        document.body.appendChild(toastContainer);
        
        if (typeof bootstrap !== 'undefined') {
            const toast = new bootstrap.Toast(document.querySelector('.toast'));
            setTimeout(() => {
                toast.show();
            }, 1000);
        }
    };
    
    // Show welcome toast if it's the first visit
    if (!sessionStorage.getItem('visited')) {
        showWelcomeToast();
        sessionStorage.setItem('visited', 'true');
    }
});

// Add page loading progress bar
window.addEventListener('beforeunload', function() {
    const progressBar = document.createElement('div');
    progressBar.className = 'page-loading-bar';
    document.body.appendChild(progressBar);
    
    // Add CSS for progress bar
    const progressStyle = document.createElement('style');
    progressStyle.textContent = `
        .page-loading-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(to right, #4e73df, #1cc88a);
            z-index: 9999;
            animation: progress-animation 2s ease;
        }
        
        @keyframes progress-animation {
            0% {
                width: 0;
            }
            50% {
                width: 65%;
            }
            100% {
                width: 100%;
            }
        }
    `;
    document.head.appendChild(progressStyle);
});