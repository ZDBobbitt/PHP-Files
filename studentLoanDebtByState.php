<?php
/*
 *Template Name: Student Loan Debt By State
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<script src="https://d3js.org/d3.v4.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');

/* Legend Font Style */
body {
	font: 11px sans-serif;
	background-color: #ffffff;
}
        
/* Legend Position Style */
.legend {
	position: absolute;
	left: 10px;
	top: 30px;
}

.axis text {
	font: 10px sans-serif;
}

.axis line, .axis path {
	fill: none;
	stroke: #000;
	shape-rendering: crispEdges;
}

#overview {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.75;
	 }
	 
#titleWords {
 font-family: Raleway;
 color: black;
 max-width: 500px;
 margin: 25px auto;
 text-align: center;
}

#endNotes {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.25;
		 font-size: 14px;
	 }

hr {
 outline: black;
 max-width: 500px;
 
}

.states {

}

div.tooltip {	
			position: absolute;			
			text-align: center;							
			padding: 6px;				
			font: 13px sans-serif;		
			background: white;	
			border: 0px;		
			border-radius: 8px;			
			pointer-events: none;
			line-height: 1.5;	
			color: black;
	  }

</style>
</head>
<body>

<div>
	<h2 id='titleWords'>Average Student Loan Debt<br>per Graduate by State</h2>
	<hr>
	<p id='overview'>The map below shows the average student loan debt per college graduate in all 50 U.S. states. Data for this visual comes from the <a href='https://studentloans.net/debt-per-graduate-statistics-2017/' target='_blank'>2017 Student Loan Report</a>, which notes some interesting finds:</p>
	<p id='overview'><b>The</b> national average student loan debt per graduate for the Class of 2016 was $17,126.</p>
	<p id='overview'><b>Nationally</b>, 61.22% of students graduated with student loan debt.</p>
	<p id='overview'><b>Utah</b> graduates left school with the least debt on average ($7,545) and New Hampshire graduates came out with the most debt on average ($27,167).</p>
	
        <hr>
</div>

<div id='map'></div>
<hr>
<p id='endNotes'><b>Technical notes:</b> This map was created using D3.js, a javascript library for producing visualizations. Code for this visual is based on <a href='https://bl.ocks.org/wboykinm/dbbe50d1023f90d4e241712395c27fb3' target='_blank'>this D3.js Block</a> by Bill Morris.</p>

<script>

//data for this visual comes from https://studentloans.net/debt-per-graduate-statistics-2017/
//code for this visual is based on https://bl.ocks.org/wboykinm/dbbe50d1023f90d4e241712395c27fb3

//Width and height of map
var width = 960;
var height = 500;

var lowColor = '#f9f9f9'
var highColor = '#197f8d'

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

// D3 Projection
var projection = d3.geoAlbersUsa()
  .translate([width / 2, height / 2]) // translate to center of screen
  .scale([1000]); // scale things down so see entire US

// Define path generator
var path = d3.geoPath() // path generator that will convert GeoJSON to SVG paths
  .projection(projection); // tell path generator to use albersUsa projection

//Create SVG element and append map to the SVG
var svg = d3.select("#map")
  .append("svg")
  .attr("width", width)
  .attr("height", height);

// Load in my states data!
d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/avgDebtPerGrad.csv", function(data) {
	var dataArray = [];
	for (var d = 0; d < data.length; d++) {
		dataArray.push(parseFloat(data[d].avgDebtPerGrad))
	}
	var minVal = d3.min(dataArray)
	var maxVal = d3.max(dataArray)
	var ramp = d3.scaleLinear().domain([minVal,maxVal]).range([lowColor,highColor])
	
  // Load GeoJSON data and merge with states data
  d3.json("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/us-states.json", function(json) {

    // Loop through each state data value in the .csv file
    for (var i = 0; i < data.length; i++) {

      // Grab State Name
      var dataState = data[i].state;

      // Grab data value 
      var dataValue = data[i].avgDebtPerGrad;

      // Find the corresponding state inside the GeoJSON
      for (var j = 0; j < json.features.length; j++) {
        var jsonState = json.features[j].properties.name;

        if (dataState == jsonState) {

          // Copy the data value into the JSON
          json.features[j].properties.avgDebtPerGrad = dataValue;

          // Stop looking through the JSON
          break;
        }
      }
    }

    // Bind the data to the SVG and create one path per GeoJSON feature
    svg.selectAll("path")
      .data(json.features)
      .enter()
      .append("path")
      .attr("d", path)
      .style("stroke", "#fff")
      .style("stroke-width", "1")
      .style("fill", function(d) { return ramp(d.properties.avgDebtPerGrad) })
            .on("mouseover", function(d) {
            d3.select(this).style("opacity", .7)	  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>State:</b> " + d.properties.name + "<br/> <b>Average Debt per Graduate:</b> " + "$" + d.properties.avgDebtPerGrad.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
        .on("mouseout", function(d) {
            d3.select(this).style("opacity", 1)		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
        
    
		// add a legend
		var w = 140, h = 350;

		var key = svg
			.append("g")
			.attr("width", w)
			.attr("height", h)
			.attr("class", "legend");

		var legend = key.append("defs")
			.append("svg:linearGradient")
			.attr("id", "gradient")
			.attr("x1", "100%")
			.attr("y1", "0%")
			.attr("x2", "100%")
			.attr("y2", "100%")
			.attr("spreadMethod", "pad");

		legend.append("stop")
			.attr("offset", "0%")
			.attr("stop-color", highColor)
			.attr("stop-opacity", 1);
			
		legend.append("stop")
			.attr("offset", "100%")
			.attr("stop-color", lowColor)
			.attr("stop-opacity", 1);

		key.append("rect")
			.attr("width", w - 100)
			.attr("height", h)
			.style("fill", "url(#gradient)")
			.attr("transform", "translate(0,60)");

		var y = d3.scaleLinear()
			.range([h, 0])
			.domain([minVal, maxVal]);

		var yAxis = d3.axisRight(y);

		key.append("g")
			.attr("class", "y axis")
			.attr("transform", "translate(41,60)")
			.call(yAxis.ticks(8, "$.0s"));
			
		  svg.append("g")
		    .append("text")
		      .attr("x", width-959)
		      .attr("y", 55)
		      .text("Avg. Debt per Grad")

  }); //end json stuff
}); //end csv stuff
</script>
</body>
</html>
<?php get_footer();?>