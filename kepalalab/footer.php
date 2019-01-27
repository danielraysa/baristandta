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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

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
    <script src="../js/pages/tables/jquery-datatable.js"></script>
    
    <script src="data-chart.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script>
	$('.modalLink').click(function(){
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url:"ajax.php",
			type: "GET",
			data: "ID="+id,
			success:function(result){
                console.log(result)
                var data = JSON.parse(result);
				$('#id_pendaftaran').val(data.id);
                $('#nama_perusahaan').val(data.perusahaan);
                $('#nama_produk').val(data.nama);
                $('#jenis_produk').val(data.jenis);
                $('#jenis_sertifikasi').val(data.sertifikasi);
			}
		});
    });
    $('.modalUpdate').click(function(){
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url:"ajax.php",
			cache:false,
			type: "GET",
			data: "IDUPDATE="+id,
			success:function(result){
                console.log(result)
                var data = JSON.parse(result);
                $('#id_pendaftaran').val(data.id);
                $('#nama_perusahaan').val(data.perusahaan);
                $('#nama_produk').val(data.produk);
                $('#jenis_produk').val(data.jenis);
                $('#jenis_sertifikasi').val(data.sertifikasi);
			}
		});
    });
    $('.btnDelete').click(function(){
        var id = $(this).attr('data-id');
		$('#idpendaftaran').val(id);
        console.log(id);
    });
    $('.btnApprove').click(function(){
		var id = $(this).attr('data-id');
		$('#idapprove').val(id);
        console.log(id);
    });
	</script>
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