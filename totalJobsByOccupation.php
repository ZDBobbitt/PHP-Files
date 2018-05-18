<?php
/*
 *Template Name: Total Jobs by occupation
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

#countyNames {
	outline: none;
	border: none;
	border-bottom: thin black solid;
	border-radius: 0px;
	font-size: 16px;
	width: 270px;
	font-family: 'Raleway', sans-serif;	
	font-weight: 600;
}

#endNotes {
		 font-family: Raleway;
		 color: black;
		 max-width: 500px;
		 margin: 25px auto;
		 line-height: 1.25;
		 font-size: 14px;
	 }

</style>
<head>

<body>
      <h1>The Occupation Landscape</h1>
	  <div id='intro'><!--start of intro-->
	  <h3>Visualizing every occupation in the U.S. as tiny circles</h3>
		  <p>According to the <a href='https://www.bls.gov/cps/cpsaat11b.htm' target='_blank'>Bureau of Labor Statistics</a>, there are over 500 distinct occupations in the U.S. Some of these occupations are household names like cashiers, retail workers, and truck drivers, while others are far more obscure like aircraft structure assemblers, motion picture projectionists, and conveyor operators.</p>
		  <p>To get an idea of how common (and not so common) certain occupations are in the U.S., check out the chart below that depicts each occupation as a tiny circle. The size of the circle represents the total number of employed persons in that particular occupation and the color represents the industry. Hover over individual circles to display more information.</p>
		  <p class='last_block_p'>&nbsp;</p>
	 </div><!--end of intro-->
	 
	 <div id='graph1_block'><!--start of graph 1 block-->
	  	     <h4 style='margin-bottom: 5px; margin-top: 10px;'>SORT OCCUPATIONS BY</h4>
			 
			<div id='sortButtons'>
						<div id="nameSort"><button class="sort-btn" data-sort="id" value="NAME">NAME</button></div>
						<div id="sizeSort"><button class="sort-btn" data-sort="size" value="MARKET CAP">EMPLOYMENT</button></div>
						<div id="industrySort"><button class="sort-btn" data-sort="color" value="INDUSTRY">INDUSTRY</button></div>
			</div>
		</div>

	    <div id='graph1'></div>
		
	 </div> <!--end of graph 1 block-->
	 
	 <div id='intro'><!--start of intro paragraph-->
<h2 style='margin-top: 15px; text-align: center'><b>How Common Is Your Occupation?</b></h2>
<p style='text-align: center'>There are <span id='countyMinutes'>1,804</span>,000 <select id="countyNames"></select> in the U.S.</p>

	<hr style='margin-top: 20px'>
	<p id='endNotes'><b>Technical notes:</b> I used Excel to munge and format the data. I used D3.js, a javascript visualization library to produce the interactive chart.</p>
</div> <!-- end of intro paragaph-->

<pre id='data'>
Company,size,Sector,id,color,y
Accountants and auditors,1804,"Management, professional, and related occupations",1,#43e8d5,100
Actors,40,"Management, professional, and related occupations",2,#43e8d5,76
Actuaries,29,"Management, professional, and related occupations",3,#43e8d5,78
Adhesive bonding machine operators and tenders,6,"Production, transportation, and material moving occupations",4,#ff79d8,65
Administrative services managers,151,"Management, professional, and related occupations",5,#43e8d5,99
Advertising and promotions managers,61,"Management, professional, and related occupations",6,#43e8d5,47
Advertising sales agents,241,Sales and office occupations,7,#88ff8b,43
Aerospace engineers,148,"Management, professional, and related occupations",8,#43e8d5,91
"Agents and business managers of artists, performers, and athletes",50,"Management, professional, and related occupations",9,#43e8d5,30
Agricultural and food science technicians,32,"Management, professional, and related occupations",10,#43e8d5,80
Agricultural and food scientists,32,"Management, professional, and related occupations",11,#43e8d5,75
Agricultural engineers,2,"Management, professional, and related occupations",12,#43e8d5,59
Agricultural inspectors,18,"Natural resources, construction, and maintenance occupations",13,#ff5758,30
Air traffic controllers and airfield operations specialists,17,"Production, transportation, and material moving occupations",14,#ff79d8,85
Aircraft mechanics and service technicians,150,"Natural resources, construction, and maintenance occupations",15,#ff5758,30
Aircraft pilots and flight engineers,120,"Production, transportation, and material moving occupations",16,#ff79d8,77
"Aircraft structure, surfaces, rigging, and systems assemblers",1,"Production, transportation, and material moving occupations",17,#ff79d8,86
"Ambulance drivers and attendants, except emergency medical technicians",11,"Production, transportation, and material moving occupations",18,#ff79d8,81
Animal breeders,2,"Natural resources, construction, and maintenance occupations",20,#ff5758,41
Animal control workers,15,Service occupations,21,#f3d475,55
Animal trainers,49,Service occupations,22,#f3d475,38
Announcers,50,"Management, professional, and related occupations",23,#43e8d5,45
Appraisers and assessors of real estate,97,"Management, professional, and related occupations",24,#43e8d5,40
"Architects, except naval",253,"Management, professional, and related occupations",25,#43e8d5,45
Architectural and engineering managers,129,"Management, professional, and related occupations",26,#43e8d5,46
"Archivists, curators, and museum technicians",59,"Management, professional, and related occupations",27,#43e8d5,38
Artists and related workers,236,"Management, professional, and related occupations",28,#43e8d5,93
Astronomers and physicists,18,"Management, professional, and related occupations",29,#43e8d5,70
"Athletes, coaches, umpires, and related workers",345,"Management, professional, and related occupations",30,#43e8d5,41
Atmospheric and space scientists,7,"Management, professional, and related occupations",31,#43e8d5,84
Audiologists,15,"Management, professional, and related occupations",32,#43e8d5,77
Automotive and watercraft service attendants,94,"Production, transportation, and material moving occupations",33,#ff79d8,49
Automotive body and related repairers,140,"Natural resources, construction, and maintenance occupations",34,#ff5758,80
Automotive glass installers and repairers,22,"Natural resources, construction, and maintenance occupations",35,#ff5758,45
Automotive service technicians and mechanics,902,"Natural resources, construction, and maintenance occupations",36,#ff5758,69
Avionics technicians,9,"Natural resources, construction, and maintenance occupations",37,#ff5758,33
"Baggage porters, bellhops, and concierges",89,Service occupations,38,#f3d475,72
"Bailiffs, correctional officers, and jailers",408,Service occupations,39,#f3d475,68
Bakers,215,"Production, transportation, and material moving occupations",40,#ff79d8,62
Barbers,135,Service occupations,41,#f3d475,90
Bartenders,417,Service occupations,42,#f3d475,84
Bill and account collectors,139,Sales and office occupations,43,#88ff8b,49
Billing and posting clerks,473,Sales and office occupations,44,#88ff8b,97
Biological scientists,98,"Management, professional, and related occupations",45,#43e8d5,47
Biological technicians,23,"Management, professional, and related occupations",46,#43e8d5,91
Biomedical engineers,17,"Management, professional, and related occupations",47,#43e8d5,76
Boilermakers,15,"Natural resources, construction, and maintenance occupations",48,#ff5758,57
"Bookkeeping, accounting, and auditing clerks",1089,Sales and office occupations,49,#88ff8b,30
"Brickmasons, blockmasons, and stonemasons",166,"Natural resources, construction, and maintenance occupations",50,#ff5758,96
Bridge and lock tenders,5,"Production, transportation, and material moving occupations",51,#ff79d8,82
Broadcast and sound engineering technicians and radio operators,119,"Management, professional, and related occupations",52,#43e8d5,79
Brokerage clerks,7,Sales and office occupations,53,#88ff8b,68
Budget analysts,53,"Management, professional, and related occupations",54,#43e8d5,63
Bus and truck mechanics and diesel engine specialists,401,"Natural resources, construction, and maintenance occupations",55,#ff5758,49
Bus drivers,578,"Production, transportation, and material moving occupations",56,#ff79d8,49
"Business operations specialists, all other",273,"Management, professional, and related occupations",57,#43e8d5,44
"Butchers and other meat, poultry, and fish processing workers",269,"Production, transportation, and material moving occupations",58,#ff79d8,79
"Buyers and purchasing agents, farm products",11,"Management, professional, and related occupations",59,#43e8d5,51
Cabinetmakers and bench carpenters,49,"Production, transportation, and material moving occupations",60,#ff79d8,100
Cargo and freight agents,16,Sales and office occupations,61,#88ff8b,65
Carpenters,1351,"Natural resources, construction, and maintenance occupations",62,#ff5758,61
"Carpet, floor, and tile installers and finishers",183,"Natural resources, construction, and maintenance occupations",63,#ff5758,84
Cashiers,3253,Sales and office occupations,64,#88ff8b,67
"Cement masons, concrete finishers, and terrazzo workers",54,"Natural resources, construction, and maintenance occupations",65,#ff5758,31
Chefs and head cooks,465,Service occupations,66,#f3d475,66
Chemical engineers,77,"Management, professional, and related occupations",67,#43e8d5,44
"Chemical processing machine setters, operators, and tenders",55,"Production, transportation, and material moving occupations",68,#ff79d8,47
Chemical technicians,57,"Management, professional, and related occupations",69,#43e8d5,57
Chemists and materials scientists,105,"Management, professional, and related occupations",70,#43e8d5,42
Chief executives,1639,"Management, professional, and related occupations",71,#43e8d5,65
Childcare workers,1225,Service occupations,72,#f3d475,80
Chiropractors,51,"Management, professional, and related occupations",73,#43e8d5,52
Civil engineers,461,"Management, professional, and related occupations",74,#43e8d5,98
"Claims adjusters, appraisers, examiners, and investigators",350,"Management, professional, and related occupations",75,#43e8d5,68
Cleaners of vehicles and equipment,331,"Production, transportation, and material moving occupations",76,#ff79d8,72
"Cleaning, washing, and metal pickling equipment operators and tenders",11,"Production, transportation, and material moving occupations",77,#ff79d8,36
Clergy,406,"Management, professional, and related occupations",78,#43e8d5,57
Clinical laboratory technologists and technicians,376,"Management, professional, and related occupations",79,#43e8d5,89
"Coin, vending, and amusement machine servicers and repairers",34,"Natural resources, construction, and maintenance occupations",80,#ff5758,81
"Combined food preparation and serving workers, including fast food",372,Service occupations,81,#f3d475,95
Commercial divers,0,"Natural resources, construction, and maintenance occupations",82,#ff5758,57
"Communications equipment operators, all other",9,Sales and office occupations,83,#88ff8b,54
Compensation and benefits managers,16,"Management, professional, and related occupations",84,#43e8d5,77
"Compensation, benefits, and job analysis specialists",59,"Management, professional, and related occupations",85,#43e8d5,69
Compliance officers,260,"Management, professional, and related occupations",86,#43e8d5,71
Computer and information research scientists,24,"Management, professional, and related occupations",87,#43e8d5,81
Computer and information systems managers,630,"Management, professional, and related occupations",88,#43e8d5,69
Computer control programmers and operators,99,"Production, transportation, and material moving occupations",89,#ff79d8,51
Computer hardware engineers,80,"Management, professional, and related occupations",90,#43e8d5,66
Computer network architects,106,"Management, professional, and related occupations",91,#43e8d5,49
Computer operators,73,Sales and office occupations,92,#88ff8b,85
Computer programmers,473,"Management, professional, and related occupations",93,#43e8d5,59
Computer support specialists,532,"Management, professional, and related occupations",94,#43e8d5,86
Computer systems analysts,554,"Management, professional, and related occupations",95,#43e8d5,37
"Computer, automated teller, and office machine repairers",212,"Natural resources, construction, and maintenance occupations",96,#ff5758,85
Conservation scientists and foresters,29,"Management, professional, and related occupations",97,#43e8d5,59
Construction and building inspectors,89,"Natural resources, construction, and maintenance occupations",98,#ff5758,65
Construction laborers,1946,"Natural resources, construction, and maintenance occupations",99,#ff5758,30
Construction managers,1081,"Management, professional, and related occupations",100,#43e8d5,68
Control and valve installers and repairers,26,"Natural resources, construction, and maintenance occupations",101,#ff5758,76
Conveyor operators and tenders,1,"Production, transportation, and material moving occupations",102,#ff79d8,54
Cooks,2079,Service occupations,103,#f3d475,48
Cooling and freezing equipment operators and tenders,3,"Production, transportation, and material moving occupations",104,#ff79d8,47
Correspondence clerks,7,Sales and office occupations,105,#88ff8b,89
Cost estimators,118,"Management, professional, and related occupations",106,#43e8d5,63
Counselors,853,"Management, professional, and related occupations",107,#43e8d5,56
Counter and rental clerks,109,Sales and office occupations,108,#88ff8b,49
"Counter attendants, cafeteria, food concession, and coffee shop",225,Service occupations,109,#f3d475,60
Couriers and messengers,239,Sales and office occupations,110,#88ff8b,98
"Court, municipal, and license clerks",90,Sales and office occupations,111,#88ff8b,69
Crane and tower operators,53,"Production, transportation, and material moving occupations",112,#ff79d8,61
Credit analysts,29,"Management, professional, and related occupations",113,#43e8d5,72
"Credit authorizers, checkers, and clerks",55,Sales and office occupations,114,#88ff8b,48
Credit counselors and loan officers,353,"Management, professional, and related occupations",115,#43e8d5,93
Crossing guards,63,Service occupations,116,#f3d475,55
"Crushing, grinding, polishing, mixing, and blending workers",72,"Production, transportation, and material moving occupations",117,#ff79d8,83
Customer service representatives,2494,Sales and office occupations,118,#88ff8b,69
Cutting workers,62,"Production, transportation, and material moving occupations",119,#ff79d8,54
"Cutting, punching, and press machine setters, operators, and tenders, metal and plastic",80,"Production, transportation, and material moving occupations",120,#ff79d8,48
Dancers and choreographers,21,"Management, professional, and related occupations",121,#43e8d5,34
Data entry keyers,267,Sales and office occupations,122,#88ff8b,33
Database administrators,96,"Management, professional, and related occupations",123,#43e8d5,79
Dental assistants,299,Service occupations,124,#f3d475,76
Dental hygienists,168,"Management, professional, and related occupations",125,#43e8d5,96
Dentists,159,"Management, professional, and related occupations",126,#43e8d5,44
"Derrick, rotary drill, and service unit operators, oil, gas, and mining",30,"Natural resources, construction, and maintenance occupations",127,#ff5758,53
Designers,908,"Management, professional, and related occupations",128,#43e8d5,57
Desktop publishers,2,Sales and office occupations,129,#88ff8b,42
Detectives and criminal investigators,136,Service occupations,130,#f3d475,100
Diagnostic related technologists and technicians,319,"Management, professional, and related occupations",131,#43e8d5,83
Dietitians and nutritionists,114,"Management, professional, and related occupations",132,#43e8d5,90
Dining room and cafeteria attendants and bartender helpers,334,Service occupations,133,#f3d475,43
"Directors, religious activities and education",81,"Management, professional, and related occupations",134,#43e8d5,97
Dishwashers,274,Service occupations,135,#f3d475,35
Dispatchers,292,Sales and office occupations,136,#88ff8b,43
"Door-to-door sales workers, news and street vendors, and related workers",166,Sales and office occupations,137,#88ff8b,60
Drafters,137,"Management, professional, and related occupations",138,#43e8d5,41
"Dredge, excavating, and loading machine operators",30,"Production, transportation, and material moving occupations",139,#ff79d8,85
"Drilling and boring machine tool setters, operators, and tenders, metal and plastic",4,"Production, transportation, and material moving occupations",140,#ff79d8,90
Driver/sales workers and truck drivers,3506,"Production, transportation, and material moving occupations",141,#ff79d8,34
"Drywall installers, ceiling tile installers, and tapers",156,"Natural resources, construction, and maintenance occupations",142,#ff5758,46
"Earth drillers, except oil and gas",23,"Natural resources, construction, and maintenance occupations",143,#ff5758,79
Economists,28,"Management, professional, and related occupations",144,#43e8d5,39
Editors,174,"Management, professional, and related occupations",145,#43e8d5,86
Education administrators,918,"Management, professional, and related occupations",146,#43e8d5,100
"Electric motor, power tool, and related repairers",28,"Natural resources, construction, and maintenance occupations",147,#ff5758,52
Electrical and electronics engineers,284,"Management, professional, and related occupations",148,#43e8d5,61
"Electrical and electronics installers and repairers, transportation equipment",1,"Natural resources, construction, and maintenance occupations",149,#ff5758,77
"Electrical and electronics repairers, industrial and utility",12,"Natural resources, construction, and maintenance occupations",150,#ff5758,69
Electrical power-line installers and repairers,129,"Natural resources, construction, and maintenance occupations",151,#ff5758,55
"Electrical, electronics, and electromechanical assemblers",128,"Production, transportation, and material moving occupations",152,#ff79d8,40
Electricians,857,"Natural resources, construction, and maintenance occupations",153,#ff5758,37
"Electronic equipment installers and repairers, motor vehicles",11,"Natural resources, construction, and maintenance occupations",154,#ff5758,42
Electronic home entertainment equipment installers and repairers,50,"Natural resources, construction, and maintenance occupations",155,#ff5758,58
Elementary and middle school teachers,3268,"Management, professional, and related occupations",156,#43e8d5,40
Elevator installers and repairers,40,"Natural resources, construction, and maintenance occupations",157,#ff5758,91
"Eligibility interviewers, government programs",62,Sales and office occupations,158,#88ff8b,86
Embalmers and funeral attendants,17,Service occupations,159,#f3d475,97
Emergency management directors,11,"Management, professional, and related occupations",160,#43e8d5,51
Emergency medical technicians and paramedics,223,"Management, professional, and related occupations",161,#43e8d5,49
Engine and other machine assemblers,13,"Production, transportation, and material moving occupations",162,#ff79d8,97
"Engineering technicians, except drafters",375,"Management, professional, and related occupations",163,#43e8d5,70
"Engineers, all other",582,"Management, professional, and related occupations",164,#43e8d5,34
"Entertainers and performers, sports and related workers, all other",67,"Management, professional, and related occupations",165,#43e8d5,33
Environmental engineers,38,"Management, professional, and related occupations",166,#43e8d5,60
Environmental scientists and geoscientists,84,"Management, professional, and related occupations",167,#43e8d5,96
Etchers and engravers,11,"Production, transportation, and material moving occupations",168,#ff79d8,69
Exercise physiologists,5,"Management, professional, and related occupations",169,#43e8d5,92
"Explosives workers, ordnance handling experts, and blasters",10,"Natural resources, construction, and maintenance occupations",170,#ff5758,43
"Extruding and drawing machine setters, operators, and tenders, metal and plastic",19,"Production, transportation, and material moving occupations",171,#ff79d8,73
"Extruding and forming machine setters, operators, and tenders, synthetic and glass fibers",0,"Production, transportation, and material moving occupations",172,#ff79d8,56
"Extruding, forming, pressing, and compacting machine setters, operators, and tenders",21,"Production, transportation, and material moving occupations",173,#ff79d8,35
Fabric and apparel patternmakers,3,"Production, transportation, and material moving occupations",174,#ff79d8,49
"Farmers, ranchers, and other agricultural managers",1018,"Management, professional, and related occupations",175,#43e8d5,42
Fence erectors,34,"Natural resources, construction, and maintenance occupations",176,#ff5758,81
File clerks,182,Sales and office occupations,177,#88ff8b,97
Financial analysts,309,"Management, professional, and related occupations",178,#43e8d5,34
Financial examiners,15,"Management, professional, and related occupations",180,#43e8d5,57
Financial managers,1167,"Management, professional, and related occupations",181,#43e8d5,77
"Financial specialists, all other",45,"Management, professional, and related occupations",182,#43e8d5,64
Fire inspectors,27,Service occupations,183,#f3d475,97
Firefighters,283,Service occupations,184,#f3d475,44
First-line supervisors of construction trades and extraction workers,639,"Natural resources, construction, and maintenance occupations",185,#ff5758,65
First-line supervisors of correctional officers,52,Service occupations,186,#f3d475,38
"First-line supervisors of farming, fishing, and forestry workers",62,"Natural resources, construction, and maintenance occupations",187,#ff5758,44
First-line supervisors of fire fighting and prevention workers,44,Service occupations,188,#f3d475,85
First-line supervisors of food preparation and serving workers,519,Service occupations,189,#f3d475,37
First-line supervisors of gaming workers,208,Service occupations,190,#f3d475,34
First-line supervisors of housekeeping and janitorial workers,326,Service occupations,191,#f3d475,47
"First-line supervisors of landscaping, lawn service, and groundskeeping workers",255,Service occupations,192,#f3d475,71
"First-line supervisors of mechanics, installers, and repairers",253,"Natural resources, construction, and maintenance occupations",193,#ff5758,45
First-line supervisors of non-retail sales workers,1220,Sales and office occupations,194,#88ff8b,77
First-line supervisors of office and administrative support workers,1425,Sales and office occupations,195,#88ff8b,86
First-line supervisors of personal service workers,232,Service occupations,196,#f3d475,88
First-line supervisors of police and detectives,95,Service occupations,197,#f3d475,40
First-line supervisors of production and operating workers,768,"Production, transportation, and material moving occupations",198,#ff79d8,86
"First-line supervisors of protective service workers, all other",72,Service occupations,199,#f3d475,83
First-line supervisors of retail sales workers,3272,Sales and office occupations,200,#88ff8b,44
Fish and game wardens,4,Service occupations,201,#f3d475,59
Fishers and related fishing workers,44,"Natural resources, construction, and maintenance occupations",202,#ff5758,41
Flight attendants,98,"Production, transportation, and material moving occupations",203,#ff79d8,39
"Food and tobacco roasting, baking, and drying machine operators and tenders",12,"Production, transportation, and material moving occupations",204,#ff79d8,89
Food batchmakers,89,"Production, transportation, and material moving occupations",205,#ff79d8,97
Food cooking machine operators and tenders,15,"Production, transportation, and material moving occupations",206,#ff79d8,81
"Food preparation and serving related workers, all other",4,Service occupations,207,#f3d475,46
Food preparation workers,1068,Service occupations,208,#f3d475,60
"Food processing workers, all other",175,"Production, transportation, and material moving occupations",209,#ff79d8,84
"Food servers, nonrestaurant",207,Service occupations,210,#f3d475,39
Food service managers,1210,"Management, professional, and related occupations",211,#43e8d5,91
Forest and conservation workers,27,"Natural resources, construction, and maintenance occupations",212,#ff5758,56
"Forging machine setters, operators, and tenders, metal and plastic",8,"Production, transportation, and material moving occupations",213,#ff79d8,82
Fundraisers,84,"Management, professional, and related occupations",214,#43e8d5,74
Funeral service managers,15,"Management, professional, and related occupations",215,#43e8d5,84
"Furnace, kiln, oven, drier, and kettle operators and tenders",10,"Production, transportation, and material moving occupations",216,#ff79d8,91
Furniture finishers,15,"Production, transportation, and material moving occupations",217,#ff79d8,66
Gaming cage workers,14,Sales and office occupations,218,#88ff8b,41
Gaming managers,19,"Management, professional, and related occupations",219,#43e8d5,87
Gaming services workers,90,Service occupations,220,#f3d475,87
General and operations managers,1005,"Management, professional, and related occupations",221,#43e8d5,88
Geological and petroleum technicians,13,"Management, professional, and related occupations",222,#43e8d5,63
Glaziers,44,"Natural resources, construction, and maintenance occupations",223,#ff5758,87
"Graders and sorters, agricultural products",110,"Natural resources, construction, and maintenance occupations",224,#ff5758,71
"Grinding, lapping, polishing, and buffing machine tool setters, operators,",38,"Production, transportation, and material moving occupations",225,#ff79d8,94
Grounds maintenance workers,1365,Service occupations,226,#f3d475,44
"Hairdressers, hairstylists, and cosmetologists",806,Service occupations,227,#f3d475,79
Hazardous materials removal workers,30,"Natural resources, construction, and maintenance occupations",228,#ff5758,77
"Health diagnosing and treating practitioners, all other",39,"Management, professional, and related occupations",229,#43e8d5,89
Health practitioner support technologists and technicians,632,"Management, professional, and related occupations",231,#43e8d5,92
"Heat treating equipment setters, operators, and tenders, metal and plastic",3,"Production, transportation, and material moving occupations",232,#ff79d8,49
"Heating, air conditioning, and refrigeration mechanics and installers",448,"Natural resources, construction, and maintenance occupations",233,#ff5758,59
Heavy vehicle and mobile equipment service technicians and mechanics,201,"Natural resources, construction, and maintenance occupations",234,#ff5758,93
"Helpers, construction trades",69,"Natural resources, construction, and maintenance occupations",235,#ff5758,73
Helpers--extraction workers,4,"Natural resources, construction, and maintenance occupations",236,#ff5758,37
"Helpers--installation, maintenance, and repair workers",18,"Natural resources, construction, and maintenance occupations",237,#ff5758,98
Helpers--production workers,50,"Production, transportation, and material moving occupations",238,#ff79d8,61
Highway maintenance workers,101,"Natural resources, construction, and maintenance occupations",239,#ff5758,97
Hoist and winch operators,7,"Production, transportation, and material moving occupations",240,#ff79d8,77
Home appliance repairers,41,"Natural resources, construction, and maintenance occupations",241,#ff5758,94
"Hosts and hostesses, restaurant, lounge, and coffee shop",324,Service occupations,242,#f3d475,39
"Hotel, motel, and resort desk clerks",125,Sales and office occupations,243,#88ff8b,38
"Human resources assistants, except payroll and timekeeping",45,Sales and office occupations,244,#88ff8b,31
Human resources managers,327,"Management, professional, and related occupations",245,#43e8d5,57
Human resources workers,736,"Management, professional, and related occupations",246,#43e8d5,55
Hunters and trappers,1,"Natural resources, construction, and maintenance occupations",247,#ff5758,94
Industrial and refractory machinery mechanics,424,"Natural resources, construction, and maintenance occupations",248,#ff5758,31
"Industrial engineers, including health and safety",221,"Management, professional, and related occupations",249,#43e8d5,48
Industrial production managers,280,"Management, professional, and related occupations",250,#43e8d5,62
Industrial truck and tractor operators,611,"Production, transportation, and material moving occupations",251,#ff79d8,85
"Information and record clerks, all other",110,Sales and office occupations,252,#88ff8b,80
Information security analysts,105,"Management, professional, and related occupations",253,#43e8d5,56
"Inspectors, testers, sorters, samplers, and weighers",793,"Production, transportation, and material moving occupations",254,#ff79d8,99
Insulation workers,58,"Natural resources, construction, and maintenance occupations",255,#ff5758,69
Insurance claims and policy processing clerks,237,Sales and office occupations,256,#88ff8b,72
Insurance sales agents,624,Sales and office occupations,257,#88ff8b,31
Insurance underwriters,104,"Management, professional, and related occupations",258,#43e8d5,64
"Interviewers, except eligibility and loan",142,Sales and office occupations,259,#88ff8b,34
Janitors and building cleaners,2307,Service occupations,260,#f3d475,83
Jewelers and precious stone and metal workers,43,"Production, transportation, and material moving occupations",261,#ff79d8,65
"Judges, magistrates, and other judicial workers",66,"Management, professional, and related occupations",262,#43e8d5,47
Judicial law clerks,14,"Management, professional, and related occupations",263,#43e8d5,70
"Laborers and freight, stock, and material movers",1930,"Production, transportation, and material moving occupations",264,#ff79d8,69
"Lathe and turning machine tool setters, operators, and tenders, metal and plastic",14,"Production, transportation, and material moving occupations",265,#ff79d8,53
Laundry and dry-cleaning workers,151,"Production, transportation, and material moving occupations",266,#ff79d8,71
Lawyers,1137,"Management, professional, and related occupations",267,#43e8d5,66
"Layout workers, metal and plastic",12,"Production, transportation, and material moving occupations",268,#ff79d8,64
Legislators,18,"Management, professional, and related occupations",269,#43e8d5,80
Librarians,194,"Management, professional, and related occupations",270,#43e8d5,83
"Library assistants, clerical",96,Sales and office occupations,271,#88ff8b,58
Library technicians,40,"Management, professional, and related occupations",272,#43e8d5,33
Licensed practical and licensed vocational nurses,630,"Management, professional, and related occupations",273,#43e8d5,66
"Life scientists, all other",3,"Management, professional, and related occupations",274,#43e8d5,84
"Lifeguards and other recreational, and all other protective service workers",136,Service occupations,275,#f3d475,65
Loan interviewers and clerks,120,Sales and office occupations,276,#88ff8b,91
Locksmiths and safe repairers,35,"Natural resources, construction, and maintenance occupations",277,#ff5758,59
Locomotive engineers and operators,42,"Production, transportation, and material moving occupations",278,#ff79d8,49
Lodging managers,156,"Management, professional, and related occupations",279,#43e8d5,30
Logging workers,66,"Natural resources, construction, and maintenance occupations",280,#ff5758,30
Logisticians,112,"Management, professional, and related occupations",281,#43e8d5,76
Machine feeders and offbearers,31,"Production, transportation, and material moving occupations",282,#ff79d8,94
Machinists,366,"Production, transportation, and material moving occupations",283,#ff79d8,60
Maids and housekeeping cleaners,1527,Service occupations,284,#f3d475,38
"Mail clerks and mail machine operators, except postal service",61,Sales and office occupations,285,#88ff8b,62
"Maintenance and repair workers, general",528,"Natural resources, construction, and maintenance occupations",286,#ff5758,38
"Maintenance workers, machinery",27,"Natural resources, construction, and maintenance occupations",287,#ff5758,100
Management analysts,937,"Management, professional, and related occupations",288,#43e8d5,93
Manufactured building and mobile home installers,4,"Natural resources, construction, and maintenance occupations",289,#ff5758,84
Marine engineers and naval architects,12,"Management, professional, and related occupations",290,#43e8d5,68
Market research analysts and marketing specialists,344,"Management, professional, and related occupations",291,#43e8d5,84
Marketing and sales managers,1078,"Management, professional, and related occupations",292,#43e8d5,72
Massage therapists,172,Service occupations,293,#f3d475,52
"Material moving workers, all other",40,"Production, transportation, and material moving occupations",294,#ff79d8,65
Materials engineers,32,"Management, professional, and related occupations",295,#43e8d5,77
Mathematicians,3,"Management, professional, and related occupations",296,#43e8d5,51
Mechanical engineers,344,"Management, professional, and related occupations",297,#43e8d5,73
"Media and communication equipment workers, all other",5,"Management, professional, and related occupations",298,#43e8d5,63
Medical and health services managers,671,"Management, professional, and related occupations",299,#43e8d5,80
Medical assistants,539,Service occupations,300,#f3d475,49
Medical records and health information technicians,167,"Management, professional, and related occupations",301,#43e8d5,75
Medical scientists,161,"Management, professional, and related occupations",302,#43e8d5,33
Medical transcriptionists,36,Service occupations,303,#f3d475,62
"Medical, dental, and ophthalmic laboratory technicians",70,"Production, transportation, and material moving occupations",304,#ff79d8,97
"Meeting, convention, and event planners",137,"Management, professional, and related occupations",305,#43e8d5,76
"Metal furnace operators, tenders, pourers, and casters",19,"Production, transportation, and material moving occupations",306,#ff79d8,55
"Metal workers and plastic workers, all other",388,"Production, transportation, and material moving occupations",307,#ff79d8,99
"Meter readers, utilities",18,Sales and office occupations,308,#88ff8b,54
"Milling and planing machine setters, operators, and tenders, metal and plastic",5,"Production, transportation, and material moving occupations",309,#ff79d8,67
Millwrights,40,"Natural resources, construction, and maintenance occupations",310,#ff5758,42
Mine shuttle car operators,0,"Production, transportation, and material moving occupations",311,#ff79d8,78
"Mining and geological engineers, including mining safety engineers",11,"Management, professional, and related occupations",312,#43e8d5,58
Mining machine operators,51,"Natural resources, construction, and maintenance occupations",313,#ff5758,80
Miscellaneous agricultural workers,854,"Natural resources, construction, and maintenance occupations",314,#ff5758,88
Miscellaneous assemblers and fabricators,1033,"Production, transportation, and material moving occupations",315,#ff79d8,89
"Miscellaneous community and social service specialists, including",76,"Management, professional, and related occupations",316,#43e8d5,49
Miscellaneous construction and related workers,24,"Natural resources, construction, and maintenance occupations",317,#ff5758,50
Miscellaneous entertainment attendants and related workers,224,Service occupations,318,#f3d475,80
Miscellaneous health technologists and technicians,160,"Management, professional, and related occupations",319,#43e8d5,78
Miscellaneous legal support workers,186,"Management, professional, and related occupations",320,#43e8d5,84
"Miscellaneous life, physical, and social science technicians",164,"Management, professional, and related occupations",321,#43e8d5,97
Miscellaneous media and communication workers,112,"Management, professional, and related occupations",322,#43e8d5,41
Miscellaneous personal appearance workers,397,Service occupations,323,#f3d475,55
Miscellaneous plant and system operators,42,"Production, transportation, and material moving occupations",324,#ff79d8,85
Miscellaneous social scientists and related workers,41,"Management, professional, and related occupations",325,#43e8d5,67
"Miscellaneous vehicle and mobile equipment mechanics, installers, and repairers",83,"Natural resources, construction, and maintenance occupations",326,#ff5758,42
"Model makers and patternmakers, metal and plastic",5,"Production, transportation, and material moving occupations",327,#ff79d8,54
"Model makers and patternmakers, wood",1,"Production, transportation, and material moving occupations",328,#ff79d8,85
"Models, demonstrators, and product promoters",61,Sales and office occupations,329,#88ff8b,79
"Molders and molding machine setters, operators, and tenders, metal and plastic",45,"Production, transportation, and material moving occupations",330,#ff79d8,91
"Molders, shapers, and casters, except metal and plastic",35,"Production, transportation, and material moving occupations",331,#ff79d8,75
"Morticians, undertakers, and funeral directors",42,Service occupations,332,#f3d475,63
Motion picture projectionists,1,Service occupations,333,#f3d475,50
"Motor vehicle operators, all other",76,"Production, transportation, and material moving occupations",334,#ff79d8,78
"Multiple machine tool setters, operators, and tenders, metal and plastic",5,"Production, transportation, and material moving occupations",335,#ff79d8,72
"Musicians, singers, and related workers",188,"Management, professional, and related occupations",336,#43e8d5,77
Natural sciences managers,16,"Management, professional, and related occupations",337,#43e8d5,71
Network and computer systems administrators,210,"Management, professional, and related occupations",338,#43e8d5,60
New accounts clerks,32,Sales and office occupations,339,#88ff8b,67
"News analysts, reporters and correspondents",84,"Management, professional, and related occupations",340,#43e8d5,50
Nonfarm animal caretakers,263,Service occupations,341,#f3d475,64
Nuclear engineers,8,"Management, professional, and related occupations",342,#43e8d5,32
Nuclear technicians,7,"Management, professional, and related occupations",343,#43e8d5,30
Nurse anesthetists,35,"Management, professional, and related occupations",344,#43e8d5,59
Nurse midwives,7,"Management, professional, and related occupations",345,#43e8d5,93
Nurse practitioners,175,"Management, professional, and related occupations",346,#43e8d5,92
"Nursing, psychiatric, and home health aides",1936,Service occupations,347,#f3d475,61
Occupational therapists,122,"Management, professional, and related occupations",348,#43e8d5,89
Occupational therapy assistants and aides,27,Service occupations,349,#f3d475,77
"Office and administrative support workers, all other",576,Sales and office occupations,350,#88ff8b,55
"Office clerks, general",1271,Sales and office occupations,351,#88ff8b,95
"Office machine operators, except computer",33,Sales and office occupations,352,#88ff8b,61
Operating engineers and other construction equipment operators,358,"Natural resources, construction, and maintenance occupations",353,#ff5758,83
Operations research analysts,147,"Management, professional, and related occupations",354,#43e8d5,68
"Opticians, dispensing",48,"Management, professional, and related occupations",355,#43e8d5,37
Optometrists,51,"Management, professional, and related occupations",356,#43e8d5,88
Order clerks,107,Sales and office occupations,357,#88ff8b,58
"Other education, training, and library workers",161,"Management, professional, and related occupations",358,#43e8d5,59
Other extraction workers,54,"Natural resources, construction, and maintenance occupations",359,#ff5758,56
"Other installation, maintenance, and repair workers",215,"Natural resources, construction, and maintenance occupations",360,#ff5758,40
Other teachers and instructors,907,"Management, professional, and related occupations",361,#43e8d5,82
Other transportation workers,24,"Production, transportation, and material moving occupations",362,#ff79d8,61
Packaging and filling machine operators and tenders,292,"Production, transportation, and material moving occupations",363,#ff79d8,67
"Packers and packagers, hand",539,"Production, transportation, and material moving occupations",364,#ff79d8,94
"Painters, construction and maintenance",540,"Natural resources, construction, and maintenance occupations",365,#ff5758,34
Painting workers,157,"Production, transportation, and material moving occupations",366,#ff79d8,51
"Paper goods machine setters, operators, and tenders",29,"Production, transportation, and material moving occupations",367,#ff79d8,83
Paperhangers,4,"Natural resources, construction, and maintenance occupations",368,#ff5758,40
Paralegals and legal assistants,424,"Management, professional, and related occupations",369,#43e8d5,67
Parking enforcement workers,6,Service occupations,370,#f3d475,99
Parking lot attendants,95,"Production, transportation, and material moving occupations",371,#ff79d8,66
Parts salespersons,130,Sales and office occupations,372,#88ff8b,47
"Paving, surfacing, and tamping equipment operators",15,"Natural resources, construction, and maintenance occupations",373,#ff5758,55
Payroll and timekeeping clerks,129,Sales and office occupations,374,#88ff8b,81
Personal care aides,1365,Service occupations,375,#f3d475,36
"Personal care and service workers, all other",167,Service occupations,376,#f3d475,52
Personal financial advisors,525,"Management, professional, and related occupations",377,#43e8d5,31
Pest control workers,108,Service occupations,378,#f3d475,30
Petroleum engineers,24,"Management, professional, and related occupations",379,#43e8d5,38
Pharmacists,342,"Management, professional, and related occupations",380,#43e8d5,54
Pharmacy aides,39,Service occupations,381,#f3d475,34
Phlebotomists,112,Service occupations,382,#f3d475,54
Photographers,214,"Management, professional, and related occupations",383,#43e8d5,72
Photographic process workers and processing machine operators,31,"Production, transportation, and material moving occupations",384,#ff79d8,45
"Physical scientists, all other",301,"Management, professional, and related occupations",385,#43e8d5,45
Physical therapist assistants and aides,83,Service occupations,386,#f3d475,80
Physical therapists,258,"Management, professional, and related occupations",387,#43e8d5,46
Physician assistants,116,"Management, professional, and related occupations",388,#43e8d5,55
Physicians and surgeons,1079,"Management, professional, and related occupations",389,#43e8d5,45
Pile-driver operators,2,"Natural resources, construction, and maintenance occupations",390,#ff5758,95
"Pipelayers, plumbers, pipefitters, and steamfitters",600,"Natural resources, construction, and maintenance occupations",391,#ff5758,97
Plasterers and stucco masons,27,"Natural resources, construction, and maintenance occupations",392,#ff5758,76
"Plating and coating machine setters, operators, and tenders, metal and plastic",17,"Production, transportation, and material moving occupations",393,#ff79d8,58
Podiatrists,12,"Management, professional, and related occupations",394,#43e8d5,47
Police and sheriff's patrol officers,704,Service occupations,395,#f3d475,50
Postal service clerks,111,Sales and office occupations,396,#88ff8b,75
Postal service mail carriers,306,Sales and office occupations,397,#88ff8b,70
"Postal service mail sorters, processors, and processing machine operators",50,Sales and office occupations,398,#88ff8b,32
Postmasters and mail superintendents,27,"Management, professional, and related occupations",399,#43e8d5,96
Postsecondary teachers,1423,"Management, professional, and related occupations",400,#43e8d5,87
"Power plant operators, distributors, and dispatchers",38,"Production, transportation, and material moving occupations",401,#ff79d8,55
Precision instrument and equipment repairers,63,"Natural resources, construction, and maintenance occupations",402,#ff5758,82
Prepress technicians and workers,24,"Production, transportation, and material moving occupations",403,#ff79d8,42
Preschool and kindergarten teachers,712,"Management, professional, and related occupations",404,#43e8d5,75
"Pressers, textile, garment, and related materials",30,"Production, transportation, and material moving occupations",405,#ff79d8,57
Print binding and finishing workers,11,"Production, transportation, and material moving occupations",406,#ff79d8,77
Printing press operators,173,"Production, transportation, and material moving occupations",407,#ff79d8,47
Private detectives and investigators,94,Service occupations,408,#f3d475,31
Probation officers and correctional treatment specialists,99,"Management, professional, and related occupations",409,#43e8d5,60
Procurement clerks,30,Sales and office occupations,410,#88ff8b,76
Producers and directors,180,"Management, professional, and related occupations",411,#43e8d5,93
"Production workers, all other",995,"Production, transportation, and material moving occupations",412,#ff79d8,76
"Production, planning, and expediting clerks",270,Sales and office occupations,413,#88ff8b,82
Proofreaders and copy markers,10,Sales and office occupations,414,#88ff8b,37
"Property, real estate, and community association managers",743,"Management, professional, and related occupations",415,#43e8d5,97
Psychologists,187,"Management, professional, and related occupations",416,#43e8d5,70
Public relations and fundraising managers,73,"Management, professional, and related occupations",417,#43e8d5,46
Public relations specialists,118,"Management, professional, and related occupations",418,#43e8d5,31
Pumping station operators,21,"Production, transportation, and material moving occupations",419,#ff79d8,69
"Purchasing agents, except wholesale, retail, and farm products",270,"Management, professional, and related occupations",420,#43e8d5,60
Purchasing managers,205,"Management, professional, and related occupations",421,#43e8d5,40
Radiation therapists,10,"Management, professional, and related occupations",422,#43e8d5,90
Radio and telecommunications equipment installers and repairers,134,"Natural resources, construction, and maintenance occupations",423,#ff5758,68
"Railroad brake, signal, and switch operators",4,"Production, transportation, and material moving occupations",424,#ff79d8,50
Railroad conductors and yardmasters,50,"Production, transportation, and material moving occupations",425,#ff79d8,63
Rail-track laying and maintenance equipment operators,17,"Natural resources, construction, and maintenance occupations",426,#ff5758,88
Real estate brokers and sales agents,997,Sales and office occupations,427,#88ff8b,72
Receptionists and information clerks,1267,Sales and office occupations,428,#88ff8b,51
Recreation and fitness workers,480,Service occupations,429,#f3d475,58
Recreational therapists,7,"Management, professional, and related occupations",430,#43e8d5,34
Refuse and recyclable material collectors,94,"Production, transportation, and material moving occupations",431,#ff79d8,35
Registered nurses,3159,"Management, professional, and related occupations",432,#43e8d5,96
Reinforcing iron and rebar workers,12,"Natural resources, construction, and maintenance occupations",433,#ff5758,65
"Religious workers, all other",85,"Management, professional, and related occupations",434,#43e8d5,66
Reservation and transportation ticket agents and travel clerks,127,Sales and office occupations,435,#88ff8b,30
Residential advisors,44,Service occupations,436,#f3d475,81
Respiratory therapists,100,"Management, professional, and related occupations",437,#43e8d5,75
Retail salespersons,3235,Sales and office occupations,438,#88ff8b,40
Riggers,14,"Natural resources, construction, and maintenance occupations",439,#ff5758,64
"Rolling machine setters, operators, and tenders, metal and plastic",8,"Production, transportation, and material moving occupations",440,#ff79d8,87
"Roof bolters, mining",2,"Natural resources, construction, and maintenance occupations",441,#ff5758,83
Roofers,220,"Natural resources, construction, and maintenance occupations",442,#ff5758,70
"Roustabouts, oil and gas",4,"Natural resources, construction, and maintenance occupations",443,#ff5758,48
Sailors and marine oilers,19,"Production, transportation, and material moving occupations",444,#ff79d8,40
"Sales and related workers, all other",276,Sales and office occupations,445,#88ff8b,84
Sales engineers,35,Sales and office occupations,446,#88ff8b,52
"Sales representatives, services, all other",525,Sales and office occupations,447,#88ff8b,42
"Sales representatives, wholesale and manufacturing",1264,Sales and office occupations,448,#88ff8b,96
"Sawing machine setters, operators, and tenders, wood",27,"Production, transportation, and material moving occupations",449,#ff79d8,100
Secondary school teachers,1039,"Management, professional, and related occupations",450,#43e8d5,80
Secretaries and administrative assistants,2769,Sales and office occupations,451,#88ff8b,89
"Securities, commodities, and financial services sales agents",262,Sales and office occupations,452,#88ff8b,45
Security and fire alarm systems installers,77,"Natural resources, construction, and maintenance occupations",453,#ff5758,91
Security guards and gaming surveillance officers,920,Service occupations,454,#f3d475,75
Semiconductor processors,3,"Production, transportation, and material moving occupations",455,#ff79d8,73
Septic tank servicers and sewer pipe cleaners,10,"Natural resources, construction, and maintenance occupations",456,#ff5758,64
Sewing machine operators,197,"Production, transportation, and material moving occupations",457,#ff79d8,83
Sheet metal workers,137,"Natural resources, construction, and maintenance occupations",458,#ff5758,44
Ship and boat captains and operators,35,"Production, transportation, and material moving occupations",459,#ff79d8,93
Ship engineers,2,"Production, transportation, and material moving occupations",460,#ff79d8,50
"Shipping, receiving, and traffic clerks",623,Sales and office occupations,461,#88ff8b,78
Shoe and leather workers and repairers,5,"Production, transportation, and material moving occupations",462,#ff79d8,94
Shoe machine operators and tenders,5,"Production, transportation, and material moving occupations",463,#ff79d8,55
Signal and track switch repairers,9,"Natural resources, construction, and maintenance occupations",464,#ff5758,100
Small engine mechanics,44,"Natural resources, construction, and maintenance occupations",465,#ff5758,60
Social and community service managers,390,"Management, professional, and related occupations",466,#43e8d5,54
Social and human service assistants,232,"Management, professional, and related occupations",467,#43e8d5,68
Social science research assistants,4,"Management, professional, and related occupations",468,#43e8d5,73
Social workers,802,"Management, professional, and related occupations",469,#43e8d5,81
Sociologists,2,"Management, professional, and related occupations",470,#43e8d5,85
Software developers,1536,"Management, professional, and related occupations",471,#43e8d5,89
Solar photovoltaic installers,11,"Natural resources, construction, and maintenance occupations",472,#ff5758,41
Special education teachers,422,"Management, professional, and related occupations",473,#43e8d5,92
Speech-language pathologists,141,"Management, professional, and related occupations",474,#43e8d5,94
Stationary engineers and boiler operators,76,"Production, transportation, and material moving occupations",475,#ff79d8,87
Statistical assistants,21,Sales and office occupations,476,#88ff8b,84
Statisticians,87,"Management, professional, and related occupations",477,#43e8d5,52
Stock clerks and order fillers,1525,Sales and office occupations,478,#88ff8b,98
Structural iron and steel workers,43,"Natural resources, construction, and maintenance occupations",479,#ff5758,57
Structural metal fabricators and fitters,30,"Production, transportation, and material moving occupations",480,#ff79d8,42
"Subway, streetcar, and other rail transportation workers",15,"Production, transportation, and material moving occupations",481,#ff79d8,66
Supervisors of transportation and material moving workers,205,"Production, transportation, and material moving occupations",482,#ff79d8,52
Survey researchers,3,"Management, professional, and related occupations",483,#43e8d5,39
Surveying and mapping technicians,73,"Management, professional, and related occupations",484,#43e8d5,51
"Surveyors, cartographers, and photogrammetrists",43,"Management, professional, and related occupations",485,#43e8d5,82
"Switchboard operators, including answering service",23,Sales and office occupations,486,#88ff8b,40
"Tailors, dressmakers, and sewers",77,"Production, transportation, and material moving occupations",487,#ff79d8,77
"Tank car, truck, and ship loaders",6,"Production, transportation, and material moving occupations",488,#ff79d8,81
"Tax examiners and collectors, and revenue agents",65,"Management, professional, and related occupations",489,#43e8d5,31
Tax preparers,107,"Management, professional, and related occupations",490,#43e8d5,63
Taxi drivers and chauffeurs,674,"Production, transportation, and material moving occupations",491,#ff79d8,30
Teacher assistants,989,"Management, professional, and related occupations",492,#43e8d5,69
Technical writers,76,"Management, professional, and related occupations",493,#43e8d5,56
Telecommunications line installers and repairers,189,"Natural resources, construction, and maintenance occupations",494,#ff5758,79
Telemarketers,58,Sales and office occupations,495,#88ff8b,55
Telephone operators,47,Sales and office occupations,496,#88ff8b,90
"Television, video, and motion picture camera operators and editors",82,"Management, professional, and related occupations",497,#43e8d5,94
Tellers,306,Sales and office occupations,498,#88ff8b,33
Textile bleaching and dyeing machine operators and tenders,1,"Production, transportation, and material moving occupations",499,#ff79d8,93
"Textile cutting machine setters, operators, and tenders",8,"Production, transportation, and material moving occupations",500,#ff79d8,35
"Textile knitting and weaving machine setters, operators, and tenders",19,"Production, transportation, and material moving occupations",501,#ff79d8,93
"Textile winding, twisting, and drawing out machine setters, operators, and tenders",16,"Production, transportation, and material moving occupations",502,#ff79d8,54
"Textile, apparel, and furnishings workers, all other",18,"Production, transportation, and material moving occupations",503,#ff79d8,82
"Therapists, all other",221,"Management, professional, and related occupations",504,#43e8d5,86
Tire builders,10,"Production, transportation, and material moving occupations",505,#ff79d8,62
Tool and die makers,62,"Production, transportation, and material moving occupations",506,#ff79d8,32
"Tool grinders, filers, and sharpeners",6,"Production, transportation, and material moving occupations",507,#ff79d8,96
Tour and travel guides,68,Service occupations,508,#f3d475,88
Training and development managers,63,"Management, professional, and related occupations",509,#43e8d5,73
Training and development specialists,133,"Management, professional, and related occupations",510,#43e8d5,56
Transit and railroad police,7,Service occupations,511,#f3d475,76
"Transportation attendants, except flight attendants",35,"Production, transportation, and material moving occupations",512,#ff79d8,62
Transportation inspectors,41,"Production, transportation, and material moving occupations",513,#ff79d8,54
Transportation security screeners,46,Service occupations,514,#f3d475,96
"Transportation, storage, and distribution managers",291,"Management, professional, and related occupations",515,#43e8d5,79
Travel agents,89,Sales and office occupations,516,#88ff8b,60
Upholsterers,31,"Production, transportation, and material moving occupations",517,#ff79d8,73
Urban and regional planners,32,"Management, professional, and related occupations",518,#43e8d5,54
"Ushers, lobby attendants, and ticket takers",37,Service occupations,519,#f3d475,90
Veterinarians,89,"Management, professional, and related occupations",520,#43e8d5,51
Veterinary assistants and laboratory animal caretakers,61,Service occupations,521,#f3d475,41
Waiters and waitresses,2016,Service occupations,522,#f3d475,77
Water and wastewater treatment plant and system operators,107,"Production, transportation, and material moving occupations",523,#ff79d8,49
Web developers,204,"Management, professional, and related occupations",524,#43e8d5,59
"Weighers, measurers, checkers, and samplers, recordkeeping",52,Sales and office occupations,525,#88ff8b,94
"Welding, soldering, and brazing workers",600,"Production, transportation, and material moving occupations",526,#ff79d8,83
"Wholesale and retail buyers, except farm products",194,"Management, professional, and related occupations",527,#43e8d5,44
Wind turbine service technicians,5,"Natural resources, construction, and maintenance occupations",528,#ff5758,70
"Woodworkers, all other",28,"Production, transportation, and material moving occupations",529,#ff79d8,94
"Woodworking machine setters, operators, and tenders, except sawing",19,"Production, transportation, and material moving occupations",530,#ff79d8,90
Word processors and typists,94,Sales and office occupations,531,#88ff8b,90
Writers and authors,226,"Management, professional, and related occupations",532,#43e8d5,32</pre>

<script>
//data source: https://www.bls.gov/cps/cpsaat11b.htm

var width = 1000,
    height = 800;

var grid = d3.layout.grid()
  .size([700, 800]);

var size = d3.scale.pow().exponent(0.25)
  .domain([0, 3500])
  .range([0, 18]);

var sortBy = {
  id: d3.comparator()
    .order(d3.ascending, function(d) { return +d.id; }),
  color: d3.comparator()
    .order(d3.ascending, function(d) { return d.color; })
    .order(d3.descending, function(d) { return +d.size; })
    .order(d3.ascending, function(d) { return +d.id; }),
  size: d3.comparator()
    .order(d3.descending, function(d) { return +d.size; })
    .order(d3.ascending, function(d) { return d.color; })
    .order(d3.ascending, function(d) { return +d.id; })
};

var data = d3.csv.parse(d3.select("pre#data").text() );

// Define the div for the tooltip
var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var svg = d3.select("#graph1")
  .append("svg")
  .attr("width", 1000)
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
            div	.html("<b>" + d.Company +"</b>" + "<br/>"  + d.size.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ",000 employed persons" + "<br/>" + "Industry: " + d.Sector)	
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

//STUFF FOR SEARCH FUNCTION AT THE END
	var select = d3.select("#countyNames")
		       .selectAll("option")
	     		 .data(data)
	     		 .enter()
	     		   .append("option")
	        	   .attr("value", function (d) { return d.size; })
	        	   .attr("label", function (d) { return d.Company; });	     

   d3.select('#countyNames')
	  .on('change', function() {

	  var county_mins = eval(d3.select(this).property('value'));
	  
	  //output of number of workers in selected occupation
	  document.getElementById('countyMinutes').innerHTML = county_mins.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  
});


</script>
</body>
</html>

<?php get_footer();?>