    <!-- JS -->
    <!-- CDNs -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Frameworks -->
    <script src="assets/js/materialize.min.js"></script>
    <!-- Init -->
    <script src="assets/js/init/mobile-nav.js"></script>
    <script src="assets/js/init/slider.js"></script>
    <script src="assets/js/init/tooltip.js"></script>
    <script src="assets/js/init/floating-action-btn.js"></script>
    <script src="assets/js/init/modal.js"></script>
    <script src="assets/js/init/dropdown.js"></script>
    <script src="assets/js/init/parallax.js"></script>
    <script src="assets/js/init/collapsible.js"></script>
    <script src="assets/js/init/material-box.js"></script>
    <!-- Chart.js -->
    <?php
    if (!isset($_GET['p']) || empty($_GET['p'])) {
    ?>
    <script src="assets/js/chartjs/newusers.js"></script>
    <script src="assets/js/chartjs/popularcat.js"></script>
    <?php
    }
    ?>
    <!-- AJAX -->
    <script src="assets/js/ajax/login.ajax.js"></script>
    <script src="assets/js/ajax/logout.ajax.js"></script>
    