    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <!-- <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script> -->

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/ui/dialogs.js"></script>
    
    <script src="../js/pages/charts/chartjs.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script>
        $('#logoutButton').on('click', function (event) {
            event.preventDefault();
            var that = this;
            swal({
                title: "Do you want to log out?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d9534f",
                cancelButtonColor: "#d33",
                confirmButtonText: "Log out",
                closeOnConfirm: false
            }, function () {
                swal({
                    title: "Logout",
                    text: "You'll redirect to login site.",
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                });
                window.location = "../logout.php";
            });
        });
    </script>
</body>

</html>