<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // Get the current URL path
        var APP_URL = '{{ env('APP_URL') }}';
        var currentUrl = window.location.href;
        currentUrl = currentUrl.replace(APP_URL,'');

        /*
        * Dashboard
        * */
        if (
            currentUrl === '/blogs' ||
            currentUrl === '/users'
        ) {
            // Add the 'open' class to the menu item with ID 'menu-item1'
            document.getElementById('sidebarDashboards').classList.add('show');
            if(currentUrl === '/blogs'){
                document.getElementById('urlBlog').classList.add('active');
            }
            if(currentUrl === '/users'){
                document.getElementById('urlUser').classList.add('active');
            }
        }

        /*
        * Tahap Awal
        * */
        if (
            currentUrl === '/restorative-justice/application' ||
            currentUrl === '/restorative-justice/reject'
        ) {
            // Add the 'open' class to the menu item with ID 'menu-item1'
            document.getElementById('sidebarFirstStep').classList.add('show');
            if(currentUrl === '/restorative-justice/application'){
                document.getElementById('urlApplication').classList.add('active');
            }
            if(currentUrl === '/restorative-justice/reject'){
                document.getElementById('urlReject').classList.add('active');
            }
        }
        /*
        * Perkara Narkotika
        * */
        if (
            currentUrl === '/restorative-justice/accept?m=narkotika'
        ) {
            // Add the 'open' class to the menu item with ID 'menu-item1'
            document.getElementById('sidebarNarkotika').classList.add('show');
            if(currentUrl === '/restorative-justice/accept?m=narkotika'){
                document.getElementById('urlAccpetNarkotika').classList.add('active');
            }
        }

        /*
        * Perkara Non-Narkotika
        * */
        if (
            currentUrl === '/restorative-justice/accept?m=non-narkotika'
        ) {
            // Add the 'open' class to the menu item with ID 'menu-item1'
            document.getElementById('sidebarNonNarkotika').classList.add('show');
            if(currentUrl === '/restorative-justice/accept?m=non-narkotika'){
                document.getElementById('urlAccpetNonNarkotika').classList.add('active');
            }
        }
    });
</script>