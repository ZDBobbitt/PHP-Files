<?php
/*
 *Template Name: Food Index
 *Template Post Type: post
 */
 
 get_header(); ?>

<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.axis text {
  font: 11px sans-serif;
}

.cells path {
  fill: none;
  pointer-events: all;
}

.cells :hover circle {
  fill: red;
}

svg {
  margin-left: -9%;
}

div.tooltip {	
			position: absolute;			
			text-align: center;							
			padding: 6px;				
			font: 12px sans-serif;		
			background: white;	
			border: 0px;		
			border-radius: 8px;			
			pointer-events: none;
			line-height: 1.5;	
			color: black;
	  }
	  
	 #overview {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
	 }
	 #titleWords {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 text-align: center;
	 }
	 hr {
		 outline: black;
		 max-width: 500px;
	 }
	 .graph3Label {
			font-family: sans-serif;
			font-size: 11px;
			color: gray;
			}
	.newYorkLabel {
			font-family: sans-serif;
			font-size: 14px;
			color: black;
			font-weight: bold;
			}
	  #endNotes {
		 font-family: Raleway;
		 color: black;
		 font-size: 15px;
		 margin: 15px auto;
	  }
	  .words {
		  color: black;
		  font-size: 18px;
	  }
	  div.tooltip {	
			position: absolute;			
			text-align: center;							
			padding: 6px;				
			font: 12px sans-serif;		
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
<h2 id='titleWords'>Visualizing Food Prices in 130 Major U.S. Cities</h2>
<hr>
<p id='overview'>The scatterplot below shows the food index and restaurant index for 130 major U.S. cities. Each circle represents a city. New York is used as the baseline city with a grocery index and restaurant index of 100, to which all other cities are compared.<br><br>For example, Anchorage, Alaska has a grocery index of 103 and restaurant index of 88, indicating that it has 3% higher grocery prices than New York, but 12% lower restaurant prices, on average. Hover over individual circles for additional information.</p>
<hr>
<div id='chart'></div>
<p id='endNotes'>Data for this visual comes from <a href='https://www.numbeo.com/cost-of-living/region_rankings_current.jsp?region=019' target='_blank'>The 2018 Numbeo Cost of Living Index</a>.</p>

<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);
    
var margin = {top: 20, right: 20, bottom: 30, left: 80},
    width = 800 - margin.left - margin.right,
    height = 750 - margin.top - margin.bottom;

//var x = d3.scaleLog()
//    .rangeRound([0, width]);

var x = d3.scale.sqrt()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);
    
//var y = d3.scale.sqrt()
//    .range([height, 0]);

var color = d3.scale.category10();

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var svg = d3.select("#chart").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.csv("https://raw.githubusercontent.com/ZDBobbitt/OccupationSalaries/master/costOfLivingIndex.csv", function(error, data) {
  if (error) throw error;

  data.forEach(function(d) {
    d.restaurantPriceIndex = +d.restaurantPriceIndex;
    d.groceriesIndex = +d.groceriesIndex;
  });

  x.domain([55, 115]);
  //y.domain(d3.extent(data, function(d) { return d.restaurantPriceIndex; })).nice();
  y.domain([55, 105]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis.ticks(10, ".0s"))
    .append("text")
      .attr("class", "label")
      .attr("x", width)
      .attr("y", -6)
      .attr("dy", ".2em")
      .style("text-anchor", "end")
      .text("Groceries Index");

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis.ticks(10, ".0s"))
    .append("text")
      .attr("class", "label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Restaurant Index")
      
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-83)
      .attr("y", 80)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("New York")
  
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-100)
      .attr("y", 210)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Anchorage")

  svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("r", 6)
      .attr("cx", function(d) { return x(d.groceriesIndex); })
      .attr("cy", function(d) { return y(d.restaurantPriceIndex); })
      .style("fill", "#f6b34b")
      .style("stroke", "black")
      .on("mouseover", function(d) {
            d3.select(this).style("stroke-width", 3)		  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>City:</b> " + d.City + "<br/> <b>Restaurant Index:</b> " + d.restaurantPriceIndex.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "<br/> <b>Groceries Index:</b> " 
                                     + d.groceriesIndex.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
        .on("mouseout", function(d) {
            d3.select(this).style("stroke-width", 1)			
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
});

</script>
</body>

</html>
<?php get_footer();?>