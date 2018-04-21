<?php
/*
 *Template Name: Median Rent By State
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
	  
@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>
<body>

<div>
	<h2 id='titleWords'>Visualizing Median Rent by State</h2>
	<hr>
	<p id='overview'>The map below shows the median monthly rent in all 50 U.S. states. Data for this visual comes from the <a href='https://factfinder.census.gov/faces/nav/jsf/pages/index.xhtml' target='_blank'>2016 American Community Survey</a>.</p>
	<p id='overview'><b>Some interesting observations:</b></p>
	<p id='overview'>Perhaps unsurprisingly, Hawaii has the highest median rent at $1,456.</p>
	<p id='overview'>West Virginia has the lowest median rent at $658.</p>
	<p id='overview'>Colorado is the only landlocked state that has a median rent above $1,000.</p>
	<p id='overview'>I was surprised at how high the median rent was in both Washington and New Hampshire, coming in at $1,056 and $1,021, respectively.</p>
	<p id='overview'>In general, rent prices are lowest in the midwest and highest among the coastal states.</p>
	<p id='overview'>Hover over individual states for more information.</p>
	
        <hr>
</div>

<div id='map'></div>
<hr>
<p id='endNotes'><b>Technical notes:</b> This map was created using D3.js, a javascript library for producing visualizations. Code for this visual is based on <a href='https://bl.ocks.org/wboykinm/dbbe50d1023f90d4e241712395c27fb3' target='_blank'>this D3.js Block</a> by Bill Morris.</p>

<div class="nc_socialPanel swp_flatFresh swp_d_fullColor swp_i_fullColor swp_o_fullColor scale-100 scale-fullWidth" data-position="below" data-float="floatBottom" data-count="5" data-floatColor="#ffffff" data-emphasize="0">
<div class="nc_tweetContainer twitter" data-id="2" data-network="twitter"><a rel="nofollow" target="_blank" href="https://twitter.com/share?original_referer=/&text=Visualizing Median Rent Prices By State&url=http://www.fourpillarfreedom.com/visualizing-median-rent-prices-by-state/&via=4PillarFreedom" data-link="https://twitter.com/share?original_referer=/&text=Visualizing Median Rent Prices By State&url=http://www.fourpillarfreedom.com/visualizing-median-rent-prices-by-state/&via=4PillarFreedom" class="nc_tweet"><span class="swp_count swp_hide"><span class="iconFiller"><span class="spaceManWilly"><i class="sw sw-twitter"></i><span class="swp_share"> Tweet</span></span></span></span></a></div>
<div class="nc_tweetContainer swp_fb" data-id="3" data-network="facebook"><a rel="nofollow" target="_blank" href="https://www.facebook.com/share.php?u=http%3A%2F%2Fwww.fourpillarfreedom.com%2Fvisualizing-median-rent-prices-by-state%2F" data-link="http://www.facebook.com/share.php?u=http%3A%2F%2Fwww.fourpillarfreedom.com%2Fvisualizing-median-rent-prices-by-state%2F" class="nc_tweet"><span class="iconFiller"><span class="spaceManWilly"><i class="sw sw-facebook"></i><span class="swp_share"> Share</span></span></span><span class="swp_count">1</span></a></div>
<div class="nc_tweetContainer totes totesalt" data-id="6" ><span class="swp_count"><span class="swp_label">Shares</span> 1</span></div>
</div>

<script src="https://d3js.org/colorbrewer.v1.min.js"></script>
<script>

//code for this visual is based on https://bl.ocks.org/wboykinm/dbbe50d1023f90d4e241712395c27fb3

//Width and height of map
var width = 960;
var height = 500;

var lowColor = '#55eac0'
var highColor = '#3fbd18'

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
d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/medianRentByState.csv", function(data) {
	var dataArray = [];
	for (var d = 0; d < data.length; d++) {
		dataArray.push(parseFloat(data[d].medianRent))
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
      var dataValue = data[i].medianRent;

      // Find the corresponding state inside the GeoJSON
      for (var j = 0; j < json.features.length; j++) {
        var jsonState = json.features[j].properties.name;

        if (dataState == jsonState) {

          // Copy the data value into the JSON
          json.features[j].properties.medianRent = dataValue;

          // Stop looking through the JSON
          break;
        }
      }
    }
    
    //color scale examples from Mike Bostock
    
    //create color scale
    var colorScale = d3.scale.quantize()
    .range(colorbrewer.RdYlGn[11])
    .domain([maxVal,minVal]);

    // Bind the data to the SVG and create one path per GeoJSON feature
    svg.selectAll("path")
      .data(json.features)
      .enter()
      .append("path")
      .attr("d", path)
      .style("stroke", "#fff")
      .style("stroke-width", "1")
      .style("fill", function(d){ return colorScale(d.properties.medianRent)})
            .on("mouseover", function(d) {
            d3.select(this).style("opacity", .7)	  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>State:</b> " + d.properties.name + "<br/> <b>Median Rent:</b> " + "$" + d.properties.medianRent.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
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

		//legend.append("stop")
		//	.attr("offset", "0%")
		//	.attr("stop-color", highColor)
		//	.attr("stop-opacity", 1);
			
		//legend.append("stop")
		//	.attr("offset", "100%")
		//	.attr("stop-color", lowColor)
		//	.attr("stop-opacity", 1);
		
		legend.selectAll("stop") 
		    .data( colorScale.range() )                  
		    .enter().append("stop")
		    .attr("offset", function(d,i) { return i/(colorScale.range().length-1); })
		    .attr("stop-color", function(d) { return d; });

		key.append("rect")
			.attr("width", w - 100)
			.attr("height", h)
			.style("fill", "url(#gradient)")
			.attr("transform", "translate(0,60)");
			
		//add text labels to legend
		var y = d3.scaleLinear()
			.range([h, 0])
			.domain([minVal, maxVal]);
		
		var yAxis = d3.axisRight(y);
		
		key.append("g")
			.attr("class", "y axis")
			.attr("transform", "translate(41,60)")
			.call(yAxis.ticks(8, "$,d"));
		
		//add title text to legend
		  svg.append("g")
		    .append("text")
		      .attr("x", width-959)
		      .attr("y", 55)
		      .text("Median Rent")

  }); //end json stuff
}); //end csv stuff
</script>
</body>
</html>
<?php get_footer();?>