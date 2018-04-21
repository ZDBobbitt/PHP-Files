<?php
/*
 *Template Name: Home Ownership By County
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

*:focus {
    outline: none;
}

#countyNames {
	outline: none;
	border: none;
	border-bottom: thin black solid;
	border-radius: 0px;
	font-size: 16px;
	width: 270px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 600;
}

@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>

<body>

<div id='intro'><!--start of title-->
	  <h1 style='color: #db3838; font-size: 66px;'>The Daily Commute</h1>
            <h3 id='subTitle'><strong>Visualizing Average Commute Times in all 3,000 + U.S. Counties</strong></h3>
</div> <!-- end of title-->

<div id='svg_cover'></div> <!--COVER PHOTO-->

<div id='intro'><!--start of intro paragraph-->
            <p id='words'>According to the <a href='https://factfinder.census.gov/faces/tableservices/jsf/pages/productview.xhtml?pid=ACS_16_5YR_DP04&src=pt' target='_blank'>2012 - 2016 American Community Survey</a>, the average one-way commute time for workers in the U.S. is 26.1 minutes.</p>
            <p id='words'>A quick back-of-the-envelope calculation reveals that the average U.S. worker spends 26.1 minutes x 2 commutes per day x 5 days per week x 50 working weeks per year = 217 hours per year commuting. That's equivalent to nine full days.</p>
            <p id='words'>But commute times vary significantly from one county to the next in the U.S. Consider Aleutians East Borough County in Alaska, for example. In this county of just over 3,000 people, the average commute time is only 4.9 minutes. (For those interested in moving to this tiny Alaskan county, there are unfortunaely <a href='http://www.aleutianseast.org/index.asp?SEC=83961566-8924-4BEF-A3A3-3C9FB14EC250&Type=B_BASIC' target='_blank'>no job openings</a> at this time).</p>
            <p id='words'>On the other end of the spectrum, Clay County, West Virginia holds the title for longest average one-way commute time at 45.3 minutes. In this county of 9,000 people, the most common jobs are in coal mines and natural gas wells, which could explain why workers have to travel so far for work.</p>
            <p id='words_last'> To get a better idea of how commutes vary across the U.S., check out the map below that shows the average one-way commute time for workers in all 3,000+ U.S. counties.</p>
</div> <!-- end of intro paragaph-->

<svg width="960" height="600"></svg>

<div id='intro'><!--start of intro paragraph-->
<h3 style='margin-top: 50px'><b>How Does Your County Compare?</b></h3>
<p>The average commute time in
<select id="countyNames"></select> is <span id='countyMinutes'>23.2</span> minutes.</p>
<p style='text-align: center'>This is <span id = 'countyMinutesDifference' style='color:#46c95c'>2.9 minutes less</span> than the national average.</p>

</div>

<div id='intro'><!--start of intro paragraph-->
	<hr style='margin-top: 50px'>
	<p id='endNotes'><b>Technical notes:</b> This map was created using D3.js, a javascript library for producing visualizations. Code for this visual is based on <a href='https://bl.ocks.org/mbostock/4060606' target='_blank'>this D3.js Block</a> by Mike Bostock.</p>
</div> <!-- end of intro paragaph-->

<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<script src="https://d3js.org/colorbrewer.v1.min.js"></script>
<script src="https://d3js.org/topojson.v2.min.js"></script>
<script>
//code adopted from https://bl.ocks.org/mbostock/4060606
// mean commute time - 26.1 minutes

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
    .range(d3.schemeReds[9]);

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
    .text("Average One-way commute (minutes)");
    
g.append("text")
.attr("class", "caption")
.attr("x", 610)
.attr("y", 20)
.attr("fill", "#000")
.text("5");

g.append("text")
.attr("class", "caption")
.attr("x", 666)
.attr("y", 20)
.attr("fill", "#000")
.text("15");

g.append("text")
.attr("class", "caption")
.attr("x", 723)
.attr("y", 20)
.attr("fill", "#000")
.text("25");

g.append("text")
.attr("class", "caption")
.attr("x", 781)
.attr("y", 20)
.attr("fill", "#000")
.text("35");

g.append("text")
.attr("class", "caption")
.attr("x", 839)
.attr("y", 20)
.attr("fill", "#000")
.text("45");

d3.queue()
    .defer(d3.json, "https://d3js.org/us-10m.v1.json")
    .defer(d3.csv, "https://raw.githubusercontent.com/ZDBobbitt/Maps/master/commute_by_county.csv", function(d) { unemployment.set(d.id, +d.meanCommute); unemployment2.set(d.id, d.Geography); })
    .await(ready);

function ready(error, us) {
  if (error) throw error;
  
  //create color scale
    var color2 = d3.scaleThreshold()
        .range(d3.schemeReds[9])
        .domain(d3.range(5, 45, 5));

  svg.append("g")
      .attr("class", "counties")
    .selectAll("path")
    .data(topojson.feature(us, us.objects.counties).features)
    .enter().append("path")
      .attr("fill", function(d) { return color2(d.meanCommute = unemployment.get(d.id)); })
      .attr("d", path)
    .on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	  
            d3.select(this).style("stroke-width", 2)	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>" + (d.Geography = unemployment2.get(d.id)) + "</b>" + "<br/>Average Commute: " + d.meanCommute.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + 
" minutes")	
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


d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/commute_by_county.csv", function(data) {
	var select = d3.select("#countyNames")
		       .selectAll("option")
	     		 .data(data)
	     		 .enter()
	     		   .append("option")
	        	   .attr("value", function (d) { return d.meanCommute; })
	        	   .attr("label", function (d) { return d.Geography; });
	        	   
//	d3.select('#inputBox')
//	  .on('change', function(d) {
//	  //var newData = document.getElementById('inputBox').value;
//	 getElementById("countyMinutes").innerHTML = function(d) { return d.meanCommute; }
//});

   d3.select('#countyNames')
	  .on('change', function() {
	  //find variables values
	  var county_mins = eval(d3.select(this).property('value'));
	  var minute_difference = (Math.abs(26.1 - county_mins)).toFixed(1);
	  
	  //output of average commute time
	  document.getElementById('countyMinutes').innerHTML = county_mins;
	  
	  //output of commute time difference between county and national average
	  if (county_mins >= 26.1) {
	  document.getElementById('countyMinutesDifference').innerHTML = minute_difference + " minutes more";
	  document.getElementById('countyMinutesDifference').style.color = '#db4545';
	  }
	  else {
	  document.getElementById('countyMinutesDifference').innerHTML = minute_difference + " minutes less";
	  document.getElementById('countyMinutesDifference').style.color = '#46c95c';
	  }
});

});

</script>
</body>
</html>
<?php get_footer();?>