<?php
/*
 *Template Name: Bachelor Median Income By County
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
		 max-width: 550px;
		 margin: 25px auto;
		 line-height: 1.75;
	 }
	
#dots {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.75;
		 text-align: center;
}	
	 
.titleWords {
 font-family: Raleway;
 color: black;
 max-width: 500px;
 margin: 25px auto;
 text-align: center;
}

.titleWords_below_map {
 font-family: Raleway;
 color: black;
 max-width: 500px;
 margin: 25px auto;
 text-align: center;
 margin-top: 40px;
}

#groupHeader {
 font-family: Raleway;
 color: black;
 margin: 25px auto;
 text-align: center;
 max-width: 550px;
 padding-top: 30px;
}

#title {
 color: #235a8d;
 max-width: 900px;
 margin: 25px auto;
 text-align: center;
 font-size: 60px;
 font-style: bold;
 font-family: Droid Serif; Helvetica;
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
  fill: none;
  stroke: #fff;
  stroke-linejoin: round;
}

.counties {
  fill: none;
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
	  
pre {
	display:none;
}

#subTitle {
width: 75%;
margin: 15px auto;
color: black;
margin-bottom: 50px;
}

#intro{
width: 80%;
margin: 0 auto;
}
	  
@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

</style>
</head>
<body>

<div>
	<h1 id = 'title'>Education & Income</h1>
	<h2 class='titleWords'>Visualizing educational attainment and median income in all 3,000+ U.S. counties</h2>
	<hr>
	<p id='overview'>According to the <a href='https://factfinder.census.gov/faces/tableservices/jsf/pages/productview.xhtml?pid=ACS_16_5YR_S1501&src=pt' target='_blank'>2012 - 2016 American Community Survey</a>, 30.3% of all Americans ages 25 or older have a bachelor's degree or higher. The same survey states that the median household income in the U.S. is $55,322 per year.</p>
	<p id='overview'>To find out how these numbers vary across the country, I dug up the data for all 3,000+ U.S. counties. The scatterplot below shows the percentage of 25-year-olds in each county that have a bachelor's degree or higher as well as the median household income for each county.</p>
	<p id='overview'>There is a distinct positive relationship between these two variables. Counties with higher educational attainment tend to have higher household incomes.</p>
	<p id='overview'>Hover over individual circles to see the county names. Click and drag a box anywhere you'd like in the scatterplot to see the corresponding counties highlighted in the map below.</p>
    <hr>
</div>

<div id="scatterplot"></div>
<div id="choropleth"></div>

	<h2 class='titleWords_below_map'>Counties With $80k+ Median Household Incomes</h2>
	<p id='overview'>By using the scatterplot to filter on median household incomes of $80k or higher, we see two regions in the U.S. where these households are most prevalent. The first is along the northeast coast, starting from northern Virginia and extending up through northern Massachusetts.</p>
	<p id='dots'><img src="http://www.fourpillarfreedom.com/wp-content/uploads/2018/05/edu_inc_2_northeast.jpg" alt="Northeast County Incomes"></p>
	
	<p id='overview'>The second is, perhaps unsurprisingly, the Bay Area along California's coast. This area serves as home for many tech workers in Silicon Valley, which explains the above-average household incomes.</p>
	<p id='dots'><img src="http://www.fourpillarfreedom.com/wp-content/uploads/2018/05/edu_inc_3_bayArea_2.jpg" alt="Bay Area County Incomes"></p>
	
	<h2 class='titleWords'>Counties With Below-Average Education & Above-Average Income</h2>
	<p id='overview'>From the scatterplot we can see that higher educational attainment is associated with higher income. There are a few counties that buck this trend, though. If we filter on counties with less than 25% bachelor's degrees and higher than $55k median household incomes, we find a couple regions that stand out.</p>
	
	<p id='overview'>The first is North Dakota, which is sprinkled with counties that have household incomes above $55k. This region is home to many oil fields, which could explain the above-average incomes.</p>
	<p id='overview'>I did a quick search for jobs in "oil fields" on Indeed.com and found hundreds of job offerings in Williston, North Dakota, which is located in Williams County and has a median household income of $90,080.</p>
	<p id='dots'><img src="http://www.fourpillarfreedom.com/wp-content/uploads/2018/05/edu_inc_4_northDakota.jpg" alt="North Dakota County Incomes"></p>
	
	<p id='overview'>Alaska is another state filled with counties that have above-average income levels despite below-average education levels. The oil and fishing industry are likely the cause. In the fishing county of Aleutians West, for example, only 15.7% of all 25+ year-olds have at least a bachelor's degree, yet the median household income is over $86k per year.</p>
	<p id='dots'><img src="http://www.fourpillarfreedom.com/wp-content/uploads/2018/05/edu_inc_6_alaska.jpg" alt="Alaska County Incomes"></p>
	
	<h2 class='titleWords'>Explore the Data</h2>
	<p id='overview'> It's a bit mind-boggling to see how much education and income vary across the country. Median household incomes range all the way from $18k up to $125k. Likewise, the percentage of 25+ year-olds who have a bachelor's degree or higher ranges from 3% in some counties all the way up to 80% in others.</p>
	<p id='overview'>Feel free to explore the data further yourself by using the scatterplot to filter the counties. Both the scatterplot and the map are interactive, so hovering over individual circles or individual counties will reveal county name, educational attainment, and median household income for that particular county.</p>
	
	<hr>
	<p id='overview'><b>Technical Notes:</b> I downloaded data for these visuals directly from <a href='https://factfinder.census.gov/faces/nav/jsf/pages/index.xhtml' target='_blank'>the U.S. Census American FactFinder</a>. I used <a href='https://d3js.org/' target='_blank'>D3.js</a>, a JavaScript visualization library, to create the map and scatterplot. The idea for this article was inspired by <a href='https://bl.ocks.org/cmgiven/abca90f6ba5f0a14c54d1eb952f8949c' target='_blank'>this block</a> from Chris Given. </p>

<script src="https://d3js.org/topojson.v2.min.js"></script>
<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<script>
//inspiration from https://bl.ocks.org/cmgiven/abca90f6ba5f0a14c54d1eb952f8949c

var unemployment = d3.map();
var unemployment2 = d3.map();
var unemployment3 = d3.map();

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

d3.queue()
    .defer(d3.csv, 'https://raw.githubusercontent.com/ZDBobbitt/Maps/master/bachelor_medianIncome_by_county.csv', function (d) {
        unemployment.set(d.id, +d.bachelorPlus);
		unemployment2.set(d.id, d.Geography);
		unemployment3.set(d.id, +d.income100Plus);
		
		return {
	    id: d.id,
            Geography: d.Geography,
            bachelorPlus: +d.bachelorPlus,
            income100Plus: +d.income100Plus
        }
    })
    .defer(d3.json, 'https://d3js.org/us-10m.v1.json')
    .awaitAll(initialize)

//var color = d3.scaleThreshold()
//    .domain([20000, 50000, 80000])
//    .range(['#fbb4b9', '#f768a1', '#c51b8a', '#7a0177'])

var color = d3.scaleThreshold()
    .domain([10000, 20000, 30000, 40000, 50000, 60000, 70000, 90000])
    .range(d3.schemeBlues[9]);

function initialize(error, results) {
    if (error) { throw error }

    var data = results[0]
    var us = results[1]
	
    var components = [
        choropleth(us),
        scatterplot(onBrush)
    ]

    function update() {
        components.forEach(function (component) { component(data) })
    }

    function onBrush(x0, x1, y0, y1) {
        var clear = x0 === x1 || y0 === y1
        data.forEach(function (d) {
            d.filtered = clear ? false
                : d.bachelorPlus< x0 || d.bachelorPlus> x1 || d.income100Plus< y0 || d.income100Plus> y1
        })
        update()
    }

    update()
}

function scatterplot(onBrush) {
    var margin = { top: 10, right: 15, bottom: 40, left: 75 }
    var width = 840 - margin.left - margin.right
    var height = 340 - margin.top - margin.bottom

    var x = d3.scaleLinear()
        .range([0, width])
    var y = d3.scaleLinear()
        .range([height, 0])

    var xAxis = d3.axisBottom()
        .scale(x)
        .tickFormat(d3.format('.0%'))
    var yAxis = d3.axisLeft()
        .scale(y)
        .tickFormat(d3.format('$.2s'))

    var brush = d3.brush()
        .extent([[0, 0], [width, height]])
        .on('start brush', function () {
            var selection = d3.event.selection

            var x0 = x.invert(selection[0][0])
            var x1 = x.invert(selection[1][0])
            var y0 = y.invert(selection[1][1])
            var y1 = y.invert(selection[0][1])

            onBrush(x0, x1, y0, y1)
        })

    var svg = d3.select('#scatterplot')
        .append('svg')
        .attr('width', width + margin.left + margin.right)
        .attr('height', height + margin.top + margin.bottom)
        .append('g')
        .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')')

    var bg = svg.append('g')
    var gx = svg.append('g')
        .attr('class', 'x axis')
        .attr('transform', 'translate(0,' + height + ')')
    var gy = svg.append('g')
        .attr('class', 'y axis')

    gx.append('text')
        .attr('x', width)
        .attr('y', 35)
        .style('text-anchor', 'end')
        .style('fill', '#000')
        .style('font-weight', 'bold')
        .text('Percent bachelor or higher')

    gy.append('text')
        .attr('transform', 'rotate(-90)')
        .attr('x', 0)
        .attr('y', -40)
        .style('text-anchor', 'end')
        .style('fill', '#000')
        .style('font-weight', 'bold')
        .text('Median Household Income')

    svg.append('g')
        .attr('class', 'brush')
        .call(brush)

    return function update(data) {
        x.domain(d3.extent(data, function (d) { return +d.bachelorPlus})).nice()
        y.domain(d3.extent(data, function (d) { return +d.income100Plus})).nice()
		
        gx.call(xAxis)
        gy.call(yAxis)

        var bgRect = bg.selectAll('rect')
            .data(d3.pairs(d3.merge([[y.domain()[0]], color.domain(), [y.domain()[1]]])))
        bgRect.exit().remove()
        bgRect.enter().append('rect')
            .attr('x', 0)
            .attr('width', width)
            .merge(bgRect)
            .attr('y', function (d) { return y(d[1]) })
            .attr('height', function (d) { return y(d[0]) - y(d[1]) })
            .style('fill', function (d) { return color(d[0]) })

        var circle = svg.selectAll('circle')
            .data(data, function (d) { return d.Geography; })
        circle.exit().remove()
        circle.enter().append('circle')
            .attr('r', 4)
            .style('stroke', '#fff')
            .merge(circle)
            .attr('cx', function (d) { return x(d.bachelorPlus) })
            .attr('cy', function (d) { return y(d.income100Plus) })
            .style('fill', function (d) { return color(d.income100Plus) })
            .style('opacity', function (d) { return d.filtered ? 0.5 : 1 })
            .style('stroke-width', function (d) { return d.filtered ? 1 : 2 })
            .on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	    
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<span style='font-size: 16px'><b>" + (d.Geography = unemployment2.get(d.id)) + "</b></span>" + "<br/><b>Bachelor or higher:</b> " + (d.bachelorPlus*100).toFixed(1) + "%<br/><b>Median household income: </b>$" + d.income100Plus.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
    .on("mouseout", function(d) {
            d3.select(this).style("stroke", "#fff")	
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
    }
}

function choropleth(us) {
    var width = 960
    var height = 600

    var path = d3.geoPath()

    var svg = d3.select('#choropleth')
        .append('svg')
        .attr('width', width)
        .attr('height', height);
		
  svg.append("g")
     .attr("class", "counties")
     .selectAll("path")
	    .data(topojson.feature(us, us.objects.counties).features)
	    .enter().append("path")
		.attr("class", "countyLines")
		.attr("fill", function(d) { return color(d.income100Plus = unemployment3.get(d.id)); } )
	    .attr("d", path)
		.on("mouseover", function(d) {
            d3.select(this).style("stroke", "black")	  
            d3.select(this).style("stroke-width", 2)	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html("<span style='font-size: 16px'><b>" + (d.Geography = unemployment2.get(d.id)) + "</b></span>" + "<br/><b>Bachelor or higher: </b>" + (d.bachelorPlus*100).toFixed(1) + "%<br/><b>Median household income: </b>$" + d.income100Plus.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))	
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

    return function update(data) {
        svg.selectAll('.countyLines')
            .data(data, function (d) { return d.Geography || (d.Geography = unemployment2.get(d.id)) })
            .style('fill', function (d) { return d.filtered ? '#ddd' : color(d.income100Plus = unemployment3.get(d.id)) })
    }
}
</script>
</body>
</html>
<?php get_footer();?>