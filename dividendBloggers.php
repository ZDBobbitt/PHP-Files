<?php
/*
 *Template Name: Dividend Bloggers
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
		  margin-bottom: 40px;
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
				margin-bottom: 20px;
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
		
		.svg-container {
				display: inline-block;
				position: relative;
				width: 100%;
				padding-bottom: 330%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
		.svg-content-responsive {
			display: inline-block;
			position: absolute;
			top: 10px;
			left: 0;
		}

		</style>
	</head>
	<body>

	  <div id="main"><!--start of main-->
	  
	  <div id='intro'>
	  	<h1 style='color: #008080'>Dividend Club</h1>
		  <h4><b>Visualizing the Dividend Income of 100+ Financial Bloggers</b></h4>
		  <p style='margin-top: 30px'>When companies earn profits, they can either reinvest those profits to grow the business or they can pay them out to shareholders as dividends.</p>
		  <p>For many investors, dividends are a great source of passive income. You simply purchase shares in a company, sit back, and watch the dividends roll in each quarter (or sometimes, each month.)</p>
                  <p>Many financial bloggers track and share their dividend income each month online. Fortunately, <a href = 'http://www.dividenddriven.com' target = '_blank'>Dividend Driven</a> has done the hard work of tracking and compiling a <a href = 'http://www.dividenddriven.com/leaderboard.php' target = '_blank'>massive database</a> of 117 bloggers who share their dividend income each month.</p>
                  <p id='last_block_p'>The bar chart below shows the total dividend income of each of these bloggers in 2017. Hover over the individual bars to see the exact dividend income.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph1'>
			<h3 id='blockTitle'>2017 Dividend Income by Blogger</h3>
		  </div>	  
	      
	  </div><!--end of graph 1 block-->
	  
	  </div><!--end of main-->
	  
<pre id='data'>
activity,yMen, site
Mr. Tako Escapes,53504.19,'http://mrtakoescapes.com'
The Money Commando,51636.99,http://mrtakoescapes.com
Root Of Good,26318,http://mrtakoescapes.com
Screaming Little Man (CAD),23764.55,http://mrtakoescapes.com
Tales From The Tape,23040.96,http://mrtakoescapes.com
BAMF Money,22660.34,http://mrtakoescapes.com
Race2Retirement,22064.62,http://mrtakoescapes.com
Dividend Hawk,16583.84,http://mrtakoescapes.com
DivGro,16528.09,http://mrtakoescapes.com
Journey To Total Freedom,15866.92,http://mrtakoescapes.com
Dividend Earner,15637.74,http://mrtakoescapes.com
Passive Income Mavericks,15613.65,http://mrtakoescapes.com
Tawcan (CAD),14834.38,http://mrtakoescapes.com
Stalflare (EURO),14523.69,http://mrtakoescapes.com
Passive Income Farmer (SGD),13588.99,http://mrtakoescapes.com
Dividend Magic (MYR),12157.37,http://mrtakoescapes.com
My Road To Wealth & Freedom,12024.74,http://mrtakoescapes.com
Balanced Dividends,12018,http://mrtakoescapes.com
The Expat Investor,12002,http://mrtakoescapes.com
Dividend Cake,11912.91,http://mrtakoescapes.com
Alpha Target,11792.11,http://mrtakoescapes.com
Dividend Driven,11339.48,http://mrtakoescapes.com
Humble FI,10730.96,http://mrtakoescapes.com
Roadmap2Retire (CAD),9698.55,http://mrtakoescapes.com
Dividend Quest,9588.64,http://mrtakoescapes.com
Dividend Diplomats (Lanny),9116.55,http://mrtakoescapes.com
BestFishPrice,8916.33,http://mrtakoescapes.com
Young Dividend,8742.69,http://mrtakoescapes.com
Financially Alert,8564,http://mrtakoescapes.com
Time In The Market,8317.3,http://mrtakoescapes.com
Finance Journey,7947.29,http://mrtakoescapes.com
My Dividend Dynasty,7908.71,http://mrtakoescapes.com
OthalaFehu,7681.49,http://mrtakoescapes.com
Two Investing,7592.28,http://mrtakoescapes.com
Everyday Freethought,7536.01,http://mrtakoescapes.com
DivHut,7512.35,http://mrtakoescapes.com
Cheesy Finance (EURO),7220.86,http://mrtakoescapes.com
Passive Income Dude,7182.89,http://mrtakoescapes.com
Investment Hunting,6794.72,http://mrtakoescapes.com
Engineering Dividends,6705.87,http://mrtakoescapes.com
Fiscal Voyage,6189.83,http://mrtakoescapes.com
Passive Income Pursuit,5994.57,http://mrtakoescapes.com
The Dividend Pig,5755.87,http://mrtakoescapes.com
Dividend Diplomats (Bert),5656.84,http://mrtakoescapes.com
The Weekly Investment,5154.87,http://mrtakoescapes.com
Monsieur Dividende (CAD),4923.75,http://mrtakoescapes.com
Captain Dividend,4726.19,http://mrtakoescapes.com
MoneyMaaster.com,4649.04,http://mrtakoescapes.com
All About The Dividends (CAD),4312.17,http://mrtakoescapes.com
My Financial Shape (CHF),4127,http://mrtakoescapes.com
Dividend Investor,4024.74,http://mrtakoescapes.com
Investing Pursuits,3900.6,http://mrtakoescapes.com
Happy Healthy and Wealthy Girl,3707.31,http://mrtakoescapes.com
Money Scrap,3646,http://mrtakoescapes.com
My Life of Investing & Hobbies,3611.53,http://mrtakoescapes.com
Desidividend,3554.42,http://mrtakoescapes.com
DividendVet,3446.1,http://mrtakoescapes.com
DividendSolutions (EURO),3339.92,http://mrtakoescapes.com
A Christian Investor,3291.76,http://mrtakoescapes.com
Dividend Snail (EURO),3284.7,http://mrtakoescapes.com
Tall Investing,3181,http://mrtakoescapes.com
The Dividend Family Guy,3180.6,http://mrtakoescapes.com
Polliesdividend (EURO),3178.42,http://mrtakoescapes.com
The Canny Contractor (Pounds),3047.94,http://mrtakoescapes.com
DividendStacker,3043.49,http://mrtakoescapes.com
The Dividend Swan,2919.65,http://mrtakoescapes.com
Millenial Dividends,2865.8,http://mrtakoescapes.com
The Beta Post,2818.87,http://mrtakoescapes.com
Five More Years,2775.78,http://mrtakoescapes.com
American Dividend Dream,2747.91,http://mrtakoescapes.com
Dividend Income Stocks,2709.82,http://mrtakoescapes.com
Pellrides,2668.69,http://mrtakoescapes.com
Money Hungry,2583.8,http://mrtakoescapes.com
PassiveCanadianIncome (CAD),2566.33,http://mrtakoescapes.com
Passive Canadian Income,2477.7,http://mrtakoescapes.com
Dividend Gremlin,2476.44,http://mrtakoescapes.com
A Frugal Family's Journey,2273.91,http://mrtakoescapes.com
Dividend Journal,2032.37,http://mrtakoescapes.com
Smart Money On The Mind,2018.13,http://mrtakoescapes.com
Dividend Noob,2013.88,http://mrtakoescapes.com
DGI For The DIY,2005.27,http://mrtakoescapes.com
Seeking The Dividends,1783.52,http://mrtakoescapes.com
Dividends 4 Future,1709.67,http://mrtakoescapes.com
Live Off Dividends,1578.94,http://mrtakoescapes.com
Dividend Miracle,1508.55,http://mrtakoescapes.com
Dividends are Coming (EURO),1472.35,http://mrtakoescapes.com
Diligent Dividend,1467.66,http://mrtakoescapes.com
Dividend Rider,1453.95,http://mrtakoescapes.com
Dividend Cashflow (EURO),1446.97,http://mrtakoescapes.com
Dividend Liberty,1423.26,http://mrtakoescapes.com
Stockles,1110.65,http://mrtakoescapes.com
Stashing Dutchman,946.67,http://mrtakoescapes.com
Dividend Dozer,929.35,http://mrtakoescapes.com
Little Dividends,903.15,http://mrtakoescapes.com
Dividends Down Under (AUD),880.14,http://mrtakoescapes.com
Dividend Mogul,867.69,http://mrtakoescapes.com
Dividend Daze,864.48,http://mrtakoescapes.com
Money With Meow,745.68,http://mrtakoescapes.com
The Frugal Cottage (EURO),654.99,http://mrtakoescapes.com
Reinis Fischer,636.25,http://mrtakoescapes.com
Dividend Geek,578.53,http://mrtakoescapes.com
Four Pillar Freedom,565.59,http://mrtakoescapes.com
Earn Money In Pajamas,534.54,http://mrtakoescapes.com
More Dividends,446.52,http://mrtakoescapes.com
My Dividend Investing Plan,440.9,http://mrtakoescapes.com
Buy Hold Long,437.43,http://mrtakoescapes.com
Project 2035 (EURO),376,http://mrtakoescapes.com
Pursuit 2 Freedom (EURO),366.14,http://mrtakoescapes.com
"March Toward $1,000,000",355.37,http://mrtakoescapes.com
Dividend Dolphin (EURO),269.69,http://mrtakoescapes.com
Dividend Portfolio,238.64,http://mrtakoescapes.com
Project: Beach Life,172.77,http://mrtakoescapes.com
Wallet Squirrel,167.95,http://mrtakoescapes.com
Dividendniche,167.32,http://mrtakoescapes.com
Dividend Seedling,151.39,http://mrtakoescapes.com
Financially Free In 10 Years,88.79,http://mrtakoescapes.com
Reverse The Crush,58.14,http://mrtakoescapes.com
</pre>

		<script>
		// Define the div for the tooltip
		        var div = d3.select("body").append("div")	
		    		.attr("class", "tooltip")				
		    		.style("opacity", 0);
		    		
		// this is the size of the svg container
			var fullwidth = 700,
			    fullheight = 2400;

			var margin = {top: 20, right: 70, bottom: 30, left: 200};

			var width = fullwidth - margin.left - margin.right,
    		    	    height = fullheight - margin.top - margin.bottom;

			var widthScale = d3.scale.linear()
								.domain([0,55000])
								.range([ 0, width]);

			var heightScale = d3.scale.ordinal()
								.rangeRoundBands([ margin.top, height], 0.2);
					
			//x axis labels (orient below the x axis)
			var xAxisLabsBottom = ["","$10k","$20k","$30k","$40k","$50k","", "", "", "", "", ""];
			var xAxisBottom = d3.svg.axis()
							.scale(widthScale)
							.orient("top")
							.tickFormat(function(d) { return xAxisLabsBottom[d % 11]; });
							
			//x axis labels (orient above the x axis)
			var xAxisLabsTop = ["","$10k","$20k","$30k","$40k","$50k","", "", "", "", "", ""];
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
						.append("div")
						.classed("svg-container", true) //container class to make it responsive
						.append("svg")
						.attr("preserveAspectRatio", "xMidYMid meet")
						.attr("viewBox", "0 0 720 2500")
						//class to make it responsive
						.classed("svg-content-responsive", true);

			//var svg = d3.select("#graph1")
			//			.append("svg")
			//			.attr("width", fullwidth)
			//			.attr("height", fullheight)
			//			.append("g")
			//			.attr("transform", "translate(80, 50)");

			var data = d3.csv.parse(d3.select("pre#data").text() );

				// js map: will make a new array out of all the d.activity fields
				heightScale.domain(data.map(function(d) { return d.activity; } ));
					
				// Make the dots for Men
				var dotsMen = svg.selectAll("circle.yMen")
						.data(data)
						.enter()
						.append('rect')
						.attr('fill', '#008080')
						.attr('height',16)
						.attr({'x': margin.left,'y':function(d){ return heightScale(d.activity); }})
						.attr('width',function(d){ return widthScale(+d.yMen + 200); });
				
				    //add tooltip
				    dotsMen
					.on("mouseover", function(d) {	
					    d3.select(this).attr("fill", "purple")
				            div.transition()		
				                .duration(200)		
				                .style("opacity", .9)
				            div	.html(d.activity + " earned $" + d.yMen.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " in dividend income in 2017.")	
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
				svg.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + ",20)")
					.call(xAxisTop);
				
				//x axis at bottom of graph
				svg.append("g")
					.attr("class", "x axis")
					.attr("transform", "translate(" + margin.left + "," + height + ")")
					.call(xAxisBottom);
				
				//x axis label top
				svg.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ (fullwidth-190) + ", 33)")
					.text("2017 Dividend Income");
					
				//y axis
				svg.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin.left + ",0)")
					.call(yAxis);				
  
		</script>
	</body>
</html>	