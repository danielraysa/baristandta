$(document).ready(function(){
    //admin cs
    $.ajax({
        url: "data-loketcs.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var bintang = [];
            var jumlah = [];

            for(var i in data) {
                bintang.push("Bintang "+data[i].angka_rating);
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
                            'rgb(223, 125, 14)',
                            'rgb(0, 174, 255)',
                            'rgb(0, 188, 212)',
                            'rgb(139, 195, 74)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Admin CS',
                        fontSize: 18
                    },
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: true
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
    //admin layanan
    $.ajax({
        url: "data-loketlayanan.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var bintang = [];
            var jumlah = [];

            for(var i in data) {
                bintang.push("Bintang "+data[i].angka_rating);
                jumlah.push(data[i].jumlahdata);
            }
            var ctx = document.getElementById("myChart_A");
            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: bintang,
                    datasets: [{
                        label: 'Jumlah',
                        data: jumlah,
                        backgroundColor: [
                            'rgb(202, 17, 17)',
                            'rgb(223, 125, 14)',
                            'rgb(0, 174, 255)',
                            'rgb(0, 188, 212)',
                            'rgb(139, 195, 74)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Admin Layanan',
                        fontSize: 18
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: true
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
    //admin pembayaran
    $.ajax({
        url: "data-loketpembayaran.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var bintang = [];
            var jumlah = [];

            for(var i in data) {
                bintang.push("Bintang "+data[i].angka_rating);
                jumlah.push(data[i].jumlahdata);
            }
            var ctx = document.getElementById("myChart_B");
            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: bintang,
                    datasets: [{
                        label: 'Jumlah',
                        data: jumlah,
                        backgroundColor: [
                            'rgb(202, 17, 17)',
                            'rgb(223, 125, 14)',
                            'rgb(0, 174, 255)',
                            'rgb(0, 188, 212)',
                            'rgb(139, 195, 74)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Admin Pembayaran',
                        fontSize: 18
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: true
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});