<?php
/*
 *Template Name: American Net Worth
 *Template Post Type: post
 */
 
 get_header(); ?>

<html>
<head>
<script src="http://d3js.org/d3.v4.min.js"></script>
<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');

body {
  font-family: Helvetica, sans-serif;
  margin: 0;
  width: auto;
}

a {
	text-decoration: none;
	color: purple;
}

h1 {
text-align: center;
font-size: 56px;
margin-bottom: 0px;
margin-top: 20px;
font-family: 'Droid Serif', serif;
}

h2,h3, h4, h5, h6 {
text-align: center;
margin-bottom: 15px;
margin-top: 15px;
font-family: 'Raleway', sans-serif;
}

.sectionHeader {
text-align: left;
margin-bottom: 15px;
margin-top: 30px;
font-family: 'Raleway', sans-serif;
font-size: 32px;
}

#subTitle {
text-align: center;
margin-bottom: 60px;
}

p {
font-size: 16px;
font-family: 'Raleway', sans-serif;
color: black;
line-height: 1.75;

}

label {
  display: block;
  font-family: 'Raleway', sans-serif;
  margin-bottom: 5px;
}

select {
  padding: 3px;
  font-family: 'Raleway', sans-serif;
  border-radius: 5px;
  text-align: center;
  cursor: pointer;
  width: 30%;
}

select:focus {
outline: none;
}

#intro {
  text-align: center;
  width: 80%;
  margin: 0 auto;
}

#outro {
  text-align: center;
  margin: 0 auto;
}

div.tooltip {	
    position: absolute;					
    padding: 6px;				
    font: 12px sans-serif;		
    background: #f9f9f9;	
    border: 0px;		
    border-radius: 8px;			
    pointer-events: none;
    line-height: 1.5;	
    font-weight: 600;
	width: 170px;
}

#dropdown3 {
	outline: none;
	border: none;
	border-bottom: thin black solid;
	border-radius: 0px;
	font-size: 16px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 600;
}

svg {
	display: block;
	margin: auto;
}

rect:hover {
opacity: 0.7;
}

.rect3:hover {
opacity: 0.9;
}

.rectBar:hover {
opacity: 1;
}

.words {
    width: 100%;
	margin: 0 auto;
	text-align: left;
}

.LabLabel {
    font-family: sans-serif;
	font-size: 11px;
	fill: #777;
}

.barLabel {
	font-size: 17px;
	fill: #777;
    font-family: sans-serif;
}

.percentLabel {
	font-size: 13px;
	fill: white;
}

.intro_p p {
	text-align: center;
}

#medianOut {
	font-size: 30px;
	color: #dd4e4e;
}

#onePercentOut {
    font-size: 30px;
	color: teal;
}

#multipleOut {
    font-size: 30px;
	color: #5a4976;
}

#last {
	margin-bottom: 0px;
	padding-bottom: 30px;
	font-size: 14px;
}

#outro_text {
    width: 100%;
	text-align: center;
	margin: 0 auto;
}

#notes {
    text-align: center;
	padding-top: 30px;
	margin-bottom: 0px;
}

#chart1_svg {
	margin
}

</style>
</head>

<body>

<div id='intro'><!--start of intro-->
				    <h1><span style="color: #347633">Dollar</span> <span style="color: #7dcc7c">$igns</span></h1>
				    <h3 id='subTitle'>Visualizing the Net Worth of Americans by Age</h3>
				  
				    <div class='words'>
				    <p>Net worth is a common metric used to measure an individual's financial health. It's simply the difference between all the assets someone owns (like cash, stocks, bonds, real estate, etc.) and all the liabilities they owe (like student loans, car loans, credit card debt, etc.).</p>
					<p><b>Related</b>: I track my own net worth for free using <a href="http://fxo.co/4D5i" target="_blank">Personal Capital</a>.</p>
				    <p>Today I want to explore the net worth of Americans based on age bracket. I start by taking a look at the distribution of net worth by age, then by looking at what percentage
				    of each age bracket has a positive and negative net worth, and end by comparing the net worth of the 1% with the median net worth for each age bracket.</p>
				    <p>Let's have a look! </p>
				    <h2 class="sectionHeader", style='text-align: center'>Net Worth Percentiles by Age</h2>
					<p style='text-align: center; margin-bottom: 20px'>Select an age group to view the distribution of net worth.</p>
				    </div>	  
		  
				    <label for="dropdown">Age Group</label>
		              <select name="dropdown" id="dropdown">
						<option value="data1">18 - 24</option>
						<option value="data2">25 - 29</option>
	                    <option value="data3">30 - 34</option>
						<option value="data4">35 - 39</option>
						<option value="data5">40 - 44</option>
						<option value="data6">45 - 49</option>
						<option value="data7">50 - 54</option>
						<option value="data8">55 - 59</option>
						<option value="data9">60 - 64</option>
						<option value="data10">65 +</option>
		              </select>
		              	        		
</div><!--end of intro-->				
			
<svg id="chart1_svg" width="900" height="500"></svg>

<div id="intro"><!--start of intro 2-->	
	<div class='words'>
	    <p>The net worth of Americans in the youngest age bracket of 18 - 24 ranges from -$67,000 all the way up to $388,000. It's interesting to note that a whopping 35% of people in this age bracket <b>don't have a single dollar to their name.</b></p>
	    <p>Things start to get even more eye-opening when we look at the 25 - 29 age bracket and see that the lower net worth percentiles have even more debt than the 18 - 24 year olds. This is likely because people in this age range
	    have taken on student loans, auto loans, and credit card debt without having enough time in the workforce to balance out this debt.</p>
        <p>Exploring the older age brackets reveals that the upper net worth percentiles are deep into the millions. In fact, the top 1% net worth percentile for people age 65 and older is over $11.5 million.</p>        
        <h2 class="sectionHeader">A Closer Look at Positive & Negative Net Worth by Age</h2>
		<p>It's alarming how many Americans have a negative net worth, particularly in the younger age brackets. More than one in three people ages 18 - 24 have a negative net worth and more than one in four in the age bracket 25 - 29 have less than a dollar to their name.
		<p>Here's the percentage of Americans who have a <span style="color:#ea5353"><b>negative</b></span> and <span style="color:#88ea78"><b>positive</b></span> net worth by <span style="color:#777"><b>age bracket</b></span>:</p>
	</div> 

</div><!--end of intro 2-->

<svg id="chart2_svg" width="500" height="800"></svg>

<div id="intro"><!--start of intro 3-->	
	<div class='words'>
	    <p>It's understandable that many people under the age of 30 have a negative net worth, but it's surprising to see that more than one in 10 people in their 50's have absolutely no savings.</p>
	    <p>Savings rates for American households has generally been around 5% over the last decade, which is just barely above inflation. Knowing this, it's no wonder why so many people have a negative net worth even after being in the workforce for several decades.</p>
        
        <h2 class="sectionHeader">Comparing the One Percent to the Median</h2>
		<p>Wealth inequality has been a phenomenon present in the U.S. for centuries. The top 1 - 5% of Americans have always had incredible amounts of wealth in relation to the rest of the population. To see just how severe this problem is in the U.S. today, 
		here is the median net worth compared to the top 1% net worth for each age bracket.</p>
		<p>&nbsp;</p>
		
		<div class="intro_p">
			<p>The median net worth for 
							<span>
							  <select name="dropdown3" id="dropdown3">
								<option value="data1_3">18 - 24</option>
								<option value="data2_3">25 - 29</option>
								<option value="data3_3">30 - 34</option>
								<option value="data4_3">35 - 39</option>
								<option value="data5_3">40 - 44</option>
								<option value="data6_3">45 - 49</option>
								<option value="data7_3">50 - 54</option>
								<option value="data8_3">55 - 59</option>
								<option value="data9_3">60 - 64</option>
								<option value="data10_3">65 +</option>
							  </select>
							</span> year olds is:</p>
			<p id="medianOut">$<span id='medianNet'>4,400</span></p>
			<p>The net worth of the top 1% of <span id='ageBrack2'>18 - 24 </span> year olds is:</p>
			<p id="onePercentOut">$<span id='onePercentNet'>388,350</span></p>
			<p><b>The net worth of the top 1% of <span id='ageBrack3'>18 - 24 </span> year olds is</b></p>
			<p id="multipleOut"><span id='multiple'>88</span> times larger</p>
			<p><b>than the median net worth for their age bracket.</b></p>
		</div>
		    <p>&nbsp;</p>
		    <p>For 40 - 44 year olds, the Americans in the top 1% net worth percentile have an unbelievable 117 times as much wealth as the median net worth percentile in the same age bracket.</p>
		    <p>Among every age bracket the top 1% has <i>at least</i> 50 times as much wealth as the median individual in the same age bracket.</p>
		    <p>One positive takeaway from this analysis is that the median net worth for each age bracket is a positive number, which means more than half of Americans in each age range have a net worth greater than $0.</p>
	</div> 

</div><!--end of intro 3-->

<div id="outro"><!--start of outro-->
			<div id='outro_text'>
			<hr>
			    <p id='notes'><b>Notes</b></p>
				<p style='padding-top: 0px; margin-top: 0px; font-size: 14px;'>Data used for this analysis comes from the <a href="https://www.federalreserve.gov/econres/scfindex.htm">Survey of Consumer Finances</a> conducted by the Federal Reserve System.</p>
				<p id="last">I used R to clean, format, and arrange the data, along with a combination of vanilla javascript and D3.js to create the data visualizations and the interactive features in the article.</p>
			</div>
</div><!--end of outro-->	
			
<script>

//GRAPH 1 STUFF

var data1 = d3.csvParse("percent,frequency\n0.01,-67200\n0.02,-53900\n0.03,-43200\n0.04,-40000\n0.05,-36910\n0.06,-33420\n0.07,-27185\n0.08,-25250\n0.09,-24100\n0.1,-20900\n0.11,-19270\n0.12,-18500\n0.13,-15000\n0.14,-14300\n0.15,-11200\n0.16,-10200\n0.17,-9300\n0.18,-9100\n0.19,-8900\n0.2,-8400\n0.21,-6400\n0.22,-5150\n0.23,-4400\n0.24,-3000\n0.25,-2860\n0.26,-2430\n0.27,-2130\n0.28,-2100\n0.29,-1300\n0.3,-800\n0.31,-590\n0.32,-165\n0.33,0\n0.34,0\n0.35,1\n0.36,200\n0.37,450\n0.38,580\n0.39,750\n0.4,1000\n0.41,1300\n0.42,1400\n0.43,1900\n0.44,2000\n0.45,2620\n0.46,3020\n0.47,3400\n0.48,4000\n0.49,4300\n0.5,4400\n0.51,4550\n0.52,4800\n0.53,4900\n0.54,5520\n0.55,5600\n0.56,6650\n0.57,6880\n0.58,7410\n0.59,8180\n0.6,8670\n0.61,9000\n0.62,9501\n0.63,10000\n0.64,10100\n0.65,10400\n0.66,10650\n0.67,11040\n0.68,11510\n0.69,12090\n0.7,12820\n0.71,13795\n0.72,14170\n0.73,14700\n0.74,15100\n0.75,15600\n0.76,15920\n0.77,16100\n0.78,16500\n0.79,16940\n0.8,18800\n0.81,19513\n0.82,20800\n0.83,28300\n0.84,30000\n0.85,31405\n0.86,31950\n0.87,32950\n0.88,38000\n0.89,40980\n0.9,45521\n0.91,47300\n0.92,61340\n0.93,75600\n0.94,77620\n0.95,90800\n0.96,102015\n0.97,193700\n0.98,222950\n0.99,388350");
var data2 = d3.csvParse("percent,frequency\n0.01,-189640\n0.02,-95200\n0.03,-79200\n0.04,-65090\n0.05,-50000\n0.06,-44190\n0.07,-32700\n0.08,-27900\n0.09,-25000\n0.1,-22900\n0.11,-20600\n0.12,-18800\n0.13,-15880\n0.14,-12699\n0.15,-11380\n0.16,-10700\n0.17,-10000\n0.18,-8610\n0.19,-7760\n0.2,-5980\n0.21,-5110\n0.22,-3800\n0.23,-2780\n0.24,-1670\n0.25,-1100\n0.26,0\n0.27,0\n0.28,5\n0.29,330\n0.3,500\n0.31,820\n0.32,1200\n0.33,1700\n0.34,2180\n0.35,2510\n0.36,3200\n0.37,3500\n0.38,4080\n0.39,4620\n0.4,5100\n0.41,5400\n0.42,6090\n0.43,6250\n0.44,7010\n0.45,7500\n0.46,7800\n0.47,8110\n0.48,8500\n0.49,8800\n0.5,9460\n0.51,9930\n0.52,10560\n0.53,11050\n0.54,12100\n0.55,13230\n0.56,14100\n0.57,15300\n0.58,15870\n0.59,16200\n0.6,17250\n0.61,18300\n0.62,18700\n0.63,20000\n0.64,21930\n0.65,24260\n0.66,25600\n0.67,28640\n0.68,29630\n0.69,31500\n0.7,33540\n0.71,34200\n0.72,35800\n0.73,37500\n0.74,39500\n0.75,42000\n0.76,44780\n0.77,47701\n0.78,51100\n0.79,56450\n0.8,62821\n0.81,65200\n0.82,75500\n0.83,79200\n0.84,80821\n0.85,85700\n0.86,89110\n0.87,95060\n0.88,103600\n0.89,114770\n0.9,127580\n0.91,150760\n0.92,164100\n0.93,182100\n0.94,200000\n0.95,232000\n0.96,241890\n0.97,265750\n0.98,472000\n0.99,594400");
var data3 = d3.csvParse("percent,frequency\n0.01,-83200\n0.02,-72490\n0.03,-57600\n0.04,-51400\n0.05,-45820\n0.06,-38980\n0.07,-30200\n0.08,-24880\n0.09,-18580\n0.1,-16500\n0.11,-14200\n0.12,-9390\n0.13,-8000\n0.14,-6000\n0.15,-4680\n0.16,-3760\n0.17,-2630\n0.18,-1640\n0.19,0\n0.2,0\n0.21,90\n0.22,300\n0.23,560\n0.24,1190\n0.25,1600\n0.26,2100\n0.27,3100\n0.28,3500\n0.29,3700\n0.3,4500\n0.31,4850\n0.32,5800\n0.33,6380\n0.34,7100\n0.35,7860\n0.36,8500\n0.37,9000\n0.38,9190\n0.39,9700\n0.4,10400\n0.41,10700\n0.42,11401\n0.43,12301\n0.44,12890\n0.45,13620\n0.46,15450\n0.47,16401\n0.48,17300\n0.49,18200\n0.5,19400\n0.51,20140\n0.52,21900\n0.53,22890\n0.54,23171\n0.55,26100\n0.56,27390\n0.57,28450\n0.58,30200\n0.59,31470\n0.6,33350\n0.61,36140\n0.62,40400\n0.63,42500\n0.64,46200\n0.65,51300\n0.66,53700\n0.67,59700\n0.68,63520\n0.69,68130\n0.7,72050\n0.71,76220\n0.72,81200\n0.73,85620\n0.74,88000\n0.75,90400\n0.76,95000\n0.77,99800\n0.78,107300\n0.79,112000\n0.8,128610\n0.81,131800\n0.82,142750\n0.83,147600\n0.84,152320\n0.85,158510\n0.86,175940\n0.87,188510\n0.88,206840\n0.89,224000\n0.9,242450\n0.91,270000\n0.92,298670\n0.93,347800\n0.94,369720\n0.95,397300\n0.96,492510\n0.97,664400\n0.98,819440\n0.99,1373300");
var data4 = d3.csvParse("percent,frequency\n0.01,-84800\n0.02,-60230\n0.03,-49850\n0.04,-33770\n0.05,-29300\n0.06,-21100\n0.07,-17000\n0.08,-11300\n0.09,-8200\n0.1,-6100\n0.11,-3600\n0.12,-2640\n0.13,-1070\n0.14,0\n0.15,0\n0.16,50\n0.17,101\n0.18,400\n0.19,670\n0.2,1620\n0.21,2800\n0.22,3400\n0.23,3730\n0.24,4020\n0.25,4300\n0.26,5000\n0.27,5600\n0.28,6800\n0.29,7860\n0.3,8300\n0.31,9005\n0.32,10460\n0.33,11000\n0.34,12110\n0.35,13200\n0.36,13700\n0.37,14950\n0.38,16601\n0.39,17250\n0.4,18100\n0.41,20390\n0.42,21800\n0.43,22500\n0.44,23900\n0.45,25400\n0.46,27500\n0.47,29700\n0.48,32400\n0.49,35740\n0.5,36320\n0.51,37200\n0.52,40400\n0.53,42950\n0.54,45060\n0.55,47150\n0.56,52600\n0.57,55310\n0.58,59300\n0.59,61700\n0.6,70200\n0.61,75200\n0.62,79800\n0.63,83540\n0.64,88200\n0.65,93480\n0.66,99001\n0.67,103800\n0.68,113700\n0.69,128300\n0.7,132500\n0.71,149400\n0.72,160100\n0.73,173800\n0.74,179300\n0.75,185806\n0.76,193200\n0.77,204700\n0.78,213300\n0.79,223340\n0.8,231200\n0.81,248100\n0.82,259100\n0.83,282500\n0.84,299000\n0.85,317950\n0.86,339000\n0.87,371510\n0.88,429200\n0.89,443000\n0.9,496000\n0.91,539450\n0.92,603800\n0.93,672200\n0.94,796380\n0.95,919200\n0.96,1143800\n0.97,1553000\n0.98,2015500\n0.99,2814200");
var data5 = d3.csvParse("percent,frequency\n0.01,-105250\n0.02,-68900\n0.03,-51780\n0.04,-35050\n0.05,-29940\n0.06,-20150\n0.07,-13799\n0.08,-10100\n0.09,-7740\n0.1,-6140\n0.11,-3770\n0.12,-2000\n0.13,-550\n0.14,0\n0.15,20\n0.16,630\n0.17,1440\n0.18,2800\n0.19,3500\n0.2,4000\n0.21,4900\n0.22,5420\n0.23,6500\n0.24,7640\n0.25,8330\n0.26,8750\n0.27,9200\n0.28,9560\n0.29,10500\n0.3,11850\n0.31,14025\n0.32,16790\n0.33,18300\n0.34,19990\n0.35,21600\n0.36,23450\n0.37,25100\n0.38,26250\n0.39,28400\n0.4,31400\n0.41,33700\n0.42,35900\n0.43,38000\n0.44,39250\n0.45,43805\n0.46,48220\n0.47,51920\n0.48,58241\n0.49,59000\n0.5,62200\n0.51,66430\n0.52,68550\n0.53,70480\n0.54,72240\n0.55,76700\n0.56,81000\n0.57,86970\n0.58,92910\n0.59,95840\n0.6,104300\n0.61,112300\n0.62,115600\n0.63,122700\n0.64,131000\n0.65,144450\n0.66,149900\n0.67,164300\n0.68,168300\n0.69,175800\n0.7,180450\n0.71,188890\n0.72,202900\n0.73,215400\n0.74,232400\n0.75,251150\n0.76,278450\n0.77,285400\n0.78,298650\n0.79,317000\n0.8,342000\n0.81,367300\n0.82,390100\n0.83,411300\n0.84,444600\n0.85,463760\n0.86,494180\n0.87,515000\n0.88,609900\n0.89,658080\n0.9,761400\n0.91,815700\n0.92,949900\n0.93,1040000\n0.94,1106000\n0.95,1380150\n0.96,2105000\n0.97,2923600\n0.98,3904500\n0.99,7282400");
var data6 = d3.csvParse("percent,frequency\n0.01,-88100\n0.02,-63100\n0.03,-50970\n0.04,-40700\n0.05,-26300\n0.06,-16799\n0.07,-12950\n0.08,-7990\n0.09,-5440\n0.1,-2500\n0.11,-470\n0.12,0\n0.13,50\n0.14,500\n0.15,750\n0.16,1460\n0.17,2360\n0.18,3510\n0.19,4600\n0.2,5000\n0.21,6000\n0.22,7970\n0.23,9400\n0.24,10200\n0.25,11060\n0.26,12190\n0.27,13560\n0.28,15220\n0.29,17410\n0.3,19300\n0.31,20450\n0.32,22900\n0.33,24370\n0.34,26200\n0.35,27920\n0.36,30001\n0.37,32380\n0.38,36110\n0.39,38700\n0.4,40300\n0.41,41620\n0.42,44230\n0.43,48600\n0.44,51000\n0.45,56900\n0.46,59900\n0.47,64270\n0.48,66030\n0.49,68200\n0.5,72070\n0.51,77760\n0.52,84000\n0.53,90700\n0.54,101600\n0.55,111090\n0.56,115300\n0.57,122000\n0.58,127400\n0.59,134200\n0.6,145200\n0.61,153610\n0.62,163900\n0.63,169550\n0.64,176150\n0.65,183500\n0.66,198500\n0.67,205700\n0.68,209700\n0.69,215000\n0.7,229551\n0.71,240110\n0.72,259200\n0.73,272700\n0.74,293000\n0.75,305400\n0.76,324140\n0.77,349600\n0.78,377400\n0.79,403700\n0.8,423800\n0.81,448200\n0.82,461000\n0.83,502500\n0.84,545000\n0.85,601000\n0.86,628400\n0.87,651000\n0.88,718785\n0.89,756600\n0.9,831780\n0.91,942800\n0.92,1021480\n0.93,1112700\n0.94,1270080\n0.95,1414500\n0.96,1910000\n0.97,2350500\n0.98,3520000\n0.99,5216000\n");
var data7 = d3.csvParse("percent,frequency\n0.01,-76490\n0.02,-42900\n0.03,-26350\n0.04,-13580\n0.05,-7400\n0.06,-6100\n0.07,-1750\n0.08,-700\n0.09,0\n0.1,0\n0.11,40\n0.12,200\n0.13,1030\n0.14,1700\n0.15,2800\n0.16,3680\n0.17,4560\n0.18,5500\n0.19,6300\n0.2,6600\n0.21,7550\n0.22,9100\n0.23,10500\n0.24,12260\n0.25,14200\n0.26,16230\n0.27,19300\n0.28,21240\n0.29,23820\n0.3,28050\n0.31,32020\n0.32,36580\n0.33,43600\n0.34,48950\n0.35,53600\n0.36,55000\n0.37,57920\n0.38,61980\n0.39,67300\n0.4,72000\n0.41,78000\n0.42,80000\n0.43,84250\n0.44,89700\n0.45,97100\n0.46,105250\n0.47,108900\n0.48,115290\n0.49,119500\n0.5,122100\n0.51,128460\n0.52,135500\n0.53,141900\n0.54,148180\n0.55,155600\n0.56,162670\n0.57,169550\n0.58,180490\n0.59,187780\n0.6,197000\n0.61,215000\n0.62,221530\n0.63,230650\n0.64,237200\n0.65,253810\n0.66,268730\n0.67,288520\n0.68,308570\n0.69,328250\n0.7,357130\n0.71,364400\n0.72,391910\n0.73,402650\n0.74,420050\n0.75,440400\n0.76,466870\n0.77,515100\n0.78,539000\n0.79,575900\n0.8,603640\n0.81,638500\n0.82,663600\n0.83,685450\n0.84,720100\n0.85,763500\n0.86,840700\n0.87,874569\n0.88,936480\n0.89,980260\n0.9,1017000\n0.91,1079000\n0.92,1211450\n0.93,1396200\n0.94,1719500\n0.95,1917700\n0.96,2269200\n0.97,2866600\n0.98,4040000\n0.99,7222100");
var data8 = d3.csvParse("percent,frequency\n0.01,-51000\n0.02,-24550\n0.03,-17600\n0.04,-12880\n0.05,-5500\n0.06,-4270\n0.07,-2800\n0.08,-1320\n0.09,-530\n0.1,0\n0.11,1\n0.12,250\n0.13,670\n0.14,1900\n0.15,3000\n0.16,3690\n0.17,5110\n0.18,6000\n0.19,8190\n0.2,9250\n0.21,11400\n0.22,13260\n0.23,17690\n0.24,19000\n0.25,19920\n0.26,21400\n0.27,23210\n0.28,28200\n0.29,32250\n0.3,35000\n0.31,39940\n0.32,43700\n0.33,47500\n0.34,51300\n0.35,57795\n0.36,61360\n0.37,69750\n0.38,74980\n0.39,82800\n0.4,84800\n0.41,95600\n0.42,100500\n0.43,107960\n0.44,111600\n0.45,118300\n0.46,124760\n0.47,134340\n0.48,139630\n0.49,144760\n0.5,152900\n0.51,166400\n0.52,172600\n0.53,179250\n0.54,184300\n0.55,193750\n0.56,205240\n0.57,213815\n0.58,240180\n0.59,250340\n0.6,254451\n0.61,261600\n0.62,274900\n0.63,284930\n0.64,300900\n0.65,312580\n0.66,327520\n0.67,336700\n0.68,358700\n0.69,380000\n0.7,401000\n0.71,419400\n0.72,433550\n0.73,455100\n0.74,483000\n0.75,527530\n0.76,569450\n0.77,636900\n0.78,662200\n0.79,687550\n0.8,727650\n0.81,778500\n0.82,852700\n0.83,912300\n0.84,973000\n0.85,1020700\n0.86,1082500\n0.87,1121800\n0.88,1221000\n0.89,1317600\n0.9,1381190\n0.91,1622300\n0.92,1815400\n0.93,2229900\n0.94,2730900\n0.95,3349800\n0.96,4132000\n0.97,5092500\n0.98,7692000\n0.99,10813000");
var data9 = d3.csvParse("percent,frequency\n0.01,-56700\n0.02,-20420\n0.03,-8900\n0.04,-3400\n0.05,-1400\n0.06,0\n0.07,10\n0.08,150\n0.09,800\n0.1,1410\n0.11,2200\n0.12,2800\n0.13,3700\n0.14,4500\n0.15,5500\n0.16,7200\n0.17,9100\n0.18,10000\n0.19,11000\n0.2,13300\n0.21,14650\n0.22,16300\n0.23,19910\n0.24,23600\n0.25,26100\n0.26,32300\n0.27,35760\n0.28,40955\n0.29,42900\n0.3,44790\n0.31,48300\n0.32,54100\n0.33,59860\n0.34,61600\n0.35,63820\n0.36,68260\n0.37,71770\n0.38,80300\n0.39,86600\n0.4,92300\n0.41,97700\n0.42,100200\n0.43,112100\n0.44,118650\n0.45,123100\n0.46,129020\n0.47,139400\n0.48,151000\n0.49,166180\n0.5,174000\n0.51,190260\n0.52,197190\n0.53,212300\n0.54,220000\n0.55,230100\n0.56,248360\n0.57,255800\n0.58,260300\n0.59,268550\n0.6,276550\n0.61,286250\n0.62,299750\n0.63,306950\n0.64,322100\n0.65,338400\n0.66,344500\n0.67,378700\n0.68,410200\n0.69,416640\n0.7,440400\n0.71,466500\n0.72,484800\n0.73,505650\n0.74,530000\n0.75,574300\n0.76,614500\n0.77,650550\n0.78,683000\n0.79,718410\n0.8,748610\n0.81,785250\n0.82,818000\n0.83,866230\n0.84,935050\n0.85,978900\n0.86,1100800\n0.87,1127550\n0.88,1214000\n0.89,1454100\n0.9,1506000\n0.91,1571700\n0.92,1923200\n0.93,2243000\n0.94,2438800\n0.95,2929000\n0.96,3763900\n0.97,5480600\n0.98,7649300\n0.99,10604100");
var data10 = d3.csvParse("percent,frequency\n0.01,-24130\n0.02,-3900\n0.03,-570\n0.04,0\n0.05,100\n0.06,570\n0.07,2000\n0.08,3780\n0.09,4800\n0.1,6400\n0.11,8320\n0.12,9825\n0.13,12920\n0.14,16300\n0.15,20790\n0.16,25700\n0.17,30601\n0.18,34100\n0.19,36900\n0.2,42920\n0.21,50000\n0.22,52900\n0.23,58000\n0.24,63950\n0.25,69450\n0.26,73770\n0.27,79600\n0.28,83580\n0.29,87200\n0.3,90700\n0.31,98000\n0.32,103880\n0.33,110600\n0.34,113100\n0.35,116050\n0.36,121700\n0.37,127090\n0.38,132100\n0.39,141600\n0.4,145500\n0.41,150600\n0.42,157565\n0.43,161890\n0.44,167780\n0.45,176800\n0.46,186200\n0.47,193300\n0.48,199200\n0.49,205310\n0.5,210500\n0.51,216600\n0.52,221400\n0.53,229600\n0.54,238700\n0.55,246402\n0.56,252850\n0.57,260700\n0.58,268700\n0.59,275100\n0.6,284800\n0.61,294500\n0.62,306300\n0.63,317300\n0.64,326830\n0.65,336300\n0.66,348500\n0.67,366200\n0.68,381000\n0.69,395000\n0.7,415200\n0.71,433700\n0.72,451000\n0.73,468265\n0.74,500050\n0.75,547100\n0.76,574400\n0.77,602800\n0.78,621205\n0.79,653000\n0.8,696000\n0.81,739380\n0.82,780600\n0.83,821230\n0.84,897350\n0.85,973000\n0.86,1072000\n0.87,1149460\n0.88,1263000\n0.89,1336200\n0.9,1487000\n0.91,1636600\n0.92,1872600\n0.93,2134000\n0.94,2505200\n0.95,3051500\n0.96,3688900\n0.97,4737100\n0.98,7329150\n0.99,11572860");

var svg = d3.select("#chart1_svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 60},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
    y = d3.scaleLinear().rangeRound([height, 0]);

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

//g.append("g")
 // .attr("class", "x axis")
  //.attr("transform", "translate(0," + height + ")")

//add y axis  
g.append("g")
  .attr("class", "y axis")

//add text to y axis
g.append("text")			
  .attr("class", "LabLabel")
  .attr("transform", "translate("+ (width-907) +","+(height-360)+")rotate(-90)")
  .text("Net Worth (dollars)"); 
  
//add text to x axis
var xLab = g.append("text")			
		    .attr("class", "LabLabel")
		    .attr("x", width-530)
		    .attr("y", 400)
		    .text("Net Worth Percentile");
 
// Define the div for the tooltip
var div = d3.select("#intro").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

//get current dropdown age bracket
var e = document.getElementById("dropdown");
var ageBracket = e.options[e.selectedIndex].text;

//define color scale for barChart
var colorChart = d3.scaleQuantize()
  .domain([d3.min(data1, function(d) { return +d.frequency; }), d3.max(data1, function(d) { return +d.frequency; })])
  .range(d3.schemeRdYlGn['8']);

//change bar chart based on dropdown selection
   d3.select('#dropdown')
	  .on('change', function() {
	  var newData = eval(d3.select(this).property('value'));
	  waterfallChart(newData);
	  });

//create initial bar charts using 18-14 age bracket
waterfallChart(data1);

//function to update bar chart based on dropdown selection
function waterfallChart(newData) {

  var t = d3.transition().duration(750);
  var formatPercent = d3.format(".0%");
  
  e = document.getElementById("dropdown");
  ageBracket = e.options[e.selectedIndex].text;
  
  colorChart = d3.scaleQuantize()
  .domain([d3.min(newData, function(d) { return +d.frequency; }), d3.max(newData, function(d) { return +d.frequency; })])
  .range(d3.schemeRdYlGn['8']);
  
  x.domain(newData.map(function(d) { return d.percent; }));
  y.domain([d3.min(newData, function(d) { return +d.frequency; }), d3.max(newData, function(d) { return +d.frequency; }) ]);

  var xAxis = d3.axisBottom(x).tickFormat(formatPercent).tickSizeOuter(0);
  var yAxis = d3.axisLeft(y).tickSizeOuter(0);
  
  d3.select('g.x').transition(t).call(xAxis);
  d3.select('g.y').transition(t).call(yAxis);

  var bar = g.selectAll("rect")
     .data(newData);
    
      bar.enter().append("rect")
	  .attr("x", function(d) { return x(d.percent); })
      .attr("y", function(d) { 
	     if (+d.frequency > 0){
		   return y(+d.frequency);
		   } else {
		   return y(0);
		    }
		   })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return Math.abs(y(+d.frequency) - y(0)) +1; })
      .style("fill", function(d) { return colorChart(+d.frequency); })
      .on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div	.html("For " + ageBracket + " year olds, a net worth of at least " + d.frequency.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " dollars is needed to be in net worth " + "percentile " + (d.percent*100).toFixed(0) + "%")	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
  
      bar.transition(t)
      .attr("x", function(d) { return x(d.percent); })
      .attr("y", function(d) { 
	     if (+d.frequency > 0){
		   return y(+d.frequency);
		   } else {
		   return y(0);
		    }
		   })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return Math.abs(y(+d.frequency) - y(0)) +1; });
      
  bar.exit().remove();
  
  //adjust the height of x label
  xLab.transition(t)
   .attr("y", function() {
     if (ageBracket == "18 - 24"){
		   return y(-15000);
		   } else if (ageBracket == "25 - 29") {
		   return y(-30000);
		   } else if (ageBracket == "30 - 34") {
     	   return y(-60000);
		    } else if (ageBracket == "35 - 39") {
		   return y(-105000);
		   } else if (ageBracket == "40 - 44") {
     	   return y(-200000);
		   } else if (ageBracket == "45 - 49") {
		   return y(-200000);
		   } else if (ageBracket == "50 - 54") {
     	   return y(-200000);
		   } else if (ageBracket == "55 - 59") {
		   return y(-300000);
		   } else if (ageBracket == "60 - 64") {
     	   return y(-300000);
		   } else {
		   return y(-300000);
		   }
   });
}

//GRAPH 2 STUFF

var svg2 = d3.select("#chart2_svg"),
    margin2 = {top: 10, right: 20, bottom: 30, left: 2},
    width2 = +svg.attr("width") - margin2.left - margin2.right,
    height2 = +svg.attr("height") - margin2.top - margin2.bottom;	
	  
var circles = d3.csvParse("percent,frequency\n0,50\n140,50\n0,125\n112,125\n0,200\n84,200\n0,275\n64,275\n0,350\n60,350\n0,425\n52,425\n0,500\n46,500\n0,575\n46,575\n0,650\n40,650\n0,725\n35,725");

var circColor = d3.scaleLinear()
    .domain([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19])
	.range(["#ea5353", "#88ea78", "#ea5353", "#88ea78", "#ea5353", "#88ea78", "#ea5353", "#88ea78",
	        "#ea5353", "#88ea78", "#ea5353", "#88ea78", "#ea5353", "#88ea78", "#ea5353", "#88ea78",
	        "#ea5353", "#88ea78", "#ea5353", "#88ea78"]);

var circ = svg2.selectAll("g")
    .data(circles)
    .enter().append("g")
    .attr("transform", "translate(" + margin2.left + "," + margin2.top + ")");
    
    circ.append("rect")
    .attr("class", "rectBar")
    .attr("width", 495)
	.attr("height", 30)
    .attr("x", function(d) { return +d.percent; })
	.attr("y", function(d) { return +d.frequency; })
    .style("fill", function(d, i) { return circColor(i); } );
          
    circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+30) + ")")
	  .text("18 - 24");   
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+105) + ")")
	  .text("25 - 29"); 
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+180) + ")")
	  .text("30 - 34"); 
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+255) + ")")
	  .text("35 - 39"); 
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+330) + ")")
	  .text("40 - 44"); 
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+405) + ")")
	  .text("45 - 49"); 
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+480) + ")")
	  .text("50 - 54"); 
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+555) + ")")
	  .text("55 - 59"); 
    circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+630) + ")")
	  .text("60 - 64");  
	circ.append("text")			
	  .attr("class", "barLabel")
	  .attr("transform", "translate("+ (margin2.left-2) + "," + (margin2.top+705) + ")")
	  .text("65 + "); 
	  
	//1  
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+61) + ")")
	  .text("35%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 145) + "," + (margin2.top+61) + ")")
	  .text("65%");
	//2
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*1)) + ")")
	  .text("28%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 115) + "," + (margin2.top+(61+75*1)) + ")")
	  .text("72%");
    //3
    circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*2)) + ")")
	  .text("21%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 88) + "," + (margin2.top+(61+75*2)) + ")")
	  .text("79%");
	//4  
    circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*3)) + ")")
	  .text("16%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 68) + "," + (margin2.top+(61+75*3)) + ")")
	  .text("84%");
    //5
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*4)) + ")")
	  .text("15%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 64) + "," + (margin2.top+(61+75*4)) + ")")
	  .text("85%");
    //6
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*5)) + ")")
	  .text("13%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 58) + "," + (margin2.top+(61+75*5)) + ")")
	  .text("87%");
    //7
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*6)) + ")")
	  .text("11%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 51) + "," + (margin2.top+(61+75*6)) + ")")
	  .text("89%");
    //8
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*7)) + ")")
	  .text("11%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 51) + "," + (margin2.top+(61+75*7)) + ")")
	  .text("89%");
    //9
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*8)) + ")")
	  .text("7%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 44) + "," + (margin2.top+(61+75*8)) + ")")
	  .text("93%");
    //10
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left+5) + "," + (margin2.top+(61+75*9)) + ")")
	  .text("5%");
	circ.append("text")			
	  .attr("class", "percentLabel")
	  .attr("transform", "translate("+ (margin2.left + 39) + "," + (margin2.top+(61+75*9)) + ")")
	  .text("95%");
    
//GRAPH 3 STUFF

var data1_3 = d3.csvParse("percent,frequency\n18 - 24,4400\n88,388350");
var data2_3 = d3.csvParse("percent,frequency\n25 - 29,9460\n62,594400");
var data3_3 = d3.csvParse("percent,frequency\n30 - 34,19400\n70,1373300");
var data4_3 = d3.csvParse("percent,frequency\n35 - 39,36320\n77,2814200");
var data5_3 = d3.csvParse("percent,frequency\n40 - 44,62200\n117,7282400");
var data6_3 = d3.csvParse("percent,frequency\n45 - 49,72070\n72,5216000");
var data7_3 = d3.csvParse("percent,frequency\n50 - 54,122100\n59,7222100");
var data8_3 = d3.csvParse("percent,frequency\n55 - 59,152900\n70,10813000");
var data9_3 = d3.csvParse("percent,frequency\n60 - 64,174000\n60,10604100");
var data10_3 = d3.csvParse("percent,frequency\n65 +,210500\n54,11572860");

//change bar chart based on dropdown selection
   d3.select('#dropdown3')
	  .on('change', function() {
	  var newData3 = eval(d3.select(this).property('value'));
	  document.getElementById('medianNet').innerHTML = newData3[0].frequency.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  document.getElementById('onePercentNet').innerHTML = newData3[1].frequency.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");  
	  document.getElementById('ageBrack2').innerHTML = newData3[0].percent;
	  document.getElementById('ageBrack3').innerHTML = newData3[0].percent;
	  document.getElementById('multiple').innerHTML = newData3[1].percent;
});
</script>

</body>

</html>
<?php get_footer();?>