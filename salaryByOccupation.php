<?php
/*
 *Template Name: Average Salary by Occupation
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
  font: 10px sans-serif;
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
	  #endNotes {
		 font-family: Raleway;
		 color: black;
		 font-size: 13px;
	  }
	  .words {
		  color: black;
		  font-size: 18px;
	  }
</style>
</head>

<body>
<h2 id='titleWords'>Average Salary by Profession</h2>
<hr>
<p id='overview'>The following chart shows the average annual salary of 820 different professions in the U.S. Each circle represents a unique profession. Hover over individual circles to see the profession and it's salary.</p>
<hr>
<svg width="960" height="650"></svg>
<p id='endNotes'>Data for this visual comes from <a href='https://www.bls.gov/oes/current/oes_nat.htm#00-0000' target='_blank'>The 2016 National Occupational Employment and Wage Estimates Study</a> by the U.S. Bureau of Labor Statistics.</p>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var svg = d3.select("svg"),
    margin = {top: 10, right: 40, bottom: 40, left: 40},
    width = svg.attr("width") - margin.left - margin.right,
    height = svg.attr("height") - margin.top - margin.bottom;

var formatValue = d3.format(",d");

var x = d3.scaleLog()
    .rangeRound([0, width]);

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.csv("https://raw.githubusercontent.com/ZDBobbitt/OccupationSalaries/master/occupationSalaries.csv", type, function(error, data) {
  if (error) throw error;

  x.domain(d3.extent(data, function(d) { return d.value; }));

  var simulation = d3.forceSimulation(data)
      .force("x", d3.forceX(function(d) { return x(d.value); }).strength(1))
      .force("y", d3.forceY(height / 2))
      .force("collide", d3.forceCollide(12))
      .stop();

  for (var i = 0; i < 120; ++i) simulation.tick();

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x).ticks(20, "$.0s"));

  var cell = g.append("g")
      .attr("class", "cells")
    .selectAll("g").data(d3.voronoi()
        .extent([[-margin.left, -margin.top], [width + margin.right, height + margin.top]])
        .x(function(d) { return d.x; })
        .y(function(d) { return d.y; })
      .polygons(data)).enter().append("g");

  cell.append("circle")
      .attr("r", 7)
	  .style("fill", "teal")
	  .style("stroke", "black")
      .attr("cx", function(d) { return d.data.x; })
      .attr("cy", function(d) { return d.data.y; });
	  
	  cell.on("mouseover", function(d) {
            d3.select(this).style("stroke-width", 3)		  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("Occupation: " + d.data.id + "<br/> Average Salary: $" + d.data.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");
            })					
        .on("mouseout", function(d) {
            d3.select(this).style("stroke-width", 1)			
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });

  cell.append("path")
      .attr("d", function(d) { return "M" + d.join("L") + "Z"; });

});

function type(d) {
  if (!d.value) return;
  d.value = +d.value;
  return d;
}

svg.append("text")
	.attr("class", "graph3Label")
	.attr("transform", "translate("+ (890) +","+(607)+")")
	.text("Salary");

</script>

</body>

</html>
<?php get_footer();?>