<html>
<head>
	<title>learning php is fun!</title>

	<style type="text/css">

	body {
		font-family: helvetica, arial, sans-serif;
	}

	div.halfWidth {
    width: 45%;
    /* border: 1px solid black; */
    float: left;
    height: 150px;
    margin: 1%;
}



	div.addPerson {
		position: relative;
		float: right;
		border: 1px solid black;
		padding:20px;
	}

	div.content {
		position: relative;
		float: left;
		border: 1px solid black;
		padding:10px;
		width: 800px;
	}

	div.wrapper {
		background:#e6e6e6;
		padding:20px;
		margin:10px;
	}

	div.filters {
		overflow: auto;
		border-bottom: 1px solid black;
		margin-bottom: 20px;
	}

	</style>

</head>
<body>

	<?php 
		include "json.php"
	?>

	<script>
		$(function() {
		    $( "#slider-range" ).slider({
		      range: true,
		      min: 1900,
		      max: 2016,
		      values: [ 1950, 1960 ],
		      slide: function( event, ui ) {
		        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
		        //call the database search by date function, will update in real time
		        database.searchbyDate(".content", ui.values[ 0 ], ui.values[ 1 ])
		      }
		    });
		    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
		      " - " + $( "#slider-range" ).slider( "values", 1 ) );
		});
  	</script>

	<div class="filters">
		<div class="halfWidth">
			<h1>Tag Filter:</h1>
			<button onclick='database.appendAllTo(".content")'>View All</button>
			<button onclick='database.appendAllByTag(".content", "racism")'>Racism</button>
			<button onclick='database.appendAllByTag(".content", "activism")'>Activism</button>
			<button onclick='database.appendAllByTag(".content", "housing")'>Housing</button>
			<button onclick='database.appendAllByTag(".content", "development")'>Development</button>
			<button onclick='database.appendAllByTag(".content", "dome")'>Dome</button>
		</div>
		<div class="halfWidth">
			<h1>Date Filter:</h1>
			<p>
			  	<label for="amount">Year range:</label>
			  	<input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;">
			</p>
			<div id="slider-range" style="margin-bottom:20px;"></div>
		</div>
	</div>

	<div class="addPerson"><h1> add an item </h1>
		<form action="create.php" method="post">

			Name: <input type="text" name="inputName" value=""><br><br>
			Subhead: <input type="text" name="inputSubhead" value=""><br><br>
			Description: <input type="text" name="inputDesc" value=""><br><br>
			Media Type: <input type="text" name="inputMedia" value=""><br><br>
			Date: <input type="text" name="inputDate" value=""><br><br>
			Tags: <br>
			<input type="checkbox" name="tag01" value="racism" > Racism<br>
			<input type="checkbox" name="tag02" value="activism" > Activism<br>
			<input type="checkbox" name="tag03" value="development" > Development<br>
			<input type="checkbox" name="tag04" value="housing" > Housing<br>
			<input type="checkbox" name="tag05" value="dome" > Dome<br>
			<br>
			<input type="submit" name="submit">

		</form>
	</div>
	<div class="content">

	</div>

	<script type="text/javascript">
		database.appendAllTo(".content")
	</script>
	 

</body>
</html>