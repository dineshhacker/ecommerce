<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkuser.php");
	
	
	

?>

<!-- HTML STARTS-->
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include('pcommon/meta.php');
      ?>
	  
	  
  </head>

  <body>
		
		<div class="page-container">
			<?php include('pcommon/header.php'); ?>
				
				<div  style="float:left;position:relative;width:15%;  ">
					<?php include('pcommon/baseuser.php');?>
				</div>
	
				<div class="content">
												<!-- HTML STARTS-->
			<div style="background-color:#D3D5E2;  outline: 2px thick; padding:5px;
            	background: -moz-linear-gradient(#999 50%, #112 140%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, #D3D5E2), color-stop(140%, #112));
  background: -webkit-linear-gradient(#999 50%, #112 140%);
  background: linear-gradient(#D5AAAA 60%, #FFF 120%); text-align:center">
			<h1 style="font-size:16px;">DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:auto;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VISION  OF THE DEPARTMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 - To Produce Creators of Innovative Technology
					</p>
                    
					
 				</fieldset>
				</form>
				</div>
		
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MISSION OF THE DEPARTNMENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 - To  impart  knowledge  in  the  state  of  art  in  Computer Science and Engineering  with relevant theoretical basis.<br /><br />
						 - To  participate  in  design  and  development  process  in  R &  D  establishment  and industry.<br/><br />
						 - To promote research of international quality.<br />
						 </p>
                    
					
 				</fieldset>
				</form>
				</div>
		
				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROGRAM EDUCATIONAL OBJECTIVES (PEOs)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 - Graduates are prepared to be employed in IT industries and be engaged in learning, understanding, and applying new ideas.<br/><br />
						 - Graduates are prepared to take up Masters/Research programmes.<br/><br />
						 - Graduates are prepared to be responsible computing professionals in their own area of interest.<br/><br />
					</p>
                    
					
 				</fieldset>
				</form>
				</div>

				<div class="register-form" style=" width:85%;">
				<form  method="post" name="coursemap" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROGRAM OUTCOMES (POs)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					
                    <p style="font-weight:700;padding:5px;">
						 - Ability to apply mathematical foundations, algorithmic principles, and computer science theory in the modelling and design of computer based systems.<br/><br />
						 - Ability to apply the engineering knowledge in all domains, viz., health care, banking and finance, other professions such as medical, law, etc.<br/><br />
                    	 - Ability to design and conduct experiments as well as to analyze and interpret data.<br/><br />
                    	 - Ability to analyze the problem, subdivide into smaller tasks with well defined interface for interaction among components, and complete within the specified time frame and financial constraints.<br/><br />
                    	 - Ability to propose original ideas and solutions, culminating into a modern, easy to use tool, by a larger section of the society with longevity.<br/><br />
                    	 - Ability to design, implement, and evaluate secure hardware and/or software systems with assured quality and efficiency.<br/><br />
                    	 - Ability to communicate effectively the engineering solution to customers/users or peers.<br/><br />
                    	 - Ability to understand contemporary issues and to get engaged in lifelong learning by independently and continually expanding knowledge and abilities.<br/><br />
                    
					
 				</fieldset>
				</form>
				</div>
				
			
			</div>
                    
					
					<!-- HTML ENDS-->
	
				</div>
			
	
		</div>
	
	<div style="float:left;width:100%;">
    <?php
      include('pcommon/footer.php');
    ?>
	</div>

  </body>
</html>