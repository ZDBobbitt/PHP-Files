<?php
/*
 *Template Name: Occupation By Gender
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
margin-bottom: 80px;
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
font-size: 21px;
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
margin-bottom: 80px;
}

.xLabels {
color: black;
font-size: 12px;
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

@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>

<body>

<div id='intro'><!--start of title-->
	  <h1 style='color: #ff4d4d; font-size: 66px;'>The Gender Breakdown</h1>
            <h3 id='subTitle'><strong>Visualizing U.S. Occupational Employment By Gender</strong></h3>
</div> <!-- end of title-->

<div id = 'intro'>
<p id='words'>Did you know that speech-language pathology is the most female-dominated occupation in the United States? Or that electrical power-line installation is the most male-dominated occupation?</p>
<p id='words'>I was recently digging through <a href='https://www.bls.gov/cps/cpsaat11.pdf' target='_blank'>some employment data</a> from the Bureau of Labor Statistics when I ran across these numbers. This made me curious about the gender breakdowns of other occupations in the U.S., so I downloaded some data and created the bar chart below that shows the gender breakdown for over 300 different occupations in the U.S.</p>
<p id = 'words'>In general, it seems that most education-related fields have a higher percentage of women than men. On the flip side, most jobs that require manual labor like roofers, carpenters, and mechanices tend to have a higher percentage of men than women. Check out the chart below to see how your occupation stacks up.</p>
<p id='words'><b>NOTE:</b> Data was only available for occupations with at least 50,000 employed persons.</p>
</div>
<p id='three_dots'>I I I I</p>

<svg width="850" height="5000"></svg>

<script>

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 10, left: 470},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom,
    g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var y = d3.scaleBand()
    .rangeRound([0, height])
    .paddingInner(0.05)
    .align(0.1);

var x = d3.scaleLinear()
    .rangeRound([width, 0]);

var z = d3.scaleOrdinal()
    .range(["#3591a5", "#fe77ff"]);

d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/occupation_by_gender_percents.csv", function(d, i, columns) {
  for (i = 1, t = 0; i < columns.length; ++i) t += d[columns[i]] = +d[columns[i]];
  d.total = t;
  return d;
}, function(error, data) {
  if (error) throw error;

  var keys = data.columns.slice(1);

 // data.sort(function(a, b) { return b.total - a.total; });
  y.domain(data.map(function(d) { return d.occupation; }));
  x.domain([0, 100]).nice();
  z.domain(keys);
  
  //+ d.rentIndex.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "<br/> <b>Cost of Living Index:</b> " + d.costofLivingIndex.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")

  g.append("g")
    .selectAll("g")
    .data(d3.stack().keys(keys)(data))
    .enter().append("g")
      .attr("fill", function(d) { return z(d.key); })
    .selectAll("rect")
    .data(function(d) { return d; })
    .enter().append("rect")
      .attr("x", function(d) { return x(d[1]); })
      .attr("y", function(d) { return y(d.data.occupation); })
      .attr("height", y.bandwidth())
      .attr("width", function(d) { return x(d[0]) - x(d[1]); })
      .on("mouseover", function(d) {
      	    d3.select(this).style("opacity", .7)	  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);
            console.log(d3.select(this).style("fill"))
            if (d3.select(this).style("fill") == 'rgb(254, 119, 255)')
                {	
            div .html((d[1] - d[0]).toFixed(1) + "% of " + d.data.occupation + " are female.")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
                }
            else {
            div .html((d[1] - d[0]).toFixed(1) + "% of " + d.data.occupation + " are male.")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            	 }
            })					
        .on("mouseout", function(d) {
            d3.select(this).style("opacity", 1)			
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
  
  g.append("g")
     .attr("class", "axis")
      .call(d3.axisLeft(y).ticks(null, "s"));
      
  //change axis label font-sizes	
     g.selectAll("text")
	  .style("font-size","12px")
	  .style("font-weight","bold");

     g.append("g")
	  .append("text")
	  .attr("x", 75)
	  .attr("y", -2)
	  .text("Gender Breakdown")
	  .style("font-size","22px")
	  .style("font-weight", "bold")
	  .style("font-family", "Raleway");
	  
     g.append("g")
	  .append("text")
	  .attr("x",-150)
	  .attr("y", -2)
	  .text("Occupation")
	  .style("font-size","22px")
	  .style("font-weight", "bold")
	  .style("font-family", "Raleway");
	  
     g.append("g")
	  .append("text")
	  .attr("x", 75)
	  .attr("y", 4930)
	  .text("Gender Breakdown")
	  .style("font-size","22px")
	  .style("font-weight", "bold")
	  .style("font-family", "Raleway");
	  
     g.append("g")
	  .append("text")
	  .attr("x",-150)
	  .attr("y", 4930)
	  .text("Occupation")
	  .style("font-size","22px")
	  .style("font-weight", "bold")
	  .style("font-family", "Raleway");
});

</script>
</body>
</html>
<?php get_footer();?>