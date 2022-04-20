    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="https://khayrulshanto.xyz">Stock Management</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/dist/js/pages/dashboard2.js"></script>
    <!-- Steet alert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom Script -->
    <script src="./public/script.js"></script>
    <!-- Notifications -->
    <script>
    <?php
        if (isset($_SESSION['title']) && isset($_SESSION['text']) && isset($_SESSION['icon'])) { ?>
        swal({
            title: "<?php echo $_SESSION['title'] ?>",
            text: "<?php  echo $_SESSION['text'] ?>",
            icon: "<?php  echo $_SESSION['icon'] ?>",
            button: "Ok",
        });
        <?php
            unset($_SESSION['title']);
            unset($_SESSION['text']);
            unset($_SESSION['icon']);
        } ?>
        
    </script>
    </body>

    </html>