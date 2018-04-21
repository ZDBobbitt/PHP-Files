<?php
/*
 *Template Name: Dividend Report Jan 2018
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

		</style>
	</head>
	<body>

<div id="main"><!--start of main-->
	  
	  <div id='intro'>
	  	<h1 style='color: #008080'>The Dividend Report</h1>
		  <h4 class = 'subtitle'><b>Visualizing the Monthly Dividend Income of Financial Bloggers</b></h4>
		  <hr style = 'width: 100%'>
		  <h3 class = 'month'>January 2018 Edition</h3>
		  <hr style = 'width: 100%'>
		  <p style='margin-top: 30px'>Each month, hundreds of financial bloggers across the web share their monthly dividend income with readers.</p>
		  <p>Thanks to
 		  <a href = 'http://www.dividenddriven.com' target = '_blank'>Dividend Driven</a>, there is finally a <a href = 
                  'http://www.dividenddriven.com/leaderboard.php' target = '_blank'>database</a> that tracks the monthly dividend income of these bloggers.</p>
                  <p id='last_block_p'>Using this data, I will be sharing dividend reports each month to highlight these bloggers and use various charts to visualize their income.	
                  </p>
 		  <p>This is the first edition of the report.</p>
                  <hr class = 'hrTop'>
		  <h3 class = 'month'>Top 3 January Dividend Income Earners</h3>
		  <hr class = 'hrBottom'>
		  
		  <div style='margin-left:30%'>
                  <p><b>1. Screaming Little Man - <a href = 'https://www.screaminglittleman.com/financial-update-january-2018' target = '_blank'>$3,106.79</a></b></p>
                  <p><b>2. BAMF Money - <a href = 'http://bamfmoney.com/2018/01/dividend-income-report-january-2018/' target = '_blank'>$2,751.26</a></b></p>
                  <p><b>3. Tales From The Tape - <a href = 'http://talesfromthetape.com/2018/02/10/january-dividend-update-3/' target = '_blank'>$2,421.00</a></b></p>
                  </div>
                  
                  <hr class = 'hrTop'>
		  <h3 class = 'month'>Dividend Income by Blogger</h3>
		  <hr class = 'hrBottomTalkingPoint'>
		  
		  <p style = 'margin-bottom: 40px'>This chart shows the total dividend income for each blogger in January 2018.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph1'>	
		  </div>
	  </div><!--end of graph 1 block-->
	  
	  <div id = 'intro'>	  
	  	  <hr class = 'hrTop'>
		  <h3 class = 'month'>Year-Over-Year Percent Change</h3>
		  <hr class = 'hrBottomTalkingPoint'>
		  
		  <p style = 'margin-bottom: 40px'>This chart shows the percentage difference in dividend income between January 2017 and January 2018 for each blogger.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph2'>	
		  </div>
	  </div><!--end of graph 1 block-->
	  
	  <div id = 'intro'>
	          <hr class = 'hrTop'>
		  <h3 class = 'month'>Top 3 Jan. 2017 - Jan. 2018 Percent Increases</h3>
		  <hr class = 'hrBottom'>
		   
		  <div style='margin-left:20%'>
                  <p><b>1. Diligent Dividend - <a href = 'https://diligentdividend.com/dividends-received/' target = '_blank'>621.3%  ($38.30 to $276.24)</a></b></p>                 
                  <p><b>2. Root of Good - <a href = 'http://rootofgood.com/january-2018-financial-update/' target = '_blank'>538.9% ($54 to $345)</a></b></p>
                  <p><b>3. Stashing Dutchman - <a href = 'https://stashingdutchman.com/dividend-income/' target = '_blank'>520.7% ($4.30 to $26.69)</a></b></p>
                  </div>
          </div>	
	  
	  <div id = 'intro'>	  
	  	  <hr class = 'hrTop'>
		  <h3 class = 'month'>Year-Over-Year Dollar Change</h3>
		  <hr class = 'hrBottomTalkingPoint'>
		  
		  <p style = 'margin-bottom: 40px'>This chart shows the dollar difference in dividend income between January 2017 and January 2018 for each blogger.</p>
	  </div>
	  
	  <div id='graph1_block'><!--start of graph 1 block-->
		  <div id='graph3'>	
		  </div>
	  </div><!--end of graph 1 block-->
	  
	  <div id = 'intro'>
	          <hr class = 'hrTop'>
		  <h3 class = 'month'>Top 3 Jan. 2017 - Jan. 2018 Dollar Increases</h3>
		  <hr class = 'hrBottom'>
		   
		  <div style='margin-left:30%'>
                  <p><b>1. Screaming Little Man - <a href = 'https://www.screaminglittleman.com/financial-update-january-2018' target = '_blank'>$1,147.10</a></b></p>                 
                  <p><b>2. Stalflare - <a href = 'https://stalflare.wordpress.com/2018/02/01/january-2018-update/' target = '_blank'>$872.83</a></b></p>
                  <p><b>3. Tales From The Tape - <a href = 'http://talesfromthetape.com/2018/02/10/january-dividend-update-3/' target = '_blank'>$853.34</a></b></p>
                  </div>
          </div>
	  
	  <div id = 'intro'>	  
	  	  <hr class = 'hrTop'>
		  <h3 class = 'month'>Summary</h3>
		  <hr class = 'hrBottom'>
		  
		  <ul type="disc">
		  	<li>Total bloggers who reported dividend income: <b>89</b></li>
   		  	<li>Total dividend income received by all bloggers: <b>$34,745.96</b></li>
   		  	<li>Total bloggers who received over $1,000 in dividend income: <b>13</b></li>
    			<li>Median dividend income recieved: <b>$254.23</b></li>
    			<li>Median year-over-year percent increase: <b>23.1%</b></li>
    			<li>Median year-over-year dollar increase: <b>$24.58</b></li>   			
		  </ul>		 
	  </div>
	  
</div><!--end of main-->
	  
<pre id='data'>
"Blog","Jan2018"
"Screaming Little Man (CAD)",3106.79
"BAMF Money",2751.26
"Tales From The Tape",2421
"Mr. Tako Escapes",2020.89
"DutchIndependence (EURO)",1939.85
"The Dividend Family Guy",1888.84
"The Money Commando",1538.8
"Stalflare (EURO)",1425
"Tawcan (CAD)",1340.83
"My Road To Wealth & Freedom",1150.47
"Money Scrap",1137
"Dividend Hawk",1088.17
"Journey To Total Freedom",1040.37
"Five More Years",904.60
"Race2Retirement",864.70
"Dividend Quest",844.51
"BestFishPrice",732.76
"Finance Journey",713.72
"The Expat Investor",606
"Dividend Investor",576.47
"Engineering Dividends",541.98
"Pellrides",526.49
"OthalaFehu",525.24
"Cheesy Finance (EURO)",522.5
"All About The Dividends (CAD)",436.34
"DivHut",430.23
"Investing Pursuits",421.62
"MoneyMaaster.com",419.06
"Dividend Diplomats (Lanny)",417.68
"Passive Income Farmer (SGD)",410.69
"Monsieur Dividende (CAD)",400.06
"A Frugal Family's Journey",392.60
"My Dividend Dynasty",380.90
"Two Investing",350.94
"Root Of Good",345
"My Life of Investing & Hobbies",332.8
"Passive Income Pursuit",314.59
"DividendVet",312.75
"Passive Canadian Income (CAD)",307.44
"Tall Investing",298
"Stretching My Money",284.34
"Diligent Dividend",276.24
"Happy Healthy & Wealthy Girl",272.26
"Fiscal Voyage",255.14
"Dividend Driven",254.23
"The Beta Post",249.80
"Four Pillar Freedom",247.69
"Dividend Income Stocks",240.83
"Dividend Snail",230.44
"Desidividend",225.33
"Little Dividends",199.85
"DividendStacker",190.65
"DividendSolutions (EURO)",163.98
"American Dividend Dream",162.29
"Dividend Journal",156.20
"Millennial Dividends",147.46
"Financially Alert",143
"Dividend Diplomats (Bert)",139.02
"DGI For The DIY",136.2
"Live Off Dividends",101.19
"Reinis Fischer",100.95
"Dividend Noob",93.16
"The Frugal Cottage (EURO)",88.85
"Dividends are Coming (EURO)",82.07
"Time In The Market",80.14
"Dividend Gremlin",74.41
"Seeking The Dividends",72.34
"Balanced Dividends",72
"Money Hungry",70.54
"Dividend Dozer",68.56
"Passive Income Dude",61.33
"My Financial Shape (CHF)",61
"Everyday Freethought",59.59
"Stockles",57.90
"Money With Meow",54.60
"Dividend Cashflow (EURO)",54.51
"Polliesdividend (EURO)",50.13
"Dividends Down Under (AUD)",40.87
"March Toward $1,000,000",35.74
"Dividend Daze",29.87
"Reverse The Crush",28.26
"Stashing Dutchman",26.69
"Dividendniche",25.89
"Project: Beach Life",23.78
"Dividend Portfolio",14.93
"Wallet Squirrel",11.49
"More Dividends",11.24
"Pursuit 2 Freedom (EURO)",10.92
"Dividend Seedling",6.70
</pre>

<pre id = 'data2'>
"Blog","Jan2017","Jan2018","rawDiff","percentDiff"
"Passive Income Dude",377,61.33,-315.67,-83.7
"DutchIndependence (EURO)",8607.29,1939.85,-6667.44,-77.5
"Everyday Freethought",218.88,59.59,-159.29,-72.8
"Pursuit 2 Freedom (EURO)",30.81,10.92,-19.89,-64.6
"Dividend Driven",656.38,254.23,-402.15,-61.3
"Race2Retirement",1992.16,864.7,-1127.46,-56.6
"Mr. Tako Escapes",4048.16,2020.89,-2027.27,-50.1
"Financially Alert",211,143,-68,-32.2
"American Dividend Dream",224.51,162.29,-62.22,-27.7
"Dividend Daze",40.85,29.87,-10.98,-26.9
"Polliesdividend (EURO)",60.16,50.13,-10.03,-16.7
"OthalaFehu",587.02,525.24,-61.78,-10.5
"Wallet Squirrel",12.7,11.49,-1.21,-9.5
"BAMF Money",2902.17,2751.26,-150.91,-5.2
"Dividends are Coming (EURO)",86.05,82.07,-3.98,-4.6
"Cheesy Finance (EURO)",544.98,522.5,-22.48,-4.1
"DividendStacker",188.23,190.65,2.42,1.3
"Investing Pursuits",413.44,421.62,8.18,2
"Dividend Quest",827.29,844.51,17.22,2.1
"Seeking The Dividends",70.45,72.34,1.89,2.7
"My Financial Shape (CHF)",59,61,2,3.4
"MoneyMaaster.com",404.11,419.06,14.95,3.7
"My Dividend Dynasty",365.05,380.9,15.85,4.3
"Passive Income Pursuit",300.7,314.59,13.89,4.6
"A Frugal Family's Journey",369.06,392.6,23.54,6.4
"Engineering Dividends",507.09,541.98,34.89,6.9
"Project: Beach Life",21.86,23.78,1.92,8.8
"Dividend Diplomats (Bert)",127.81,139.02,11.21,8.8
"Dividend Diplomats (Lanny)",381.82,417.68,35.86,9.4
"Journey To Total Freedom",945.15,1040.37,95.22,10.1
"Dividend Gremlin",67.05,74.41,7.36,11
"Dividend Hawk",955.61,1088.17,132.56,13.9
"DGI For The DIY",118.14,136.2,18.06,15.3
"All About The Dividends (CAD)",377.99,436.34,58.35,15.4
"Fiscal Voyage",216.79,255.14,38.35,17.7
"Tawcan (CAD)",1112.37,1340.83,228.46,20.5
"Dividend Income Stocks",195.63,240.83,45.2,23.1
"Dividend Noob",75.29,93.16,17.87,23.7
"Happy Healthy and Wealthy Girl",220.12,272.26,52.14,23.7
"DivHut",340.46,430.23,89.77,26.4
"Finance Journey",562.15,713.72,151.57,27
"The Money Commando",1204.99,1538.8,333.81,27.7
"Money Hungry",54.14,70.54,16.4,30.3
"Desidividend",172.59,225.33,52.74,30.6
"Dividend Journal",119.51,156.2,36.69,30.7
"Tall Investing",226,298,72,31.9
"My Road To Wealth And Freedom",838.45,1150.47,312.02,37.2
"Dividend Cashflow (EURO)",39.18,54.51,15.33,39.1
"DividendVet",220.52,312.75,92.23,41.8
"Dividend Seedling",4.66,6.7,2.04,43.8
"Time In The Market",55.56,80.14,24.58,44.2
"Monsieur Dividende (CAD)",260.3,400.06,139.76,53.7
"Tales From The Tape",1567.66,2421,853.34,54.4
"Screaming Little Man (CAD)",1959.69,3106.79,1147.10,58.5
"My Life of Investing and Hobbies",207.15,332.8,125.65,60.7
"More Dividends",6.85,11.24,4.39,64.1
"Little Dividends",116.27,199.85,83.58,71.9
"The Frugal Cottage (EURO)",46.94,88.85,41.91,89.3
"DividendSolutions (EURO)",79.44,163.98,84.54,106.4
"Two Investing",156.89,350.94,194.05,123.7
"Pellrides",229,526.49,297.49,129.9
"Dividendniche",10.87,25.89,15.02,138.2
"The Expat Investor",240,606,366,152.5
"Stalflare (EURO)",552.17,1425,872.83,158.1
"Passive Income Farmer (SGD)",148.92,410.69,261.77,175.8
"Live Off Dividends",35.58,101.19,65.61,184.4
"Dividend Dozer",20.6,68.56,47.96,232.8
"Dividends Down Under (AUD)",10.24,40.87,30.63,299.1
"March Toward $1,000,000",8.25,35.74,27.49,333.2
"Stockles",11.9,57.9,46,386.6
"Stashing Dutchman",4.3,26.69,22.39,520.7
"Root Of Good",54,345,291,538.9
"Diligent Dividend",38.3,276.24,237.94,621.3
</pre>

<pre id = 'data3'>
"Blog","Jan2017","Jan2018","rawDiff","percentDiff"
"Mr. Tako Escapes",4048.16,2020.89,-2027.27,-50.1
"Race2Retirement",1992.16,864.7,-1127.46,-56.6
"Dividend Driven",656.38,254.23,-402.15,-61.3
"Passive Income Dude",377,61.33,-315.67,-83.7
"Everyday Freethought",218.88,59.59,-159.29,-72.8
"BAMF Money",2902.17,2751.26,-150.91,-5.2
"Financially Alert",211,143,-68,-32.2
"American Dividend Dream",224.51,162.29,-62.22,-27.7
"OthalaFehu",587.02,525.24,-61.78,-10.5
"Cheesy Finance (EURO)",544.98,522.5,-22.48,-4.1
"Pursuit 2 Freedom (EURO)",30.81,10.92,-19.89,-64.6
"Dividend Daze",40.85,29.87,-10.98,-26.9
"Polliesdividend (EURO)",60.16,50.13,-10.03,-16.7
"Dividends are Coming (EURO)",86.05,82.07,-3.98,-4.6
"Wallet Squirrel",12.7,11.49,-1.21,-9.5
"Seeking The Dividends",70.45,72.34,1.89,2.7
"Project: Beach Life",21.86,23.78,1.92,8.8
"My Financial Shape (CHF)",59,61,2,3.4
"Dividend Seedling",4.66,6.7,2.04,43.8
"DividendStacker",188.23,190.65,2.42,1.3
"More Dividends",6.85,11.24,4.39,64.1
"Dividend Gremlin",67.05,74.41,7.36,11
"Investing Pursuits",413.44,421.62,8.18,2
"Dividend Diplomats (Bert)",127.81,139.02,11.21,8.8
"Passive Income Pursuit",300.7,314.59,13.89,4.6
"MoneyMaaster.com",404.11,419.06,14.95,3.7
"Dividendniche",10.87,25.89,15.02,138.2
"Dividend Cashflow (EURO)",39.18,54.51,15.33,39.1
"My Dividend Dynasty",365.05,380.9,15.85,4.3
"Money Hungry",54.14,70.54,16.4,30.3
"Dividend Quest",827.29,844.51,17.22,2.1
"Dividend Noob",75.29,93.16,17.87,23.7
"DGI For The DIY",118.14,136.2,18.06,15.3
"Stashing Dutchman",4.3,26.69,22.39,520.7
"A Frugal Family's Journey",369.06,392.6,23.54,6.4
"Time In The Market",55.56,80.14,24.58,44.2
"March Toward $1,000,000",8.25,35.74,27.49,333.2
"Dividends Down Under (AUD)",10.24,40.87,30.63,299.1
"Engineering Dividends",507.09,541.98,34.89,6.9
"Dividend Diplomats (Lanny)",381.82,417.68,35.86,9.4
"Dividend Journal",119.51,156.2,36.69,30.7
"Fiscal Voyage",216.79,255.14,38.35,17.7
"The Frugal Cottage (EURO)",46.94,88.85,41.91,89.3
"Dividend Income Stocks",195.63,240.83,45.2,23.1
"Stockles",11.9,57.9,46,386.6
"Dividend Dozer",20.6,68.56,47.96,232.8
"Happy Healthy and Wealthy Girl",220.12,272.26,52.14,23.7
"Desidividend",172.59,225.33,52.74,30.6
"All About The Dividends (CAD)",377.99,436.34,58.35,15.4
"Live Off Dividends",35.58,101.19,65.61,184.4
"Tall Investing",226,298,72,31.9
"Little Dividends",116.27,199.85,83.58,71.9
"DividendSolutions (EURO)",79.44,163.98,84.54,106.4
"DivHut",340.46,430.23,89.77,26.4
"DividendVet",220.52,312.75,92.23,41.8
"Journey To Total Freedom",945.15,1040.37,95.22,10.1
"My Life of Investing and Hobbies",207.15,332.8,125.65,60.7
"Dividend Hawk",955.61,1088.17,132.56,13.9
"Monsieur Dividende (CAD)",260.3,400.06,139.76,53.7
"Finance Journey",562.15,713.72,151.57,27
"Two Investing",156.89,350.94,194.05,123.7
"Tawcan (CAD)",1112.37,1340.83,228.46,20.5
"Diligent Dividend",38.3,276.24,237.94,621.3
"Passive Income Farmer (SGD)",148.92,410.69,261.77,175.8
"Root Of Good",54,345,291,538.9
"Pellrides",229,526.49,297.49,129.9
"My Road To Wealth And Freedom",838.45,1150.47,312.02,37.2
"The Money Commando",1204.99,1538.8,333.81,27.7
"The Expat Investor",240,606,366,152.5
"Tales From The Tape",1567.66,2421,853.34,54.4
"Stalflare (EURO)",552.17,1425,872.83,158.1
"Screaming Little Man (CAD)",1959.69,3106.79,1147.1,58.5
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
								.domain([0,3500])
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
				            div	.html(d.Blog + " earned $" + d.Jan2018.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " in dividend income in January 2018.")	
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
					.text("Jan. 2018 Dividend Income");
					
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
								.domain([0,650])
								.range([height2, 0]);

			var widthScale2 = d3.scale.ordinal().rangeRoundBands([margin2.left, width2], 0.2);
							
			var yAxis2 = d3.svg.axis()      .scale(heightScale2)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0)
							.tickValues([0, 100, 200, 300, 400, 500, 600])
							.tickFormat(function(d) { return d + "%"; });
							
			var x = d3.scale.ordinal().rangeRoundBands([66, width2], .1),
			    y = d3.scale.linear().domain([0, 650])
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
				            div	.html(d.Blog + "'s January dividend income increased by " + d.percentDiff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "% from January 2017 to January 2018.")	
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
								.domain([-2100,1200])
								.range([height3, 0]);

			var widthScale3 = d3.scale.ordinal().rangeRoundBands([margin3.left, width3], 0.2);
							
			var yAxis3 = d3.svg.axis()      .scale(heightScale3)
							.orient("left")
							.innerTickSize([0])
							.outerTickSize(0)
							.tickValues([0, 500, 1000])
							.tickFormat(function(d) { return "$" + d; });
							
			var x3 = d3.scale.ordinal().rangeRoundBands([margin3.left, width3], .1),
			    y3 = d3.scale.linear().domain([-2100, 1200])
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
				            div	.html(d.Blog + "'s January dividend income increased by $" + d.rawDiff.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " from January 2017 to January 2018.")	
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
					.attr("transform", "translate("+ ((fullwidth3 / 2) - 70) + "," + (fullheight3 - 380) + ")")
					.text("Bloggers");		
  
		</script>
	</body>
</html>	