<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkusertab.php");
	
	//GENERATE
	$f_id = $_SESSION['fkey'];
	$f_name = $_SESSION['nkey'];
	$c_id = $_SESSION['cikey'];
	$c_name = $_SESSION['ckey'];
	$semester = $_SESSION['skey'];
	$degree = $_SESSION['dkey'];
	$year = $_SESSION['ykey'];
	
	//CALCULATION PROCESSING
	
	//DELETE ----- TO BE DONE---------------
	
		
		
	$result = mysqli_query($link, "DELETE FROM mastertab WHERE course_id='$c_id' AND level='j' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				name='$f_name'");
	
	//--------------------------------------
		
		//--------STUDENT COUNT
		
	$result=mysqli_query($link,"SELECT student FROM studcoursemap WHERE course_id='$c_id' AND semester='$semester' AND degree='$degree' AND year='$year'
	AND faculty_id='$f_id' ORDER BY student ASC");
	$nstd = mysqli_num_rows($result);
	
	
	
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------CO1-----CT1

	$co1ct1tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct1' AND co='co1'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co1ct1tot;
		$co1ct1tot = $co1ct1tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco1ct1tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct1' AND co='co1'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco1ct1tot;
		$maxco1ct1tot = $maxco1ct1tot + $row["max_marks"];
	}

	$eco1ct1=0;
	if($maxco1ct1tot==0){
	global $eco1ct1;
	$eco1ct1=0;	 
	}
	else{
	global $eco1ct1;
	$eco1ct1 = $co1ct1tot/($nstd*$maxco1ct1tot);
	}
	
	
	
	
	//--------CO2-----CT1
	
	$co2ct1tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct1' AND co='co2'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co2ct1tot;
		$co2ct1tot = $co2ct1tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco2ct1tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct1' AND co='co2'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco2ct1tot;
		$maxco2ct1tot = $maxco2ct1tot + $row["max_marks"];
	}

	$eco2ct1=0;
	if($maxco2ct1tot==0){
	global $eco2ct1;
	$eco2ct1=0;	 
	}
	else{
	global $eco2ct1;
	$eco2ct1 = $co2ct1tot/($nstd*$maxco2ct1tot);
	}
	
	
	
	
	//--------CO3-----CT1
	
	$co3ct1tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct1' AND co='co3'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co3ct1tot;
		$co3ct1tot = $co3ct1tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco3ct1tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct1' AND co='co3'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco3ct1tot;
		$maxco3ct1tot = $maxco3ct1tot + $row["max_marks"];
	}

	$eco3ct1=0;
	if($maxco3ct1tot==0){
	global $eco3ct1;
	$eco3ct1=0;	 
	}
	else{
	global $eco3ct1;
	$eco3ct1 = $co3ct1tot/($nstd*$maxco3ct1tot);
	}
	echo $eco1ct1;
	echo $eco2ct1;
	echo $eco3ct1;
	echo '<br>';
	echo $maxco1ct1tot;
	echo $maxco2ct1tot;
	echo $maxco3ct1tot;
	
	/*
	$level='2';
	$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam);
	mysqli_stmt_execute($ins);
	mysqli_stmt_close($ins);
	*/
	
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------CO1-----CT2

	$co1ct2tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct2' AND co='co1'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co1ct2tot;
		$co1ct2tot = $co1ct2tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco1ct2tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct2' AND co='co1'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco1ct2tot;
		$maxco1ct2tot = $maxco1ct2tot + $row["max_marks"];
	}

	$eco1ct2=0;
	if($maxco1ct2tot==0){
	global $eco1ct2;
	$eco1ct2=0;	 
	}
	else{
	global $eco1ct2;
	$eco1ct2= $co1ct2tot/($nstd*$maxco1ct2tot);
	}
	
	
	
	
	//--------CO2-----ct2
	
	$co2ct2tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct2' AND co='co2'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co2ct2tot;
		$co2ct2tot = $co2ct2tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco2ct2tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct2' AND co='co2'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco2ct2tot;
		$maxco2ct2tot = $maxco2ct2tot + $row["max_marks"];
	}

	$eco2ct2=0;
	if($maxco2ct2tot==0){
	global $eco2ct2;
	$eco2ct2=0;	 
	}
	else{
	global $eco2ct2;
	$eco2ct2 = $co2ct2tot/($nstd*$maxco2ct2tot);
	}
	
	
	
	
	//--------CO3-----ct2
	
	$co3ct2tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct2' AND co='co3'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co3ct2tot;
		$co3ct2tot = $co3ct2tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco3ct2tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct2' AND co='co3'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco3ct2tot;
		$maxco3ct2tot = $maxco3ct2tot + $row["max_marks"];
	}

	$eco3ct2=0;
	if($maxco3ct2tot==0){
	global $eco3ct2;
	$eco3ct2=0;	 
	}
	else{
	global $eco3ct2;
	$eco3ct2 = $co3ct2tot/($nstd*$maxco3ct2tot);
	}
	echo '<br>';
	echo $eco1ct2;
	echo $eco2ct2;
	echo $eco3ct2;
	echo '<br>';
	echo $maxco1ct2tot;
	echo $maxco2ct2tot;
	echo $maxco3ct2tot;
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------CO1-----ct3

	$co1ct3tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct3' AND co='co1'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co1ct3tot;
		$co1ct3tot = $co1ct3tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco1ct3tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct3' AND co='co1'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco1ct3tot;
		$maxco1ct3tot = $maxco1ct3tot + $row["max_marks"];
	}

	$eco1ct3=0;
	if($maxco1ct3tot==0){
	global $eco1ct3;
	$eco1ct3=0;	 
	}
	else{
	global $eco1ct3;
	$eco1ct3= $co1ct3tot/($nstd*$maxco1ct3tot);
	}
	
	
	
	
	//--------CO2-----ct3
	
	$co2ct3tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct3' AND co='co2'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co2ct3tot;
		$co2ct3tot = $co2ct3tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco2ct3tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct3' AND co='co2'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco2ct3tot;
		$maxco2ct3tot = $maxco2ct3tot + $row["max_marks"];
	}

	$eco2ct3=0;
	if($maxco2ct3tot==0){
	global $eco2ct3;
	$eco2ct3=0;	 
	}
	else{
	global $eco2ct3;
	$eco2ct3 = $co2ct3tot/($nstd*$maxco2ct3tot);
	}
	
	
	
	
	//--------CO3-----ct3
	
	$co3ct3tot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct3' AND co='co3'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co3ct3tot;
		$co3ct3tot = $co3ct3tot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco3ct3tot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='ct3' AND co='co3'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco3ct3tot;
		$maxco3ct3tot = $maxco3ct3tot + $row["max_marks"];
	}

	$eco3ct3=0;
	if($maxco3ct3tot==0){
	global $eco3ct3;
	$eco3ct3=0;	 
	}
	else{
	global $eco3ct3;
	$eco3ct3 = $co3ct3tot/($nstd*$maxco3ct3tot);
	}
	echo '<br>';
	echo $eco1ct3;
	echo $eco2ct3;
	echo $eco3ct3;
	echo '<br>';
	echo $maxco1ct3tot;
	echo $maxco2ct3tot;
	echo $maxco3ct3tot;
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------CO1-----endsem

	$co1endsemtot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='endsem' AND co='co1'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co1endsemtot;
		$co1endsemtot = $co1endsemtot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco1endsemtot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='endsem' AND co='co1'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco1endsemtot;
		$maxco1endsemtot = $maxco1endsemtot + $row["max_marks"];
	}

	$eco1endsem=0;
	if($maxco1endsemtot==0){
	global $eco1endsem;
	$eco1endsem=0;	 
	}
	else{
	global $eco1endsem;
	$eco1endsem= $co1endsemtot/($nstd*$maxco1endsemtot);
	}
	
	
	
	
	//--------CO2-----endsem
	
	$co2endsemtot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='endsem' AND co='co2'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co2endsemtot;
		$co2endsemtot = $co2endsemtot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco2endsemtot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='endsem' AND co='co2'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco2endsemtot;
		$maxco2endsemtot = $maxco2endsemtot + $row["max_marks"];
	}

	$eco2endsem=0;
	if($maxco2endsemtot==0){
	global $eco2endsem;
	$eco2endsem=0;	 
	}
	else{
	global $eco2endsem;
	$eco2endsem = $co2endsemtot/($nstd*$maxco2endsemtot);
	}
	
	
	
	
	//--------CO3-----endsem
	
	$co3endsemtot=0;
	$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='endsem' AND co='co3'");
	//echo mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		global $co3endsemtot;
		$co3endsemtot = $co3endsemtot + $row["scored_marks"];	
	}
		
	//---------MAX MARKS
	$maxco3endsemtot=0;
	$result = mysqli_query($link, "SELECT max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='endsem' AND co='co3'");
	while($row = mysqli_fetch_assoc($result)){
		
		global $maxco3endsemtot;
		$maxco3endsemtot = $maxco3endsemtot + $row["max_marks"];
	}

	$eco3endsem=0;
	if($maxco3endsemtot==0){
	global $eco3endsem;
	$eco3endsem=0;	 
	}
	else{
	global $eco3endsem;
	$eco3endsem = $co3endsemtot/($nstd*$maxco3endsemtot);
	}
	echo '<br>';
	echo $eco1endsem;
	echo $eco2endsem;
	echo $eco3endsem;
	echo '<br>';
	echo $maxco1endsemtot;
	echo $maxco2endsemtot;
	echo $maxco3endsemtot;
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	//--------------------------------------------------------------//
	
	//COURSE OUTCOME Creation
	
	$co1=0;
	$co2=0;
	$co3=0;
	
	
	//CO1 CALCULATION
	if(($maxco1ct1tot +$maxco1ct2tot +$maxco1ct3tot +$maxco1endsemtot) != 0 ){
		$co1 = (($eco1ct1 * $maxco1ct1tot) + ($eco1ct2 * $maxco1ct2tot) + ($eco1ct3 * $maxco1ct3tot) + ($eco1endsem * $maxco1endsemtot))/($maxco1ct1tot +$maxco1ct2tot +$maxco1ct3tot +$maxco1endsemtot);
	} else if(($maxco1ct1tot +$maxco1ct2tot +$maxco1ct3tot +$maxco1endsemtot) == 0 ){
		$co1 = 0;	
	}
	echo '<br>';
	echo $co1;
	
	//CO2 CALCULATION
	if(($maxco2ct1tot +$maxco2ct2tot +$maxco2ct3tot +$maxco2endsemtot) != 0 ){
		$co2 = (($eco2ct1 * $maxco2ct1tot) + ($eco2ct2 * $maxco2ct2tot) + ($eco2ct3 * $maxco2ct3tot) + ($eco2endsem * $maxco2endsemtot))/($maxco2ct1tot +$maxco2ct2tot +$maxco2ct3tot +$maxco2endsemtot);
	} else if(($maxco2ct1tot +$maxco2ct2tot +$maxco2ct3tot +$maxco2endsemtot) == 0 ){
		$co2 = 0;	
	}
	echo '<br>';
	echo $co2;
		
	//CO3 CALCULATION
	if(($maxco3ct1tot +$maxco3ct2tot +$maxco3ct3tot +$maxco3endsemtot) != 0 ){
		$co3 = (($eco3ct1 * $maxco3ct1tot) + ($eco3ct2 * $maxco3ct2tot) + ($eco3ct3 * $maxco3ct3tot) + ($eco3endsem * $maxco3endsemtot))/($maxco3ct1tot +$maxco3ct2tot +$maxco3ct3tot +$maxco3endsemtot);
	} else if(($maxco3ct1tot +$maxco3ct2tot +$maxco3ct3tot +$maxco3endsemtot) == 0 ){
		$co3 = 0;	
	}
	echo '<br>';
	echo $co3;
	echo '<br>';
	
	
	//CO1PO CALCULATION
	
	
	$result = mysqli_query($link, "SELECT mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11 FROM mastertab WHERE course_id='$c_id' AND level='m' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND co='co1'");
	$co1po01=0;$co1po02=0;$co1po03=0;$co1po04=0;$co1po05=0;$co1po06=0;$co1po07=0;$co1po08=0;$co1po09=0;$co1po10=0;$co1po11=0;
	if($row = mysqli_fetch_assoc($result)){
		
		$co1po01=$row['mpo1'];
		$co1po02=$row['mpo2'];
		$co1po03=$row['mpo3'];
		$co1po04=$row['mpo4'];
		$co1po05=$row['mpo5'];
		$co1po06=$row['mpo6'];
		$co1po07=$row['mpo7'];
		$co1po08=$row['mpo8'];
		$co1po09=$row['mpo9'];
		$co1po10=$row['mpo10'];
		$co1po11=$row['mpo11'];
		
	}
	// echo $co1po01;
	// echo '<br>';
	// echo $co1po02;
	// echo '<br>';
	// echo $co1po03;
	// echo '<br>';
	// echo $co1po04;
	// echo '<br>';
	// echo $co1po05;
	// echo '<br>';
	// echo $co1po06;
	// echo '<br>';
	// echo $co1po07;
	// echo '<br>';
	// echo $co1po08;
	// echo '<br>';
	// echo $co1po09;
	// echo '<br>';
	// echo $co1po10;
	// echo '<br>';
	// echo $co1po11;
	// echo '<br>';

	//CO2PO CALCULATION
	
	$result = mysqli_query($link, "SELECT mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11 FROM mastertab WHERE course_id='$c_id' AND level='m' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND co='co2'");
	$co2po01=0;$co2po02=0;$co2po03=0;$co2po04=0;$co2po05=0;$co2po06=0;$co2po07=0;$co2po08=0;$co2po09=0;$co2po10=0;$co2po11=0;
	if($row = mysqli_fetch_assoc($result)){
		
		$co2po01=$row['mpo1'];
		$co2po02=$row['mpo2'];
		$co2po03=$row['mpo3'];
		$co2po04=$row['mpo4'];
		$co2po05=$row['mpo5'];
		$co2po06=$row['mpo6'];
		$co2po07=$row['mpo7'];
		$co2po08=$row['mpo8'];
		$co2po09=$row['mpo9'];
		$co2po10=$row['mpo10'];
		$co2po11=$row['mpo11'];
		
	}
	// echo $co2po01;
	// echo '<br>';
	// echo $co2po02;
	// echo '<br>';
	// echo $co2po03;
	// echo '<br>';
	// echo $co2po04;
	// echo '<br>';
	// echo $co2po05;
	// echo '<br>';
	// echo $co2po06;
	// echo '<br>';
	// echo $co2po07;
	// echo '<br>';
	// echo $co2po08;
	// echo '<br>';
	// echo $co2po09;
	// echo '<br>';
	// echo $co2po10;
	// echo '<br>';
	// echo $co2po11;
	// echo '<br>';

	//CO3PO CALCULATION
	
	$result = mysqli_query($link, "SELECT mpo1,mpo2,mpo3,mpo4,mpo5,mpo6,mpo7,mpo8,mpo9,mpo10,mpo11 FROM mastertab WHERE course_id='$c_id' AND level='m' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND co='co3'");
	$co3po01=0;$co3po02=0;$co3po03=0;$co3po04=0;$co3po05=0;$co3po06=0;$co3po07=0;$co3po08=0;$co3po09=0;$co3po10=0;$co3po11=0;
	
	if($row = mysqli_fetch_assoc($result)){
		
		$co3po01=$row['mpo1'];
		$co3po02=$row['mpo2'];
		$co3po03=$row['mpo3'];
		$co3po04=$row['mpo4'];
		$co3po05=$row['mpo5'];
		$co3po06=$row['mpo6'];
		$co3po07=$row['mpo7'];
		$co3po08=$row['mpo8'];
		$co3po09=$row['mpo9'];
		$co3po10=$row['mpo10'];
		$co3po11=$row['mpo11'];
		
	}
	
	// echo $co3po01;
	// echo '<br>';
	// echo $co3po02;
	// echo '<br>';
	// echo $co3po03;
	// echo '<br>';
	// echo $co3po04;
	// echo '<br>';
	// echo $co3po05;
	// echo '<br>';
	// echo $co3po06;
	// echo '<br>';
	// echo $co3po07;
	// echo '<br>';
	// echo $co3po08;
	// echo '<br>';
	// echo $co3po09;
	// echo '<br>';
	// echo $co3po10;
	// echo '<br>';
	// echo $co3po11;
	// echo '<br>';
	
	//PROGRAM OUTCOME GENERATION
	$po1=0;$po2=0;$po3=0;$po3=0;$po4=0;$po5=0;$po6=0;$po7=0;$po8=0;$po9=0;$po10=0;$po11=0;
	
	
	if(($co1po01 + $co2po01 + $co3po01) != 0 )
		$po1 = ( ($co1 * $co1po01) + ($co2 * $co2po01) + ($co3 * $co3po01) ) / ($co1po01 + $co2po01 + $co3po01) ;
	if(($co1po02 + $co2po02 + $co3po02) != 0 )
		$po2 = ( ($co1 * $co1po02) + ($co2 * $co2po02) + ($co3 * $co3po02) ) / ($co1po02 + $co2po02 + $co3po02) ;
	if(($co1po03 + $co2po03 + $co3po03) != 0 )
		$po3 = ( ($co1 * $co1po03) + ($co2 * $co2po03) + ($co3 * $co3po03) ) / ($co1po03 + $co2po03 + $co3po03) ;
	if(($co1po04 + $co2po04 + $co3po04) != 0 )
		$po4 = ( ($co1 * $co1po04) + ($co2 * $co2po04) + ($co3 * $co3po04) ) / ($co1po04 + $co2po04 + $co3po04) ;
	if(($co1po05 + $co2po05 + $co3po05) != 0 )
		$po5 = ( ($co1 * $co1po05) + ($co2 * $co2po05) + ($co3 * $co3po05) ) / ($co1po05 + $co2po05 + $co3po05) ;
	if(($co1po06 + $co2po06 + $co3po06) != 0 )
		$po6 = ( ($co1 * $co1po06) + ($co2 * $co2po06) + ($co3 * $co3po06) ) / ($co1po06 + $co2po06 + $co3po06) ;
	if(($co1po07 + $co2po07 + $co3po07) != 0 )
		$po7 = ( ($co1 * $co1po07) + ($co2 * $co2po07) + ($co3 * $co3po07) ) / ($co1po07 + $co2po07 + $co3po07) ;
	if(($co1po08 + $co2po08 + $co3po08) != 0 )
		$po8 = ( ($co1 * $co1po08) + ($co2 * $co2po08) + ($co3 * $co3po08) ) / ($co1po08 + $co2po08 + $co3po08) ;
	if(($co1po09 + $co2po09 + $co3po09) != 0 )
		$po9 = ( ($co1 * $co1po09) + ($co2 * $co2po09) + ($co3 * $co3po09) ) / ($co1po09 + $co2po09 + $co3po09) ;
	if(($co1po10 + $co2po10 + $co3po10) != 0 )
		$po10 = ( ($co1 * $co1po10) + ($co2 * $co2po10) + ($co3 * $co3po10) ) / ($co1po10 + $co2po10 + $co3po10) ;
	if(($co1po11 + $co2po11 + $co3po11) != 0 )
		$po11 = ( ($co1 * $co1po11) + ($co2 * $co2po11) + ($co3 * $co3po11) ) / ($co1po11 + $co2po11 + $co3po11) ;
	
	
	echo '<br>';
	echo $po1;
	echo '<br>';
	echo $po2;
	echo '<br>';
	echo $po3;
	echo '<br>';
	echo $po4;
	echo '<br>';
	echo $po5;
	echo '<br>';
	echo $po6;
	echo '<br>';
	echo $po7;
	echo '<br>';
	echo $po8;
	echo '<br>';
	echo $po9;
	echo '<br>';
	echo $po10;
	echo '<br>';
	echo $po11;
	echo '<br>';
	
	
	
	//INSERTIONS------------------------------------------------------ 
	//INSERTIONS------------------------------------------------------ 
	//INSERTIONS------------------------------------------------------ 
	//INSERTIONS------------------------------------------------------ 
	//INSERTIONS------------------------------------------------------ 
	//INSERTIONS------------------------------------------------------ 
	$level='j';
	$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,co1,co2,co3,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($ins, 'ssssssssdddddddddddddd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$co1,$co2,$co3,$po1,$po2,$po3,$po4,$po5,$po6,$po7,$po8,$po9,$po10,$po11);
	mysqli_stmt_execute($ins);
	mysqli_stmt_close($ins);
				
	
	
	//JUMPING TO PRINT PAGE
	
	header("Location:userctmapprint.php");
	
	
?>

<!-- HTML STARTS-->
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include('pcommon/meta.php');
      ?>
	  
			<style>

#exm td, #customers th {
    font-size: 1em;
    padding: 3px 7px 2px 7px;
}

#exm th {
    font-size: 1.1em;
    text-align: center;
    padding-top: 5px;
    padding-bottom: 4px;
    background-color: #A7C942;
    color: #000;
}

#exm tr.alt td {
    color: #000000;
    background-color: #EAF2D3;
}
</style>
		
			<script>
			function validateForm() {
			
			
				
				
			}
		</script>
	  
  </head>

  <body>
 <div class="page-container" >
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
			<h1 style="font-size:16px;">CALCULATION PAGE - TEMP</h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:509px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			<p style="text-align:center; ">
			<img src="images/loading.gif">
			</p>
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