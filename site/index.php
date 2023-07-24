<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Complaint Dashboard</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>

<?php require "database.php" ?>

<h1>Complaint Dashboard</h1>
<p>This is a dashboard for the Complaint Database as published by the <i>Consumer Financial Protection Bureau</i>. Data is broken down into Products and Sub-Products.


<div class="center"><canvas id="products"></canvas></div>
<div class="center"><canvas id="sub_products"></canvas></div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script>

	// Produce the Product Pie Chart
	const productJSONObject = <?php echo json_encode($product_totals) ?>;
	
	// Extract the labels from the object

	const allProjectLabels = [];

	const tempProjectLabels = Object.values(productJSONObject);
	tempProjectLabels.forEach(label => {
		allProjectLabels.push(Object.keys(label)[0]);
	});

	// Extract the values from the object

	const allProjectValues = [];

	const tempProjectValues = Object.values(productJSONObject);
	tempProjectValues.forEach(value => {
		allProjectValues.push(Object.values(value)[0]);
	});

	
	const product_chart_data = {
		labels: allProjectLabels,
		datasets: [{
			label: "Products",
			data: allProjectValues,
			hoverOffset: 4,
			backgroundColor: [
				'rgb(236, 58, 46)',
				'rgb(241, 116, 48)',
				'rgb(238, 104, 80)',
				'rgb(235, 91, 111)',
				'rgb(234, 123, 175)',
				'rgb(177, 152, 198)',
				'rgb(249, 187, 49)',
				'rgb(138, 175, 111)',
				'rgb(27, 162, 172)',
				'rgb(97, 140, 197)'
			]
		}]
	};



	const productConfig = {
		type: "doughnut",
		data: product_chart_data,

	};

	new Chart(
		document.getElementById('products'),
		productConfig,
	);

// Produce the Sub-product Pie Chart

const subproductJSONObject = <?php echo json_encode($sub_product_totals) ?>;

// Extract the labels from the object

const allSubLabels = [];

const tempSubLabels = Object.values(subproductJSONObject);
tempSubLabels.forEach(label => {
	allSubLabels.push(Object.keys(label)[0]);
});

	// Extract the values from the object

	const allSubValues = [];

	const tempSubValues = Object.values(productJSONObject);
	tempSubValues.forEach(value => {
		allSubValues.push(Object.values(value)[0]);
	});


const subproduct_chart_data = {
		labels: allSubLabels,
		datasets: [{
			label: "Products",
			data: allSubValues,
			hoverOffset: 4,
		}]
	};

	const subprojectConfig = {
		type: "line",
		data:subproduct_chart_data,
	};


	new Chart(
		document.getElementById('sub_products'),
		subprojectConfig,
	);


</script>
</body>
</html>
