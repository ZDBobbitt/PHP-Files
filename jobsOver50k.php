<?php
/*
 *Template Name: Jobs over $50k
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
	  #endNotes {
		 font-family: Raleway;
		 color: black;
		 font-size: 13px;
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
<h2 id='titleWords'>Average Salary & Employment<br>by Occupation in the U.S.</h2>
<hr>
<p id='overview'>The following chart shows the average annual salary and total employment of 820 different occupations in the U.S. Each circle represents a unique occupation. Hover over individual circles to see the occupation and it's salary.</p>
<hr>
<div id='chart'></div>
<p id='endNotes'>Data for this visual comes from <a href='https://www.bls.gov/oes/current/oes_nat.htm#00-0000' target='_blank'>The 2016 National Occupational Employment and Wage Estimates Study</a> by the U.S. Bureau of Labor Statistics.
<br>
<br>
Note: The x-axis uses a square-root scale to better display the data.</p>

<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);
    
var margin = {top: 20, right: 20, bottom: 30, left: 60},
    width = 1000 - margin.left - margin.right,
    height = 700 - margin.top - margin.bottom;

//var x = d3.scaleLog()
//    .rangeRound([0, width]);

var x = d3.scale.sqrt()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

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

d3.csv("https://raw.githubusercontent.com/ZDBobbitt/OccupationSalaries/master/salary_vs_employment_occupations.csv", function(error, data) {
  if (error) throw error;

  data.forEach(function(d) {
    d.averageSalary = +d.averageSalary;
    d.numberEmployed = +d.numberEmployed;
  });

  x.domain(d3.extent(data, function(d) { return d.numberEmployed; }));
  //y.domain(d3.extent(data, function(d) { return d.averageSalary; })).nice();
  y.domain([0, 280000]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis.ticks(10, ".1s"))
    .append("text")
      .attr("class", "label")
      .attr("x", width)
      .attr("y", -6)
      .attr("dy", ".2em")
      .style("text-anchor", "end")
      .text("Total # of People Employed");

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis.ticks(10, "$.0s"))
    .append("text")
      .attr("class", "label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Avg. Annual Salary")

  svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("r", 5)
      .attr("cx", function(d) { return x(d.numberEmployed); })
      .attr("cy", function(d) { return y(d.averageSalary); })
      .style("fill", "#9AFF9A")
      .style("stroke", "black")
      .on("mouseover", function(d) {
            d3.select(this).style("stroke-width", 3)		  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("Occupation: " + d.occupation + "<br/> Average Salary: $" + d.averageSalary.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "<br/> Total # Employed: " 
                                     + d.numberEmployed.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");
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