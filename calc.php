<?php

   /*

   Plugin Name: Latest Grad Calculator

   Plugin URI: http://localhost

   Description: This is used to calculate the total cost estimate for a graduate student
   
   Version: 1.0
   
   Author: Christina Harris
   
   License: xyz
 
   */
   
  
function grad_cal( $atts )
{
       
       echo '<center><b style="font-size:x-large; color:white;">GSU Calculators</b></center>';
      
  
  ?>
  
    
  

    
    <script src="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/js/ui.tabs.js" type="text/javascript"></script>  


                <div id="pageheadline">
                    <h1>Graduate Cost Calculator</h1>
                    
                </div>
            
        
    
        

    
    
    
    




<!------------- October 26, 2012 Graduate Tuition Calculator ----------------->
<div id="content">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/css/form.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/css/boxy.css" />
<script type="text/javascript" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/js/jquery.boxy.js"></script>
<script type="text/javascript" src="<?php bloginfo('wpurl') ?>/wp-content/plugins/grad-calculator/js/graduate-calculate.js"></script>
<SCRIPT TYPE="text/javascript">
function hidefood(index) {
var el = document.getElementById('meal');
var fel = document.getElementById('fmeal');
if ( (index == 3 || index == 4 || index==7 || index==8)) {
el.style.display = 'none';
fel.style.display = '';
}
else {
el.style.display = '';
fel.style.display = 'none';
}
}
</SCRIPT>

<div id="error" style=" color:#FF0000"> </div>
<FORM id="calc" class="calc" name="calc" action="#" method="post">
<FIELDSET>
<LEGEND> Student Information </LEGEND>
<p> Note: This cost calculator is for graduate students only for the 2012-2013 school year. Estimates are based on a full-time schedule of 9 or more semester hours. Please see the <a target="_blank" href="http://www.gsu.edu/studentaccounts/tuition_and_fees.html">Student Accounts website</a> for graduate tuition, fees and related costs.
</p>
<LABEL>Enrollment: </LABEL>
<SELECT name="enrollment" class="slc" onchange="updateAgeCosts();">
<option value="0" >Select</option>
<option value="2">Per Year (Fall/Spring)</option>
<option value="1">Per Semester</option>
</SELECT> <br />
<LABEL>Tuition Classification: </LABEL>
<SELECT name="residency" class="slc" id="residency" onchange="changeResidency(this);" > <!--- onchange="toggle('resident_hope');"--->
<option value="" >Select</option>
<option value="is" >Resident of Georgia </option>
<option value="oos" >Nonresident </option>
</SELECT>
<a href="#" class="boxyinfo" id="grad_residency" title="Residency Info" ><img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a><br />
<label>Program: </label>
<SELECT class="slc" id="program" name="program" onchange="if (this.selectedIndex==2) document.getElementById('specialprogram_con').style.display='';if (this.selectedIndex==1) {document.getElementById('specialized_program').selectedIndex=0;document.getElementById('specialprogram_con').style.display='none';document.getElementById('other_specialized_program').value='';document.getElementById('other_program').style.display='none'}">
<OPTION value "" >Select</OPTION>
<OPTION value="graduate" >Graduate</OPTION>
<option value="specialized" >Specialized</option>
</SELECT> <br />
<div id="specialprogram_con" style="display:none;">
<LABEL>Specialized Program: </LABEL>
<SELECT name="specialized_program" class="slc" id="specialized_program" onchange="if (this.options[this.selectedIndex].value=='other') document.getElementById('other_program').style.display='';else{document.getElementById('other_specialized_program').value='';document.getElementById('other_program').style.display='none';}">
<option value="" >Select</option>
<option value="mba">MBA/MS-CBA</option>
<option value="ms">MS/Ph.D - Nursing</option>
<option value="clinical">Clinical Doctorate (DPT) - Physical Therapy</option>
<option value="master_pubhealth">Master of Public Health</option>
<option value="doctor_pubhealth">Doctor of Public Health</option>
<option value="law">Law</option>
<option value="other" >Other</option>
</SELECT>
<a href="#" class="boxyinfo" id="grad_specialized" title="Specialized Programs" ><img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a><br />
</div>
<div id="other_program" style="display:none;">Other Specialized Program: <input type="text" class="slc" name="other_specialized_program" id="other_specialized_program">
<a href="#" class="boxyinfo" id="grad_specialized_other" title="Specialized Programs" ><img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a><br /></div>
<div id="visatypecon" style="display:none;">
<label>Visa Type: </label>
<SELECT class="slc" id="visatype" name="visatype" onchange="updateVisaType(this);">
<OPTION value "" >Select</OPTION>
<OPTION value="" >None</OPTION>
<option value="ForJ" >F or J</option>
</SELECT> <br />
</div>
<div id="agecon" style="display:none;">
<label>Age: </label>
<SELECT class="slc" id="age" name="age" onchange="updateAgeCosts();">
<OPTION value "" >Select</OPTION>
<OPTION value="26oryounger" >26 or younger</OPTION>
<option value="27to34" >27 and older</option>
</SELECT> <br />
</div>
<DIV class ="required" id="school" style=" display:none; ">
<LABEL>Previous School: </LABEL>
<SELECT class ="slc" name="previousschool" id="previousschool" onchange="toggle('previousschool');">
<option value="" >Select Previous School</option>
<OPTION value="usg" > Abraham Baldwin Agricultural College </OPTION>
<OPTION value="usg" > Albany State University </OPTION>
<OPTION value="usg" > Armstrong Atlantic State University </OPTION>
<OPTION value="usg" > Atlanta Metropolitan College </OPTION>
<OPTION value="usg" > Augusta State University </OPTION>
<OPTION value="usg" > Bainbridge College </OPTION>
<OPTION value="usg" > Clayton State University </OPTION>
<OPTION value="usg" > College of Coastal Georgia </OPTION>
<OPTION value="usg" > Columbus State University </OPTION>
<OPTION value="usg" > Dalton State College </OPTION>
<OPTION value="usg" > Darton College </OPTION>
<OPTION value="usg" > East Georgia College </OPTION>
<OPTION value="usg" > Fort Valley State University </OPTION>
<OPTION value="usg" > Gainesville State College </OPTION>
<OPTION value="usg" > Georgia College & State University </OPTION>
<OPTION value="usg" > Georgia Gwinnett College </OPTION>
<OPTION value="usg" > Georgia Highlands College </OPTION>
<OPTION value="usg" > Georgia Institute of Technology </OPTION>
<OPTION value="usg" > Georgia Perimeter College </OPTION>
<OPTION value="usg" > Georgia Southern University </OPTION>
<OPTION value="usg" > Georgia Southwestern State University </OPTION>
<OPTION value="usg" > Georgia State University </OPTION>
<OPTION value="usg" > Gordon College </OPTION>
<OPTION value="usg" > Kennesaw State University </OPTION>
<OPTION value="usg" > Macon State College </OPTION>
<OPTION value="usg" > Medical College of Georgia </OPTION>
<OPTION value="usg" > Middle Georgia College </OPTION>
<OPTION value="usg" > North Georgia College & State University </OPTION>
<OPTION value="usg" > Savannah State University </OPTION>
<OPTION value="usg" > Skidaway Institute of Oceanography </OPTION>
<OPTION value="usg" > Southern Polytechnic State University </OPTION>
<OPTION value="usg" > South Georgia College </OPTION>
<OPTION value="usg" > University of Georgia </OPTION>
<OPTION value="usg" > University of West Georgia </OPTION>
<OPTION value="usg" > Valdosta State University </OPTION>
<OPTION value="usg" > Waycross College </OPTION>
<OPTION value="o" > Other/Private college or university </OPTION>
</SELECT>
</DIV>
<DIV class ="required" id="semesterdiv" style="display:none;">
<LABEL >Semester You Entered: </LABEL>
<select name="yearyouenterd" class ="slc" id="yearyouentered" >
<option value="" selected>Select Semester You Entered</option>
<option value="555">After Summer 2009</option>
<option value="899">Spring or Summer 2009</option>
</SELECT>
</div>
</FIELDSET>
<br/>
<FIELDSET>
<LEGEND> Tuition and Fees</LEGEND>
<DIV class = notes>
<P class = last>&nbsp; </P>
<h4><i id="tuition_fees">$ 0.0</i></h4>
</DIV>
<LABEL style="width:35%;"> Books&nbsp;&&nbsp;Supplies: &nbsp;</LABEL>
<div class="cost" id="book_cost" name="book_cost" style="padding-left:5px;">$0.0</div>
<LABEL style="width:35%;"><i id="tuition_type" style="font-size:9px"></i> Tuition: &nbsp;</LABEL>
<div class="cost" id="tuition_cost" name="tuition_cost" style="padding-left:5px;">$0.0</div>
<input type="hidden" name="tempinsurancecost" id="tempinsurancecost" value="0">
<LABEL style="width:35%;display:none;" id="ins_label">Mandatory Health Insurance: &nbsp;</LABEL>
<div class="cost" style="white-space:nowrap;display:none;" id="ins_value"><span id="insurance_cost" name="insurance_cost" style="padding-top:0px;">$0.0</span> <a href="#" class="boxyinfo" id="grad_insurance" title="Health Insurance Info" >
<img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0" align="top"></a></div>
<LABEL style="width:35%;">Mandatory Student Fee: &nbsp;</LABEL>
<div class="cost" id="studentfee_cost" name="studentfee_cost" style="padding-left:5px;">$0.0</div>
<LABEL style="width:35%;"> Tuition and Fees Info: &nbsp;</LABEL>
<div class="cost" id="a" name="a" style="padding-left:5px;">
<a href="#" class="boxyinfo" id="grad_books" title="Tuition and Fees Info" >
<img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a> </div>
<LABEL style="width:35%;"></LABEL>
<div class="cost" id="a" name="a" style="padding-left:5px;">
</div>
</FIELDSET>
<br />
<FIELDSET>
<LEGEND> Room and Board & Transportation </LEGEND>
<p>Disclaimer: The Estimated Room and Board amount is our best approximation of what each student at Georgia State University may need to cover basic Room and Board expenses.</p>
<DIV class = notes>
<P class = last>&nbsp; </P>
<h4><i id="htotal">$0.0</i></h4>
</DIV>
<LABEL style="width:29%;" id="ins_label">Room and Board: &nbsp;</LABEL>
<div class="cost" style="white-space:nowrap;padding-top:5px;" id="grad_housing"><span id="room_and_board" name="room_and_board" style="padding-top:0px;">$0.0</span> <a href="#" class="boxyinfo" id="grad_housing" title="Room and Board Info" >
<img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0" align="top"></a></div>
<LABEL><a target="_blank" href="http://www.gsu.edu/parking/">Transportation</a>: </LABEL>
<select class="slc" name="transportation" >
<option value="0">Select A Choice &nbsp;</option>
<option value="215">Student (M-Deck) parking</option>
<option value="244">MARTA pass</option>
<option value="0">None</option>
</select>
<a href="#" class="boxyinfo" id="grad_transportation" title="Transportation Info" >
<img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a>
<LABEL> </LABEL>
</FIELDSET>
<br />
<FIELDSET>
<LEGEND> Financial Aid Information </LEGEND>
<p> Please use this section of the calculator to add any scholarships and loans you are eligible to receive for your education. If you wish to investigate federal loan options further, you may go to the <a href="http://www.fafsa.ed.gov/" target="_blank">FAFSA website (Federal Student Aid)</a>.
</p>
<br /> <LABEL >Loan Amount: </LABEL>
<INPUT type="text" id="loan" name="loan" size="10" maxlength="10" value="0" onKeyUp="numer(this);" />
<a href="#" class="boxyinfo" id="grad_loanAmount" title="Loan Amount"><img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a>
<br /> <LABEL >Scholarships Amount: </LABEL>
<INPUT type="text" id="scholarships" name="scholarships" size="10" maxlength="10" onKeyUp="numer(this);" value="0"/ >
<br /> <LABEL >Veterans Benefit: </LABEL>
<INPUT type="text" id="veterans" name="veterans" size="10" maxlength="10" onKeyUp="numer(this);" value="0"/ >
<a href="#" class="boxyinfo" id="veterans_benefit" title="Loan Amount"><img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a>
<br /> <LABEL >Graduate Assistantship: </LABEL>
<INPUT type="text" id="gradassistant" name="gradassistant" size="10" maxlength="10" onKeyUp="numer(this);" value="0"/ >
<a href="#" class="boxyinfo" id="grad_assistantship" title="Loan Amount"><img src="http://webdb.gsu.edu/calculator/icon_info.gif" border="0"></a>
<div id="out_of_state_waiver_con" style="display:none;padding-top:0px;">
<LABEL >Out-of-state waiver: </LABEL>
<INPUT type="text" id="outofstate_waiver" name="outofstate_waiver" size="10" maxlength="10" onKeyUp="numer(this);" value="0"/ >
</div>
<br>
<LABEL> </LABEL>
<DIV class = notes>
<h4> <i id="atotal">$0.0</i></h4>
</DIV>
</FIELDSET>
<DIV class = submit>
<table border="0" width="100%">
<tr>
<td> <INPUT class = inputSubmit name="ct_submit" type = submit value = "Calculate Total" ></td>
<td valing="top"> <DIV class = notes align="right">
<P class = last>&nbsp; </P>
<h2 style=" font-size:16px">TOTAL COST : <i id="total_cost">$0.0</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
</DIV>
</td>
</tr>
</table>
<br><div width="100%" align="center"><h3><a target="_blank" href="graduate_cost_calculator_intro.html">View Disclaimer</a></h3></div><br>
</form>
</DIV>
<!------------- October 26, 2012 Graduate Tuition calculator ----------------->


<?php
}   
add_shortcode('grad-cost-calculator','grad_cal');
?>