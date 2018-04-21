<?php
/*
 *Template Name: Net Worth By Age
 *Template Post Type: post
 */
 
 get_header(); ?>
 
<html>
<head>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Advent+Pro:500);
	
    body {
      text-align: center;
    }
    p {
      font-family: 'Advent Pro', sans-serif;
      font-size: 20px;
	  color: black;
    }
	
	#netWorthP {
		margin-bottom: 0px;
		margin-top: 20px;
	}
	
	#disclaimer {
		font-size: 16px;
		color: grey;
		margin-top: 20px;
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
      color: #3c3c3c;
    }
	
	#outputPercentile {
	  margin-top: 20px;
	}
    
	#outputPercentile2 {
	  font-size: 44px;
	  color: #14c3b6;
	  margin-top: 0px;
	  padding-top: 0px;
	}
	
	#button {
      border: 1px solid black;
      border-radius: 10px;
      margin-top: 20px;
      padding: 10px 10px;
      cursor: pointer;
      outline: none;
      background-color: #ffb9b9;
      color: black;
      font-family: 'Work Sans', sans-serif;
      /* Green */
    }
    
    #button:hover {
      background-color: #ffdede;
      border: 1px solid black;
    }
	
	#netWorth {
	outline: none;
	}
	
    hr {
      width: 40%;
    }
    
    #title-bottom-line {
      margin-bottom: 30px;
    }
	
	.ageGroup {
	  margin: 8px;
	}

input[type=radio] {
		display:none;
	}

	input[type=radio] + label {
		display:inline-block;
		border-radius: 5px;
		font-family: 'Advent Pro', sans-serif;
        font-size: 20px;
	    color: black;
		cursor: pointer;
		background: #9fffa0;
		border: 1px solid black;
		margin: 0px 20px;
		width: 200px;
	}

	input[type=radio]:checked + label {
		-webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
		-moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
		box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
	    background-color:#e0e0e0;
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
    <p id="appName">COMPARING NET WORTH BY AGE</p>
  <hr id="title-bottom-line">  
  </div>
  
  <p>What age bracket are you in?</p>
  <div class='ageGroup'> 
  <input type="radio" id="radio1" name="radios" value='18' checked>
       <label for="radio1">18 - 24</label>
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio2" name="radios" value='25'>
       <label for="radio2">25 - 29</label>
  </div> 
  
  <div class='ageGroup'> 
    <input type="radio" id="radio3" name="radios">
       <label for="radio3">30 - 34</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio4" name="radios">
       <label for="radio4">35 - 39</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio5" name="radios">
       <label for="radio5">40 - 44</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio6" name="radios">
       <label for="radio6">45 - 49</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio7" name="radios">
       <label for="radio7">50 - 54</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio8" name="radios">
       <label for="radio8">55 - 59</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio9" name="radios">
       <label for="radio9">60 - 64</label> 
  </div>
  
  <div class='ageGroup'> 
    <input type="radio" id="radio10" name="radios">
       <label for="radio10">65 + </label> 
  </div>
  
  <div>
    <p id='netWorthP'>What is your net worth?</p>
    <p>$ <input type="text" id="netWorth" value="50000"/></p>
  </div>
  
  <div>
    <input type='button' id='button' onclick='calculatePercentile()' value="Calculate" />
  </div>
  
  <div>
    <p id="outputPercentile"></p>
  </div>
  <div>
    <p id="outputPercentile2"></p>
  </div>
  <div>
    <p id='disclaimer'>*Data is based on 2013 Federal Reserve SCF data for U.S. households.</p>
  </div>
  
  <script>
    function calculatePercentile() {
	
	//define necessary variables
	var num = document.getElementById('netWorth').value;
	var net = Number(num);
	var ageBracket;
	var compareValues;
	var answer=0;
	var i;
	
	//check which age bracket is selected
	if (document.getElementById('radio1').checked) {
	ageBracket = '18-24';
	compareValues = [-67200,-53900,-43200,-40000,-36910,-33420,-27185,-25250,-24100,-20900,-19270,-18500,-15000,-14300,-11200,-10200,-9300,-9100,-8900,-8400,-6400,-5150,-4400,-3000,-2860,-2430,-2130,-2100,-1300,-800,-590,-165,0,0,1,200,450,580,750,1000,1300,1400,1900,2000,2620,3020,3400,4000,4300,4400,4550,4800,4900,5520,5600,6650,6880,7410,8180,8670,9000,9501,10000,10100,10400,10650,11040,11510,12090,12820,13795,14170,14700,15100,15600,15920,16100,16500,16940,18800,19513,20800,28300,30000,31405,31950,32950,38000,40980,45521,47300,61340,75600,77620,90800,102015,193700,222950,388350];	
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
	
}   else if (document.getElementById('radio2').checked) {
	ageBracket = '25-29';
	compareValues = [-189640,-95200,-79200,-65090,-50000,-44190,-32700,-27900,-25000,-22900,-20600,-18800,-15880,-12699,-11380,-10700,-10000,-8610,-7760,-5980,-5110,-3800,-2780,-1670,-1100,0,0,5,330,500,820,1200,1700,2180,2510,3200,3500,4080,4620,5100,5400,6090,6250,7010,7500,7800,8110,8500,8800,9460,9930,10560,11050,12100,13230,14100,15300,15870,16200,17250,18300,18700,20000,21930,24260,25600,28640,29630,31500,33540,34200,35800,37500,39500,42000,44780,47701,51100,56450,62821,65200,75500,79200,80821,85700,89110,95060,103600,114770,127580,150760,164100,182100,200000,232000,241890,265750,472000,594400];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
	
}   else if (document.getElementById('radio3').checked) {
	ageBracket = '30-34';
	compareValues = [-83200,-72490,-57600,-51400,-45820,-38980,-30200,-24880,-18580,-16500,-14200,-9390,-8000,-6000,-4680,-3760,-2630,-1640,0,0,90,300,560,1190,1600,2100,3100,3500,3700,4500,4850,5800,6380,7100,7860,8500,9000,9190,9700,10400,10700,11401,12301,12890,13620,15450,16401,17300,18200,19400,20140,21900,22890,23171,26100,27390,28450,30200,31470,33350,36140,40400,42500,46200,51300,53700,59700,63520,68130,72050,76220,81200,85620,88000,90400,95000,99800,107300,112000,128610,131800,142750,147600,152320,158510,175940,188510,206840,224000,242450,270000,298670,347800,369720,397300,492510,664400,819440,1373300];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio4').checked) {
	ageBracket = '35-39';
	compareValues = [-84800,-60230,-49850,-33770,-29300,-21100,-17000,-11300,-8200,-6100,-3600,-2640,-1070,0,0,50,101,400,670,1620,2800,3400,3730,4020,4300,5000,5600,6800,7860,8300,9005,10460,11000,12110,13200,13700,14950,16601,17250,18100,20390,21800,22500,23900,25400,27500,29700,32400,35740,36320,37200,40400,42950,45060,47150,52600,55310,59300,61700,70200,75200,79800,83540,88200,93480,99001,103800,113700,128300,132500,149400,160100,173800,179300,185806,193200,204700,213300,223340,231200,248100,259100,282500,299000,317950,339000,371510,429200,443000,496000,539450,603800,672200,796380,919200,1143800,1553000,2015500,2814200];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio5').checked) {
	ageBracket = '40-44';
	compareValues = [-105250,-68900,-51780,-35050,-29940,-20150,-13799,-10100,-7740,-6140,-3770,-2000,-550,0,20,630,1440,2800,3500,4000,4900,5420,6500,7640,8330,8750,9200,9560,10500,11850,14025,16790,18300,19990,21600,23450,25100,26250,28400,31400,33700,35900,38000,39250,43805,48220,51920,58241,59000,62200,66430,68550,70480,72240,76700,81000,86970,92910,95840,104300,112300,115600,122700,131000,144450,149900,164300,168300,175800,180450,188890,202900,215400,232400,251150,278450,285400,298650,317000,342000,367300,390100,411300,444600,463760,494180,515000,609900,658080,761400,815700,949900,1040000,1106000,1380150,2105000,2923600,3904500,7282400];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio6').checked) {
	ageBracket = '45-49';
	compareValues = [-88100,-63100,-50970,-40700,-26300,-16799,-12950,-7990,-5440,-2500,-470,0,50,500,750,1460,2360,3510,4600,5000,6000,7970,9400,10200,11060,12190,13560,15220,17410,19300,20450,22900,24370,26200,27920,30001,32380,36110,38700,40300,41620,44230,48600,51000,56900,59900,64270,66030,68200,72070,77760,84000,90700,101600,111090,115300,122000,127400,134200,145200,153610,163900,169550,176150,183500,198500,205700,209700,215000,229551,240110,259200,272700,293000,305400,324140,349600,377400,403700,423800,448200,461000,502500,545000,601000,628400,651000,718785,756600,831780,942800,1021480,1112700,1270080,1414500,1910000,2350500,3520000,5216000];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio7').checked) {
	ageBracket = '50-54';
	compareValues = [-76490,-42900,-26350,-13580,-7400,-6100,-1750,-700,0,0,40,200,1030,1700,2800,3680,4560,5500,6300,6600,7550,9100,10500,12260,14200,16230,19300,21240,23820,28050,32020,36580,43600,48950,53600,55000,57920,61980,67300,72000,78000,80000,84250,89700,97100,105250,108900,115290,119500,122100,128460,135500,141900,148180,155600,162670,169550,180490,187780,197000,215000,221530,230650,237200,253810,268730,288520,308570,328250,357130,364400,391910,402650,420050,440400,466870,515100,539000,575900,603640,638500,663600,685450,720100,763500,840700,874569,936480,980260,1017000,1079000,1211450,1396200,1719500,1917700,2269200,2866600,4040000,7222100];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio8').checked) {
	ageBracket = '55-59';
	compareValues = [-51000,-24550,-17600,-12880,-5500,-4270,-2800,-1320,-530,0,1,250,670,1900,3000,3690,5110,6000,8190,9250,11400,13260,17690,19000,19920,21400,23210,28200,32250,35000,39940,43700,47500,51300,57795,61360,69750,74980,82800,84800,95600,100500,107960,111600,118300,124760,134340,139630,144760,152900,166400,172600,179250,184300,193750,205240,213815,240180,250340,254451,261600,274900,284930,300900,312580,327520,336700,358700,380000,401000,419400,433550,455100,483000,527530,569450,636900,662200,687550,727650,778500,852700,912300,973000,1020700,1082500,1121800,1221000,1317600,1381190,1622300,1815400,2229900,2730900,3349800,4132000,5092500,7692000,10813000];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio9').checked) {
	ageBracket = '60-64';
	compareValues = [-56700,-20420,-8900,-3400,-1400,0,10,150,800,1410,2200,2800,3700,4500,5500,7200,9100,10000,11000,13300,14650,16300,19910,23600,26100,32300,35760,40955,42900,44790,48300,54100,59860,61600,63820,68260,71770,80300,86600,92300,97700,100200,112100,118650,123100,129020,139400,151000,166180,174000,190260,197190,212300,220000,230100,248360,255800,260300,268550,276550,286250,299750,306950,322100,338400,344500,378700,410200,416640,440400,466500,484800,505650,530000,574300,614500,650550,683000,718410,748610,785250,818000,866230,935050,978900,1100800,1127550,1214000,1454100,1506000,1571700,1923200,2243000,2438800,2929000,3763900,5480600,7649300,10604100];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}   else if (document.getElementById('radio10').checked) {
	ageBracket = '65+';
	compareValues = [-24130,-3900,-570,0,100,570,2000,3780,4800,6400,8320,9825,12920,16300,20790,25700,30601,34100,36900,42920,50000,52900,58000,63950,69450,73770,79600,83580,87200,90700,98000,103880,110600,113100,116050,121700,127090,132100,141600,145500,150600,157565,161890,167780,176800,186200,193300,199200,205310,210500,216600,221400,229600,238700,246402,252850,260700,268700,275100,284800,294500,306300,317300,326830,336300,348500,366200,381000,395000,415200,433700,451000,468265,500050,547100,574400,602800,621205,653000,696000,739380,780600,821230,897350,973000,1072000,1149460,1263000,1336200,1487000,1636600,1872600,2134000,2505200,3051500,3688900,4737100,7329150,11572860];
	for (i = 0; i < compareValues.length; i++) {
         if (compareValues[i]<net) {
            answer++;
         }
      }
}
	//output final answer
    document.getElementById("outputPercentile").innerHTML = "For the " + ageBracket + " age bracket, a net worth of $" + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " is in net worth centile :"
    document.getElementById("outputPercentile2").innerHTML = answer + "%";
}

  </script>
</body>

</html>

<?php get_footer();?>