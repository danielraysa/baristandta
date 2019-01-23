$(document).ready(function(){
    $.ajax({
        url: "data-pie.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var bintang = [];
            var jumlah = [];

            for(var i in data) {
                bintang.push(data[i].angka_rating);
                jumlah.push(data[i].jumlahdata);
            }
            var ctx = document.getElementById("myChart");
            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: bintang,
                    datasets: [{
                        label: 'Jumlah',
                        data: jumlah,
                        backgroundColor: [
                            'rgb(202, 17, 17)',
                            'rgb(223, 125, 14)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Jumlah Penerimaan dari Jenis Kelamin',
                        fontSize: 18
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});