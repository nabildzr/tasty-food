document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const hamburger = document.getElementById('hamburgerBtn');
            const closeBtn = document.getElementById('closeSidebar');
            const body = document.body;

            function openSidebar() {
                sidebar.classList.add('active');
                overlay.classList.add('active');
                body.classList.add('sidebar-open');
            }

            function closeSidebar() {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                body.classList.remove('sidebar-open');
            }
            hamburger.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeSidebar();
            });
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', closeSidebar);
            });
        });