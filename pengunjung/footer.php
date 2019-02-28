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

    <!-- Jquery CountTo Plugin Js -->
    <script src="../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js 
    <script src="../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../plugins/flot-charts/jquery.flot.time.js"></script> -->

    <!-- Sparkline Chart Plugin Js -->
    <!-- <script src="../plugins/jquery-sparkline/jquery.sparkline.js"></script> -->

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/ui/dialogs.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script src="../chat/chat.js"></script>
    <script>
        reloadData = function() {
            var id_user = "<?php echo $_SESSION['id_pengunjung']; ?>";
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {id_chat: id_user},
                success: function(result){
                    $("#chat_history").html("");
                    $("#chat_history").html(result); //takes the content of your url and throws it into div1
                }
            });
        }
        window.setInterval(reloadData, 3000); //every 3 seconds
        
        $('#sendChat').on('click', function(){
            var id_user = "<?php echo $_SESSION['id_pengunjung']; ?>";
            var txt = $('#textChat').val();
            if(txt != "") {
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    data: {id: id_user, text: txt},
                    success:function(result){
                        //console.log(result);
                        $("#chat_history").html("");
                        $("#chat_history").html(result);
                        $("#textChat").val("");
                    }
                });
            }
        });
        $('#changePassword').on('click', function (event) {
            $('#myModal').modal('show');
        });
        $('#btnUpdate').on('click', function (event) {
            var var_id = $('#id_password').val();
            var var_lama = $('#pass_lama').val();
            var var_baru = $('#pass_baru').val();
            if (var_lama != "" && var_baru != ""){
                $.ajax({
                    url:"ajax.php",
                    cache:false,
                    type: "POST",
                    data: {id: var_id, lama: var_lama, baru: var_baru},
                    success:function(result){
                        console.log(result);
                        if(result = true) {
                            //$('#myModal').modal('toggle');
                            swal({
                                title: "Success",
                                text: "Success updating password.",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                        else {
                            swal({
                                title: "Error",
                                text: "The older password didn't match.",
                                type: "warning",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }
            else{
                swal({
                    title: "Warning",
                    type: "warning",
                    text: "Data tidak boleh kosong.",
                    confirmButtonColor: "#d9534f",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    closeOnConfirm: false
                });
            }
        });
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