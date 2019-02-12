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
    
    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

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
    <!-- <script src="../js/pages/tables/jquery-datatable.js"></script> -->

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>

    <script>
        var stars;
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
            stars = this.value;
        });
    </script>
    <script>
        $('.cekbutton').click(function(e){
        var id = $('#id_pendaftaran').val();
            e.preventDefault(); 
            $.ajax({
                url:"ajax.php",
                type:"GET",
                data : "id="+id,
                success : function(result) {
                    //alert(result);
                    console.log(result);
                    var datanew = JSON.parse(result);
                    if (datanew.hasil === false) {
                        alert("Data pendaftaran tidak ada. Silahkan cek kembali");
                    }
                    $('#layanan').val(datanew.layanan);
                    $('#nama_perusahaan').val(datanew.nama);
                    $('#status').val(datanew.status);
                    $('#layanan').prop('disabled', true);
                    $('#nama_perusahaan').prop('disabled', true);
                    $('#status').prop('disabled', true);
                    setTimeout(function(){
                        $('#myModalRating').modal('show');
                    }, 3000);
                }
            });
        });
        $('.cekdaftar').click(function(e){
        var id = $('#id_pendaftaran').val();
            e.preventDefault(); 
            $.ajax({
                url:"ajax.php",
                type:"GET",
                data : "id_daftar="+id,
                success : function(result) {
                    //alert(result);
                    console.log(result);
                    var datanew = JSON.parse(result);
                    if (datanew.hasil === false) {
                        alert("Data pendaftaran tidak ada. Silahkan cek kembali");
                    }
                    $('#namapengunjung').val(datanew.nama);
                    $('#nama_perusahaan').val(datanew.perusahaan);
                    $('#nama_layanan').val(datanew.jenis);
                    //$('#nama_perusahaan').prop('disabled', true);
                    
                }
            });
        });
    </script>
    <script>
    function jenisLayanan() {
        var a = $('#nama_layanan').val();
        console.log(a);
        if(a == "") { 
            alert("Pilih jenis sertifikasi")
        }
    }
    </script>
    <script>
	$('.modalLink').click(function(){
		var id = $(this).attr('data-id');
		console.log(id);
		$.ajax({
			url:"modal-update.php",
			cache:false,
			type: "GET",
			data: "ID="+id,
			success:function(data){
				$(".modal-content").html(data);
			}
		});
	});
	</script>
    <script>
    $('#saveRating').click(function(e){
        //var stars = $(':radio').val();
        var var_keterangan = $('#keterangan').val();
        e.preventDefault(); 
        $.ajax({
            url:"ajax-rating.php",
            type:"POST",
            data: {rating: stars, keterangan: var_keterangan},
            success : function() {
                alert("Berhasil menyimpan rating");
                location.reload();
            }
        });
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
    <script>
    $(document).ready(function() {
        $('#dataTable1').DataTable( {
            "order": [[ 6, "asc" ]]
        } );
    } );
    </script>
</body>

</html>