<?php
/*
 *Template Name: Country Millionaires
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
	<head>
		<title>U.S. Stock Ownership</title>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
		<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');

		  pre {
			display:none;
		}
		  
		  body {
			color: black;
		}

		  h1 {
			text-align: center;
			font-size: 60px;
			margin-bottom: 0px;
			font-family: 'Droid Serif', serif;
		}
		
		  h3, h4, h5, h6 {
			text-align: center;
			margin-bottom: 15px;
			margin-top: 15px;
			font-family: 'Raleway', sans-serif;
		  }
		  
		  h3 {
			font-family: 'Droid Serif', serif;
		  }
		  
		  h6 {
		  margin-bottom: -15px;
		  }
		  
		  #blockTitle {
		  margin-top: 35px;
		  }
		  
		  #blockTitleSub {
		  margin-bottom: 60px;
		  }
		  
		  #blockTitleSub3 {
		  margin-bottom: 30px;
		  }
		  
		  a {
			text-decoration: none;
			color: #7A378B;
			font-weight: 700;
		  }
		  
		  hr {
		    width: 60%;
			margin-top: 30px;
			margin-bottom: 20px;
			border: solid 1px black;
		  }
		 
			p {
				color: black;
			}
			
			#last_block_p {
				margin-bottom: 50px;
			}
			
			#talkingPoints {
				padding-left: 20%;
				max-width: 700px;
			}
			
			.xLabel {
			  font-size: 14px;
			  font-family: sans-serif;
			}
			
			#intro{
			width: 80%;
			margin: 0 auto;
			}
			
			#outro{
			width: 80%;
			margin: 0 auto;
			}
			
			#graph1_block {
				/* background-color: #efefef; */
			    background-color: #ffffff;
				padding-top: 5px;
			}
			
			#graph2_block {
				/* background-color: #efefef; */
				 background-color: #ffffff; 
				padding-top: 5px;
			}
			
			.sort-btn {
color: black;
cursor: pointer;
border-radius: 2px;
font-family: 'Open Sans', sans-serif;
font-weight: 600;
height: 40px;
width: 195px;
border: 1px solid grey;
background-color: #d9c8ff;
outline: none;
}

#percentMen, #percentDifference, #percentWomen, #percentMen2, #percentDifference2 {
display: inline-block;
float: left;
}

.sort-btn:hover  {
			background-color: #efefef;
			transition: all .2s linear;
			}
			
.sort-btn:focus{
			background-color: #efefef;
			}
			
			div.yWomen {
				color: #ff9781;
				display: inline;
			}
			div.yMen {
				color: #008080;
				display: inline;
			}

			circle {
				stroke-width: 1;
			}

			circle.yWomen {
				fill: #ff9781;
                stroke: black;
			}

			circle.yMen {
				fill: #008080;
                stroke: black;
			}
			
			circle.dots3 {
				fill: #d7bdff;
				stroke: black;
			}

			circle:hover {
				opacity: .8;
			}

			line.grid {
				stroke: #d6d6d6;
			}
			
			line.grid2 {
				stroke: #cbcbcb;
			}

			.axis path,
			.axis line {
				fill: none;
				stroke: black;
				shape-rendering: crispEdges;
			}

			.axis text {
				font-family: sans-serif;
				font-size: 14px;
			}

			.xlabel {
				font-family: sans-serif;
				font-size: 11px;
				color: gray;
			}
			
			.svg-container {
				display: inline-block;
				position: relative;
				width: 100%;
				padding-bottom: 65%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
			.svg-container3 {
				display: inline-block;
				position: relative;
				width: 100%;
				padding-bottom: 45%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
			.svg-content-responsive {
				display: inline-block;
				position: absolute;
				top: 10px;
				left: 0;
				 margin-left: -4%; 
			}
			
			#sortButtons {
				text-align: center;
				margin-bottom: 35px;
                margin-left: 13%;
			}
			
			.graph3Label {
			    font-family: sans-serif;
				font-size: 11px;
				color: gray;
			}
			.graph3LabelPoints {
				font-family: sans-serif;
				font-size: 11px;
				font-weight: 700;
			}
			
			input {
				cursor: pointer;
				display: inline-block;
				margin-right: 0px;
				  border-radius: 6px;
				  color: black;
				  font-family: 'Open Sans', sans-serif;
				  font-weight: 600;
				  line-height: 2;
				  margin-top: 1.5rem;
				  outline: none;
				  width: 175px;
			}
			
			#womenSort, #menSort, #differenceSort {
				display: inline-block;
				outline: none;
			}
			
			input#percentWomen, input#percentWomen2 {
				background-color: #ff9781;
				border-color: black;
			}
			
			input#percentMen, input#percentMen2 {
				background-color: #d7bdff;
				border-color: black;
			}
			
			input#percentDifference, input#percentDifference2 {
				background-color: #d7bdff;
				border-color: black;
			}
			
			#percentMen:hover, #percentWomen:hover, #percentDifference:hover,
			#percentMen2:hover, #percentWomen2:hover, #percentDifference2:hover {
			background-color: #efefef;
			transition: all .2s linear;
			}
			
			#percentMen:focus, #percentWomen:focus, #percentDifference:focus,
            #percentMen2:focus, #percentWomen2:focus, #percentDifference2:focus	{
			background-color: #efefef;
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
}

		.talks {
			margin-top: -45%;
		}

		</style>
	</head>
	<body>

	  <div id="main"><!--start of main-->
	  
	  <div id='intro'>
	  <h1 style='color: #236394'>Where Are The Millionaires?</h1>
		  <h4><b>Analyzing the Number of Millionaires by Country in 2016 vs. projected 2026</b></h4>
		  <p style='margin-top: 30px'>It may come as no surprise that the United States is home to the most millionaires of any country on earth, with well over 4 million Americans in the double comma club.</p>
		  <p>It may be surprising, however, to find out that Japan, Germany, and the United Kingdom are home to the second, third, and fourth most millionaires, respectively. It may also come as a shock that India is projected to become the country with the fifth-most millionaires in the world by 2026, surpassing both Australia and Switzerland. </p>
		  <p>In the <a href='http://content.knightfrank.com/research/83/documents/en/the-wealth-report-2017-4482.pdf' target='_blank'>2017 Wealth Report</a> by Knight Frank, researchers examined how many millionaires there were in various countries in 2016 and how many there are expected to be by 2026. In total, 89 countries were included in the analysis.</p>
		  <p>Every country is expected to maintain or increase their number of millionaires by 2026 except for Venezuela, Turkey, and Brazil, all of whom are expected to see a decline. Some of the more surprising projections are for Southeast Asian countries like Thailand and Vietnam, who are expected to see their millionaire count double and triple, respectively.</p>
		  <p>The future looks bright in many African countries as well. Kenya, Rwanda, and Cote D'Ivoire are all expected to see their millionaire count double by 2026.</p>
		  <p id='last_block_p'>Check out the dot plot below to see the current and projected future number of millionaires in each country. Hover over the dots for specific millionaire counts. For countries with only one dot, their millionaire count is expected to remain the same between 2016 and 2026.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph1'>
			<h3 id='blockTitle'>Number of Millionaires by Country</h3>
			<h3 id='blockTitleSub'><div class="yMen">2016</div> vs. <div class="yWomen"> Projected 2026</div></h3>
				<h4 id='sortButtonsTitle'>SORT BY :</h4>
				<div id='sortButtons'>
				        <div id="percentDifference"><button class="sort-btn" type="button" value="ALPHABETICAL" onclick="change()">2026 - 2016 DIFFERENCE</button></div>
					<div id="percentMen"><button class='sort-btn' type="button" value="% OWNERSHIP" onclick="change()">2016 MILLIONAIRES</button></div>
					<div id="percentWomen"><button class='sort-btn' type="button" value="2026 MILLIONAIRES" onclick="change()">2026 MILLIONAIRES</button></div>
				</div>
		  </div>	  
	      
	  </div><!--end of graph 1 block-->
	 	
	  
	  </div><!--end of main-->
	  
<pre id='data'>
activity,yMen,yWomen
"Algeria",4500,4500
"Angola",6100,8500
"Argentina",33500,36900
"Australia",321900,547200
"Austria",110700,110700
"Azerbaijan",6000,9600
"Belgium",104700,104700
"Botswana",2800,4200
"Brazil",180000,154800
"Bulgaria",4800,5300
"Canada",292000,335800
"Caribbean",52000,59800
"Chile",21200,22500
"China",719400,1726600
"Colombia",28200,29600
"Congo (DRC)",600,1000
"Cote D'Ivoire",2500,5000
"Croatia",11900,13100
"Cyprus",12800,14100
"Czech Republic",17300,19000
"Denmark",73300,80600
"Egypt",18100,18100
"Estonia",1900,2100
"Ethiopia",3100,6200
"Finland",48200,48200
"France",290700	,290700
"Germany",774600,774600
"Ghana",2900,5200
"Greece",40000,40000
"Hong Kong",227900, 319100
"Hungary",13100,15700
"India",264300,660800
"Indonesia",49500,59400
"Iran",32000,34600
"Ireland",83100,108000
"Israel",75000,82500
"Italy",215600,215600
"Japan",1166000,1515800
"Jordan",6300,6600
"Kazakhstan",6700,10700
"Kenya",9400,16900
"Latvia",1900,2100
"Liechtenstein",5800,6400
"Lithuania",2900,3200
"Luxembourg",34100,40900
"Malaysia",43000,73100
"Malta",6600,9200
"Mauritius",3800,8700
"Mexico",170000,173400
"Monaco",13400,16100
"Morocco",4600,4600
"Mozambique",1100,2000
"Namibia",3300,5000
"Netherlands",115600,115600
"New Zealand",98800, 168000
"Nigeria",12300,12300
"Norway",107100,117800
"Pakistan",19200,26900
"Panama",3500,3700
"Paraguay",2100,2200
"Peru",16500,17500
"Philippines",14000,19600
"Poland",45300,54400
"Portugal",52200,52200
"Qatar",28000,31400
"Romania",11200,12300
"Russian Federation",132000, 211200
"Rwanda",600,1200
"Saudi Arabia",48600, 58300
"Serbia",2500,2800
"Singapore",217300,304200
"South Africa",40400, 52500
"South Korea",132500, 185500
"Spain",97700,97700
"Sri Lanka",5000, 13000
"Sweden",112500,112500
"Switzerland",363300,436000
"Taiwan",103100,134000
"Tanzania",2400,4800
"Thailand",22400,38100
"Turkey",70000,54600
"UAE",72000,80600
"Uganda",1400,2500
"United Kingdom",802800, 1043600
"United States",4389000,5705700
"Uruguay",4600,4800
"Venezuela",10500,6700
"Vietnam",14300,38600
"Zambia",1000,1800</pre>

		<script>
		// Define the div for the tooltip
    var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);
		// this is the size of the svg container
			var fullwidth = 1000,
			    fullheight = 2000;

			var margin = {top: 20, right: 30, bottom: 30, left: 400};

			var width = fullwidth - margin.left - margin.right,
    		height = fullheight - margin.top - margin.bottom;

//GRAPH 1 STUFF
			var widthScale = d3.scale.sqrt()
								.domain([0,5750000])
								.range([ 0, width]);

			var heightScale = d3.scale.ordinal()
								.rangeRoundBands([ margin.top, height], 0.2);
					
			//x axis labels (orient below the x axis)
			var xAxisLabsBottom= ["","1M","2M","3M","4M","5M","500K", "", "", "", "", ""];
			var xAxisBottom = d3.svg.axis()
							.scale(widthScale)
							.orient("top")
							.tickFormat(function(d) { return xAxisLabsBottom[d % 11]; });
							
			//x axis labels (orient above the x axis)
			var xAxisLabsTop= ["","1M","2M","3M","4M","5M","500K", "", "", "", "", ""];;
			var xAxisTop = d3.svg.axis()
							.scale(widthScale)
							.orient("top")
							.tickFormat(function(d) { return xAxisLabsTop[d % 11]; });
							
			//y axis labels (orient to the left of y axis)
			var yAxis = d3.svg.axis()
							.scale(heightScale)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0);

			var svg = d3.select("#graph1")
						.append("svg")
						.attr("width", 1000)
						.attr("height", 2000)
						.append("g")
						.attr("transform", "translate(-285, 50)");

			var data = d3.csv.parse(d3.select("pre#data").text() );

				// js map: will make a new array out of all the d.activity fields
				heightScale.domain(data.map(function(d) { return d.activity; } ));

				// Make the faint lines from y labels to highest dot
				var linesGrid = svg.selectAll("lines.grid")
					.data(data)
					.enter()
					.append("line");

				linesGrid.attr("class", "grid")
					.attr("x1", margin.left)
					.attr("y1", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					.attr("x2", function(d) {
						return margin.left + widthScale(+d.yWomen);

					})
					.attr("y2", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					});

					var linesBetween = svg.selectAll("lines.between")
					.data(data)
					.enter()
					.append("line");
				
				//Make the lines between the men and women dots
				linesBetween.attr("class", "grid")
					.attr("x1", function(d) {
						return margin.left + widthScale(+d.yMen);
					})
					.attr("y1", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					.attr("x2", function(d) {
						return margin.left + widthScale(d.yWomen);
					})
					.attr("y2", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					
				// Make the dots for Men
				var dotsMen = svg.selectAll("circle.yMen")
						.data(data)
						.enter()
						.append("circle");

				dotsMen
					.attr("class", "yMen")
					.attr("cx", function(d) {
						return margin.left + widthScale(+d.yMen);
					})
					.attr("r", heightScale.rangeBand()/3)
					.attr("cy", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html(d.activity + " currently has " + d.yMen.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " millionaires.")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });

				// Make the dots for Women
				var dotsWomen = svg.selectAll("circle.yWomen")
						.data(data)
						.enter()
						.append("circle");

				dotsWomen
					.attr("class", "yWomen")
					.attr("cx", function(d) {
						return margin.left + widthScale(+d.yWomen);
					})
					.attr("r", heightScale.rangeBand()/3)
					.attr("cy", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html(d.activity + " is projected to have " + d.yWomen.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " millionaires by 2026.")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
				
				//x axis at top of graph
				svg.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + ",20)")
					.call(xAxisTop);
				
				//x axis at bottom of graph
				svg.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + ",1950)")
					.call(xAxisBottom);
					
				//x axis label bottom
				svg.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width - 166) + "," + (height -5) +")")
					.text("Number of millionaires");
				
				//x axis label top
				svg.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width + 290) + "," + (height -1916) +")")
					.text("Number of millionaires");
				
				//y axis label
				//svg.append("text")
				//	.attr("class", "graph3Label")
				//	.attr("transform", "translate("+ (width-160) +","+(height - 310)+")rotate(-90)")
				//	.text("Age");
					
				//y axis
				svg.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin.left + ",0)")
					.call(yAxis);				

//define y axis to use based on button click					
d3.select("#percentWomen").on("click", function(){
	x0 = heightScale.domain(data.sort(function(a, b) { return b.yWomen - a.yWomen; })
        .map(function(d) { return d.activity; }))
        .copy();
	change();
});

d3.select("#percentMen").on("click", function(){
	x0 = heightScale.domain(data.sort(function(a, b) { return b.yMen - a.yMen; })
        .map(function(d) { return d.activity; }))
        .copy();
	change();
});

d3.select("#percentDifference").on("click", function(){
	x0 = heightScale.domain(data.sort(function(a, b) { return ((b.yWomen - b.yMen) -  (a.yWomen - a.yMen)); })
        .map(function(d) { return d.activity; }))
        .copy();
	change();
});
  
  //start of change function
  function change() {

    svg.selectAll("circle.yWomen")
        .sort(function(a, b) { return x0(a.activity) - x0(b.activity); });
	
	//define transition and delay variables to be used later
    var transition = svg.transition().duration(750),
        delay = function(d, i) { return i * 50; };
	
	//move all women circles to new y positions
    transition.selectAll("circle.yWomen")
        .delay(delay)
        .attr("cy", function(d) { return x0(d.activity) + heightScale.rangeBand()/2; });
	
	//move all men circles to new y positions
	transition.selectAll("circle.yMen")
        .delay(delay)
        .attr("cy", function(d) { return x0(d.activity) + heightScale.rangeBand()/2; });
	
	//move all labels to new positions
    transition.select(".y.axis")
        .call(yAxis)
      .selectAll("g")
        .delay(delay);
	
	// Make the faint lines from y labels to highest dot
	linesGrid.transition()
	.delay(delay)
	.attr("x1", margin.left)
	.attr("y1", function(d) {
		return x0(d.activity) + heightScale.rangeBand()/2;
	})
	.attr("x2", function(d) {
		return margin.left + widthScale(+d.yWomen);
	})
	.attr("y2", function(d) {
		return x0(d.activity) + heightScale.rangeBand()/2;
	});
	
	linesBetween.transition()
	.delay(delay)
	.attr("x1", function(d) {
		return margin.left + widthScale(+d.yMen);
	})
	.attr("y1", function(d) {
		return x0(d.activity) + heightScale.rangeBand()/2;
	})
	.attr("x2", function(d) {
		return margin.left + widthScale(d.yWomen);
	})
	.attr("y2", function(d) {
		return x0(d.activity) + heightScale.rangeBand()/2;
	})
	
  }; //end of change function
  
		</script>
	</body>
</html>	