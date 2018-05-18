<?php
/*
 *Template Name: Bachelor or Higher By County
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
	  <h1 style='color: #67c569; font-size: 66px;'>The State of Education</h1>
            <h3 id='subTitle'><strong>Visualizing the percentage of individuals ages 25 or older who have a bachelor's degree or higher in all 3,000 + U.S. Counties</strong></h3>
</div> <!-- end of title-->

<div id='svg_cover'></div> <!--COVER PHOTO-->

<div id='intro'><!--start of intro paragraph-->
            <p id='words'>It's no secret that educational attainment is highly correlated with income. Data shows that <a href='https://www.bls.gov/emp/ep_chart_001.htm/' target='_blank'>individuals who earn a college degree</a> typically earn tens of thousands, if not hundreds of thousands of dollars more throughout their lifetime than those without degrees.</p>
            <p id='words'>So, what percentage of Americans decide to pursue higher education in the form of a bachelor's, master's, professional, or doctoral degree? According to the <a href='https://factfinder.census.gov/faces/tableservices/jsf/pages/productview.xhtml?pid=ACS_16_5YR_S1501&src=pt' target='_blank'>2012 - 2016 American Community Survey</a>, 30.3% of all Americans ages 25 or older have a bachelor's degree or higher.</p>
            <p id='words'>This percentage varies from county to county across the U.S., ranging from 3% in Loving County, Texas all the way up to 80.2% in Falls Church City, Virginia.</p>
            <p id='words_last'>To get a better idea of how this percentage varies across the U.S., check out the map below that shows the percentage of individuals ages 25 or older who have a bachelor's degree or higher in all 3,000+ U.S. counties.</p>
</div> <!-- end of intro paragaph-->

<svg width="960" height="600"></svg>

<div id='intro'><!--start of intro paragraph-->
<h3 style='margin-top: 50px'><b>How Does Your County Compare?</b></h3>
<p><span id='countyMinutes'>24.6</span>% of individuals ages 25 or older in 
<select id="countyNames"></select> have a bachelor's degree or higher.</p>
<p style='text-align: center'>This is <span id = 'countyMinutesDifference' style='color:#db4545'>5.7 percent lower</span> than the national average.</p>

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
    .range(d3.schemeYlGn[9]);

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
    .text("Percent bachelor's degree or higher");
    
g.append("text")
.attr("class", "caption")
.attr("x", 607)
.attr("y", 20)
.attr("fill", "#000")
.text("0%");

g.append("text")
.attr("class", "caption")
.attr("x", 662)
.attr("y", 20)
.attr("fill", "#000")
.text("15%");

g.append("text")
.attr("class", "caption")
.attr("x", 720)
.attr("y", 20)
.attr("fill", "#000")
.text("30%");

g.append("text")
.attr("class", "caption")
.attr("x", 778)
.attr("y", 20)
.attr("fill", "#000")
.text("45%");

g.append("text")
.attr("class", "caption")
.attr("x", 832)
.attr("y", 20)
.attr("fill", "#000")
.text("60%+");

d3.queue()
    .defer(d3.json, "https://d3js.org/us-10m.v1.json")
    .defer(d3.csv, "https://raw.githubusercontent.com/ZDBobbitt/Maps/master/bachelorOrHigher_by_county.csv", function(d) { unemployment.set(d.id, +d.bachelorOrHigher); unemployment2.set(d.id, d.Geography); })
    .await(ready);

function ready(error, us) {
  if (error) throw error;
  
  //create color scale
    var color2 = d3.scaleThreshold()
        .range(d3.schemeYlGn[9])
        .domain(d3.range(0, 60, 7.5));

  svg.append("g")
      .attr("class", "counties")
    .selectAll("path")
    .data(topojson.feature(us, us.objects.counties).features)
    .enter().append("path")
      .attr("fill", function(d) { return color2(d.bachelorOrHigher = unemployment.get(d.id)); })
      .attr("d", path)
    .on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	  
            d3.select(this).style("stroke-width", 2)	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<b>" + (d.Geography = unemployment2.get(d.id)) + "</b>" + "<br/>Percent bachelor's degree or higher: " + d.bachelorOrHigher.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + 
"%")	
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


d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/bachelorOrHigher_by_county.csv", function(data) {
	var select = d3.select("#countyNames")
		       .selectAll("option")
	     		 .data(data)
	     		 .enter()
	     		   .append("option")
	        	   .attr("value", function (d) { return d.bachelorOrHigher; })
	        	   .attr("label", function (d) { return d.Geography; });	     

   d3.select('#countyNames')
	  .on('change', function() {
	  //find variables values
	  var county_mins = eval(d3.select(this).property('value'));
	  var minute_difference = (Math.abs(30.3 - county_mins)).toFixed(1);
	  
	  //output of average commute time
	  document.getElementById('countyMinutes').innerHTML = county_mins;
	  
	  //output of commute time difference between county and national average
	  if (county_mins >=30.3) {
	  document.getElementById('countyMinutesDifference').innerHTML = minute_difference + " percent higher";
	  document.getElementById('countyMinutesDifference').style.color = '#46c95c';
	  }
	  else {
	  document.getElementById('countyMinutesDifference').innerHTML = minute_difference + " percent lower";
	  document.getElementById('countyMinutesDifference').style.color = '#db4545';
	  }
});

});

</script>
</body>
</html>
<?php get_footer();?>