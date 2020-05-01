<?php
include('../koneksi.php');
$produk = mysqli_query($koneksi,"select * from tb_negara");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['nama'];
	
	$query = mysqli_query($koneksi,"select sum(td) as total_case from tb_case where id_negara='".$row['id_negara']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['total_case'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="../Chart.js"></script>
</head>
<body>
	<h2>Total Deaths <span class="badge badge-danger">Pie Chart</span></h2>
	
  	<div class="btn-group">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Total Cases</button>
    	<div class="dropdown-menu">
    		<a class="dropdown-item" href="../tc/index.php">Line Chart</a>
    		<a class="dropdown-item" href="../tc/bar_tc.php">Bar Chart</a>
    		<a class="dropdown-item" href="../tc/pie_tc.php">Pie Chart</a>
    		<a class="dropdown-item" href="../tc/donat_tc.php">doughnut Chart</a>
  		</div>
  	</div>
  	<div class="btn-group">
    <button class="btn btn-outline-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New Cases</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../nc/index.php">Line Chart</a>
        <a class="dropdown-item" href="../nc/bar_nc.php">Bar Chart</a>
        <a class="dropdown-item" href="../nc/pie_nc.php">Pie Chart</a>
        <a class="dropdown-item" href="../nc/donat_nc.php">doughnut Chart</a>
      </div>
    </div>
    <div class="btn-group">
    <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Total Deaths</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php">Line Chart</a>
        <a class="dropdown-item" href="bar_td.php">Bar Chart</a>
        <a class="dropdown-item" href="pie_td.php">Pie Chart</a>
        <a class="dropdown-item" href="donat_td.php">doughnut Chart</a>
      </div>
    </div><div class="btn-group">
    <button class="btn btn-outline-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New Deaths</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../nd/index.php">Line Chart</a>
        <a class="dropdown-item" href="../nd/bar_nd.php">Bar Chart</a>
        <a class="dropdown-item" href="../nd/pie_nd.php">Pie Chart</a>
        <a class="dropdown-item" href="../nd/donat_nd.php">doughnut Chart</a>
      </div>
    </div><div class="btn-group">
    <button class="btn btn-outline-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Total Recovered</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../tr/index.php">Line Chart</a>
        <a class="dropdown-item" href="../tr/bar_tr.php">Bar Chart</a>
        <a class="dropdown-item" href="../tr/pie_tr.php">Pie Chart</a>
        <a class="dropdown-item" href="../tr/donat_tr.php">doughnut Chart</a>
      </div>
    </div><div class="btn-group">
    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Active Cases</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../ac/index.php">Line Chart</a>
        <a class="dropdown-item" href="../ac/bar_ac.php">Bar Chart</a>
        <a class="dropdown-item" href="../ac/pie_ac.php">Pie Chart</a>
        <a class="dropdown-item" href="../ac/donat_ac.php">doughnut Chart</a>
      </div>
    </div>
  <br>
  <br>
	<div class="alert alert-danger" role="alert">
Data dapat berubah sewaktu-waktu!
</div>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'black',
					'pink',
					'green',
					'white',
					'orange',
					'silver'
					],
					borderColor:[
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black'	
					],
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_produk); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>