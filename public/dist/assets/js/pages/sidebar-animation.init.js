// Simpan dalam file baru: dist/assets/js/pages/sidebar-animation.init.js
document.addEventListener('DOMContentLoaded', function() {
    // Animasi untuk menu sidebar
    const menuItems = document.querySelectorAll('#sidebar-menu li a');
    
    // Tambahkan efek hover dengan kelas CSS
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.classList.add('menu-hover');
        });
        
        item.addEventListener('mouseleave', function() {
            this.classList.remove('menu-hover');
        });
        
        // Tambahkan efek klik untuk menu dropdown
        if (item.classList.contains('has-arrow')) {
            item.addEventListener('click', function(e) {
                const subMenu = this.nextElementSibling;
                const arrowIcon = this.querySelector('.menu-arrow');
                
                if (subMenu && arrowIcon) {
                    if (subMenu.classList.contains('mm-show')) {
                        arrowIcon.style.transform = 'rotate(0deg)';
                    } else {
                        arrowIcon.style.transform = 'rotate(90deg)';
                    }
                }
            });
        }
    });
    
    // Tandai menu aktif berdasarkan URL
    const currentUrl = window.location.href;
    menuItems.forEach(item => {
        if (currentUrl.includes(item.getAttribute('href')) && 
            item.getAttribute('href') !== '#' && 
            item.getAttribute('href') !== 'javascript: void(0);') {
            
            item.classList.add('active');
            
            // Jika di dalam submenu, buka parent menu
            const parentMenu = item.closest('.mm-collapse');
            if (parentMenu) {
                parentMenu.classList.add('mm-show');
                const parentLink = parentMenu.previousElementSibling;
                if (parentLink && parentLink.classList.contains('has-arrow')) {
                    parentLink.classList.add('active');
                    parentLink.setAttribute('aria-expanded', 'true');
                }
            }
        }
    });
});