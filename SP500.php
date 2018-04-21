<?php
/*
 *Template Name: SP500
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="<?=get_template_directory_uri();?>/js/d3-grid.js"></script>
<script type="text/javascript" src="<?=get_template_directory_uri();?>/js/d3-comparator.js"></script>

<style>
@import url('https://fonts.googleapis.com/css?family=Droid+Serif|Raleway');
body {
  color: black;
}

p {
  color: black;
}

h1 {
text-align: center;
color: #e34747;
font-size: 52px;
margin-bottom: 0px;
font-family: 'Droid Serif', serif;
}

h3, h4, h5, h6 {
text-align: center;
margin-bottom: 60px;
margin-top: 15px;
font-family: 'Raleway', sans-serif;
}

#subTitle {
width: 75%;
margin: 15px auto;
}

p {
color: black;
}

pre {
display: none;
}

#intro{
width: 80%;
margin: 0 auto;
}

#subTitle {
text-align: center;
margin-bottom: 60px;
}

#sortButtons {
margin-left: 21.5%;
}

.sort-btn {
color: black;
cursor: pointer;
border-radius: 2px;
font-family: 'Open Sans', sans-serif;
font-weight: 600;
height: 40px;
width: 150px;
border: 1px solid grey;
background-color: #d9c8ff;
outline: none;
}

#nameSort, #sizeSort, #industrySort {
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

#graph1 {
margin-left: 4%;
}

circle:hover {
opacity: .7;
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

a {
text-decoration: none;

}

</style>
<head>

<body>
      <h1>A Deep Dive into the S&P 500</h1>
	  <div id='intro'><!--start of intro-->
	  <h3>Visualizing every stock in the S&P 500 as tiny circles</h3>
		  <p>The S&P 500 is a U.S. stock market index composed of 500 large U.S. companies based on market capitalizations. Market capitalization simply refers to the size of a company. The larger the company, the larger the market cap. In the case of the S&P 500, companies with larger market caps make up a larger portion of the index.</p>
		  <p>Here's a visual that depicts each stock in the S&P 500 as a tiny circle. The size of the circle represents the market cap of the stock and the color represents the economic industry the stock is in. Hover over individual circles to display information about the stock.</p>
		  <p class='last_block_p'>&nbsp;</p>
	 </div><!--end of intro-->
	 
	 <div id='graph1_block'><!--start of graph 1 block-->
	  	     <h4 style='margin-bottom: 5px; margin-top: 10px;'>SORT STOCKS BY</h4>
			 
			<div id='sortButtons'>
						<div id="nameSort"><button class="sort-btn" data-sort="id" value="NAME">NAME</button></div>
						<div id="sizeSort"><button class="sort-btn" data-sort="size" value="MARKET CAP">MARKET CAP</button></div>
						<div id="industrySort"><button class="sort-btn" data-sort="color" value="INDUSTRY">INDUSTRY</button></div>
			</div>
		</div>

	    <div id='graph1'></div>
		
	 </div> <!--end of graph 1 block-->

<pre id='data'>
Company,size,Sector,id,color,y
3M Company,0.593972,Industrials,1,#ffca79,106
A. O. Smith Corporation,0.03981,Industrials,2,#ffca79,70
Abbott Laboratories,0.415229,Health Care,3,#ff5757,134
AbbVie Inc.,0.640057,Health Care,4,#ff5757,88
Accenture Plc Class A,0.393101,Information Technology,5,#43e8d8,124.5
Activision Blizzard Inc.,0.226276,Information Technology,6,#43e8d8,146.5
Acuity Brands Inc.,0.03147,Industrials,7,#ffca79,103.5
Adobe Systems Incorporated,0.360387,Information Technology,8,#43e8d8,83
Advance Auto Parts Inc.,0.031932,Consumer Discretionary,9,#dfdfdf,70.5
Advanced Micro Devices Inc.,0.049166,Information Technology,10,#43e8d8,141.5
AES Corporation,0.034237,Utilities,11,#ff79d8,149.5
Aetna Inc.,0.240402,Health Care,12,#ff5757,62.5
Affiliated Managers Group Inc.,0.048118,Financials,13,#d975f8,81.5
Aflac Incorporated,0.153805,Financials,14,#d975f8,126
Agilent Technologies Inc.,0.099327,Health Care,15,#ff5757,69.5
Air Products and Chemicals Inc.,0.151675,Materials,16,#660066,122
Akamai Technologies Inc.,0.038438,Information Technology,17,#43e8d8,144.5
Alaska Air Group Inc.,0.040946,Industrials,18,#ffca79,59
Albemarle Corporation,0.069256,Materials,19,#660066,52.5
Alexandria Real Estate Equities Inc.,0.050391,Real Estate,20,#ffff61,68
Alexion Pharmaceuticals Inc.,0.149188,Health Care,21,#ff5757,102.5
Align Technology Inc.,0.062765,Health Care,22,#ff5757,121
Allegion PLC,0.036494,Industrials,23,#ffca79,64
Allergan plc,0.336082,Industrials,24,#ffca79,94.5
Alliance Data Systems Corporation,0.048167,Information Technology,25,#43e8d8,141.5
Alliant Energy Corp,0.045107,Utilities,26,#ff79d8,97.5
Allstate Corporation,0.154712,Financials,27,#d975f8,104
Alphabet Inc. Class A,1.297788,Information Technology,28,#43e8d8,112
Alphabet Inc. Class C,1.295076,Information Technology,29,#43e8d8,64.5
Altria Group Inc.,0.555484,Consumer Staples,30,#363b74,101.5
Amazon.com Inc.,1.799505,Consumer Discretionary,31,#dfdfdf,149.5
Ameren Corporation,0.066158,Utilities,32,#ff79d8,113
American Airlines Group Inc.,0.089257,Industrials,33,#ffca79,72
American Electric Power Company Inc.,0.164597,Utilities,34,#ff79d8,119.5
American Express Company,0.303704,Financials,35,#d975f8,145
American International Group Inc.,0.250212,Financials,36,#d975f8,68
American Tower Corporation,0.280177,Real Estate,37,#ffff61,100.5
American Water Works Company Inc.,0.068276,Utilities,38,#ff79d8,79
Ameriprise Financial Inc.,0.098489,Financials,39,#d975f8,145
AmerisourceBergen Corporation,0.061227,Health Care,40,#ff5757,59.5
AMETEK Inc.,0.071456,Industrials,41,#ffca79,81.5
Amgen Inc.,0.632522,Health Care,42,#ff5757,51.5
Amphenol Corporation Class A,0.118818,Information Technology,43,#43e8d8,100
Anadarko Petroleum Corporation,0.113378,Energy,44,#88ff8b,137.5
Analog Devices Inc.,0.145607,Energy,45,#88ff8b,69.5
Andeavor,0.070156,Energy,46,#88ff8b,91.5
ANSYS Inc.,0.048827,Energy,47,#88ff8b,86
Anthem Inc.,0.223042,Health Care,48,#ff5757,73
Aon plc,0.170825,Financials,49,#d975f8,52
Apache Corporation,0.073463,Energy,50,#88ff8b,148
Apartment Investment and Management Company Class A,0.032624,Real Estate,51,#ffff61,142
Apple Inc.,3.814297,Information Technology,52,#43e8d8,107.5
Applied Materials Inc.,0.239462,Information Technology,53,#43e8d8,55.5
Archer-Daniels-Midland Company,0.116509,Consumer Staples,54,#363b74,101.5
Arconic Inc.,0.04672,Industrials,55,#ffca79,104.5
Arthur J. Gallagher & Co.,0.050439,Financials,56,#d975f8,131
Assurant Inc.,0.024033,Financials,57,#d975f8,85
AT&T Inc.,1.093362,Telecommunication Services,58,#1F7F89,101
Autodesk Inc.,0.11561,Information Technology,59,#43e8d8,97.5
Automatic Data Processing Inc.,0.224184,Information Technology,60,#43e8d8,111
AutoZone Inc.,0.071599,Consumer Discretionary,61,#dfdfdf,124.5
AvalonBay Communities Inc.,0.116044,Consumer Discretionary,62,#dfdfdf,88.5
Avery Dennison Corporation,0.040358,Materials,63,#660066,126.5
Baker Hughes a GE Company Class A,0.074056,Materials,64,#660066,93
Ball Corporation,0.066186,Materials,65,#660066,52
Bank of America Corporation,1.134707,Financials,66,#d975f8,121
Bank of New York Mellon Corporation,0.250976,Financials,67,#d975f8,72
Baxter International Inc.,0.149414,Health Care,68,#ff5757,147.5
BB&T Corporation,0.168559,Financials,69,#d975f8,90
Becton Dickinson and Company,0.204227,Health Care,70,#ff5757,60.5
Berkshire Hathaway Inc. Class B,1.639008,Financials,71,#d975f8,65
Best Buy Co. Inc.,0.06643,Consumer Discretionary,72,#dfdfdf,73
Biogen Inc.,0.312741,Health Care,73,#ff5757,131.5
BlackRock Inc.,0.249455,Financials,74,#d975f8,114.5
Boeing Company,0.652539,Industrials,75,#ffca79,141.5
BorgWarner Inc.,0.045565,Consumer Discretionary,76,#dfdfdf,52.5
Boston Properties Inc.,0.08568,Real Estate,77,#ffff61,144
Boston Scientific Corporation,0.182873,Health Care,78,#ff5757,143
Brighthouse Financial Inc.,0.026281,Financials,79,#d975f8,60
Bristol-Myers Squibb Company,0.480157,Health Care,80,#ff5757,79
Broadcom Limited,0.472659,Information Technology,81,#43e8d8,146.5
Brown-Forman Corporation Class B,0.049529,Consumer Staples,82,#363b74,98.5
C. R. Bard Inc.,0.107532,Industrials,83,#ffca79,81
C.H. Robinson Worldwide Inc.,0.047609,Industrials,84,#ffca79,71
CA Inc.,0.047976,Industrials,85,#ffca79,114.5
Cabot Oil & Gas Corporation,0.057918,Energy,86,#88ff8b,86.5
Cadence Design Systems Inc.,0.051633,Energy,87,#88ff8b,144
Campbell Soup Company,0.042524,Consumer Staples,88,#363b74,125.5
Capital One Financial Corporation,0.181168,Financials,89,#d975f8,68.5
Cardinal Health Inc.,0.097192,Financials,90,#d975f8,148
CarMax Inc.,0.059541,Consumer Discretionary,91,#dfdfdf,69.5
Carnival Corporation,0.123693,Consumer Discretionary,92,#dfdfdf,55.5
Caterpillar Inc.,0.342081,Industrials,93,#ffca79,94.5
CBOE Holdings Inc.,0.055549,Financials,94,#d975f8,117.5
CBRE Group Inc. Class A,0.051407,Real Estate,95,#ffff61,106
CBS Corporation Class B,0.099674,Consumer Discretionary,96,#dfdfdf,98
Celgene Corporation,0.521422,Health Care,97,#ff5757,69
Centene Corporation,0.071991,Health Care,98,#ff5757,121.5
CenterPoint Energy Inc.,0.059106,Utilities,99,#ff79d8,131.5
CenturyLink Inc.,0.047334,Telecommunication Services,100,#1F7F89,142
Cerner Corporation,0.10224,Health Care,101,#ff5757,136.5
CF Industries Holdings Inc.,0.038132,Materials,102,#660066,75.5
Charles Schwab Corporation,0.227503,Financials,103,#d975f8,119
Charter Communications Inc. Class A,0.340184,Consumer Discretionary,104,#dfdfdf,95
Chesapeake Energy Corporation,0.017125,Energy,105,#88ff8b,97
Chevron Corporation,1.025891,Energy,106,#88ff8b,68.5
Chipotle Mexican Grill Inc.,0.035326,Consumer Discretionary,107,#dfdfdf,78
Chubb Limited,0.310777,Financials,108,#d975f8,72
Church & Dwight Co. Inc.,0.060155,Consumer Staples,109,#363b74,145
Cigna Corporation,0.212593,Health Care,110,#ff5757,82
Cimarex Energy Co.,0.046594,Energy,111,#88ff8b,84
Cincinnati Financial Corporation,0.052858,Financials,112,#d975f8,72.5
Cintas Corporation,0.053602,Industrials,113,#ffca79,105.5
Cisco Systems Inc.,0.756657,Information Technology,114,#43e8d8,128.5
Citigroup Inc,0.901842,Information Technology,115,#43e8d8,111.5
Citizens Financial Group Inc.,0.08476,Financials,116,#d975f8,75.5
Citrix Systems Inc.,0.051175,Information Technology,117,#43e8d8,67
Clorox Company,0.081608,Consumer Staples,118,#363b74,104
CME Group Inc. Class A,0.207409,Financials,119,#d975f8,97.5
CMS Energy Corporation,0.060884,Utilities,120,#ff79d8,123.5
Coach Inc.,0.052798,Consumer Discretionary,121,#dfdfdf,138.5
Coca-Cola Company,0.822928,Consumer Discretionary,122,#dfdfdf,136
Cognizant Technology Solutions Corporation Class A,0.198807,Information Technology,123,#43e8d8,96
Colgate-Palmolive Company,0.299207,Consumer Staples,124,#363b74,79.5
Comcast Corporation Class A,0.816331,Consumer Discretionary,125,#dfdfdf,135.5
Comerica Incorporated,0.058759,Financials,126,#d975f8,87.5
Conagra Brands Inc.,0.065738,Consumer Staples,127,#363b74,57
Concho Resources Inc.,0.084465,Energy,128,#88ff8b,63
ConocoPhillips,0.269166,Energy,129,#88ff8b,112
Consolidated Edison Inc.,0.118369,Utilities,130,#ff79d8,114.5
Constellation Brands Inc. Class A,0.16244,Consumer Staples,131,#363b74,91
Cooper Companies Inc.,0.053014,Health Care,132,#ff5757,148
Corning Inc,0.125654,Health Care,133,#ff5757,99.5
Costco Wholesale Corporation,0.329824,Consumer Staples,134,#363b74,144
Coty Inc. Class A,0.036363,Consumer Staples,135,#363b74,65.5
Crown Castle International Corp,0.193158,Consumer Staples,136,#363b74,138
CSRA Inc.,0.024202,Information Technology,137,#43e8d8,138
CSX Corporation,0.220012,Industrials,138,#ffca79,67.5
Cummins Inc.,0.122862,Industrials,139,#ffca79,117.5
CVS Health Corporation,0.394054,Consumer Staples,140,#363b74,132.5
D.R. Horton Inc.,0.059119,Consumer Discretionary,141,#dfdfdf,141.5
Danaher Corporation,0.246493,Health Care,142,#ff5757,134.5
Darden Restaurants Inc.,0.048228,Consumer Discretionary,143,#dfdfdf,53
DaVita Inc.,0.042888,Consumer Discretionary,144,#dfdfdf,121
Deere & Company,0.183483,Industrials,145,#ffca79,148
Delphi Automotive PLC,0.126364,Industrials,146,#ffca79,62.5
Delta Air Lines Inc.,0.148158,Consumer Discretionary,147,#dfdfdf,137
DENTSPLY SIRONA Inc.,0.062358,Health Care,148,#ff5757,136.5
Devon Energy Corporation,0.082629,Health Care,149,#ff5757,108.5
Digital Realty Trust Inc.,0.112137,Energy,150,#88ff8b,92
Discover Financial Services,0.104768,Financials,151,#d975f8,93
Discovery Communications Inc. Class A,0.014664,Financials,152,#d975f8,139.5
Discovery Communications Inc. Class C,0.020099,Financials,153,#d975f8,83
DISH Network Corporation Class A,0.056106,Consumer Discretionary,154,#dfdfdf,102
Dollar General Corporation,0.093391,Consumer Discretionary,155,#dfdfdf,136.5
Dollar Tree Inc.,0.091911,Consumer Discretionary,156,#dfdfdf,127.5
Dominion Energy Inc,0.234313,Utilities,157,#ff79d8,52
Dover Corporation,0.065905,Industrials,158,#ffca79,143
DowDuPont Inc.,0.761148,Materials,159,#660066,90
Dr Pepper Snapple Group Inc.,0.078639,Consumer Staples,160,#363b74,146
DTE Energy Company,0.091946,Consumer Staples,161,#363b74,86
Duke Energy Corporation,0.279817,Utilities,162,#ff79d8,53.5
Duke Realty Corporation,0.048421,Real Estate,163,#ffff61,52
DXC Technology Co.,0.111905,Information Technology,164,#43e8d8,96.5
E*TRADE Financial Corporation,0.053787,Financials,165,#d975f8,88.5
Eastman Chemical Company,0.059261,Materials,166,#660066,66
Eaton Corp. Plc,0.160953,Materials,167,#660066,147
eBay Inc.,0.178694,Industrials,168,#ffca79,110.5
Ecolab Inc.,0.1595,Information Technology,169,#43e8d8,77
Edison International,0.120781,Materials,170,#660066,115
Edwards Lifesciences Corporation,0.109196,Health Care,171,#ff5757,119.5
Electronic Arts Inc.,0.172393,Information Technology,172,#43e8d8,92
Eli Lilly and Company,0.369359,Information Technology,173,#43e8d8,71.5
Emerson Electric Co.,0.189599,Information Technology,174,#43e8d8,127
Entergy Corporation,0.065117,Utilities,175,#ff79d8,54
Envision Healthcare Corp.,0.023266,Health Care,176,#ff5757,144
EOG Resources Inc.,0.25023,Energy,177,#88ff8b,107.5
EQT Corporation,0.050979,Energy,178,#88ff8b,124
Equifax Inc.,0.052901,Industrials,179,#ffca79,102
Equinix Inc.,0.163662,Real Estate,180,#ffff61,86
Equity Residential,0.114102,Real Estate,181,#ffff61,150
Essex Property Trust Inc.,0.078593,Real Estate,182,#ffff61,135
Estee Lauder Companies Inc. Class A,0.114978,Real Estate,183,#ffff61,137
Everest Re Group Ltd.,0.04294,Consumer Staples,184,#363b74,149.5
Eversource Energy,0.090184,Utilities,185,#ff79d8,76
Exelon Corporation,0.166666,Utilities,186,#ff79d8,55.5
Expedia Inc.,0.079227,Consumer Discretionary,187,#dfdfdf,96
Expeditors International of Washington Inc.,0.047683,Industrials,188,#ffca79,56.5
Express Scripts Holding Company,0.163844,Health Care,189,#ff5757,76.5
Extra Space Storage Inc.,0.045586,Real Estate,190,#ffff61,148.5
Exxon Mobil Corporation,1.581928,Energy,191,#88ff8b,73
F5 Networks Inc.,0.035142,Information Technology,192,#43e8d8,87.5
Facebook Inc. Class A,1.902894,Information Technology,193,#43e8d8,101.5
Fastenal Company,0.058779,Industrials,194,#ffca79,88.5
Federal Realty Investment Trust,0.042038,Real Estate,195,#ffff61,92
FedEx Corporation,0.24639,Industrials,196,#ffca79,139.5
Fidelity National Information Services Inc.,0.141881,Information Technology,197,#43e8d8,99
Fifth Third Bancorp,0.09475,Financials,198,#d975f8,72
FirstEnergy Corp.,0.064597,Utilities,199,#ff79d8,96.5
Fiserv Inc.,0.12254,Information Technology,200,#43e8d8,58.5
FLIR Systems Inc.,0.025035,Information Technology,201,#43e8d8,62.5
Flowserve Corporation,0.025037,Industrials,202,#ffca79,96
Fluor Corporation,0.025745,Industrials,203,#ffca79,106
FMC Corporation,0.056484,Materials,204,#660066,70.5
Foot Locker Inc.,0.021982,Consumer Discretionary,205,#dfdfdf,116.5
Ford Motor Company,0.213353,Consumer Discretionary,206,#dfdfdf,146
Fortive Corp.,0.098131,Industrials,207,#ffca79,86.5
Fortune Brands Home & Security Inc.,0.045128,Industrials,208,#ffca79,51.5
Franklin Resources Inc.,0.065552,Financials,209,#d975f8,63.5
Freeport-McMoRan Inc.,0.08893,Materials,210,#660066,106.5
Gap Inc.,0.028862,Consumer Discretionary,211,#dfdfdf,79.5
Garmin Ltd.,0.027903,Consumer Discretionary,212,#dfdfdf,115.5
Gartner Inc.,0.052727,Information Technology,213,#43e8d8,141
General Dynamics Corporation,0.263124,Industrials,214,#ffca79,101.5
General Electric Company,0.974827,Industrials,215,#ffca79,95
General Mills Inc.,0.149341,Consumer Staples,216,#363b74,51.5
General Motors Company,0.235945,Consumer Discretionary,217,#dfdfdf,120
Genuine Parts Company,0.059079,Consumer Discretionary,218,#dfdfdf,56.5
GGP Inc.,0.06113,Consumer Discretionary,219,#dfdfdf,133.5
Gilead Sciences Inc.,0.500148,Health Care,220,#ff5757,102.5
Global Payments Inc.,0.067937,Information Technology,221,#43e8d8,98.5
Goldman Sachs Group Inc.,0.383082,Financials,222,#d975f8,105
Goodyear Tire & Rubber Company,0.037541,Consumer Discretionary,223,#dfdfdf,133.5
H&R Block Inc.,0.025199,Industrials,224,#ffca79,71.5
Halliburton Company,0.172618,Energy,225,#88ff8b,148.5
Hanesbrands Inc.,0.042956,Consumer Discretionary,226,#dfdfdf,120.5
Harley-Davidson Inc.,0.039445,Consumer Discretionary,227,#dfdfdf,139.5
Harris Corporation,0.072933,Information Technology,228,#43e8d8,128.5
Hartford Financial Services Group Inc.,0.093023,Information Technology,229,#43e8d8,90.5
Hasbro Inc.,0.048882,Consumer Discretionary,230,#dfdfdf,91.5
HCA Healthcare Inc,0.102394,Consumer Discretionary,231,#dfdfdf,141
HCP Inc.,0.062559,Real Estate,232,#ffff61,67.5
Helmerich & Payne Inc.,0.02429,Energy,233,#88ff8b,105
Henry Schein Inc.,0.058281,Health Care,234,#ff5757,113
Hershey Company,0.071556,Consumer Staples,235,#363b74,144
Hess Corporation,0.052842,Energy,236,#88ff8b,108.5
Hewlett Packard Enterprise Co.,0.104174,Information Technology,237,#43e8d8,90.5
Hilton Worldwide Holdings Inc,0.063442,Information Technology,238,#43e8d8,74.5
Hologic Inc.,0.04839,Health Care,239,#ff5757,52
Home Depot Inc.,0.864546,Consumer Discretionary,240,#dfdfdf,67.5
Honeywell International Inc.,0.488774,Consumer Discretionary,241,#dfdfdf,117
Hormel Foods Corporation,0.039151,Consumer Staples,242,#363b74,139.5
Host Hotels & Resorts Inc.,0.063146,Real Estate,243,#ffff61,144.5
HP Inc.,0.15145,Information Technology,244,#43e8d8,93
Humana Inc.,0.161272,Health Care,245,#ff5757,68
Huntington Bancshares Incorporated,0.066208,Financials,246,#d975f8,150
IDEXX Laboratories Inc.,0.065644,Health Care,247,#ff5757,142
IHS Markit Ltd.,0.080405,Industrials,248,#ffca79,132.5
Illinois Tool Works Inc.,0.214606,Industrials,249,#ffca79,54.5
Illumina Inc.,0.138861,Health Care,250,#ff5757,111.5
Incyte Corporation,0.092049,Health Care,251,#ff5757,100.5
Ingersoll-Rand Plc,0.10676,Industrials,252,#ffca79,136
Intel Corporation,0.815984,Information Technology,253,#43e8d8,83.5
Intercontinental Exchange Inc.,0.181574,Financials,254,#d975f8,74
International Business Machines Corporation,0.582452,Information Technology,255,#43e8d8,119
International Flavors & Fragrances Inc.,0.052716,Information Technology,256,#43e8d8,61
International Paper Company,0.110503,Materials,257,#660066,137
Interpublic Group of Companies Inc.,0.036905,Consumer Discretionary,258,#dfdfdf,143
Intuit Inc.,0.164283,Materials,259,#660066,149
Intuitive Surgical Inc.,0.181566,Health Care,260,#ff5757,82
Invesco Ltd.,0.063878,Financials,261,#d975f8,53
Iron Mountain Inc.,0.049083,Financials,262,#d975f8,73
J. M. Smucker Company,0.057843,Industrials,263,#ffca79,144.5
J.B. Hunt Transport Services Inc.,0.04185,Industrials,264,#ffca79,138
Jacobs Engineering Group Inc.,0.031913,Industrials,265,#ffca79,59.5
Johnson & Johnson,1.688643,Health Care,266,#ff5757,53.5
Johnson Controls International plc,0.169771,Industrials,267,#ffca79,133.5
JPMorgan Chase & Co.,1.537914,Financials,268,#d975f8,136
Juniper Networks Inc.,0.048599,Information Technology,269,#43e8d8,113.5
Kansas City Southern,0.052857,Industrials,270,#ffca79,135
Kellogg Company,0.076385,Consumer Staples,271,#363b74,119.5
KeyCorp,0.092415,Financials,272,#d975f8,137.5
Kimberly-Clark Corporation,0.201585,Consumer Staples,273,#363b74,132
Kimco Realty Corporation,0.037992,Real Estate,274,#ffff61,84.5
Kinder Morgan Inc Class P,0.174338,Energy,275,#88ff8b,84.5
KLA-Tencor Corporation,0.074351,Information Technology,276,#43e8d8,73.5
Kohl's Corporation,0.037127,Information Technology,277,#43e8d8,121.5
Kraft Heinz Company,0.224469,Consumer Discretionary,278,#dfdfdf,136
Kroger Co.,0.088197,Consumer Staples,279,#363b74,147.5
L Brands Inc.,0.043833,Consumer Discretionary,280,#dfdfdf,134
L3 Technologies Inc.,0.068692,Industrials,281,#ffca79,100.5
Laboratory Corporation of America Holdings,0.072014,Health Care,282,#ff5757,129
Lam Research Corporation,0.133724,Information Technology,283,#43e8d8,99
Leggett & Platt Incorporated,0.028261,Consumer Discretionary,284,#dfdfdf,99.5
Lennar Corporation Class A,0.048983,Consumer Discretionary,285,#dfdfdf,90
Leucadia National Corporation,0.037092,Financials,286,#d975f8,66
Level 3 Communications Inc.,0.071694,Telecommunication Services,287,#1F7F89,71
Lincoln National Corporation,0.075782,Financials,288,#d975f8,107.5
LKQ Corporation,0.048984,Consumer Discretionary,289,#dfdfdf,76
Lockheed Martin Corporation,0.354909,Industrials,290,#ffca79,119
Loews Corporation,0.061104,Financials,291,#d975f8,110.5
Lowe's Companies Inc.,0.304305,Financials,292,#d975f8,122.5
LyondellBasell Industries NV,0.145781,Materials,293,#660066,102.5
M&T Bank Corporation,0.109412,Financials,294,#d975f8,120
Macerich Company,0.026873,Real Estate,295,#ffff61,95.5
Macy's Inc,0.030925,Real Estate,296,#ffff61,148.5
Marathon Oil Corporation,0.046813,Energy,297,#88ff8b,104
Marathon Petroleum Corporation,0.127618,Energy,298,#88ff8b,141.5
Marriott International Inc. Class A,0.156979,Energy,299,#88ff8b,133.5
Marsh & McLennan Companies Inc.,0.196001,Financials,300,#d975f8,88
Martin Marietta Materials Inc.,0.058714,Materials,301,#660066,137.5
Masco Corporation,0.055679,Industrials,302,#ffca79,111.5
Mastercard Incorporated Class A,0.619044,Information Technology,303,#43e8d8,63.5
Mattel Inc.,0.023458,Consumer Discretionary,304,#dfdfdf,71.5
McCormick & Company Incorporated,0.054633,Consumer Staples,305,#363b74,104.5
McDonald's Corporation,0.59328,Consumer Discretionary,306,#dfdfdf,103
McKesson Corporation,0.145873,Health Care,307,#ff5757,147
Medtronic plc,0.511633,Health Care,308,#ff5757,90
Merck & Co. Inc.,0.839355,Health Care,309,#ff5757,120.5
MetLife Inc.,0.244585,Financials,310,#d975f8,116
Mettler-Toledo International Inc.,0.076621,Health Care,311,#ff5757,134.5
MGM Resorts International,0.078535,Consumer Discretionary,312,#dfdfdf,97
Michael Kors Holdings Ltd,0.032556,Consumer Discretionary,313,#dfdfdf,101.5
Microchip Technology Incorporated,0.097168,Information Technology,314,#43e8d8,92.5
Micron Technology Inc.,0.18661,Information Technology,315,#43e8d8,109
Microsoft Corporation,2.703617,Information Technology,316,#43e8d8,113
Mid-America Apartment Communities Inc.,0.0562,Information Technology,317,#43e8d8,112.5
Mohawk Industries Inc.,0.074105,Consumer Discretionary,318,#dfdfdf,137.5
Molson Coors Brewing Company Class B,0.07345,Consumer Staples,319,#363b74,55
Mondelez International Inc. Class A,0.284641,Consumer Staples,320,#363b74,69.5
Monsanto Company,0.243903,Materials,321,#660066,74.5
Monster Beverage Corporation,0.108633,Consumer Staples,322,#363b74,60.5
Moody's Corporation,0.106134,Financials,323,#d975f8,64
Morgan Stanley,0.313639,Financials,324,#d975f8,72
Mosaic Company,0.033662,Materials,325,#660066,139.5
Motorola Solutions Inc.,0.064836,Information Technology,326,#43e8d8,53
Mylan N.V.,0.077527,Health Care,327,#ff5757,72
Nasdaq Inc.,0.040036,Health Care,328,#ff5757,126
National Oilwell Varco Inc.,0.061966,Energy,329,#88ff8b,104.5
Navient Corp,0.019779,Financials,330,#d975f8,67
NetApp Inc.,0.052537,Information Technology,331,#43e8d8,104
Netflix Inc.,0.371683,Information Technology,332,#43e8d8,80
Newell Brands Inc,0.09598,Consumer Discretionary,333,#dfdfdf,149.5
Newfield Exploration Company,0.025259,Energy,334,#88ff8b,71.5
Newmont Mining Corporation,0.094536,Materials,335,#660066,80
News Corporation Class A,0.02275,Consumer Discretionary,336,#dfdfdf,140
News Corporation Class B,0.006854,Consumer Discretionary,337,#dfdfdf,141
NextEra Energy Inc.,0.322309,Utilities,338,#ff79d8,62
Nielsen Holdings Plc,0.062328,Industrials,339,#ffca79,147
NIKE Inc. Class B,0.32601,Consumer Discretionary,340,#dfdfdf,132
NiSource Inc,0.039756,Consumer Discretionary,341,#dfdfdf,97.5
Noble Energy Inc.,0.05989,Energy,342,#88ff8b,70.5
Nordstrom Inc.,0.024924,Consumer Discretionary,343,#dfdfdf,78.5
Norfolk Southern Corporation,0.172621,Industrials,344,#ffca79,121.5
Northern Trust Corporation,0.088597,Financials,345,#d975f8,146.5
Northrop Grumman Corporation,0.225914,Industrials,346,#ffca79,103.5
NRG Energy Inc.,0.035276,Utilities,347,#ff79d8,116.5
Nucor Corporation,0.081721,Materials,348,#660066,144.5
NVIDIA Corporation,0.523154,Information Technology,349,#43e8d8,113.5
Occidental Petroleum Corporation,0.21919,Energy,350,#88ff8b,148
Omnicom Group Inc,0.079698,Consumer Discretionary,351,#dfdfdf,145
ONEOK Inc.,0.099245,Energy,352,#88ff8b,123
Oracle Corporation,0.675103,Information Technology,353,#43e8d8,79
O'Reilly Automotive Inc.,0.083033,Consumer Discretionary,354,#dfdfdf,131.5
PACCAR Inc,0.115696,Consumer Discretionary,355,#dfdfdf,135.5
Packaging Corporation of America,0.051074,Materials,356,#660066,60
Parker-Hannifin Corporation,0.108713,Industrials,357,#ffca79,144
Patterson Companies Inc.,0.014241,Health Care,358,#ff5757,136
Paychex Inc.,0.086681,Information Technology,359,#43e8d8,147
PayPal Holdings Inc,0.335781,Information Technology,360,#43e8d8,67
Pentair plc,0.051605,Industrials,361,#ffca79,120
People's United Financial Inc.,0.027581,Financials,362,#d975f8,92
PepsiCo Inc.,0.761219,Consumer Staples,363,#363b74,140.5
PerkinElmer Inc.,0.034399,Health Care,364,#ff5757,120.5
Perrigo Co. Plc,0.052558,Health Care,365,#ff5757,109.5
Pfizer Inc.,0.984686,Health Care,366,#ff5757,138.5
PG&E Corporation,0.164659,Utilities,367,#ff79d8,64.5
Philip Morris International Inc.,0.833943,Consumer Staples,368,#363b74,73.5
Phillips 66,0.178047,Energy,369,#88ff8b,129.5
Pinnacle West Capital Corporation,0.044941,Utilities,370,#ff79d8,134
Pioneer Natural Resources Company,0.108254,Energy,371,#88ff8b,81.5
PNC Financial Services Group Inc.,0.292669,Financials,372,#d975f8,100
PPG Industries Inc.,0.129486,Materials,373,#660066,101.5
PPL Corporation,0.123988,Utilities,374,#ff79d8,67.5
Praxair Inc.,0.180635,Materials,375,#660066,77
Priceline Group Inc,0.425548,Materials,376,#660066,55.5
Principal Financial Group Inc.,0.077859,Financials,377,#d975f8,108
Procter & Gamble Company,1.117324,Consumer Staples,378,#363b74,113.5
Progressive Corporation,0.12879,Financials,379,#d975f8,135
Prologis Inc.,0.158713,Real Estate,380,#ffff61,85
Prudential Financial Inc.,0.20797,Financials,381,#d975f8,58.5
Public Service Enterprise Group Inc,0.107326,Utilities,382,#ff79d8,124
Public Storage,0.149171,Real Estate,383,#ffff61,83.5
PulteGroup Inc.,0.034857,Consumer Discretionary,384,#dfdfdf,122
PVH Corp.,0.047786,Consumer Discretionary,385,#dfdfdf,143
Qorvo Inc.,0.043774,Information Technology,386,#43e8d8,60
QUALCOMM Incorporated,0.359258,Information Technology,387,#43e8d8,70
Quanta Services Inc.,0.025585,Industrials,388,#ffca79,121.5
Quest Diagnostics Incorporated,0.065063,Health Care,389,#ff5757,119.5
Quintiles IMS Holdings Inc.,0.067121,Health Care,390,#ff5757,130.5
Ralph Lauren Corporation Class A,0.024164,Health Care,391,#ff5757,78.5
Range Resources Corporation,0.020069,Energy,392,#88ff8b,105
Raymond James Financial Inc.,0.049032,Financials,393,#d975f8,97.5
Raytheon Company,0.249392,Industrials,394,#ffca79,138
Realty Income Corporation,0.074206,Real Estate,395,#ffff61,77.5
Red Hat Inc.,0.0897,Information Technology,396,#43e8d8,146
Regency Centers Corporation,0.043113,Real Estate,397,#ffff61,96
Regeneron Pharmaceuticals Inc.,0.152663,Health Care,398,#ff5757,125.5
Regions Financial Corporation,0.079282,Financials,399,#d975f8,89
Republic Services Inc.,0.071636,Industrials,400,#ffca79,105.5
ResMed Inc.,0.052098,Health Care,401,#ff5757,86.5
Robert Half International Inc.,0.028449,Industrials,402,#ffca79,72.5
Rockwell Automation Inc.,0.106502,Industrials,403,#ffca79,50.5
Rockwell Collins Inc.,0.09858,Industrials,404,#ffca79,58
Roper Technologies Inc.,0.113051,Industrials,405,#ffca79,62
Ross Stores Inc.,0.11203,Consumer Discretionary,406,#dfdfdf,103.5
Royal Caribbean Cruises Ltd.,0.094926,Consumer Discretionary,407,#dfdfdf,117.5
S&P Global Inc.,0.186997,Consumer Discretionary,408,#dfdfdf,76.5
salesforce.com inc.,0.303048,Information Technology,409,#43e8d8,118.5
SBA Communications Corp. Class A,0.081415,Real Estate,410,#ffff61,68
SCANA Corporation,0.038126,Utilities,411,#ff79d8,114
Schlumberger NV,0.440174,Energy,412,#88ff8b,134.5
Scripps Networks Interactive Inc. Class A,0.037364,Consumer Discretionary,413,#dfdfdf,58.5
Seagate Technology PLC,0.043665,Information Technology,414,#43e8d8,138
Sealed Air Corporation,0.037838,Materials,415,#660066,70.5
Sempra Energy,0.136692,Utilities,416,#ff79d8,68
Sherwin-Williams Company,0.129466,Materials,417,#660066,93.5
Signet Jewelers Limited,0.018824,Consumer Discretionary,418,#dfdfdf,68
Simon Property Group Inc.,0.232105,Real Estate,419,#ffff61,136.5
Skyworks Solutions Inc.,0.092803,Information Technology,420,#43e8d8,117
SL Green Realty Corp.,0.045636,Real Estate,421,#ffff61,79
Snap-on Incorporated,0.039123,Consumer Discretionary,422,#dfdfdf,69.5
Southern Company,0.231956,Utilities,423,#ff79d8,102
Southwest Airlines Co.,0.136915,Industrials,424,#ffca79,62
Stanley Black & Decker Inc.,0.107345,Consumer Discretionary,425,#dfdfdf,125.5
Staples Inc.,0.000241,Consumer Discretionary,426,#dfdfdf,82.5
Starbucks Corporation,0.368137,Consumer Discretionary,427,#dfdfdf,63.5
State Street Corporation,0.166674,Financials,428,#d975f8,68.5
Stericycle Inc.,0.027339,Industrials,429,#ffca79,127
Stryker Corporation,0.214254,Health Care,430,#ff5757,58.5
SunTrust Banks Inc.,0.125108,Financials,431,#d975f8,57
Symantec Corporation,0.098768,Information Technology,432,#43e8d8,134.5
Synchrony Financial,0.101136,Financials,433,#d975f8,107
Synopsys Inc.,0.056531,Information Technology,434,#43e8d8,92
Sysco Corporation,0.121814,Consumer Staples,435,#363b74,85
T. Rowe Price Group,0.095178,Financials,436,#d975f8,148.5
Target Corporation,0.150809,Consumer Discretionary,437,#dfdfdf,86
TE Connectivity Ltd.,0.135695,Information Technology,438,#43e8d8,96
TechnipFMC Plc,0.056354,Energy,439,#88ff8b,96.5
Texas Instruments Incorporated,0.399861,Information Technology,440,#43e8d8,91
Textron Inc.,0.065412,Industrials,441,#ffca79,128.5
Thermo Fisher Scientific Inc.,0.353267,Health Care,442,#ff5757,55
Tiffany & Co.,0.042865,Consumer Discretionary,443,#dfdfdf,111.5
Time Warner Inc.,0.370176,Consumer Discretionary,444,#dfdfdf,62.5
TJX Companies Inc,0.21558,Consumer Discretionary,445,#dfdfdf,95
Torchmark Corporation,0.040139,Financials,446,#d975f8,63
Total System Services Inc.,0.051307,Information Technology,447,#43e8d8,79
Tractor Supply Company,0.037507,Consumer Discretionary,448,#dfdfdf,78
TransDigm Group Incorporated,0.061347,Industrials,449,#ffca79,122.5
Travelers Companies Inc.,0.156759,Financials,450,#d975f8,52.5
TripAdvisor Inc.,0.022765,Consumer Discretionary,451,#dfdfdf,98
Twenty-First Century Fox Inc. Class A,0.131288,Consumer Discretionary,452,#dfdfdf,118.5
Twenty-First Century Fox Inc. Class B,0.053571,Consumer Discretionary,453,#dfdfdf,90.5
Tyson Foods Inc. Class A,0.08921,Consumer Staples,454,#363b74,119.5
U.S. Bancorp,0.393897,Financials,455,#d975f8,91.5
UDR Inc.,0.047087,Real Estate,456,#ffff61,149
Ulta Beauty Inc,0.060763,Real Estate,457,#ffff61,55.5
Under Armour Inc. Class A,0.01401,Consumer Discretionary,458,#dfdfdf,65.5
Under Armour Inc. Class C,0.01317,Consumer Discretionary,459,#dfdfdf,101
Union Pacific Corporation,0.420778,Industrials,460,#ffca79,54
United Continental Holdings Inc.,0.069105,Industrials,461,#ffca79,101
United Parcel Service Inc. Class B,0.373946,Industrials,462,#ffca79,50.5
United Rentals Inc.,0.050737,Industrials,463,#ffca79,93
United Technologies Corporation,0.392811,Industrials,464,#ffca79,60
UnitedHealth Group Incorporated,0.875782,Industrials,465,#ffca79,133.5
Universal Health Services Inc. Class B,0.04452,Industrials,466,#ffca79,142
Unum Group,0.052483,Financials,467,#d975f8,107
V.F. Corporation,0.092735,Consumer Discretionary,468,#dfdfdf,81
Valero Energy Corporation,0.149393,Energy,469,#88ff8b,112.5
Varian Medical Systems Inc.,0.046316,Health Care,470,#ff5757,127
Ventas Inc.,0.11197,Real Estate,471,#ffff61,62.5
VeriSign Inc.,0.043594,Information Technology,472,#43e8d8,141.5
Verisk Analytics Inc,0.058064,Industrials,473,#ffca79,115
Verizon Communications Inc.,0.936835,Telecommunication Services,474,#1F7F89,96
Vertex Pharmaceuticals Incorporated,0.17954,Health Care,475,#ff5757,71
Viacom Inc. Class B,0.0445,Consumer Discretionary,476,#dfdfdf,111.5
Visa Inc. Class A,0.897134,Information Technology,477,#43e8d8,128
Vornado Realty Trust,0.058723,Real Estate,478,#ffff61,57
Vulcan Materials Company,0.070398,Materials,479,#660066,70.5
W.W. Grainger Inc.,0.042949,Materials,480,#660066,55
Walgreens Boots Alliance Inc,0.348272,Consumer Staples,481,#363b74,106
Wal-Mart Stores Inc.,0.545114,Consumer Staples,482,#363b74,123
Walt Disney Company,0.707739,Consumer Discretionary,483,#dfdfdf,143
Waste Management Inc.,0.147186,Industrials,484,#ffca79,77.5
Waters Corporation,0.068639,Health Care,485,#ff5757,115.5
WEC Energy Group Inc,0.095475,Utilities,486,#ff79d8,139.5
Wells Fargo & Company,1.109112,Financials,487,#d975f8,139
Welltower Inc.,0.125169,Real Estate,488,#ffff61,144.5
Western Digital Corporation,0.12193,Information Technology,489,#43e8d8,147.5
Western Union Company,0.041117,Information Technology,490,#43e8d8,91
WestRock Co.,0.066638,Information Technology,491,#43e8d8,148
Weyerhaeuser Company,0.115937,Materials,492,#660066,56
Whirlpool Corporation,0.059172,Consumer Discretionary,493,#dfdfdf,136.5
Williams Companies Inc.,0.117158,Consumer Discretionary,494,#dfdfdf,123.5
Willis Towers Watson Public Limited Company,0.094976,Financials,495,#d975f8,144
Wyndham Worldwide Corporation,0.049529,Consumer Discretionary,496,#dfdfdf,144.5
Wynn Resorts Limited,0.05479,Consumer Discretionary,497,#dfdfdf,118.5
Xcel Energy Inc.,0.114482,Utilities,498,#ff79d8,132.5
Xerox Corporation,0.032023,Information Technology,499,#43e8d8,78
Xilinx Inc.,0.081603,Information Technology,500,#43e8d8,97.5
XL Group Ltd,0.048683,Financials,501,#d975f8,75
Xylem Inc.,0.053392,Industrials,502,#ffca79,95
Yum! Brands Inc.,0.121638,Consumer Discretionary,503,#dfdfdf,92.5
Zimmer Biomet Holdings Inc.,0.108027,Health Care,504,#ff5757,109
Zions Bancorporation,0.041665,Financials,505,#d975f8,65
Zoetis Inc. Class A,0.148098,Health Care,506,#ff5757,144</pre>

<script>

var width = 1200,
    height = 800;

var grid = d3.layout.grid()
  .size([700, 800]);

var size = d3.scale.sqrt()
  .domain([0, 4])
  .range([0, 18]);

var sortBy = {
  id: d3.comparator()
    .order(d3.ascending, function(d) { return +d.id; }),
  color: d3.comparator()
    .order(d3.ascending, function(d) { return d.color; })
    .order(d3.descending, function(d) { return d.size; })
    .order(d3.ascending, function(d) { return d.id; }),
  size: d3.comparator()
    .order(d3.descending, function(d) { return d.size; })
    .order(d3.ascending, function(d) { return d.color; })
    .order(d3.ascending, function(d) { return d.id; })
};

var data = d3.csv.parse(d3.select("pre#data").text() );

// Define the div for the tooltip
var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var svg = d3.select("#graph1")
  .append("svg")
  .attr("width", 1300)
  .attr("height", 900)
.append("g")
  .attr("transform", "translate(20, 50)");

d3.selectAll(".sort-btn")
  .on("click", function(d) {
    d3.event.preventDefault();
    data.sort(sortBy[this.dataset.sort]);
    update();
  });

update();

function update() {
  var node = svg.selectAll(".node")
    .data(grid(data), function(d) { return d.id; });
	
  node.enter().append("circle")
    .attr("class", "node")
    .attr("r", 1e-9)
    .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; })
    .style("fill", function(d) { return d.color; })
	.style("stroke", "black")
        .on("mouseover", function(d) {		
            div.transition()		
                .duration(200)		
                .style("opacity", .95);		
            div	.html("<b>" + d.Company +"</b>" + "<br/>"  + parseFloat(d.size).toFixed(2) + "% of S&P 500" + "<br/>" + "Industry: " + d.Sector)	
                .style("left", (d3.event.pageX) + "px")		
                .style("top", (d3.event.pageY - 28) + "px");	
            })					
        .on("mouseout", function(d) {		
            div.transition()		
                .duration(500)		
                .style("opacity", 0);	
        });
		
  node.transition().duration(500).delay(function(d, i) { return i * 5; })
    .attr("r", function(d) { return size(d.size); })
    .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });
  node.exit().transition()
    .attr("r", 1e-9)
    .remove();
};	


</script>
</body>
</html>

<?php get_footer();?>