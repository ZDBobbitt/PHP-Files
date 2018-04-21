<?php
/*
 *Template Name: random_portfolio
 *Template Post Type: post
 */
 
 get_header(); ?>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore.js" type="text/javascript"></script>
  <script src="https://d3js.org/d3.v4.min.js"></script>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Advent+Pro:500);
    @import url(https://fonts.googleapis.com/css?family=Work+Sans:500);
    @import url(https://fonts.googleapis.com/css?family=Nunito);
    @import url('https://fonts.googleapis.com/css?family=Lato');
	
    body {
      text-align: center;
    }
    p {
      font-family: 'Advent Pro', sans-serif;
      font-size: 20px;
    }
    
    span {
      font-family: 'Work Sans', sans-serif;
	  font-size: 18px;
    }
    
    #pillars {
      font-size: 24px;
    }
    
    #visuals {
      font-size: 14px;
      margin-top: -5px;
      margin-bottom: 20px;
    }
    
    #appName {
      color: black;
    }
    
    #timeOut {
      font-family: 'Work Sans', sans-serif;
	  color: #308e90;
	  font-size: 22px;
    }
    
    hr {
      width: 40%;
    }
    
    #title-bottom-line {
      margin-bottom: 30px;
    }
    
    input[type=range] {
      -webkit-appearance: none;
      margin: 18px 0;
      width: 60%;
    }
    
    input[type=range]:focus {
      outline: none;
    }
	
	#sampleSizeValue::-webkit-slider-runnable-track {
      background: #4ba9ab;
    }
    
    #sampleSizeValue:focus::-webkit-slider-runnable-track {
      background: #4ba9ab;
    }
    
    #sampleSizeValue::-moz-range-track {
      background: #4ba9ab;
    }
    
    input[type=range]::-webkit-slider-runnable-track {
      width: 60%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #ac74bd;
      border-radius: 1.3px;
      border: 0.2px solid #010101;
    }
    
    input[type=range]::-webkit-slider-thumb {
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      border: 1px solid #000000;
      height: 30px;
      width: 16px;
      border-radius: 3px;
      background: #ffffff;
      cursor: pointer;
      -webkit-appearance: none;
      margin-top: -14px;
    }
    
    input[type=range]:focus::-webkit-slider-runnable-track {
      background: #ac74bd;
    }
    
    input[type=range]::-moz-range-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      background: #ac74bd;
      border-radius: 1.3px;
      border: 0.2px solid #010101;
    }
    
    input[type=range]::-moz-range-thumb {
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      border: 1px solid #000000;
      height: 30px;
      width: 16px;
      border-radius: 3px;
      background: #ffffff;
      cursor: pointer;
    }
    
    input[type=range]::-ms-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      background: transparent;
      border-color: transparent;
      border-width: 16px 0;
      color: transparent;
    }
    
    input[type=range]::-ms-thumb {
      box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
      border: 1px solid #000000;
      height: 30px;
      width: 16px;
      border-radius: 3px;
      background: #ffffff;
      cursor: pointer;
    }
	  
	pre {
		display: none;
	}
	
	table {
	margin: 0 auto;
	border-collapse: collapse; 
    border-spacing: 0;
	font-family: 'Nunito', sans-serif;
	color: black;
	}
	
    td, th {
	border: 1px solid #CCC;
	}
	
	th {
	background: #F3F3F3; /* Light grey background */
    font-weight: bold;
	}
	
	button {
	border-radius: 5px;
	color: #2d7274;
	background: white;
	border: solid 1px black;
	padding: 8px 6px;
	margin-top: 25px;
	}
	
	button:hover, button:focus {
	background: #eee;
	cursor: pointer;
	outline: none;
	}
	
	#words {
		color: black;
		font-size: 20px;
	}
	
	#sampleSizeOut {
		color: black;
		font-size: 24px;
	}
	
</style>

</head>
<body style="text-align: center">
  <div>
    <p id="pillars"><b>| | | |</b></p>
  </div>
  <div>
    <p id="visuals">VISUALS</p>
  </div>
  <div>
  <hr>
    <p id="appName">Random Portfolio Generator</p>
  <hr>  
  </div>
  
  <div>
  <p style='width: 60%; margin: 25px auto; text-align: left; color: #424242'>This app generates a random stock portfolio using actual S&P 500 stocks and their five-year annualized returns from October 2012 to October 2017. It's assumed that each stock is equally weighted in the portfolio.</p>
  <hr id='title-bottom-line'>  
	<p style='color: black'>Choose the number of stocks :</p>
    <input type="range" min="1" step="1" max="20" id="sampleSizeValue" value="5" oninput="updateNumbers()" />
  </div>
  <span id="sampleSizeOut">5</span>
  
  <div>
  <button id='generator' onclick='randomPick()'>GENERATE PORTFOLIO</button>
  </div>
  
  <div>
  
    <br>
	<br>
	<br>
	<span id='words'></span><span id="timeOut"></span>
	
	<div style='width: 65%; margin: 0 auto;'>
	<table cellpadding=8>
    <tbody id="tbody"></tbody>
	</table>
	</div>
	
  </div>
  
<pre id='data'>
company,fiveYear,name,
A,0.222312881,Agilent Technologies Inc,
AAL,0.083456897,American Airlines Group,
AAP,0.031451532,Advance Auto Parts,
AAPL,0.1543,Apple Inc.,
ABC,0.161126873,AmerisourceBergen Corp,
ABT,0.139336746,Abbott Laboratories,
ACN,0.188628862,Accenture plc,
ADBE,0.389177405,Adobe Systems Inc,
ADI,0.217263514,"Analog Devices, Inc.",
ADM,0.126107134,Archer-Daniels-Midland Co,
ADP,0.210493592,Automatic Data Processing,
ADS,0.096322778,Alliance Data Systems,
ADSK,0.312181559,Autodesk Inc,
AEE,0.18271435,Ameren Corp,
AEP,0.151045292,American Electric Power,
AES,0.032124538,AES Corp,
AET,0.329237386,Aetna Inc,
AFL,0.13754138,AFLAC Inc,
AGN,0.16010485,"Allergan, Plc",
AIG,0.146216152,"American International Group, Inc.",
AIV,0.144257731,Apartment Investment & Management,
AIZ,0.242320042,Assurant Inc,
AKAM,0.066674219,Akamai Technologies Inc,
ALL,0.209451253,Allstate Corp,
ALXN,0.071762357,Alexion Pharmaceuticals,
AMAT,0.42201388,Applied Materials Inc,
AME,0.144553098,AMETEK Inc,
AMG,0.080087739,Affiliated Managers Group Inc,
AMGN,0.176087229,Amgen Inc,
AMP,0.251351205,Ameriprise Financial,
AMT,0.156650908,American Tower Corp A,
AMZN,0.366783601,Amazon.com Inc,
ANTM,0.30124714,Anthem Inc.,
AON,0.229345676,Aon plc,
APA,-0.119847269,Apache Corporation,
APC,-0.059296667,Anadarko Petroleum Corp,
APD,0.1871037,Air Products & Chemicals Inc,
APH,0.244191246,Amphenol Corp,
AVB,0.093846903,"AvalonBay Communities, Inc.",
AVGO,0.537218934,Broadcom,
AVY,0.298706789,Avery Dennison Corp,
AXP,0.127934136,American Express Co,
AZO,0.094929681,AutoZone Inc,
BA,0.331897964,Boeing Company,
BAC,0.254942243,Bank of America Corp,
BAX,0.161709573,Baxter International Inc.,
BBT,0.143075351,BB&T Corporation,
BBY,0.334574069,Best Buy Co. Inc.,
BCR,0.283903643,Bard (C.R.) Inc.,
BDX,0.24721334,Becton Dickinson,
BEN,0.018230868,Franklin Resources,
BK,0.179989927,The Bank of New York Mellon Corp.,
BLL,0.157672894,Ball Corp,
BMY,0.159755046,Bristol-Myers Squibb,
BWA,0.108316011,BorgWarner,
BXP,0.055910392,Boston Properties,
C,0.151195646,Citigroup Inc.,
CA,0.112297468,"CA, Inc.",
CAG,0.065528144,Conagra Brands,
CAH,0.109270337,Cardinal Health Inc.,
CAT,0.135438343,Caterpillar Inc.,
CB,0.190562213,Chubb Limited,
CBG,0.168408862,CBRE Group,
CBS,0.128211146,CBS Corp.,
CCI,0.126884883,Crown Castle International Corp.,
CCL,0.149849132,Carnival Corp.,
CELG,0.224515951,Celgene Corp.,
CERN,0.117734026,Cerner,
CF,0.006987163,CF Industries Holdings Inc,
CHK,-0.260573958,Chesapeake Energy,
CHRW,0.079137725,C. H. Robinson Worldwide,
CI,0.311820808,CIGNA Corp.,
CINF,0.159295099,Cincinnati Financial,
CL,0.080499432,Colgate-Palmolive,
CLX,0.148041209,The Clorox Company,
CMA,0.235939778,Comerica Inc.,
CMCSA,0.161972223,Comcast Corp.,
CME,0.257373931,CME Group Inc.,
CMG,0.010894277,Chipotle Mexican Grill,
CMI,0.169340513,Cummins Inc.,
CMS,0.18152736,CMS Energy,
CNP,0.109896335,CenterPoint Energy,
COF,0.108923309,Capital One Financial,
COG,0.032996211,Cabot Oil & Gas,
COH,-0.034911887,Coach,
COL,0.223221417,Rockwell Collins,
COP,0.011729299,ConocoPhillips,
COST,0.137534136,Costco Wholesale Corp.,
CPB,0.086536881,Campbell Soup,
CRM,0.225065249,Salesforce.com,
CSCO,0.184433078,Cisco Systems,
CSX,0.230074665,CSX Corp.,
CTAS,0.306899778,Cintas Corporation,
CTL,-0.072264881,CenturyLink Inc,
CTSH,0.17877999,Cognizant Technology Solutions,
CTXS,0.107661883,Citrix Systems,
CVS,0.099883302,CVS Health,
CVX,0.047164267,Chevron Corp.,
D,0.132387426,Dominion Energy,
DAL,0.407055528,Delta Air Lines Inc.,
DE,0.11947937,Deere & Co.,
DFS,0.121105619,Discover Financial Services,
DG,0.115924333,Dollar General,
DGX,0.12479439,Quest Diagnostics,
DHI,0.172993483,D. R. Horton,
DHR,0.191681475,Danaher Corp.,
DIS,0.165404898,The Walt Disney Company,
DISCA,-0.088931046,Discovery Communications-A,
DISCK,-0.081249367,Discovery Communications-C,
DLPH,0.27329584,Delphi Automotive PLC,
DLTR,0.180586999,Dollar Tree,
DO,-0.219426328,Diamond Offshore Drilling,
DOV,0.171370366,Dover Corp.,
DPS,0.178146702,Dr Pepper Snapple Group,
DRI,0.161891157,Darden Restaurants,
DTE,0.162051387,DTE Energy Co.,
DUK,0.107516145,Duke Energy,
DVA,0.016542729,DaVita Inc.,
DVN,-0.078189505,Devon Energy Corp.,
EA,0.56939874,Electronic Arts,
EBAY,0.142753144,eBay Inc.,
ECL,0.147790093,Ecolab Inc.,
ED,0.116960524,Consolidated Edison,
EFX,0.183972479,Equifax Inc.,
EIX,0.142545835,Edison Int'l,
EL,0.140878247,Estee Lauder Cos.,
EMN,0.115293784,Eastman Chemical,
EMR,0.102620462,Emerson Electric Company,
EOG,0.120607094,EOG Resources,
EQIX,0.239292741,Equinix,
EQR,0.099085761,Equity Residential,
EQT,0.006598978,EQT Corporation,
ES,0.134874471,Eversource Energy,
ESRX,-0.000634487,Express Scripts,
ESS,0.149127879,"Essex Property Trust, Inc.",
ETFC,0.390582221,E*Trade,
ETN,0.142675453,Eaton Corporation,
ETR,0.085325465,Entergy Corp.,
EW,0.185431393,Edwards Lifesciences,
EXC,0.067010139,Exelon Corp.,
EXPD,0.115080298,Expeditors International,
EXPE,0.164432251,Expedia Inc.,
F,0.061934131,Ford Motor,
FAST,0.036775565,Fastenal Co,
FB,0.53494953,"Facebook, Inc.",
FCX,-0.16356209,Freeport-McMoRan Inc.,
FDX,0.206757403,FedEx Corporation,
FE,-0.020726353,FirstEnergy Corp,
FFIV,0.076917731,F5 Networks,
FIS,0.260021288,Fidelity National Information Services,
FITB,0.177786173,Fifth Third Bancorp,
FLIR,0.20885967,FLIR Systems,
FLR,-0.037434789,Fluor Corp.,
FLS,0.014838708,Flowserve Corporation,
FMC,0.127757557,FMC Corporation,
FOXA,0.055323152,Twenty-First Century Fox Class A,
FTI,-0.079430301,TechnipFMC,
GD,0.275610258,General Dynamics,
GE,0.02732203,General Electric,
GGP,0.031482717,General Growth Properties Inc.,
GILD,0.190734182,Gilead Sciences,
GIS,0.081426537,General Mills,
GLW,0.245772094,Corning Inc.,
GM,0.146972588,General Motors,
GME,0.00385634,Gamestop,
GOOGL,0.248040464,Alphabet Inc Class A,
GPC,0.100642731,Genuine Parts,
GPS,-0.033531413,Gap Inc.,
GRMN,0.135518261,Garmin Ltd.,
GS,0.160722016,Goldman Sachs Group,
GT,0.23238003,Goodyear Tire & Rubber,
GWW,0.017490267,Grainger (W.W.) Inc.,
HAL,0.075005745,Halliburton Co.,
HAS,0.248361804,Hasbro Inc.,
HBAN,0.193878351,Huntington Bancshares,
HBI,0.23873731,Hanesbrands Inc,
HCA,0.233473967,HCA Holdings,
HCN,0.076132259,Welltower Inc.,
HCP,-0.055551148,HCP Inc.,
HD,0.245193225,Home Depot,
HES,-0.020692163,Hess Corporation,
HIG,0.226927417,Hartford Financial Svc.Gp.,
HOG,0.02354824,Harley-Davidson,
HON,0.2128806,Honeywell Int'l Inc.,
HP,0.06083631,Helmerich & Payne,
HPQ,0.312934257,HP Inc.,
HRB,0.106826952,Block H&R,
HRL,0.174835177,Hormel Foods Corp.,
HRS,0.273720691,Harris Corporation,
HSIC,0.16074761,Henry Schein,
HST,0.100832268,Host Hotels & Resorts,
HSY,0.112277839,The Hershey Company,
HUM,0.291499431,Humana Inc.,
IBM,-0.017081446,International Business Machines,
ICE,0.213098498,Intercontinental Exchange,
IFF,0.200219794,Intl Flavors & Fragrances,
INTC,0.193283443,Intel Corp.,
INTU,0.219147601,Intuit Inc.,
IP,0.139050231,International Paper,
IPG,0.165480046,Interpublic Group,
IR,0.210511196,Ingersoll-Rand PLC,
IRM,0.108896441,Iron Mountain Incorporated,
ISRG,0.157837207,Intuitive Surgical Inc.,
ITW,0.233803978,Illinois Tool Works,
IVZ,0.117424169,Invesco Ltd.,
JBHT,0.135244001,J. B. Hunt Transport Services,
JCI,0.133706086,Johnson Controls International,
JEC,0.088974582,Jacobs Engineering Group,
JNJ,0.179159475,Johnson & Johnson,
JNPR,0.096089181,Juniper Networks,
JPM,0.226653867,JPMorgan Chase & Co.,
JWN,-0.031510404,Nordstrom,
K,0.054123815,Kellogg Co.,
KEY,0.192005426,KeyCorp,
KLAC,0.272016922,KLA-Tencor Corp.,
KMB,0.102083731,Kimberly-Clark,
KMX,0.173004213,Carmax Inc,
KO,0.07553173,Coca-Cola Company,
KORS,-0.02253238,Michael Kors Holdings,
KR,0.12080552,Kroger Co.,
KSS,-0.013923314,Kohl's Corp.,
KSU,0.067408642,Kansas City Southern,
L,0.03825979,Loews Corp.,
LB,0.027852901,L Brands Inc.,
LEG,0.158626012,Leggett & Platt,
LEN,0.086432684,Lennar Corp.,
LH,0.127178077,Laboratory Corp. of America Holding,
LLL,0.231641303,L-3 Communications Holdings,
LLY,0.146082526,Lilly (Eli) & Co.,
LM,0.106789624,Legg Mason,
LMT,0.311476809,Lockheed Martin Corp.,
LNC,0.27319887,Lincoln National,
LOW,0.21679066,Lowe's Cos.,
LRCX,0.435616018,Lam Research,
LUK,0.040923003,Leucadia National Corp.,
LUV,0.451955607,Southwest Airlines,
LVLT,0.207845403,Level 3 Communications,
LYB,0.200904747,LyondellBasell,
M,-0.103441549,Macy's Inc.,
MA,0.272492583,Mastercard Inc.,
MAC,0.044442614,Macerich,
MAR,0.283521961,Marriott Int'l.,
MAS,0.260558006,Masco Corp.,
MAT,-0.11708732,Mattel Inc.,
MCD,0.175462905,McDonald's Corp.,
MCHP,0.287058863,Microchip Technology,
MCK,0.083575918,McKesson Corp.,
MCO,0.260365558,Moody's Corp,
MDLZ,0.100132918,Mondelez International,
MDT,0.164878107,Medtronic plc,
MET,0.122640846,MetLife Inc.,
MHK,0.257974551,Mohawk Industries,
MKC,0.119140656,McCormick & Co.,
MLM,0.229237837,Martin Marietta Materials,
MMC,0.21410994,Marsh & McLennan,
MNST,0.307300687,Monster Beverage,
MO,0.201171576,Altria Group Inc,
MON,0.090578755,Monsanto Co.,
MOS,-0.146209149,The Mosaic Company,
MPC,0.196492737,Marathon Petroleum,
MRK,0.071331222,Merck & Co.,
MRO,-0.12122212,Marathon Oil Corp.,
MS,0.25698456,Morgan Stanley,
MSFT,0.274819085,Microsoft Corp.,
MSI,0.142119715,Motorola Solutions Inc.,
MTB,0.124822141,M&T Bank Corp.,
MU,0.503290984,Micron Technology,
MYL,0.085781042,Mylan N.V.,
NBL,-0.087570042,Noble Energy Inc,
NDAQ,0.270947613,"Nasdaq, Inc.",
NEE,0.209137705,NextEra Energy,
NEM,-0.065970813,Newmont Mining Corporation,
NFLX,0.773072814,Netflix Inc.,
NFX,0.021001783,Newfield Exploration Co,
NI,0.252323457,NiSource Inc.,
NKE,0.208250029,Nike,
NLSN,0.07853576,Nielsen Holdings,
NOC,0.367563122,Northrop Grumman Corp.,
NOV,-0.106054467,National Oilwell Varco Inc.,
NRG,0.04879239,NRG Energy,
NSC,0.19514278,Norfolk Southern Corp.,
NTAP,0.121032444,NetApp,
NTRS,0.169930334,Northern Trust Corp.,
NUE,0.111528256,Nucor Corp.,
NVDA,0.789379975,Nvidia Corporation,
NWL,0.166776691,Newell Brands,
O,0.115985912,Realty Income Corporation,
OKE,0.106641567,ONEOK,
OMC,0.099377777,Omnicom Group,
ORCL,0.118386665,Oracle Corp.,
ORLY,0.200197886,O'Reilly Automotive,
OXY,0.006201608,Occidental Petroleum,
PAYX,0.185016529,Paychex Inc.,
PBCT,0.137818646,People's United Financial,
PCAR,0.138597103,PACCAR Inc.,
PCG,0.10070048,PG&E Corp.,
PCLN,0.267860662,Priceline.com Inc,
PDCO,0.037233442,Patterson Companies,
PEG,0.135830893,Public Serv. Enterprise Inc.,
PEP,0.127928741,PepsiCo Inc.,
PFE,0.110174965,Pfizer Inc.,
PFG,0.227582731,Principal Financial Group,
PG,0.078438029,Procter & Gamble,
PGR,0.215041883,Progressive Corp.,
PH,0.205800692,Parker-Hannifin,
PHM,0.129418132,Pulte Homes Inc.,
PKI,0.190998969,PerkinElmer,
PLD,0.171356291,Prologis,
PM,0.079687265,Philip Morris International,
PNC,0.213480266,PNC Financial Services,
PNR,0.128717535,Pentair Ltd.,
PNW,0.146961619,Pinnacle West Capital,
PPG,0.162136208,PPG Industries,
PPL,0.11390434,PPL Corp.,
PRGO,-0.057314984,Perrigo,
PRU,0.182718393,Prudential Financial,
PSA,0.121807199,Public Storage,
PSX,0.171203316,Phillips 66,
PVH,0.031197807,PVH Corp.,
PWR,0.079774964,Quanta Services Inc.,
PX,0.092645876,Praxair Inc.,
PXD,0.067751796,Pioneer Natural Resources,
QCOM,0.014283794,QUALCOMM Inc.,
REGN,0.233602962,Regeneron,
RF,0.213348003,Regions Financial Corp.,
RHI,0.157244283,Robert Half International,
RHT,0.197536576,Red Hat Inc.,
RL,-0.083010715,Polo Ralph Lauren Corp.,
ROK,0.241088848,Rockwell Automation Inc.,
ROP,0.194044421,Roper Technologies,
ROST,0.169318486,Ross Stores,
RRC,-0.225572958,Range Resources Corp.,
RSG,0.217366408,Republic Services Inc,
RTN,0.291759373,Raytheon Co.,
SBUX,0.209320543,Starbucks Corp.,
SCG,0.025906698,SCANA Corp,
SCHW,0.282414658,Charles Schwab Corporation,
SEE,0.240357051,Sealed Air,
SHW,0.238913981,Sherwin-Williams,
SJM,0.059204782,JM Smucker,
SLB,0.005234794,Schlumberger Ltd.,
SLG,0.070481999,SL Green Realty,
SNA,0.171052485,Snap-On Inc.,
SNI,0.078412607,Scripps Networks Interactive Inc.,
SO,0.069711252,Southern Co.,
SPG,0.056673141,Simon Property Group Inc,
SRCL,-0.056497706,Stericycle Inc,
SRE,0.14270043,Sempra Energy,
STI,0.194726277,SunTrust Banks,
STT,0.180688589,State Street Corp.,
STX,0.118270352,Seagate Technology,
STZ,0.439560234,Constellation Brands,
SWK,0.210564072,Stanley Black & Decker,
SWKS,0.379225069,Skyworks Solutions,
SYK,0.260258538,Stryker Corp.,
SYMC,0.195227619,Symantec Corp.,
SYY,0.153547494,Sysco Corp.,
T,0.046503571,AT&T Inc,
TAP,0.152865089,Molson Coors Brewing Company,
TEL,0.2820951,TE Connectivity Ltd.,
TGT,0.016882388,Target Corp.,
TIF,0.102752498,Tiffany & Co.,
TMK,0.212967806,Torchmark Corp.,
TMO,0.263923269,Thermo Fisher Scientific,
TRIP,0.042681681,TripAdvisor,
TROW,0.109899546,T. Rowe Price Group,
TRV,0.157037804,The Travelers Companies Inc.,
TSCO,0.057987596,Tractor Supply Company,
TSN,0.350195419,Tyson Foods,
TSS,0.272348561,Total System Services,
TWX,0.211984034,Time Warner Inc.,
TXN,0.313270989,Texas Instruments,
TXT,0.160949864,Textron Inc.,
UHS,0.204277077,"Universal Health Services, Inc.",
UNH,0.323077311,United Health Group Inc.,
UNM,0.233438099,Unum Group,
UNP,0.160904637,Union Pacific,
UPS,0.132353059,United Parcel Service,
URI,0.287037984,"United Rentals, Inc.",
UTX,0.115136981,United Technologies,
V,0.269159845,Visa Inc.,
VAR,0.091695668,Varian Medical Systems,
VFC,0.147603571,V.F. Corp.,
VIAB,-0.119223932,Viacom Inc.,
VLO,0.277634032,Valero Energy,
VMC,0.220863274,Vulcan Materials,
VNO,0.031208614,Vornado Realty Trust,
VRSN,0.237490264,Verisign Inc.,
VRTX,0.253695925,Vertex Pharmaceuticals Inc,
VTR,0.074993227,Ventas Inc,
VZ,0.058079372,Verizon Communications,
WAT,0.191207381,Waters Corporation,
WBA,0.157662004,Walgreens Boots Alliance,
WDC,0.230863591,Western Digital,
WEC,0.158948869,Wec Energy Group Inc,
WFC,0.138333678,Wells Fargo,
WHR,0.129099333,Whirlpool Corp.,
WM,0.238508995,Waste Management Inc.,
WMB,0.012402826,Williams Cos.,
WMT,0.057219324,Wal-Mart Stores,
WU,0.127323171,Western Union Co,
WY,0.088685415,Weyerhaeuser Corp.,
WYN,0.186136246,Wyndham Worldwide,
WYNN,0.074261846,Wynn Resorts Ltd,
XEC,0.160484302,Cimarex Energy,
XEL,0.158900481,Xcel Energy Inc,
XL,0.130273993,XL Capital,
XLNX,0.204158942,Xilinx Inc,
XOM,0.016169667,Exxon Mobil Corp.,
XRAY,0.11319559,Dentsply Sirona,
XRX,0.058629712,Xerox Corp.,
XYL,0.233850079,Xylem Inc.,
YUM,0.105741935,Yum! Brands Inc,
ZBH,0.145783501,Zimmer Biomet Holdings,
ZION,0.176616279,Zions Bancorp,</pre>

<script>
//sp500 1 yr return = 23.45%
//sp500 3 yr return = 10.77%
//sp500 5 yr return = 14.22%

var data = d3.csvParse(d3.select("pre#data").text() );

function updateNumbers() {
var sampleSize = document.getElementById("sampleSizeValue").value;
document.getElementById("sampleSizeOut").innerHTML = sampleSize;
}

function randomPick() {
var sampleSize = document.getElementById("sampleSizeValue").value;
var rando = _.sample(data, sampleSize);
var randoms = rando.sort(function(a, b) {
    return parseFloat(b.fiveYear) - parseFloat(a.fiveYear);
});
	var total = 0;
	for(var i = 0; i < randoms.length; i++) {
		total += parseFloat(randoms[i].fiveYear);
	}
var avg = (total / randoms.length) * 100;


	var globalCounter = 0;
	var tbody = document.getElementById('tbody');
	tbody.innerHTML = '';
	tbody.innerHTML += "<tr><th>Stock</th><th>5 Year Annualized Return</th></tr>"
	for (var i = 0; i < Object.keys(randoms).length; i++) {
		var tr = "<tr>";
		
	   // if (randoms[i].fiveYear.toString().substring(randoms[i].fiveYear.toString().indexOf('.'), randoms[i].fiveYear.toString().length) < 2) obj[i].value += "0";

		tr += "<td>" + randoms[i].name + "</td>" + "<td>" + (randoms[i].fiveYear * 100).toFixed(1) + "%" + "</td></tr>";
		tbody.innerHTML += tr;
	}

document.getElementById("words").innerHTML = "5 Year Annualized Portfolio Return: ";
document.getElementById("timeOut").innerHTML = avg.toFixed(1) + "%";
}

</script>
</body>
</html>

<?php get_footer();?>