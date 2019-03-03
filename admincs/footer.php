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

    <!-- Moment Plugin Js -->
    <script src="../plugins/momentjs/moment.js"></script>
    
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    
    <!-- ChartJs -->
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
    <script src="../chat/chat.js"></script>

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
        // autoreload chat
        reloadData = function() {
            var id_user = "<?php echo $_SESSION['id_pegawai']; ?>";
            $.ajax({
                url: "ajax-message.php",
                type: "POST",
                data: {id_list: id_user},
                success: function(result){
                    $("#chat_list").html(result); //takes the content of your url and throws it into div1
                }
            });
        }
        //window.setInterval(reloadData, 5000); //every 5 seconds
        // chat_list on click
        var chatValue = "";
        //$('#chat_entry').on('click', function(){
        $('.chat_list').on('click', function(){
            //chatValue = $('.chat_list').attr('data-chat');
            chatValue = $(this).attr('data-chat');
            console.log(chatValue);
            $.ajax({
                url: "ajax-message.php",
                type: "POST",
                data: {id_chat: chatValue},
                success:function(result){
                    $("#textChat").val("");
                    $("#chat_history").html(result);
                }
            });
            //alert(chatValue);
        });
        // send chat
        $('#sendChat').on('click', function(){
            var id_user = chatValue;
            //alert(id_user);
            var txt = $('#textChat').val();
            if(txt != "") {
                $.ajax({
                    url: "ajax-message.php",
                    type: "POST",
                    data: {id: id_user, text: txt},
                    success:function(result){
                        $("#chat_history").html(result);
                        $("#textChat").val("");
                        location.reload();
                    }
                });
            }
        });
    </script>
    <script>
    /*
    function formatDate(date) {
        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();

        return day + ' ' + monthNames[monthIndex] + ' ' + year;
    } */
    $('.cekbutton').click(function(e){
        var id = $('#id_pendaftaran').val();
        e.preventDefault(); 
        $.ajax({
            url:"ajax.php",
            type:"GET",
            data : "id="+id,
            success : function(result) {
                console.log(result);
                var datanew = JSON.parse(result);
                if (datanew.hasil === true) {
                    $('#hasil1').val(datanew.asal);
                    $('#hasil2').val(datanew.nama);
                    $('#hasil3').val(datanew.jenis);
                    $('#tanggal').val(datanew.tanggal);
                    //$('#hasil1').prop('disabled', true);
                    //$('#hasil2').prop('disabled', true);
                    //$('#hasil3').prop('disabled', true);
                }
                else {
                    alert("Data pendaftaran tidak ada. Silahkan cek kembali");
                    $('#id_pendaftaran').val("");
                    $('#hasil1').val("");
                    $('#hasil2').val("");
                    $('#hasil3').val("");
                    $('#tanggal').val("");
                }
            }
        });
    });
    </script>
    <script>
    $('#btnservice').click(function(e){
        var var_nama = $('#nama_pengunjung').val();
        var var_perusahaan = $('#asal_perusahaan').val();
        var var_keluhan = $('#data_keluhan').val();
        e.preventDefault();
        if (!$('#nama_pengunjung').val() || !$('#asal_perusahaan').val() || !$('#data_keluhan').val()) {
            alert("Data tidak boleh ada yg kosong");
            console.log(e);
        }
        else {
            $.ajax({
                url:"ajax-keluhan.php",
                type:"POST",
                data: {nama: var_nama, perusahaan: var_perusahaan, keluhan: var_keluhan},
                //data : "{'nama': "+nama+", 'perusahaan': "+perusahaan+", 'keluhan': "+keluhan+"}",
                success : function() {
                    alert("Berhasil menyimpan data keluhan");
                    $('#myModal').modal('toggle');
                }
            });
        } 
    });
    </script>
    <script>
    $('#saveRating').click(function(e){
        var var_rating = $(':radio').val();
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
    $('.modalFilter').click(function(){
        $.ajax({
			url:"modal-filter.php",
			cache:false,
			type: "GET",
			data: "ID=",
			success:function(data){
				$(".modal-content").html(data);
			}
		});
		//var id = $(this).attr('data-id');
		//console.log(id);
	});
	</script>
    <script>
        $('#simpan_cetak').on('click', function(event){
            event.preventDefault();
            var var_id = $('#id_pendaftaran').val();
            var var_perusahaan = $('#hasil1').val();
            var var_produk = $('#hasil2').val();
            var var_jenis = $('#hasil3').val();
            var tgl_datang = $('#tanggal').val();
            var date_rec = new Date(tgl_datang);
            var date_now = new Date();
            var tgl_penyerahan = $('#tanggal_penyerahan').val();
            var var_pengunjung = $('#nama_pengunjung').val();
            if (tgl_penyerahan != "" && var_pengunjung != ""){
                if(date_rec <= date_now) {
                    $.ajax({
                        url:"ajax-daftar.php",
                        cache:false,
                        type: "POST",
                        data: {id: var_id, perusahaan: var_perusahaan, datang: tgl_datang, penyerahan: tgl_penyerahan, produk: var_produk, jenis: var_jenis, pengunjung: var_pengunjung},
                        success:function(data){
                            console.log(data);
                            var datanew = JSON.parse(data);
                            swal({
                                title: "Success",
                                type: "info",
                                text: "Berhasil menyimpan data. Silahkan mencetak bukti pendaftaran.",
                                showCancelButton: true,
                                confirmButtonColor: "#d9534f",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Print",
                                allowOutsideClick: false,
                                closeOnConfirm: false
                            }, function(){
                                swal({
                                    title: "Success",
                                    text: "Please wait a moment.",
                                    type: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                //window.open('cetak-nota.php?id='+datanew.id,'_blank');
                                window.location.href = 'index.php?success';
                                window.open('cetak-nota.php','_blank');
                            });
                        }
                    });
                }
                else {
                    swal({
                        title: "Warning",
                        type: "warning",
                        text: "Waktu kedatangan tidak boleh mendahului.",
                        confirmButtonColor: "#d9534f",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        closeOnConfirm: false
                    });
                }
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
    //Datetimepicker plugin
    $('.datepicker').bootstrapMaterialDatePicker({
        //format: 'dddd DD MMMM YYYY',
        format: 'YYYY-MM-DD (dddd DD MMMM YYYY)',
        clearButton: true,
        weekStart: 1,
        time: false
    });
    </script>
    
</body>

</html>