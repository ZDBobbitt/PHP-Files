<?php
/*
 *Template Name: Stock Ownership Rates
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
width: 180px;
border: 1px solid grey;
background-color: #d9c8ff;
outline: none;
}

#percentMen, #percentDifference, #percentMen2, #percentDifference2 {
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
                margin-left: 27%;
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
	  <h1>Taking Stock</h1>
		  <h4	><b>Analyzing Stock Ownership in the U.S. Before and After the Financial Crisis</b></h4>
		  <p style='margin-top: 30px'>From 2001 to 2008, 62% of adults in the U.S. owned stocks on average. Once the financial crisis hit in late 2008, though, many Americans
		  were scared out of their holdings. In the years following the crisis between 2009 and 2017, only 54% of U.S. adults owned stocks on average.</p>
		  <p>In <a href='http://news.gallup.com/poll/211052/stock-ownership-down-among-older-higher-income.aspx' target='_blank'>a recent Gallup Study</a>, researchers discovered
		  that stock ownership before and after the financial crisis varied significantly across age groups and income brackets.</p>
		  <p id='last_block_p'>To see how different groups reacted to the crisis, and which ones have proportionally benefitted the most from this recent bull market, let's visualize the data!</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph1'>
			<h3 id='blockTitle'>Average % of Americans who own stocks by age</h3>
			<h3 id='blockTitleSub'><div class="yMen">2001 to 2008 </div> vs. <div class="yWomen"> 2009 - 2017</div></h3>
				<h4 id='sortButtonsTitle'>SORT BY :</h4>
				<div id='sortButtons'>
					<div id="percentMen"><button class='sort-btn' type="button" value="% OWNERSHIP" onclick="change()">% OWNERSHIP </button></div>
					<div id="percentDifference"><button class="sort-btn" type="button" value="AGE" onclick="change()">AGE</button></div>
				</div>
		  </div>	  
	      
			  <div class='talks'><!--start talks-->
			  <hr>
			  <p id='talkingPoints'><b>Both</b> before and after the financial crisis, stock ownership was highest among 30 to 64 year olds. This makes sense as income tends to 
			  be highest during these years, 401(k) investment plans are more commonplace, and most people have at least some savings to invest.</p>
			  <p id='talkingPoints'><b>Following</b> the crisis, stock ownership declined in every age bracket, <i>except</i> for those 65 and older, who actually saw a one percent increase.</p>
			  <p id='talkingPoints'><b>The</b> group with the largest decline in stock ownership was the 18 to 29 year-old age bracket, with average ownership dropping from 42% to 31% following the crash.</p>
			  <p id='talkingPoints'><b>It's</b> pretty clear that older age groups have benefitted the most during this incredible bull market from 2009 to 2017, with proportionally fewer young people 
			  participating in the stock market.</p>
			  <p id='talkingPoints'><b>Next</b>, let's take a look at stock ownership by annual household income.</p>
			  <hr>
			  <p style='margin-bottom:0px'>&nbsp</p>
			  </div><!--end talks-->
	  </div><!--end of graph 1 block-->
	  
	  <div id='graph2_block'><!--start of graph 2 block-->
		<div id='graph2'>
			<h3 id='blockTitle'>Average % of Americans who own stocks by income bracket</h3>
			<h3 id='blockTitleSub'><div class="yMen">2001 to 2008 </div> vs. <div class="yWomen"> 2009 - 2017</div></h3>
				<h4 id='sortButtonsTitle'>SORT BY :</h4>
				<div id='sortButtons'>
					<div id="percentMen2"><button class="sort-btn" type="button" value="% OWNERSHIP">% OWNERSHIP</button></div>
					<div id="percentDifference2"><button class="sort-btn" type="button" value="HOUSEHOLD INCOME">HOUSEHOLD INCOME</button></div>
				</div>
		  </div>
		  
		  <div class='talks'><!--start talks-->
		  <hr>
		  <p id='talkingPoints'><b>Perhaps</b> it's no surprise that stock ownership is highly correlated with annual household income. A significantly higher
		  percentage of households earning $100,000 + yearly invest in stocks compared to households earning less than $30,000 per year.</p>
		  <p id='talkingPoints'><b>Before</b> the financial crisis, 27% of households with annual incomes below $30,000 owned stocks. This number dropped
          to 21% following the crisis. Conversely, 88% of households earning over $100,000 annually owned stocks before the crisis, which increased to 89% following it.</p>
		  <p id='talkingPoints'><b>The</b> $30,000 - $74,999 income bracket experienced the largest drop in stock ownership following the crisis, with ownership rates
          dropping from 67% to 54%.</p>
		  <p id='talkingPoints'><b>The</b> $100,000 + income bracket was the most resistant to the financial crash, with ownership rates even increasing following 2008.</p>
		  <hr>
		  <h3 id='blockTitle'>Conclusion</h3>
		  <p id='talkingPoints'>In general, the percentage of Americans who own stocks declined following the financial crisis of 2008. However, high-income households
          and the elderly maintained their exposure to stocks through the crisis. It seems that these two groups in particular have benefitted the most from the bull market that has followed the crash.</p>
		  <p id='talkingPoints'>Despite the impressive performance of the stock market following the crash, it hasn't been enough to entice young investors and low-income households to invest. Part of the
		  reason is undoubtedly because these two groups have less money to invest compared to their older, higher-income counterparts. Time will tell if investors remain turned off from investing in stocks
		  or if stock ownership rates return to their pre-crisis levels.</p>
		  <p style='margin-bottom:0px'>&nbsp</p>
		  </div> <!--end talks-->
	  </div><!--end of graph 2 block-->	
	  
	  </div><!--end of main-->
	  
<pre id='data'>
activity,yMen,yWomen
"18 to 29",42, 31
"30 to 49",71, 62
"50 to 64",69, 62
"65+",53, 54</pre>
<pre id='data2'>
activity,yMen,yWomen
"Less than $30,000",27,21
"$30,000 to $74,999",67,54
"$75,000 to $99,999",85,75
"$100,000",88,89</pre>
<pre id='data3'>
activity,percent,hours
"Sleeping",99.9,8.8</pre>

		<script>
		// Define the div for the tooltip
    var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);
		// this is the size of the svg container
			var fullwidth = 1000,
				fullheight = 400;

			var margin = {top: 20, right: 30, bottom: 30, left: 400};

			var width = fullwidth - margin.left - margin.right,
    		height = fullheight - margin.top - margin.bottom;

//GRAPH 1 STUFF
			var widthScale = d3.scale.linear()
								.domain([0,100])
								.range([ 0, width]);

			var heightScale = d3.scale.ordinal()
								.rangeRoundBands([ margin.top, height], 0.2);
					
			//x axis labels (orient below the x axis)
			var xAxisBottom = d3.svg.axis()
							.scale(widthScale)
							.orient("bottom")
							.tickFormat(function(d) { return d + "%"; });
							
			//x axis labels (orient above the x axis)
			var xAxisTop = d3.svg.axis()
							.scale(widthScale)
							.orient("top")
							.tickFormat(function(d) { return d + "%"; });
							
			//y axis labels (orient to the left of y axis)
			var yAxis = d3.svg.axis()
							.scale(heightScale)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0);

			var svg = d3.select("#graph1")
						.append("svg")
						.attr("width", 1000)
						.attr("height", 850)
						.append("g")
						.attr("transform", "translate(-240, 50)");

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
					.attr("r", heightScale.rangeBand()/6)
					.attr("cy", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html("On average, " + d.yMen + "% of Americans in this age bracket owned stocks from 2001 to 2008")	
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
					.attr("r", heightScale.rangeBand()/6)
					.attr("cy", function(d) {
						return heightScale(d.activity) + heightScale.rangeBand()/2;
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html("On average, " + d.yWomen + "% of Americans in this age bracket owned stocks from 2009 to 2017")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
				
				//x axis at top of graph
				//svg.append("g")
				//	.attr("class", "x axis")
				//	.attr("transform", "translate(" + margin.left + ",20)")
				//	.call(xAxisTop);
				
				//x axis at bottom of graph
				svg.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + "," + height + ")")
					.call(xAxisBottom);
					
				//x axis label
				svg.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width + 265) + "," + (height -5) +")")
					.text("Average % who own stocks");
				
				//y axis label
				svg.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width-160) +","+(height - 310)+")rotate(-90)")
					.text("Age");
					
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
	x0 = heightScale.domain(data.sort(function(a, b) { return (Math.abs(b.yWomen - b.yMen) -  Math.abs(a.yWomen - a.yMen)); })
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
  
 //GRAPH 2 STUFF
			var widthScale2 = d3.scale.linear()
								.domain([0,100])
								.range([ 0, width]);

			var heightScale2 = d3.scale.ordinal()
								.rangeRoundBands([ margin.top, height], 0.2);
					
			//x axis labels (orient below the x axis)
			var xAxisBottom2 = d3.svg.axis()
							.scale(widthScale2)
							.orient("bottom")
							.tickFormat(function(d) { return d + "%"; });;
							
			//x axis labels (orient above the x axis)
			var xAxisTop2 = d3.svg.axis()
							.scale(widthScale2)
							.orient("top");
							
			//y axis labels (orient to the left of y axis)
			var yAxis2 = d3.svg.axis()
							.scale(heightScale2)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0);

			var svg2 = d3.select("#graph2")
						.append("svg")
						.attr("width", 1000)
						.attr("height", 850)
						.append("g")
						.attr("transform", "translate(-240, 50)");

			var data2 = d3.csv.parse(d3.select("pre#data2").text() );

				// js map: will make a new array out of all the d.activity fields
				heightScale2.domain(data2.map(function(d) { return d.activity; } ));

				// Make the faint lines from y labels to highest dot
				var linesGrid2 = svg2.selectAll("lines.grid")
					.data(data2)
					.enter()
					.append("line");

				linesGrid2.attr("class", "grid2")
					.attr("x1", margin.left)
					.attr("y1", function(d) {
						return heightScale2(d.activity) + heightScale2.rangeBand()/2;
					})
					.attr("x2", function(d) {
						return margin.left + widthScale2(+d.yWomen);

					})
					.attr("y2", function(d) {
						return heightScale2(d.activity) + heightScale2.rangeBand()/2;
					});

					var linesBetween2 = svg2.selectAll("lines.between")
					.data(data2)
					.enter()
					.append("line");
				
				//Make the lines between the men and women dots
				linesBetween2.attr("class", "grid2")
					.attr("x1", function(d) {
						return margin.left + widthScale2(+d.yMen);
					})
					.attr("y1", function(d) {
						return heightScale2(d.activity) + heightScale2.rangeBand()/2;
					})
					.attr("x2", function(d) {
						return margin.left + widthScale2(d.yWomen);
					})
					.attr("y2", function(d) {
						return heightScale2(d.activity) + heightScale2.rangeBand()/2;
					})
					
				// Make the dots for Men
				var dotsMen2 = svg2.selectAll("circle.yMen")
						.data(data2)
						.enter()
						.append("circle");

				dotsMen2
					.attr("class", "yMen")
					.attr("cx", function(d) {
						return margin.left + widthScale2(+d.yMen);
					})
					.attr("r", heightScale2.rangeBand()/6)
					.attr("cy", function(d) {
						return heightScale2(d.activity) + heightScale2.rangeBand()/2;
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html("On average, " + d.yMen + "% of Americans in this income bracket owned stocks from 2001 to 2008")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });

				// Make the dots for Women
				var dotsWomen2 = svg2.selectAll("circle.yWomen")
						.data(data2)
						.enter()
						.append("circle");

				dotsWomen2
					.attr("class", "yWomen")
					.attr("cx", function(d) {
						return margin.left + widthScale2(+d.yWomen);
					})
					.attr("r", heightScale2.rangeBand()/6)
					.attr("cy", function(d) {
						return heightScale2(d.activity) + heightScale2.rangeBand()/2;
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html("On average, " + d.yWomen + "% of Americans in this income bracket owned stocks from 2009 to 2017")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
				
				//x axis at bottom of graph
				svg2.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + "," + height + ")")
					.call(xAxisBottom2);
					
				//x axis label
				svg2.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width + 265) + "," + (height -5) +")")
					.text("Average % who own stocks");
				
				//y axis label
				svg2.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width-160) +","+(height - 295)+")rotate(-90)")
					.text("Income");
					
				//y axis
				svg2.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin.left + ",0)")
					.call(yAxis2);	 
					
//define y axis to use based on button click					
d3.select("#percentWomen2").on("click", function(){
	x02 = heightScale2.domain(data2.sort(function(a, b) { return b.yWomen - a.yWomen; })
        .map(function(d) { return d.activity; }))
        .copy();
	change2();
});

d3.select("#percentMen2").on("click", function(){
	x02 = heightScale2.domain(data2.sort(function(a, b) { return b.yMen - a.yMen; })
        .map(function(d) { return d.activity; }))
        .copy();
	change2();
});

d3.select("#percentDifference2").on("click", function(){
	x02 = heightScale2.domain(data2.sort(function(a, b) { return a.yMen - b.yMen; })
        .map(function(d) { return d.activity; }))
        .copy();
	change2();
});
  
  //start of change function
  function change2() {

    svg2.selectAll("circle.yWomen")
        .sort(function(a, b) { return x02(a.activity) - x02(b.activity); });
	
	//define transition and delay variables to be used later
    var transition = svg2.transition().duration(750),
        delay = function(d, i) { return i * 50; };
	
	//move all women circles to new y positions
    transition.selectAll("circle.yWomen")
        .delay(delay)
        .attr("cy", function(d) { return x02(d.activity) + heightScale2.rangeBand()/2; });
	
	//move all men circles to new y positions
	transition.selectAll("circle.yMen")
        .delay(delay)
        .attr("cy", function(d) { return x02(d.activity) + heightScale2.rangeBand()/2; });
	
	//move all labels to new positions
    transition.select(".y.axis")
        .call(yAxis2)
      .selectAll("g")
        .delay(delay);
	
	// Make the faint lines from y labels to highest dot
	linesGrid2.transition()
	.delay(delay)
	.attr("x1", margin.left)
	.attr("y1", function(d) {
		return x02(d.activity) + heightScale2.rangeBand()/2;
	})
	.attr("x2", function(d) {
		return margin.left + widthScale2(+d.yWomen);
	})
	.attr("y2", function(d) {
		return x02(d.activity) + heightScale2.rangeBand()/2;
	});
	
	linesBetween2.transition()
	.delay(delay)
	.attr("x1", function(d) {
		return margin.left + widthScale2(+d.yMen);
	})
	.attr("y1", function(d) {
		return x02(d.activity) + heightScale2.rangeBand()/2;
	})
	.attr("x2", function(d) {
		return margin.left + widthScale2(d.yWomen);
	})
	.attr("y2", function(d) {
		return x02(d.activity) + heightScale2.rangeBand()/2;
	})
	
  }; //end of change2 function	

//GRAPH 3 STUFF
			var height3 = fullheight - margin.top - margin.bottom - 250;

			var widthScale3 = d3.scale.linear()
								.domain([0,100])
								.range([ 0, width]);

			var heightScale3 = d3.scale.linear()
								.domain([0,10])
								.range([height3, 0]);
					
			//x axis labels (orient below the x axis)
			var xAxisBottom3 = d3.svg.axis()
							.scale(widthScale3)
							.orient("bottom")
							.tickFormat(function(d) { return d + "%"; });
							
			//y axis labels (orient to the left of y axis)
			var yAxis3 = d3.svg.axis()
							.scale(heightScale3)
							.orient("left")
							.outerTickSize(0);

			var svg3 = d3.select("#graph3")
						.append("div")
						.classed("svg-container3", true) //container class to make it responsive
						.append("svg")
						.attr("preserveAspectRatio", "xMidYMid meet")
						.attr("viewBox", "0 0 1300 800")
						//class to make it responsive
						.classed("svg-content-responsive", true);

			var data3 = d3.csv.parse(d3.select("pre#data3").text() );
					
				// Make the dots for Men
				var dots3 = svg3.selectAll("circle")
						.data(data3)
						.enter()
						.append("circle");

				dots3
					.attr("class", "dots3")
					.attr("cx", function(d) {
						return margin.left + widthScale3(+d.percent);
					})
					.attr("r", 6.5)
					.attr("cy", function(d) {
						return heightScale3(d.hours);
					})
					.on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .9)
            div	.html(d.percent + "% engage in " + d.activity + " at an average of " + d.hours + " hours per day.")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
				
				//x axis at bottom of graph
				svg3.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + "," + (height3+7) + ")")
					.call(xAxisBottom3);
					
				//x axis label
				svg3.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (width + 100) + "," + (height3+2)+")")
					.text("Average percent of Americans who engage in activity per day");
					
				//y axis
				svg3.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin.left + ",7)")
					.call(yAxis3);	

				//y axis label
                svg3.append("text")			
				  .attr("class", "graph3Label")
				  .attr("transform", "translate("+ (width-160) +","+(height3-300)+")rotate(-90)")
				  .text("Average hours spent on activity per day"); 
				 
				//INDIVIDUAL POINT LABELS
				
				//working label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width+10) + "," + (height3-380)+")")
				  .text("WORKING"); 		  
				//sleeping label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width+335) + "," + (height3-430)+")")
				  .text("SLEEPING");   
				//TV label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width+290) + "," + (height3-180)+")")
				  .text("WATCHING TV"); 
				//eating label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width+260) + "," + (height3-70)+")")
				  .text("EATING & DRINKING"); 
				//grooming label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width+220) + "," + (height3-30)+")")
				  .text("GROOMING"); 
				//homework label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width-130) + "," + (height3-155)+")")
				  .text("HOMEWORK & RESEARCH"); 
				//homework label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width+25) + "," + (height3-95)+")")
				  .text("SOCIALIZING & COMMUNICATING");
				//playing games label
                svg3.append("text")			
				  .attr("class", "graph3LabelPoints")
				  .attr("transform", "translate("+ (width-105) + "," + (height3-117)+")")
				  .text("PLAYING GAMES");
		</script>
		</script>
	</body>
</html>	