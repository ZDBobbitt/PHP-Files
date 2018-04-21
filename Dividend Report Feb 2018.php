<?php
/*
 *Template Name: Dividend Report Feb 2018
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
		
		  h2, h3, h4, h5, h6 {
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
		  font-family: 'Raleway', sans-serif;
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
			margin-top: 5px;
			margin-bottom: 5px;
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
			div.Jan2018 {
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

			circle.Jan2018 {
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
				padding-bottom: 280%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
		.svg-content-responsive {
			display: inline-block;
			position: absolute;
			top: 10px;
			left: 0;
		}
		
		.svg-container2 {
				display: inline-block;
				position: relative;
				width: 100%;
				padding-bottom: 90%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
		.svg-content-responsive2 {
			display: inline-block;
			position: absolute;
			top: 10px;
			left: 0;
		}
		
		.svg-container3 {
				display: inline-block;
				position: relative;
				width: 100%;
				padding-bottom: 80%; /* aspect ratio */
				vertical-align: top;
				overflow: hidden;
			}
			
		.svg-content-responsive3 {
			display: inline-block;
			position: absolute;
			top: 10px;
			left: 0;
		}
		
		.subtitle {
			margin-top: 0px;
			margin-bottom: 25px;
		}
		
		.month {
			text-align: center;
			margin-bottom: 10px;
			margin-top: 10px;
			font-family: 'Raleway', sans-serif;
		}
		
		.hrTop {
			width: 100%;
			margin-top: 40px;
		}
		
		.hrBottom {
			width: 100%;
			margin-bottom: 40px
		}
		
		.hrBottomTalkingPoint {
			width: 100%;
			margin-bottom: 15px;
		}
		
@font-face {font-family: "sw-icon-font";src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5");src:url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.eot?ver=2.3.5#iefix") format("embedded-opentype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.woff?ver=2.3.5") format("woff"), url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.ttf?ver=2.3.5") format("truetype"),url("http://www.fourpillarfreedom.com/wp-content/plugins/social-warfare/fonts/sw-icon-font.svg?ver=2.3.5#1445203416") format("svg");font-weight: normal;font-style: normal;}

		</style>
	</head>
	<body>

<div id="main"><!--start of main-->
	  
	  <div id='intro'>
	  	<h1 style='color: #008080'>The Dividend Report</h1>
		  <h4 class = 'subtitle'><b>Visualizing the Monthly Dividend Income of Financial Bloggers</b></h4>
		  <hr style = 'width: 100%'>
		  <h3 class = 'month'>February 2018 Edition</h3>
		  <hr style = 'width: 100%'>
		  <p style='margin-top: 30px'>Each month, hundreds of financial bloggers across the web share their monthly dividend income with readers.</p>
		  <p>Thanks to
 		  <a href = 'http://www.dividenddriven.com' target = '_blank'>Dividend Driven</a>, there is finally a <a href = 
                  'http://www.dividenddriven.com/leaderboard.php' target = '_blank'>database</a> that tracks the monthly dividend income of these bloggers.</p>
                  <p id='last_block_p'>Using this data, I share dividend reports each month to highlight these bloggers and use various charts to visualize their income.	
                  </p>
 		  <p>This is the second edition of the report. Check out last month's report <a href='http://www.fourpillarfreedom.com/blogger-dividend-report-january-2018/' target='_blank'>here</a>.</p>
 		  <p><i><b>Note:</b> Any income reported in foreign currencies was converted to U.S. dollars.</i></p>
                  <hr class = 'hrTop'>
		  <h3 class = 'month'>Top 3 February Dividend Income Earners</h3>
		  <hr class = 'hrBottom'>
		  
		  <div style='margin-left:30%'>
                  <p><b>1. The Money Commando - <a href = 'http://www.themoneycommando.com/investment-income-february-2018/' target = '_blank'>$3,673</a></b></p>
                  <p><b>2. Screaming Little Man - <a href = 'https://www.screaminglittleman.com/financial-update-february-2018' target = '_blank'>$1,495</a></b></p>
                  <p><b>3. BAMF Money - <a href = 'http://bamfmoney.com/2018/02/dividend-income-report-february-2018/' target = '_blank'>$1,433</a></b></p>
                  </div>
                  
                  <hr class = 'hrTop'>
		  <h3 class = 'month'>Dividend Income by Blogger</h3>
		  <hr class = 'hrBottomTalkingPoint'>
		  
		  <p style = 'margin-bottom: 40px'>This chart shows the total dividend income for each blogger in February 2018.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph1'>	
		  </div>
	  </div><!--end of graph 1 block-->
	  
	  <div id = 'intro'>	  
	  	  <hr class = 'hrTop'>
		  <h3 class = 'month'>Year-Over-Year Percent Change</h3>
		  <hr class = 'hrBottomTalkingPoint'>
		  
		  <p style = 'margin-bottom: 40px'>This chart shows the percentage difference in dividend income between February 2017 and February 2018 for each blogger.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph2'>	
		  </div>
	  </div><!--end of graph 1 block-->
	  
	  <div id = 'intro'>
	          <hr class = 'hrTop'>
		  <h3 class = 'month'>Top 3 Feb. 2017 - Feb. 2018 Percent Increases</h3>
		  <hr class = 'hrBottom'>
		   
		  <div style='margin-left:20%'>
                  <p><b>1. Stockles - <a href = 'http://www.stockles.com/2018/03/08/dividend-income-update-february-2018/' target = '_blank'>433%  ($30.85 to $164.57)</a></b></p>                 
                  <p><b>2. March Toward $1,000,000 - <a href = 'http://marchtowardamillion.com/2018/02/28/february-portfolio-update-2018/' target = '_blank'>361% ($10.60 to $48.93)</a></b></p>
                  <p><b>3. Mr. Tako Escapes- <a href = 'http://www.mrtakoescapes.com/february-2018-dividend-income-expenses/' target = '_blank'>333% ($82.94 to $359.60)</a></b></p>
                  </div>
          </div>	
	  
	  <div id = 'intro'>	  
	  	  <hr class = 'hrTop'>
		  <h3 class = 'month'>Year-Over-Year Dollar Change</h3>
		  <hr class = 'hrBottomTalkingPoint'>
		  
		  <p style = 'margin-bottom: 40px'>This chart shows the dollar difference in dividend income between February 2017 and February 2018 for each blogger.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph3'>	
		  </div>
	  </div><!--end of graph 1 block-->
	  
	  <div id = 'intro'>
	          <hr class = 'hrTop'>
		  <h3 class = 'month'>Top 3 Feb. 2017 - Feb. 2018 Dollar Increases</h3>
		  <hr class = 'hrBottom'>
		   
		  <div style='margin-left:30%'>
                  <p><b>1. The Money Commando - <a href = 'http://www.themoneycommando.com/investment-income-february-2018/' target = '_blank'>$2,254</a></b></p>                 
                  <p><b>2. Screaming Little Man - <a href = 'https://www.screaminglittleman.com/financial-update-february-2018' target = '_blank'>$477</a></b></p>
                  <p><b>3. Two Investing - <a href = 'http://www.twoinvesting.com/2018/03/february-2018-income/' target = '_blank'>$373</a></b></p>
                  </div>
          </div>
	  
	  <div id = 'intro'>	  
	  	  <hr class = 'hrTop'>
		  <h3 class = 'month'>Summary</h3>
		  <hr class = 'hrBottom'>
		  
		  <ul type="disc">
		  	<li>Total bloggers who reported dividend income: <b>94</b></li>
   		  	<li>Total dividend income received by all bloggers: <b>$39,119</b></li>
   		  	<li>Total bloggers who received over $1,000 in dividend income: <b>10</b></li>
    			<li>Median dividend income received: <b>$267</b></li>
    			<li>Median year-over-year percent increase: <b>39%</b></li>
    			<li>Median year-over-year dollar increase: <b>$65</b></li>   			
		  </ul>		
	  </div>
	  
<div class="nc_socialPanel swp_flatFresh swp_d_fullColor swp_i_fullColor swp_o_fullColor scale-100 scale-fullWidth" data-position="below" data-float="floatBottom" data-count="5" data-floatColor="#ffffff" data-emphasize="0">
<div class="nc_tweetContainer twitter" data-id="2" data-network="twitter"><a rel="nofollow" target="_blank" href="https://twitter.com/share?original_referer=/&text=Blogger Dividend Report - February 2018&url=http://www.fourpillarfreedom.com/blogger-dividend-report-february-2018/&via=4PillarFreedom" data-link="https://twitter.com/share?original_referer=/&text=Blogger Dividend Report - February 2018&url=http://www.fourpillarfreedom.com/blogger-dividend-report-february-2018/&via=4PillarFreedom" class="nc_tweet"><span class="swp_count swp_hide"><span class="iconFiller"><span class="spaceManWilly"><i class="sw sw-twitter"></i><span class="swp_share"> Tweet</span></span></span></span></a></div>
<div class="nc_tweetContainer swp_fb" data-id="3" data-network="facebook"><a rel="nofollow" target="_blank" href="https://www.facebook.com/share.php?u=http%3A%2F%2Fwww.fourpillarfreedom.com%2Fblogger-dividend-report-february-2018%2F" data-link="http://www.facebook.com/share.php?u=http%3A%2F%2Fwww.fourpillarfreedom.com%2Fblogger-dividend-report-february-2018%2F" class="nc_tweet"><span class="iconFiller"><span class="spaceManWilly"><i class="sw sw-facebook"></i><span class="swp_share"> Share</span></span></span><span class="swp_count">1</span></a></div>
<div class="nc_tweetContainer totes totesalt" data-id="6" ><span class="swp_count"><span class="swp_label">Shares</span> 1</span></div>
</div>
	  
</div><!--end of main-->
	  
<pre id='data'>
"Blog","Jan2018"
"The Money Commando",3673.91
"Screaming Little Man",1495.95
"BAMF Money",1433.89
"Passive Income Mavericks",1247.30
"Dividend Earner",1237.99
"Race2Retirement",1237.99
"DivGro",1127
"Tawcan",1054.61
"Tales From The Tape",1039.77
"DividendSolutions",1031.85
"Dividend Hawk",976.26
"Five More Years",962.05
"Dividend Quest",941.78
"My Dividend Dynasty",803.34
"Dividend Investor",755.15
"Money Scrap",721
"Stalflare",666.66
"DivHut",658.59
"Humble FI",657.17
"The Dividend Family Guy",625.06
"Two Investing",606.69
"Roadmap2Retire",595.19
"Dividend Fireman",554.76
"Engineering Dividends",515.89
"Young Dividend",496.12
"Fiscal Voyage",487.06
"Captain Dividend",484.35
"Cheesy Finance",453.73
"Dividend Magic",450.34
"American Dividend Dream",425.91
"Finance Journey",422.98
"Dividend Cake",399.87
"Dividend Diplomats (Lanny)",387.52
"Mr. Tako Escapes",359.60
"My Life of Investing and Hobbies",333.77
"My Road To Wealth & Freedom",333.49
"Happy Healthy and Wealthy Girl",325.35
"Root Of Good",314
"Financially Alert",312
"Journey To Total Freedom",302.64
"Tall Investing",283
"Pellrides",282.21
"Passive Income Pursuit",281.34
"Monsieur Dividende",276.4
"Diligent Dividend",272.56
"Money Hungry",269.65
"Investing Pursuits",268.36
"Dividend Driven",266.99
"MoneyMaaster.com",264.19
"Dividend Diplomats (Bert)",260.93
"DividendVet",253.53
"Desidividend",249.27
"Smart Money On The Mind",244.06
"A Frugal Family's Journey",243.06
"All About The Dividends",241.61
"Stretching My Money",240.99
"Dividend Journal",238.43
"Dividend Income Stocks",236.45
"Dividend Gremlin",233.83
"Millennial Dividends",219.86
"Passive Canadian Income",210.22
"Dividend Snail",198.69
"Seeking The Dividends",190.55
"Polliesdividend",189.08
"DGI For The DIY",179.68
"Stockles",164.57
"Live Off Dividends",159.67
"Dividend Cashflow",151.71
"Little Dividends",140.59
"Dividend Noob",130.46
"The Dividend Swan",125.47
"Time In The Market",121.96
"DutchIndependence",115.04
"Passive Income Dude",114.12
"Four Pillar Freedom",106.11
"Pursuit 2 Freedom",86.1
"Dividend Daze",78.85
"Dividend Portfolio",77.66
"Money With Meow",73.91
"Stashing Dutchman",71.29
"Dividend Dozer",68.81
"Everyday Freethought",66.43
"March Toward $1,000,000",48.93
"More Dividends",45.54
"The Frugal Cottage",26.31
"Wallet Squirrel",25.34
"Financially Free In 10 Years",23.58
"Dividends are Coming",23.12
"Dividend Seedling",23.07
"Buy Hold Long",23.04
"Reverse The Crush",10.57
"Dividendniche",6.21
"Dividends Down Under",5.4
"Singledadmoney",2.16
</pre>

<pre id = 'data2'>
"Blog","Feb2017","Feb2018","rawDiff","percentDiff"
"Everyday Freethought",466.05,66.43,-399.62,-85.7
"DutchIndependence",441.2871,115.0419,-326.25,-73.9
"Dividend Driven",431.79,266.99,-164.8,-38.2
"Race2Retirement",1787.4,1237.99,-549.41,-30.7
"The Dividend Swan",173.27,125.47,-47.8,-27.6
"DivGro",1468.63,1127,-341.63,-23.3
"Financially Alert",365,312,-53,-14.5
"Wallet Squirrel",26.86,25.34,-1.52,-5.7
"Dividend Cake",423.18,399.87,-23.31,-5.5
"Passive Income Dude",118,114.12,-3.88,-3.3
"The Frugal Cottage",26.8017,26.3097,-0.49,-1.8
"Passive Income Mavericks",1267.45,1247.3,-20.15,-1.6
"Dividends are Coming",23.4192,23.124,-0.3,-1.3
"Passive Income Pursuit",275.65,281.34,5.69,2.1
"My Road To Wealth And Freedom",326.14,333.49,7.35,2.3
"Roadmap2Retire",577.2078,595.1946,17.99,3.1
"Dividend Gremlin",225.94,233.83,7.89,3.5
"Journey To Total Freedom",285.91,302.64,16.73,5.9
"Cheesy Finance",421.6932,453.7347,32.04,7.6
"Polliesdividend",172.1016,189.0756,16.97,9.9
"All About The Dividends",212.9712,241.605,28.63,13.4
"Tawcan",929.409,1054.6068,125.2,13.5
"Dividend Earner",1083.61,1237.99,154.38,14.2
"American Dividend Dream",362.15,425.91,63.76,17.6
"My Dividend Dynasty",683.06,803.34,120.28,17.6
"DGI For The DIY",151.31,179.68,28.37,18.7
"Dividend Diplomats (Bert)",217.76,260.93,43.17,19.8
"Dividend Diplomats (Lanny)",322.59,387.52,64.93,20.1
"Investing Pursuits",220.99,268.36,47.37,21.4
"Finance Journey",341.75,422.98,81.23,23.8
"Dividendniche",4.98,6.21,1.23,24.7
"DivHut",520.05,658.59,138.54,26.6
"Dividend Income Stocks",186.26,236.45,50.19,26.9
"Dividend Quest",741.83,941.78,199.95,27
"BAMF Money",1108.41,1433.89,325.48,29.4
"DividendVet",189.99,253.53,63.54,33.4
"Monsieur Dividende",206.1072,276.4008,70.29,34.1
"Dividend Hawk",714.7,976.26,261.56,36.6
"Desidividend",179.01,249.27,70.26,39.2
"Stalflare",472.0125,666.66,194.65,41.2
"DividendSolutions",724.224,1031.847,307.62,42.5
"Pellrides",197.93,282.21,84.28,42.6
"Screaming Little Man",1018.7112,1495.9464,477.24,46.8
"Dividend Journal",159.68,238.43,78.75,49.3
"Live Off Dividends",105.78,159.67,53.89,50.9
"Dividend Noob",86.37,130.46,44.09,51
"Captain Dividend",319.44,484.35,164.91,51.6
"Tall Investing",185,283,98,53
"Time In The Market",79.6,121.96,42.36,53.2
"Tales From The Tape",674.61,1039.77,365.16,54.1
"More Dividends",29.02,45.54,16.52,56.9
"Engineering Dividends",327.25,515.89,188.64,57.6
"Fiscal Voyage",307.26,487.06,179.8,58.5
"Humble FI",408.5,657.17,248.67,60.9
"Young Dividend",307.75,496.12,188.37,61.2
"Stashing Dutchman",42.89,71.29,28.4,66.2
"A Frugal Family's Journey",144.63,243.06,98.43,68.1
"Seeking The Dividends",112.01,190.55,78.54,70.1
"My Life of Investing and Hobbies",196.15,333.77,137.62,70.2
"Dividend Daze",43.06,78.85,35.79,83.1
"Pursuit 2 Freedom",44.1447,86.1,41.96,95.1
"Dividend Dozer",32.5,68.81,36.31,111.7
"The Dividend Family Guy",284.64,625.06,340.42,119.6
"Dividend Magic",190.71,450.3356,259.63,136.1
"Root Of Good",132,314,182,137.9
"Dividend Cashflow",62.8899,151.7082,88.82,141.2
"Smart Money On The Mind",99.13,244.06,144.93,146.2
"Little Dividends",55.55,140.59,85.04,153.1
"Happy Healthy and Wealthy Girl",128.03,325.35,197.32,154.1
"The Money Commando",1419.12,3673.91,2254.79,158.9
"Two Investing",232.81,606.69,373.88,160.6
"Money Hungry",96.64,269.65,173.01,179
"Diligent Dividend",69.82,272.56,202.74,290.4
"Dividend Seedling",5.73,23.07,17.34,302.6
"Mr. Tako Escapes",82.94,359.6,276.66,333.6
"March Toward $1,000,000",10.6,48.93,38.33,361.6
"Stockles",30.85,164.57,133.72,433.5
</pre>

<pre id = 'data3'>
"Blog","Feb2017","Feb2018","rawDiff","percentDiff"
"Race2Retirement",1787.4,1237.99,-549.41,-30.7
"Everyday Freethought",466.05,66.43,-399.62,-85.7
"DivGro",1468.63,1127,-341.63,-23.3
"DutchIndependence",441.2871,115.0419,-326.25,-73.9
"Dividend Driven",431.79,266.99,-164.8,-38.2
"Financially Alert",365,312,-53,-14.5
"The Dividend Swan",173.27,125.47,-47.8,-27.6
"Dividend Cake",423.18,399.87,-23.31,-5.5
"Passive Income Mavericks",1267.45,1247.3,-20.15,-1.6
"Passive Income Dude",118,114.12,-3.88,-3.3
"Wallet Squirrel",26.86,25.34,-1.52,-5.7
"The Frugal Cottage",26.8017,26.3097,-0.49,-1.8
"Dividends are Coming",23.4192,23.124,-0.3,-1.3
"Dividendniche",4.98,6.21,1.23,24.7
"Passive Income Pursuit",275.65,281.34,5.69,2.1
"My Road To Wealth And Freedom",326.14,333.49,7.35,2.3
"Dividend Gremlin",225.94,233.83,7.89,3.5
"More Dividends",29.02,45.54,16.52,56.9
"Journey To Total Freedom",285.91,302.64,16.73,5.9
"Polliesdividend",172.1016,189.0756,16.97,9.9
"Dividend Seedling",5.73,23.07,17.34,302.6
"Roadmap2Retire",577.2078,595.1946,17.99,3.1
"DGI For The DIY",151.31,179.68,28.37,18.7
"Stashing Dutchman",42.89,71.29,28.4,66.2
"All About The Dividends",212.9712,241.605,28.63,13.4
"Cheesy Finance",421.6932,453.7347,32.04,7.6
"Dividend Daze",43.06,78.85,35.79,83.1
"Dividend Dozer",32.5,68.81,36.31,111.7
"March Toward $1,000,000",10.6,48.93,38.33,361.6
"Pursuit 2 Freedom",44.1447,86.1,41.96,95.1
"Time In The Market",79.6,121.96,42.36,53.2
"Dividend Diplomats (Bert)",217.76,260.93,43.17,19.8
"Dividend Noob",86.37,130.46,44.09,51
"Investing Pursuits",220.99,268.36,47.37,21.4
"Dividend Income Stocks",186.26,236.45,50.19,26.9
"Live Off Dividends",105.78,159.67,53.89,50.9
"DividendVet",189.99,253.53,63.54,33.4
"American Dividend Dream",362.15,425.91,63.76,17.6
"Dividend Diplomats (Lanny)",322.59,387.52,64.93,20.1
"Desidividend",179.01,249.27,70.26,39.2
"Monsieur Dividende",206.1072,276.4008,70.29,34.1
"Seeking The Dividends",112.01,190.55,78.54,70.1
"Dividend Journal",159.68,238.43,78.75,49.3
"Finance Journey",341.75,422.98,81.23,23.8
"Pellrides",197.93,282.21,84.28,42.6
"Little Dividends",55.55,140.59,85.04,153.1
"Dividend Cashflow",62.8899,151.7082,88.82,141.2
"Tall Investing",185,283,98,53
"A Frugal Family's Journey",144.63,243.06,98.43,68.1
"My Dividend Dynasty",683.06,803.34,120.28,17.6
"Tawcan",929.409,1054.6068,125.2,13.5
"Stockles",30.85,164.57,133.72,433.5
"My Life of Investing and Hobbies",196.15,333.77,137.62,70.2
"DivHut",520.05,658.59,138.54,26.6
"Smart Money On The Mind",99.13,244.06,144.93,146.2
"Dividend Earner",1083.61,1237.99,154.38,14.2
"Captain Dividend",319.44,484.35,164.91,51.6
"Money Hungry",96.64,269.65,173.01,179
"Fiscal Voyage",307.26,487.06,179.8,58.5
"Root Of Good",132,314,182,137.9
"Young Dividend",307.75,496.12,188.37,61.2
"Engineering Dividends",327.25,515.89,188.64,57.6
"Stalflare",472.0125,666.66,194.65,41.2
"Happy Healthy and Wealthy Girl",128.03,325.35,197.32,154.1
"Dividend Quest",741.83,941.78,199.95,27
"Diligent Dividend",69.82,272.56,202.74,290.4
"Humble FI",408.5,657.17,248.67,60.9
"Dividend Magic",190.71,450.3356,259.63,136.1
"Dividend Hawk",714.7,976.26,261.56,36.6
"Mr. Tako Escapes",82.94,359.6,276.66,333.6
"DividendSolutions",724.224,1031.847,307.62,42.5
"BAMF Money",1108.41,1433.89,325.48,29.4
"The Dividend Family Guy",284.64,625.06,340.42,119.6
"Tales From The Tape",674.61,1039.77,365.16,54.1
"Two Investing",232.81,606.69,373.88,160.6
"Screaming Little Man",1018.7112,1495.9464,477.24,46.8
"The Money Commando",1419.12,3673.91,2254.79,158.9
</pre>

		<script>
		// Define the div for the tooltip
		        var div = d3.select("body").append("div")	
		    		.attr("class", "tooltip")				
		    		.style("opacity", 0);
		    		
		// this is the size of the svg container
			var fullwidth = 700,
			    fullheight = 2000;

			var margin = {top: 20, right: 70, bottom: 30, left: 207};

			var width = fullwidth - margin.left - margin.right,
    		    	    height = fullheight - margin.top - margin.bottom;

			var widthScale = d3.scale.linear()
								.domain([0,3700])
								.range([ 0, width]);

			var heightScale = d3.scale.ordinal()
								.rangeRoundBands([ margin.top, height], 0.2);
					
			//x axis labels (orient below the x axis)
			var xAxisLabsBottom = ["","","","","","","$1,000", "", "$3,000", "$2,000", "$1,000", ""];
			var xAxisBottom = d3.svg.axis()
							.scale(widthScale)
							.orient("top")
							.tickFormat(function(d) { return xAxisLabsBottom[d % 11]; });
							
			//x axis labels (orient above the x axis)
			var xAxisLabsTop = ["","","","","","","$1,000", "", "$3,000", "$2,000", "$1,000", ""];
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

				// js map: will make a new array out of all the d.Blog fields
				heightScale.domain(data.map(function(d) { return d.Blog; } ));
					
				// Make the dots for Men
				var dotsMen = svg.selectAll("circle.Jan2018")
						.data(data)
						.enter()
						.append('rect')
						.attr('fill', '#008080')
						.attr('height',16)
						.attr({'x': margin.left,'y':function(d){ return heightScale(d.Blog); }})
						.attr('width',function(d){ return widthScale(+d.Jan2018 + 20); });
				
				    //add tooltip
				    dotsMen
					.on("mouseover", function(d) {	
					    d3.select(this).attr("fill", "purple")
				            div.transition()		
				                .duration(200)		
				                .style("opacity", .9)
				            div	.html(d.Blog + " earned $" + d.Jan2018.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " in dividend income in February 2018.")	
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
					.attr("transform", "translate("+ (fullwidth-203) + ", 33)")
					.text("Feb. 2018 Dividend Income");
					
				//y axis
				svg.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin.left + ",0)")
					.call(yAxis);	
					
//GRAPH 2 STUFF
			var fullwidth2 = 800,
			    fullheight2 = 600;

			var margin2 = {top: 10, right: 70, bottom: 30, left: 80};

			var width2 = fullwidth2 - margin2.left - margin2.right,
    		    	    height2 = fullheight2 - margin2.top - margin2.bottom;

			var heightScale2 = d3.scale.linear()
								.domain([0,500])
								.range([height2, 0]);

			var widthScale2 = d3.scale.ordinal().rangeRoundBands([margin2.left, width2], 0.2);
							
			var yAxis2 = d3.svg.axis()      .scale(heightScale2)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0)
							.tickValues([0, 100, 200, 300, 400])
							.tickFormat(function(d) { return d + "%"; });
							
			var x = d3.scale.ordinal().rangeRoundBands([66, width2], .1),
			    y = d3.scale.linear().domain([0, 500])
				    	         .range([height2, 0]);  

			var svg2 = d3.select("#graph2")
						.append("div")
						.classed("svg-container2", true) //container class to make it responsive
						.append("svg")
						.attr("preserveAspectRatio", "xMidYMid meet")
						.attr("viewBox", "0 0 720 2500")
						//class to make it responsive
						.classed("svg-content-responsive2", true);

			var data2 = d3.csv.parse(d3.select("pre#data2").text() );
			
			x.domain(data2.map(function(d) { return d.Blog; }));
					
				// Make the dots for Men
				var dotsMen2 = svg2.selectAll("rect")
						.data(data2)
						.enter()
						.append('rect')
						.attr('fill', 'lightgreen')
						.attr("x", function(d) { return x(d.Blog); })
					        .attr("y", function(d) { 
						     if (+d.percentDiff> 0){
							   return y(+d.percentDiff);
							   } else {
							   return y(0);
							    }
							   })
					      .attr("width", "6")
					      .attr("height", function(d) { return Math.abs(y(+d.percentDiff) - y(0)) +1; })
				
				    //add tooltip
				    dotsMen2
					.on("mouseover", function(d) {	
					    d3.select(this).attr("fill", "#008080")
				            div.transition()		
				                .duration(200)		
				                .style("opacity", .9)
				            div	.html(d.Blog + "'s February dividend income increased by " + d.percentDiff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "% from February 2017 to February 2018.")	
				                .style("left", (d3.event.pageX) + "px")		
				                .style("top", (d3.event.pageY - 28) + "px")
				            })					
				        .on("mouseout", function(d) {	
				            d3.select(this).attr("fill", "lightgreen")
				            div.transition()		
				                .duration(500)		
				                .style("opacity", 0);	
				        });
					
				//y axis
				svg2.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin2.left + ",0)")
					.call(yAxis2);		
					
				//x axis label
				svg2.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ ((fullwidth2 / 2) - 70) + "," + (fullheight2 - 20) + ")")
					.text("Bloggers");
					
//GRAPH 3 STUFF
			var fullwidth3 = 800,
			    fullheight3 = 600;

			var margin3 = {top: 10, right: 70, bottom: 30, left: 80};

			var width3 = fullwidth3 - margin3.left - margin3.right,
    		    	    height3 = fullheight3 - margin3.top - margin3.bottom;

			var heightScale3 = d3.scale.linear()
								.domain([-600,2300])
								.range([height3, 0]);

			var widthScale3 = d3.scale.ordinal().rangeRoundBands([margin3.left, width3], 0.2);
							
			var yAxis3 = d3.svg.axis()      .scale(heightScale3)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0)
							.tickValues([0, 500, 1000, 1500, 2000])
							.tickFormat(function(d) { return "$" + d; });
							
			var x3 = d3.scale.ordinal().rangeRoundBands([margin3.left, width3], .1),
			    y3 = d3.scale.linear().domain([-600, 2300])
				    	         .range([height3, 0]);  

			var svg3 = d3.select("#graph3")
						.append("div")
						.classed("svg-container3", true) //container class to make it responsive
						.append("svg")
						.attr("preserveAspectRatio", "xMidYMid meet")
						.attr("viewBox", "0 0 720 2500")
						//class to make it responsive
						.classed("svg-content-responsive3", true);

			var data3 = d3.csv.parse(d3.select("pre#data3").text() );
			
			x3.domain(data3.map(function(d) { return d.Blog; }));
					
				// Make the dots for Men
				var dotsMen3 = svg3.selectAll("rect")
						.data(data3)
						.enter()
						.append('rect')
						.attr('fill', '#be8adb')
						.attr("x", function(d) { return x3(d.Blog); })
					        .attr("y", function(d) { 
						     if (+d.rawDiff> 0){
							   return y3(+d.rawDiff);
							   } else {
							   return y3(0);
							    }
							   })
					      .attr("width", "6")
					      .attr("height", function(d) { return Math.abs(y3(+d.rawDiff) - y3(0)) +1; })
				
				    //add tooltip
				    dotsMen3
					.on("mouseover", function(d) {	
					    d3.select(this).attr("fill", "#008080")
				            div.transition()		
				                .duration(200)		
				                .style("opacity", .9)
				            div	.html(d.Blog + "'s February dividend income increased by $" + d.rawDiff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " from February 2017 to February 2018.")	
				                .style("left", (d3.event.pageX) + "px")		
				                .style("top", (d3.event.pageY - 28) + "px")
				            })					
				        .on("mouseout", function(d) {	
				            d3.select(this).attr("fill", "#be8adb")
				            div.transition()		
				                .duration(500)		
				                .style("opacity", 0);	
				        });
					
				//y axis
				svg3.append("g")
					.attr("class", "y axis")
					.attr("transform", "translate(" + margin3.left + ",0)")
					.call(yAxis3);		
					
				//x axis label
				svg3.append("text")
					.attr("class", "graph3Label")
					.attr("transform", "translate("+ ((fullwidth3 / 2) - 70) + "," + (fullheight3 - 135) + ")")
					.text("Bloggers");		
  
		</script>
	</body>
</html>	