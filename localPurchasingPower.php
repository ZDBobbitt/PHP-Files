<?php
/*
 *Template Name: Local Purchasing Power
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
	
#dots {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.75;
		 text-align: center;
}	
	 
#titleWords {
 font-family: Raleway;
 color: black;
 max-width: 500px;
 margin: 25px auto;
 text-align: center;
}

#title {
 color: #1B685B;
 max-width: 900px;
 margin: 25px auto;
 text-align: center;
 font-size: 56px;
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

#low_cost_map, #high_cost_map {
	margin-left: -50px;
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

	<h1 id = 'title'>Location, Location, Location</h1>
	<h2 id='titleWords'>Visualizing the Best & Worst Cities in the U.S. for Saving Money</h2>
	
	<hr>
	<p id='overview'><b>Question:</b> Which U.S. cities are the best to live in if you're trying to save a high percentage of your income?
	<p id='overview'>The answer isn't necessarily the cities with the highest salaries or even the cities with the lowest cost of living. <b>The best cities for saving money are the ones with high salaries <i>relative</i> to the cost of living.</b></p>
	<p id='overview'>Lucky for us, the website <a href='https://www.numbeo.com/cost-of-living/' target='_blank'>Numbeo</a> provides a metric that measures exactly this: <a href='https://www.numbeo.com/cost-of-living/region_rankings.jsp?title=2018&region=021' target='_blank'>local purchasing power</a>. This number represents the average salary in a certain city compared to the prices of goods and services in that city. The higher the purchasing power, the further your salary goes in that city.</p>
	<p id='overview'>Numbeo uses New York City as a baseline with a purchasing power index of 100 and caclculates the purchasing power of 132 other major U.S. cities relative to NYC. So, a city with a purchasing power index of 200 is one where residents with an average salary can afford to buy 200% as many goods and services as New York City residents with an average salary.</p>
	<p id='overview'>Likewise, a city with a purchasing power index of 50 is one where residents with an average salary can only afford to buy 50% as many good and services as NYC residents with an average salary.</p>
	<p id='overview'>Check out the map below to see the 25 cities with the highest purchasing power index. Hover over or click on the individual circles for more information.</p>
	
        <hr>
</div>

<div id='low_cost_map'></div>

<p id='overview'>Sioux Falls, the most populous city in South Dakota, scores the number one position among the 133 major cities on the list with a local purchasing power index of 168.93. This means that residents in Sioux Falls with an average salary can afford to buy 68.93% more goods and services than New York City residents with an average salary.</p>
<p id='overview'>There also seem to be a few distinct "pockets" in the U.S. that provide residents with high purchasing power:</p>
<p id='overview'><b>Northern Ohio/ Southern Michigan:</b> Ann Arbor (2), Cleveland (15), and Grand Rapids (23)<p>
<p id='overview'><b>Texas:</b> Dallas (3), San Antonio (5), Arlington (8), and Houston (16)</p>
<p id='overview'><b>The southeast:</b> Atlanta (7), Huntsville (9), and Chatanooga (18)</p>
<p id='dots'><b>. . .</b></p>
<p id='overview'>Now let's switch perspectives and take a look at the 25 cities with the <i>lowest</i> local purchasing power. These are the cities where goods and services are the least affordable relative to the average salary in that city.</p>

<div id='high_cost_map'></div>

<p id='overview'>Norfolk, Virginia ranks as the city with the lowest local purchasing power, with a score of 64.42. This means that residents in Norfolk with an average salary can only afford to buy 64.42% as many goods and services as New York City residents with an average salary.</p>
<p id='overview'>This map is particularly interesting because it shows that differences in purchasing power can vary significantly between two cities that are within one hour of each other.</p>
<p id='overview'>For example, Norfolk, VA landed the lowest score on the list while its neighbor Virginia Beach, VA earned the 10th highest score. Another example is Seattle, WA ranking 21st while its 15-minute-drive neighbor Bellevue, WA ranks 131st.</p>
<p id='overview'>In general, the northeast coast seems to be filled with cities that have low purchasing power.</p>
<p id='dots'><b>. . .</b></p>
<p id='overview'>To see how your city ranks, check out the bar chart below that shows the local purchasing power index for all 133 major cities on the Numbeo list:</p>

<div id ='bar_chart'></div>

<hr style='margin-top: 50px'>
<p id='endNotes'><b>Technical notes:</b> These visuals were created using D3.js, a javascript library for producing visualizations. Data was cleaned and formatted using Excel and R.</p>

<pre id = 'low_cost_data'>
rank,rankLabel,city,cityLabel,purchasePower,lat,long
1,"1.","Sioux Falls","Sioux Falls, SD",168.93,-96.44,43.34
2, ,"Ann Arbor", ,163.57,-83.74,42.28
3, ,"Dallas", ,162.37,-96.51,32.51
4,"4.","Rochester","Rochester, NY", 158.71,-77.4,43.7
5,"5.","San Antonio","San Antonio, TX",154.92,-98.28,29.32
6,"6.","Memphis","Memphis, TN",154.91,-90,35.3
7, ,"Atlanta", ,153.77,-84.26,33.39
8,"8.","Arlington","Arlington, TX",152.9,-97.11,32.74
9, ,"Huntsville", ,152.26,-86.35,34.42
10,"10.","Virginia Beach","Virginia Beach, VA",151.73,-75.98,36.85
11,"11.","Colorado Springs","Colorado Springs, CO",150.89,-104.43,38.49
12,"12.","Las Vegas","Las Vegas, NV",148.81,-115.1,36.5
13,"13.","Salt Lake City","Salt Lake City, UT",148.6,-111.58,40.46
14,"14.","Durham","Durham, NC",146.95,-78.47,35.52
15, ,"Cleveland", ,146.27,-81.51,41.24
16, ,"Houston", ,145.38,-95.21,29.58
17,"17.","Saint Petersburg","Saint Petersburg, FL",145.31,-82.64,27.77
18, ,"Chattanooga", ,145.27,-85.12,35.2
19,"19.","Madison","Madison, WI",144.83,-89.2,43.8
20,"20.","Saint Louis","Saint Louis, MO",144.7,-90.23,38.45
21,"21.","Seattle","Seattle, WA",144.6,-122.18,47.27
22, ,"Tampa", ,144.43,-82.32,27.58
23,"23.","Grand Rapids","Grand Rapids, MI",143.87,-85.31,42.53
24,"24.","Boulder","Boulder, CO",143.02,-105.16,40
25,"25.","San Diego","San Diego, CA",142.72,-117.1,32.44
</pre>

<pre id = 'high_cost_data'>
rank,rankLabel,city,cityLabel,purchasePower,lat,long
109,"109.","Fort Lauderdale","Fort Lauderdale, FL",104.35,-80.9,26.4
110, ,"Syracuse", ,103.63,-76.7,43.7
111,"111.","Honolulu","Honolulu, HI",103.08,-157.55,21.2
112,"112.","Plano","Plano, TX",101.69,-96.7,33.02
113, ,"Hartford", ,101.57,-72.39,41.44
114,"114.","Boston","Boston, MA",101.35,-71.2,42.22
115,"115.","Burlington","Burlington, VT",101.19,-73.9,44.28
116, ,"Augusta", ,100.38,-81.58,33.22
117, ,"New York", ,100,-73.58,40.47
118,"118.","Akron","Akron, OH",99.21,-81.26,40.55
119,"119.","Oakland","Oakland, CA",97.94,-122.19,37.49
120, ,"Miami", ,97.81,-80.16,25.48
121,"121.","Saint Paul","Saint Paul, MN",97.64,-93.13,44.53
122, ,"Bloomington", ,96.92,-86.37,39.8
123, ,"Indianapolis", ,94.22,-86.17,39.44
124, ,"Newark", ,94.1,-74.1,40.42
125, ,"San Francisco", ,92.96,-122.23,37.37
126,"126.","Columbia","Columbia, SC",92.47,-81.7,33.57
127, ,"Brooklyn", ,87.04,-73.94,40.68
128, ,"Fort Myers", ,86.87,-81.52,26.35
129,"129.","Springfield","Springfield, MO",77.68,-93.23,37.14
130,"130.","Shreveport","Shreveport, LA",76.03,-93.49,32.28
131,"131.","Bellevue","Bellevue, WA",73.46,-122.2,47.61
132,"132.","Fort Collins","Fort Collins, CO",73.23,-105.5,40.45
133,"133.","Norfolk","Norfolk, VA",64.42,-76.12,36.54
</pre>

<pre id = 'barChart'>
rank,city,purchasePower
1,"Sioux Falls, SD",168.93
2,"Ann Arbor, MI",163.57
3,"Dallas, TX",162.37
4,"Rochester, NY",158.71
5,"San Antonio, TX",154.92
6,"Memphis, TN",154.91
7,"Atlanta, GA",153.77
8,"Arlington, TX",152.9
9,"Huntsville, AL",152.26
10,"Virginia Beach, VA",151.73
11,"Colorado Springs, CO",150.89
12,"Las Vegas, NV",148.81
13,"Salt Lake City, UT",148.6
14,"Durham, NC",146.95
15,"Cleveland, OH",146.27
16,"Houston, TX",145.38
17,"Saint Petersburg, FL",145.31
18,"Chattanooga, TN",145.27
19,"Madison, WI",144.83
20,"Saint Louis, MO",144.7
21,"Seattle, WA",144.6
22,"Tampa, FL",144.43
23,"Grand Rapids, MI",143.87
24,"Boulder, CO",143.02
25,"San Diego, CA",142.72
26,"Oklahoma City, OK",142.4
27,"Fort Worth, TX",142.22
28,"Greensboro, NC",141.87
29,"Harrisburg, PA",140.56
30,"Austin, TX",140.39
31,"Irvine, CA",139.48
32,"Albany, NY",139.34
33,"Phoenix, AZ",139.29
34,"Milwaukee, WI",139.23
35,"Tucson, AZ",138.07
36,"Cincinnati, OH",136.92
37,"Reno, NV",136.4
38,"Kansas City, MO",135.76
39,"Spokane, WA",135.55
40,"Sacramento, CA",135.14
41,"San Jose, CA",134.82
42,"Birmingham, AL",134.55
43,"Omaha, NE",134.51
44,"Santa Barbara, CA",134.38
45,"Pittsburgh, PA",133.38
46,"Lubbock, TX",133.25
47,"Richmond, VA",133.08
48,"Little Rock, AR",132.31
49,"Raleigh, NC",131.99
50,"Detroit, MI",131.62
51,"Bellingham, WA",131.14
52,"Minneapolis, MN",131.08
53,"Jersey City, NJ",130.99
54,"Boise, ID",130.86
55,"Rockville, MD",130.79
56,"Lexington, KY",130.77
57,"Denver, CO",130.1
58,"Fort Wayne, IN",129.87
59,"Orlando, FL",129.02
60,"Pensacola, FL",128.73
61,"Knoxville, TN",128.69
62,"Melbourne, FL",128.34
63,"Vancouver, WA",127.95
64,"Greenville, SC",127.49
65,"New Haven, CT",127.41
66,"Long Beach, CA",127.25
67,"Louisville, KY",127.21
68,"Des Moines, IA",125.85
69,"Portland, OR",125.57
70,"Columbus, OH",125.47
71,"Nashville, TN",125.4
72,"Tacoma, WA",125.1
73,"Olympia, WA",125.04
74,"Anchorage, AK",124.92
75,"Manchester, NH",124.75
76,"West Palm Beach, FL",124.36
77,"Lincoln, NE",124.13
78,"Albuquerque, NM",123.57
79,"Tulsa, OK",123.2
80,"Mobile, AL",122.2
81,"Washington, DC",120.62
82,"Bakersfield, CA",120.54
83,"Arlington, VA",120.53
84,"Buffalo, NY",120.23
85,"Chicago, IL",119.17
86,"College Station, TX",118.7
87,"Wichita, KS",118.39
88,"Winston-salem, NC",117.44
89,"Jacksonville, FL",117.13
90,"Baltimore, MD",116.79
91,"New Orleans, LA",116.56
92,"Philadelphia, PA",116.06
93,"Berkeley, CA",115.84
94,"Charleston, SC",115.41
95,"Dayton, OH",114.2
96,"Everett, WA",113.75
97,"Portland, ME",113.69
98,"Queens, NY",113.4
99,"Charlotte, NC",112.72
100,"Hamilton, Bermuda",112.26
101,"Asheville, NC",111.73
102,"Fresno, CA",110.71
103,"Athens, GA",110.52
104,"Eugene, OR",109.06
105,"Los Angeles, CA",109.01
106,"Santa Rosa, CA",106.77
107,"Salem, OR",106.58
108,"Fayetteville, AR",104.92
109,"Fort Lauderdale, FL",104.35
110,"Syracuse, NY",103.63
111,"Honolulu, HI",103.08
112,"Plano, TX",101.69
113,"Hartford, CT",101.57
114,"Boston, MA",101.35
115,"Burlington, VT",101.19
116,"Augusta, GA",100.38
117,"New York, NY",100
118,"Akron, OH",99.21
119,"Oakland, CA",97.94
120,"Miami, FL",97.81
121,"Saint Paul, MN",97.64
122,"Bloomington, IN",96.92
123,"Indianapolis, IN",94.22
124,"Newark, NJ",94.1
125,"San Francisco, CA",92.96
126,"Columbia, SC",92.47
127,"Brooklyn, NY",87.04
128,"Fort Myers, FL",86.87
129,"Springfield, MO",77.68
130,"Shreveport, LA",76.03
131,"Bellevue, WA",73.46
132,"Fort Collins, CO",73.23
133,"Norfolk, VA",64.42
</pre>
<script>

//Width and height of map
var width = 960;
var height = 500;

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

//Create SVG element for low-cost cities
var svg = d3.select("#low_cost_map")
  .append("svg")
  .attr("width", width)
  .attr("height", height);
  
//Create SVG element for low-cost cities
var svg2 = d3.select("#high_cost_map")
  .append("svg")
  .attr("width", width)
  .attr("height", height);

// Load in my states data!
d3.csv("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/medianHouseholdIncomeByState.csv", function(data) {
	
  // Load GeoJSON data and merge with states data
  d3.json("https://raw.githubusercontent.com/ZDBobbitt/Maps/master/us-states.json", function(json) {

    // Loop through each state data value in the .csv file
    for (var i = 0; i < data.length; i++) {

      // Grab State Name
      var dataState = data[i].state;

      // Grab data value 
      var dataValue = data[i].medianHouseholdIncome;

      // Find the corresponding state inside the GeoJSON
      for (var j = 0; j < json.features.length; j++) {
        var jsonState = json.features[j].properties.name;

        if (dataState == jsonState) {

          // Copy the data value into the JSON
          json.features[j].properties.medianHouseholdIncome = dataValue;

          // Stop looking through the JSON
          break;
        }
      }
    }
	
    
//LOW COST OF LIVING CITIES
    svg.selectAll("path")
      .data(json.features)
      .enter()
      .append("path")
      .attr("d", path)
      .style("stroke", "#fff")
      .style("stroke-width", "1")
	  .style("fill", "#eeecec"); //grey
		
    // add circles to svg
	var low_cost_data = d3.csvParse( d3.select("pre#low_cost_data").text() );
	
    var cities = svg.selectAll("circle")
		.data(low_cost_data)
		.enter()
		.append("g");
		
		cities.append("circle")
		.attr("cx", function (d) { return projection([d.lat, d.long])[0]; })
		.attr("cy", function (d) { return projection([d.lat, d.long])[1]; })
		.attr("r", "8")
		.attr("stroke", "#6bdd73") //green
		.attr("stroke-width", 3)
		.attr("fill", "white") //white
		.on("mouseover", function(d) {
            d3.select(this).style("opacity", .7)	  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html(d.city + " purchasing power index: " + "<b>" + d.purchasePower + "</b>")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
        .on("mouseout", function(d) {
            d3.select(this).style("opacity", 1)		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
		
		//add city name labels
		svg.selectAll(".text-city")
			.data(low_cost_data)
			.enter()
			.append("text")
			.attr("class", "text-city")
			.text(function(d){return d.rankLabel + " " + d.cityLabel;})
			.attr("dx", function (d) { return projection([d.lat, d.long])[0]; })
			.attr("dy", function (d) { return projection([d.lat, d.long])[1] - 14; })
			.style("font-weight", "bold")
			.style("font-family", "Raleway");
	   
	   svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 657)
		  .attr("y", 177)
		  .text("2. Ann Arbor, MI")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");	

       svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 485)
		  .attr("y", 375)
		  .text("3. Dallas, TX")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");	
		  
	   svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 655)
		  .attr("y", 350)
		  .text("7. Atlanta, GA")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		
	   svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 637)
		  .attr("y", 320)
		  .text("9. Huntsville, AL")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");	
	   
	   svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 670)
		  .attr("y", 210)
		  .text("15. Cleveland, OH")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");	
	   
       svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 500)
		  .attr("y", 428)
		  .text("16. Houston, TX")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
	   svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 652)
		  .attr("y", 305)
		  .text("18. Chattanooga, TN")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
	   svg.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 700)
		  .attr("y", 448)
		  .text("22. Tampa, FL")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
			
//HIGH COST OF LIVING CITIES
    svg2.selectAll("path")
      .data(json.features)
      .enter()
      .append("path")
      .attr("d", path)
      .style("stroke", "#fff")
      .style("stroke-width", "1")
	  .style("fill", "#eeecec"); //grey
		
    // add circles to svg
	var high_cost_data = d3.csvParse( d3.select("pre#high_cost_data").text() );
	
    var cities2 = svg2.selectAll("circle")
		.data(high_cost_data)
		.enter()
		.append("g");
		
		cities2.append("circle")
		.attr("cx", function (d) { return projection([d.lat, d.long])[0]; })
		.attr("cy", function (d) { return projection([d.lat, d.long])[1]; })
		.attr("r", "8")
		.attr("stroke", "#e56060") //red
		.attr("stroke-width", 3)
		.attr("fill", "white") //white
		.on("mouseover", function(d) {
            d3.select(this).style("opacity", .7)	  	  
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div .html(d.city + " purchasing power index: " + "<b>" + d.purchasePower + "</b>")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 78) + "px");
            })					
        .on("mouseout", function(d) {
            d3.select(this).style("opacity", 1)		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
		
		//add city name labels
		svg2.selectAll(".text-city")
			.data(high_cost_data)
			.enter()
			.append("text")
			.attr("class", "text-city")
			.text(function(d){return d.rankLabel + " " + d.cityLabel;})
			.attr("dx", function (d) { return projection([d.lat, d.long])[0]; })
			.attr("dy", function (d) { return projection([d.lat, d.long])[1] - 12; })
			.style("font-weight", "bold")
			.style("font-family", "Raleway");

		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 640)
		  .attr("y", 127)
		  .text("110. Syracuse, NY")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
			
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 804)
		  .attr("y", 167)
		  .text("113. Hartford, CT")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 705)
		  .attr("y", 345)
		  .text("116. Augusta, SC")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 792)
		  .attr("y", 186)
		  .text("116. New York, NY")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 750)
		  .attr("y", 460)
		  .text("120. Miami, FL")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 628)
		  .attr("y", 222)
		  .text("122. Bloomington, IN")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 628)
		  .attr("y", 242)
		  .text("123. Indianapolis, IN")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 782)
		  .attr("y", 200)
		  .text("124. Newark, NJ")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 130)
		  .attr("y", 245)
		  .text("125. San Francisco, CA")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 690)
		  .attr("y", 170)
		  .text("127. Brooklyn, NY")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
		  
		svg2.append("g")
		  .append("text")
		  .attr("class", "text-city")
		  .attr("x", 610)
		  .attr("y", 450)
		  .text("128. Fort Myers, FL")
		  .style("font-weight", "bold")
		  .style("font-family", "Raleway");
  
  }); //end json stuff
}); //end csv stuff

//BAR CHART STUFF
			// this is the size of the svg container
			var fullwidth = 850,
			    fullheight = 2300;

			var margin = {top: 20, right: 10, bottom: 30, left: 116};

			var widthBAR = fullwidth - margin.left - margin.right,
    		    	    heightBAR = fullheight - margin.top - margin.bottom;

			var widthScaleBAR = d3.scaleLinear()
								.domain([0, 200])
								.range([ 0, widthBAR]);

			var heightScaleBAR = d3.scaleBand()
								.rangeRound([ margin.top, heightBAR], 0.2);
					
			//x axis labels (orient below the x axis)
			var xAxisLabsBottom = ["","100","160","80","140","60","160", "40", "140", "20", "120", "120"];
			var xAxisBottom = d3.axisBottom(widthScaleBAR)
							.tickFormat(function(d) { return xAxisLabsBottom[d % 11]; });
							
			//x axis labels (orient above the x axis)
			var xAxisLabsTop = ["","100","160","80","140","60","160", "40", "140", "20", "120", "120"];
			var xAxisTop = d3.axisBottom(widthScaleBAR)
							.tickFormat(function(d) { return xAxisLabsTop[d % 11]; });
							
			//y axis labels (orient to the left of y axis)
			var yAxis = d3.axisLeft(heightScaleBAR);

			var svgBAR = d3.select("#bar_chart")
						.append("svg")
						.attr("width", widthBAR)
  						.attr("height", heightBAR);				

			var bar_chart_data = d3.csvParse( d3.select("pre#barChart").text() );

				// js map: will make a new array out of all the d.Blog fields
				heightScaleBAR.domain(bar_chart_data.map(function(d) { return d.city; } ));
					
				// Make the dots for Men
				var cityBars = svgBAR.selectAll("circle.purchasePower")
						.data(bar_chart_data)
						.enter()
						.append('rect')
						.attr('fill', '#008080')
						.attr('height', 13)
					        .attr('width',function(d){ return widthScaleBAR(+d.purchasePower); })
					        .attr('x', margin.left)
					        .attr('y', function(d) { return heightScaleBAR(d.city); });

				
				    //add tooltip
				    cityBars
					.on("mouseover", function(d) {	
					    d3.select(this).attr("fill", "purple")
				            div.transition()		
				                .duration(200)		
				                .style("opacity", .9)
				            div	.html(d.city + " purchasing power index: " + "<b>" + d.purchasePower + "</b>")	
				                .style("left", (d3.event.pageX) + "px")		
				                .style("top", (d3.event.pageY - 28) + "px")
				            })					
				        .on("mouseout", function(d) {	
				            d3.select(this).attr("fill", "#008080")
				            div.transition()		
				                .duration(500)		
				                .style("opacity", 0);	
				        });
				
				//x axis at top of graph
				svgBAR.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + ",20)")
					.call(xAxisTop);
				
				//x axis at bottom of graph
				svgBAR.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + "," + (heightBAR-20) + ")")
					.call(xAxisBottom);
				
				//x axis label top
				svgBAR.append("text")
					.attr("transform", "translate("+ (fullwidth-245) + ", 67)")
					.text("Local Purchasing Power");
					
				//x axis label top
				svgBAR.append("text")
					.attr("transform", "translate("+ (fullwidth-245) + ", 2227)")
					.text("Local Purchasing Power");
					
				//y axis
				svgBAR.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin.left + ",0)")
					.call(yAxis);	
					
				//change axis label font-sizes	
				svgBAR.select(".y.axis")
					  .selectAll("text")
					  .style("font-size","11px");
					  
			        svgBAR.select(".x.axis")
					  .selectAll("text")
					  .style("font-size","11px");

</script>
</body>
</html>
<?php get_footer();?>