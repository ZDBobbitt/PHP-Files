<?php
/*
 *Template Name: Rockstar Finance Net Worths March 2018
 *Template Post Type: post
 */
 
get_header(); ?>
<html>

  <head>
    <script data-require="d3@4.0.0" data-semver="4.0.0" src="https://d3js.org/d3.v4.min.js"></script>
    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');
    	 #overview, label {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
	 }
	 
	 #end {
	       font-family: Raleway;
	       color: black;
	       font-size: 12px;
	 }
	 
	 #titleWords {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 text-align: center;
	 }
	 
	 span {
	 color: black;
	 }
	 
	 div.tooltip {		
			font: 20px Raleway;		
			line-height: 1.5;	
			color: black;
	  }
	  
	  .chartLabel {
			font-family: Raleway;
			font-size: 13px;
			color: black;
			}
			
    </style>
  </head>

  <body>
    <div>
    <h2 id='titleWords'>Visualizing the Net Worth <br>of 500+ Rockstar Finance Bloggers</h2>
    <hr>
    <p id='overview'>Rockstar Finance <a href='https://directory.rockstarfinance.com/blogger-net-worth-tracker' target='_blank'>currently tracks the net worth</a> of over 500 personal finance bloggers. In the chart below, each dot represents the net worth of a particular blogger. Dots are color coded according to the blogger's age. Hover over 
    individual dots for more information.</p>
    <hr>
    </div>
    <div id="svganchor"></div>
    <div id="checkboxes">
      <span id = 'overview'>Age Group:  </span>
      <label>
        <input type="checkbox" id = "squaredTwo" name="Age" value="20s" checked="" />
20s
					        <span id="Color20" style="font-size:40px;">•  </span>
      </label>
      <label>
        <input type="checkbox" name="Age" value="30s" checked="" />
30s 
					        <span id="Color30" style="font-size:40px;">•  </span>
      </label>
      <label>
        <input type="checkbox" name="Age" value="40s" checked="" />
40s 
					        <span id="Color40" style="font-size:40px;">•  </span>
      </label>
      <label>
        <input type="checkbox" name="Age" value="50+" checked="" />
50+ 
					        <span id="Color50" style="font-size:40px;">•  </span>
      </label>
    
    <div>
    <p id='end'><b>Technical notes:</b> The code used for this visual was adopted from <a href='https://plnkr.co/edit/VwyXfbc94oXp6kXQ7JFx?p=preview' target='_blank'>this Plunker</a>.
       Bloggers with negative net worths or unspecified age brackets were left out of this visual for coding purposes. This chart uses a log scale to 
       better display the data.</p>
    </div>
    
    <script>
    // Code goes here


			var w = 800, h = 500;

			var padding = [0, 40, 34, 40];
			var r = 6;

			var xScale = d3.scaleLinear()
				.range([ padding[3], w - padding[1] ]);

			var xAxis = d3.axisBottom(xScale)
				.ticks(10, ".0s")
				.tickSizeOuter(0);

			var colors = d3.scaleOrdinal()
				.domain(["20s", "30s", "40s", "50+"])
				.range(['#26CDCD','#54FF9F','#FF7373','#c58fec']);

			d3.select("#Color20").style("color", colors("20s"));
			d3.select("#Color30").style("color", colors("30s"));
			d3.select("#Color40").style("color", colors("40s"));
			d3.select("#Color50").style("color", colors("50+"));

			var formatNumber = d3.format(",");

			var tt = d3.select("#svganchor").append("div")	
				.attr("class", "tooltip")				
				.style("opacity", 0);

			var svg = d3.select("#svganchor")
				.append("svg")
				.attr("width", w)
				.attr("height", h);
				
			svg.append("g")
			    .append("text")
			      .attr("class", "chartLabel")
			      .attr("x", 760)
			      .attr("y", 459)
			      .attr("dy", ".4em")
			      .style("text-anchor", "end")
			      .text("Net Worth")

			var xline = svg.append("line")
				.attr("stroke", "gray")
				.attr("stroke-dasharray", "1,2");

			var chartState = {};

			chartState.variable = "netWorth";
			chartState.scale = "scaleLog";
			//chartState.legend = "Net Worth";

			d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Rockstar-Finance-Net-Worths/master/Rockstar_NW_Mar_2018.csv", function(error, data) {
				if (error) throw error;

				var dataSet = data;

				xScale.domain(d3.extent(data, function(d) { return +d.netWorth; }));

				svg.append("g")
      				.attr("class", "x axis")
      				.attr("transform", "translate(0," + (h - padding[2]) + ")")
      				.call(xAxis);

      			var legend = svg.append("text")
      				.attr("text-anchor", "middle")
      				.attr("x", w / 2)
      				.attr("y", h - 4)
      				.attr("font-family", "PT Sans")
      				.attr("font-size", 12)
      				.attr("fill", "darkslategray")
      				.attr("fill-opacity", 1)
      				.attr("class", "legend");

				redraw(chartState.variable);

				d3.selectAll("input").on("change", filter);

				function redraw(variable){

					if (chartState.scale == "scaleLinear"){ xScale = d3.scaleLinear().range([ padding[3], w - padding[1] ]);}

					if (chartState.scale == "scaleLog"){ xScale = d3.scaleLog().range([ padding[3], w - padding[1] ]);}

					xScale.domain(d3.extent(dataSet, function(d) { return +d[variable]; }));

					var xAxis = d3.axisBottom(xScale)
						.ticks(10, ".0s")
						.tickSizeOuter(0);

					d3.transition(svg).select(".x.axis").transition().duration(1000)
      					.call(xAxis);

					var simulation = d3.forceSimulation(dataSet)
						.force("x", d3.forceX(function(d) { return xScale(+d[variable]); }).strength(2))
				    	.force("y", d3.forceY((h / 2)-padding[2]/2))
				    	.force("collide", d3.forceCollide(r * 1.333))
				    	.stop();

					for (var i = 0; i < dataSet.length; ++i) simulation.tick();

					var countriesCircles = svg.selectAll(".countries")
						.data(dataSet, function(d) { return d.blog});

					countriesCircles.exit()
						.transition()
				    	.duration(1000)
				    	.attr("cx", 0)
						.attr("cy", (h / 2)-padding[2]/2)
						.remove();

					countriesCircles.enter()
						.append("circle")
						.attr("class", "countries")
						.attr("cx", 0)
						.attr("cy", (h / 2)-padding[2]/2)
						.attr("r", r)
						.attr("fill", function(d){ return colors(d.Age)})
						.style("stroke", "black")
						.style("stroke-width", "0")
						.merge(countriesCircles)
						.transition()
				    	.duration(2000)
				    	.attr("cx", function(d) { return d.x; })
				    	.attr("cy", function(d) { return d.y; });

					legend.text(chartState.legend);

				    d3.selectAll(".countries").on("mouseover", function(d) {
				                d3.select(this).style("stroke-width", 3)	
						tt.html("<strong>Blog: </strong>" + d.blog + "<br>"
						+ "<strong>Net Worth:</strong>" +  " $" + d.netWorth.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))
							.style('top', d3.event.pageY - 12 + 'px')
							.style('left', d3.event.pageX + 25 + 'px')
							.style("opacity", 0.9);

							xline.attr("x1", d3.select(this).attr("cx"))
								.attr("y1", d3.select(this).attr("cy"))
								.attr("y2", (h - padding[2]))
								.attr("x2",  d3.select(this).attr("cx"))
								.attr("opacity", 1);

					}).on("mouseout", function(d) {
					        d3.select(this).style("stroke-width", 0)	
						tt.style("opacity", 0);
						xline.attr("opacity", 0);
					});
					
					

				//end of redraw
				}

				function filter(){

					function getCheckedBoxes(chkboxName) {
					  var checkboxes = document.getElementsByName(chkboxName);
					  var checkboxesChecked = [];
					  for (var i=0; i<checkboxes.length; i++) {
					     if (checkboxes[i].checked) {
					        checkboxesChecked.push(checkboxes[i].defaultValue);
					     }
					  }
					  return checkboxesChecked.length > 0 ? checkboxesChecked : null;
					}

					var checkedBoxes = getCheckedBoxes("Age");
					
					var newData = [];

					if (checkedBoxes == null){ 
						dataSet = newData; 
						redraw(); 
						return;
					};

					for (var i = 0; i < checkedBoxes.length; i++){
						var newArray = data.filter(function(d){
							return d.Age == checkedBoxes[i];
						});
						Array.prototype.push.apply(newData, newArray);
					}

					dataSet = newData;

					redraw(chartState.variable);

				//end of filter
				}

			//end of d3.csv
			});

    </script>
  </body>

</html>