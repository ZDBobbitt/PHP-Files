<?php
/*
 *Template Name: Median Rent By County
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<script src="https://d3js.org/d3.v4.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');


.axis--y .domain {
  display: none;
}

h1 {
text-align: center;
font-size: 50px;
margin-bottom: 0px;
font-family: 'Droid Serif', serif;
}

h3, h4, h5, h6 {
text-align: center;
margin-bottom: 15px;
margin-top: 15px;
font-family: 'Raleway', sans-serif;
}

p {
color: black;
}

#words {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
}

#end_notes{
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
font-size: 14px;
}

#words_last {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
margin-bottom: 50px;
}

.medianPrice {
font-family: Raleway;
font-size: 14px;
}

.usa_label {
font-family: Raleway;
font-size: 11px;
font-weight: bold;
}

#intro{
width: 80%;
margin: 0 auto;
}

#subTitle {
width: 75%;
margin: 15px auto;
color: black;
margin-bottom: 50px;
}

#table_custom {
border-top: 2px solid white;
}

th {
font-size: 14px;
color: black;
font-weight: bold;
border-bottom: 2px solid black;
}

tr {
height: 10px;
}

td {
font-size: 14px;
color: black;
}

.td_percent {
text-align: center;
background-color: #7fdee1;
}

#three_dots {
color: black;
font-family: Raleway;
max-width: 550px;
margin: 25px auto;
line-height: 1.75;
padding-left: 45px;
text-align: center;
font-size: 26px;
}

.counties {
  fill: none;
}

.states {
  fill: none;
  stroke: #fff;
  stroke-linejoin: round;
}

#endNotes {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.25;
		 font-size: 14px;
	 }

div.tooltip {	
			position: absolute;			
			text-align: center;							
			padding: 6px;				
			font: 14px sans-serif;		
			background: white;	
			border: 0px;		
			border-radius: 8px;			
			pointer-events: none;
			line-height: 1.5;	
			color: black;
	  }
	 
.caption {
	font-size: 11px;
}

@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>

<body>

<div id='intro'><!--start of title-->
	  <h1 style='color: #2d79a7; font-size: 66px;'>The Price of Rent</h1>
            <h3 id='subTitle'><strong>Visualizing Median Monthly Rent in all 3,000 + U.S. Counties</strong></h3>
</div> <!-- end of title-->

<div id='svg_cover'></div> <!--COVER PHOTO-->

<div id='intro'><!--start of intro paragraph-->
            <p id='words'>According to the <a href='https://factfinder.census.gov/faces/tableservices/jsf/pages/productview.xhtml?pid=ACS_16_5YR_DP04&src=pt' target='_blank'>2012 - 2016 American Community Survey</a>, the median price of rent in the U.S. is $949 per month. But it's no secret that rent prices can vary wildly from one city to the next.</p>
            <p id='words'>For example, the median monthly rent in Sheridan County, North Dakota is only $300 per month. Contrast that with Arlington County, Virginia, where the median monthly rent is a whopping $1,861.</p>
            <p id='words_last'> To get a better idea of how rent prices vary across the U.S., check out the map below that shows the median monthly rent price for all 3,000+ U.S. counties.</p>
</div> <!-- end of intro paragaph-->

<svg width="960" height="600"></svg>

<div id='intro'><!--start of intro paragraph-->
	<hr style='margin-top: 30px'>
	<p id='endNotes'><b>Technical notes:</b> This map was created using D3.js, a javascript library for producing visualizations. Code for this visual is based on <a href='https://bl.ocks.org/mbostock/4060606' target='_blank'>this D3.js Block</a> by Mike Bostock.</p>
</div> <!-- end of intro paragaph-->

<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<script src="https://d3js.org/colorbrewer.v1.min.js"></script>
<script src="https://d3js.org/topojson.v2.min.js"></script>
<script>
//code adopted from https://bl.ocks.org/mbostock/4060606

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var svg = d3.select("svg"),
    width = +svg.attr("width"),
    height = +svg.attr("height");

var unemployment = d3.map();
var unemployment2 = d3.map();

var path = d3.geoPath();

var x = d3.scaleLinear()
    .domain([1, 10])
    .rangeRound([600, 860]);
    
var color = d3.scaleThreshold()
    .domain(d3.range(2, 10))
    .range(d3.schemeBlues[9]);

var g = svg.append("g")
    .attr("class", "key")
    .attr("transform", "translate(0,40)");

g.selectAll("rect")
  .data(color.range().map(function(d) {
      d = color.invertExtent(d);
      if (d[0] == null) d[0] = x.domain()[0];
      if (d[1] == null) d[1] = x.domain()[1];
      return d;
    }))
  .enter().append("rect")
    .attr("height", 8)
    .attr("x", function(d) { return x(d[0]); })
    .attr("width", function(d) { return x(d[1]) - x(d[0]); })
    .attr("fill", function(d) { return color(d[0]); });

g.append("text")
    .attr("class", "caption")
    .attr("x", x.range()[0])
    .attr("y", -6)
    .attr("fill", "#000")
    .attr("text-anchor", "start")
    .attr("font-weight", "bold")
    .text("Median Monthly Rent");
    
g.append("text")
.attr("class", "caption")
.attr("x", 600)
.attr("y", 20)
.attr("fill", "#000")
.text("$200");

g.append("text")
.attr("class", "caption")
.attr("x", 658)
.attr("y", 20)
.attr("fill", "#000")
.text("$600");

g.append("text")
.attr("class", "caption")
.attr("x", 711)
.attr("y", 20)
.attr("fill", "#000")
.text("$1,000");

g.append("text")
.attr("class", "caption")
.attr("x", 769)
.attr("y", 20)
.attr("fill", "#000")
.text("$1,400");

g.append("text")
.attr("class", "caption")
.attr("x", 827)
.attr("y", 20)
.attr("fill", "#000")
.text("$1,800");

//g.call(d3.axisBottom(x)
//    .tickSize(13))
//    .tickFormat(function(x, i) { return i ? x : "$" + x; });
//    .tickValues(color.domain()))
//  .select(".domain")
//    .remove();

d3.queue()
    .defer(d3.json, "https://d3js.org/us-10m.v1.json")
    .defer(d3.csv, "https://raw.githubusercontent.com/ZDBobbitt/Maps/master/rent_by_county.csv", function(d) { unemployment.set(d.id, +d.medianRent); unemployment2.set(d.id, d.Geography); })
    .await(ready);

function ready(error, us) {
  if (error) throw error;
  
  //create color scale
    var color2 = d3.scaleThreshold()
        .range(d3.schemeBlues[9])
        .domain(d3.range(200, 1800, 200));

  svg.append("g")
      .attr("class", "counties")
    .selectAll("path")
    .data(topojson.feature(us, us.objects.counties).features)
    .enter().append("path")
      .attr("fill", function(d) { return color2(d.medianRent = unemployment.get(d.id)); })
      .attr("d", path)
    .on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	  
            d3.select(this).style("stroke-width", 2)	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>" + (d.Geography = unemployment2.get(d.id)) + "</b>" + "<br/>Median Monthly Rent: " + "$" + d.medianRent.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
    .on("mouseout", function(d) {
            d3.select(this).style("stroke-width", 0)	
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });

  svg.append("path")
      .datum(topojson.mesh(us, us.objects.states, function(a, b) { return a !== b; }))
      .attr("class", "states")
      .attr("d", path);
}

</script>
</body>
</html>
<?php get_footer();?>