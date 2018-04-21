<?php
/*
 *Template Name: Cost of Living International
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
  margin-left: 0%;
}

line.grid {
  stroke: #d6d6d6;
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
	  
	  .svg-container {
				display: inline-block;
				position: relative;
				width: 100%;
				padding-bottom: 270%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
		.svg-content-responsive {
			display: inline-block;
			position: absolute;
			top: 10px;
			left: 0;
		}
</style>
</head>

<body>
<h2 id='titleWords'>Visualizing the Cost of Living in 540 Cities Around the World</h2>
<hr>
<p id='overview'>The dot plot below shows the rent index and cost of living index for 130 major U.S. cities. Each circle represents a city. New York is used as the baseline city with a rent and cost of living index of 100, to which all other cities are compared.<br><br>For example, San Francisco has a rent index of 113 and cost of living index of 99, indicating that it has higher average rent prices, but a slightly lower average cost of living than New York. Hover over individual circles for additional information.</p>
<hr>
<div id='chart'></div>
<p id='endNotes'>Data for this visual comes from <a href='https://www.numbeo.com/cost-of-living/rankings.jsp' target='_blank'>The 2018 Numbeo Cost of Living Index</a>.</p>

<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);
    
var margin = {top: 20, right: 20, bottom: 30, left: 30},
    width = 900 - margin.left - margin.right,
    height = 2000 - margin.top - margin.bottom;

//var x = d3.scaleLog()
//    .rangeRound([0, width]);

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);
    
//var y = d3.scale.sqrt()
//    .range([height, 0]);

var color = d3.scale.category10();

var countryNames = ['a', '2', '3', '4', '5', '6', '8'];

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")
    .tickValues(countryNames);

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var svg = d3.select("#chart").append("div")
			     .classed("svg-container", true)
			     	.append("svg")
			     	.attr("preserveAspectRatio", "xMidYMid meet")
			     	.attr("viewBox", "-40 -5 800 2400")
		                .classed("svg-content-responsive", true);
		                
var xTEST = d3.scale.ordinal()
    .domain(["", "  ", "Switzerland","Norway","Denmark","Japan","Finland","France","Ireland","Belgium","South Korea","New Zealand","Israel","Australia","Austria","Netherlands","Italy","Sweden","United Kingdom","Malta","Germany","United States","Canada","Taiwan","Greece","United Arab Emirates","Cyprus","Spain","Slovenia","Estonia","Croatia","Portugal","Slovakia","Lithuania","Saudi Arabia","Brazil","South Africa","Ecuador","Thailand","Czech Republic","Malaysia","Iraq","China","Poland","Hungary","Bulgaria","Bosnia And Herzegovina","Turkey","Vietnam","Morocco","Philippines","Russia","Romania","Indonesia","Serbia","Kazakhstan","Colombia","Mexico","Pakistan","Ukraine","India","Egypt"
])
    .rangePoints([0, (width - 108)]);

var xAxisTEST = d3.svg.axis()
    .scale(xTEST)
    .orient("bottom");

svg.append("g")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + (height + 0.5) + ")")
    .call(xAxisTEST)
    .selectAll("text")  
     .style("text-anchor", "end")
     .attr("dx", "-.8em")
     .attr("dy", ".15em")
     .attr("transform", "rotate(-65)");

d3.csv("https://raw.githubusercontent.com/ZDBobbitt/OccupationSalaries/master/costOfLivingInternational_MUNGED.csv", function(error, data) {
  if (error) throw error;

  data.forEach(function(d) {
    d.cost = +d.cost;
    d.id = +d.id;
  });

  x.domain([-1, 69]);
  //y.domain(d3.extent(data, function(d) { return d.cost; })).nice();
  y.domain([20, 150]);
  
  // Make the faint lines from y labels to highest dot
				var linesGrid = svg.selectAll("lines.grid")
					.data(data)
					.enter()
					.append("line");

				linesGrid.attr("class", "grid")
					.attr("x1", function(d) { return x(d.id); })
					.attr("y1", function()  { return y(20); })
					.attr("x2", function(d) { return x(d.id); })
					.attr("y2", function(d) { return y(d.cost); });

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis.ticks(10, ".0s"))
    .append("text")
      .attr("class", "label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Cost of Living Index")
     
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-773)
      .attr("y", 58)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Zurich")
      
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-529)
      .attr("y", 737)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("New York")
      
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-722)
      .attr("y", 837)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Tokyo")
      
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-535)
      .attr("y", 1040)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Halifax")
      
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-277)
      .attr("y", 1392)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Shanghai")
      
  svg.append("g")
    .append("text")
      .attr("class", "newYorkLabel")
      .attr("x", width-154)
      .attr("y", 1547)
      .attr("dy", ".4em")
      .style("text-anchor", "end")
      .text("Jakarta")

  svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("r", 4.5)
      .attr("cx", function(d) { return x(d.id); })
      .attr("cy", function(d) { return y(d.cost); })
      .style("fill", "#49c3ba")
      .style("stroke", "black")
      .on("mouseover", function(d) {
            d3.select(this).style("stroke-width", 3)		  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>City:</b> " + d.city + "," + d.country + "<br/><b>Cost of Living Index:</b> " 
                                     + d.cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
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