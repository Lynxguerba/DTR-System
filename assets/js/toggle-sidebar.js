function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var newWidth = sidebar.style.width === '250px' ? '120px' : '250px';
    sidebar.style.width = newWidth;
    sessionStorage.setItem('sidebarWidth', newWidth);
    }

    // Retrieve and set sidebar width from session storage on page load
    document.addEventListener('DOMContentLoaded', function () {
        var storedWidth = sessionStorage.getItem('sidebarWidth');
        if (storedWidth) {
            document.querySelector('.sidebar').style.width = storedWidth;
        }
    });
