<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkusertab.php");
	
	//FORM HANDLING
	
	if(isset($_POST['nxt']) && !empty($_POST["nxt"]))
	{
			header("Location:userctmap3.php");
		
	}
	
	
	if(isset($_POST['rollno']) && !empty($_POST["rollno"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		$roll=$_POST['rollno'];
		$ct=$_POST['choo'];
		
		$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='2' AND student='$roll' AND course_id='$c_id' AND year='$year' AND degree='$degree' AND faculty_id='$f_id' AND semester='$semester' AND exam='$ct'");
				
		
		
	
	
	}
	
	
	if(isset($_POST['delall']) && !empty($_POST["delall"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];

			$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='2' AND student='$roll' AND course_id='$c_id' AND year='$year' AND degree='$degree' AND faculty_id='$f_id' AND semester='$semester'");
				
		}
		
		mysqli_stmt_close($rut);
	
	}
	
	
	if(isset($_POST['dct1']) && !empty($_POST["dct1"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='2' AND student='$roll' AND course_id='$c_id' AND year='$year' AND degree='$degree' AND faculty_id='$f_id' AND semester='$semester' AND exam='ct1'");
				
		}
		
		mysqli_stmt_close($rut);
	
	}
	
	if(isset($_POST['dct2']) && !empty($_POST["dct2"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='2' AND student='$roll' AND course_id='$c_id' AND year='$year' AND degree='$degree' AND faculty_id='$f_id' AND semester='$semester' AND exam='ct2'");
				
		}
		
		mysqli_stmt_close($rut);
	
	}
	
	if(isset($_POST['dct3']) && !empty($_POST["dct3"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='2' AND student='$roll' AND course_id='$c_id' AND year='$year' AND degree='$degree' AND faculty_id='$f_id' AND semester='$semester' AND exam='ct3'");
				
		}
		
		mysqli_stmt_close($rut);
	
	}
	
	if(isset($_POST['delsem']) && !empty($_POST["delsem"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			$result = mysqli_query($link, "DELETE FROM mastertab WHERE level='2' AND student='$roll' AND course_id='$c_id' AND year='$year' AND degree='$degree' AND faculty_id='$f_id' AND semester='$semester' AND exam='endsem'");
				
		}
		
		mysqli_stmt_close($rut);
	
	}
	
	
	//GET MAXIMUM MARK VALUES
	

	if(isset($_POST['dsem']) && !empty($_POST["dsem"]))
	{
		
		//Temp Vars
		$exam = $_POST['exam'];
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		$level='2';
		
		//mysqli_query($link, "SELECT firstName, lastName, annMonth, annDay, annYear FROM employees WHERE annMonth = '$currDate;'ORDER BY annDay"));
		
		//------------------aaaaaaa---------------//
		$q='1a';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $a1 = $row["max_marks"];
		$ax1 = $row["co"];
		
		$q='2a';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $a2 = $row["max_marks"];
		$ax2 = $row["co"];
		
		$q='3a';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $a3 = $row["max_marks"];
		$ax3 = $row["co"];
		
		$q='4a';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $a4 = $row["max_marks"];
		$ax4 = $row["co"];
		
		$q='5a';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $a5 = $row["max_marks"];
		$ax5 = $row["co"];
		
		
		//------------------bbbbbbbbb---------------//
		$q='1b';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $b1 = $row["max_marks"];
		$bx1 = $row["co"];
		
		$q='2b';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $b2 = $row["max_marks"];
		$bx2 = $row["co"];
		
		$q='3b';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $b3 = $row["max_marks"];
		$bx3 = $row["co"];
		
		$q='4b';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $b4 = $row["max_marks"];
		$bx4 = $row["co"];
		
		$q='5b';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $b5 = $row["max_marks"];
		$bx5 = $row["co"];
		
		//------------------cccccccc---------------//
		$q='1c';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $c1 = $row["max_marks"];
		$cx1 = $row["co"];
		
		$q='2c';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $c2 = $row["max_marks"];
		$cx2 = $row["co"];
		
		$q='3c';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $c3 = $row["max_marks"];
		$cx3 = $row["co"];
		
		$q='4c';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $c4 = $row["max_marks"];
		$cx4 = $row["co"];
		
		$q='5c';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $c5 = $row["max_marks"];
		$cx5 = $row["co"];
		
		//------------------dddddddd---------------//
		$q='1d';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $d1 = $row["max_marks"];
		$dx1 = $row["co"];
		
		$q='2d';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $d2 = $row["max_marks"];
		$dx2 = $row["co"];
		
		$q='3d';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $d3 = $row["max_marks"];
		$dx3 = $row["co"];
		
		$q='4d';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $d4 = $row["max_marks"];
		$dx4 = $row["co"];
		
		$q='5d';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $d5 = $row["max_marks"];
		$dx5 = $row["co"];
		
		//------------------eeeeee---------------//
		$q='1e';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $e1 = $row["max_marks"];
		$ex1 = $row["co"];
		
		$q='2e';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $e2 = $row["max_marks"];
		$ex2 = $row["co"];
		
		$q='3e';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $e3 = $row["max_marks"];
		$ex3 = $row["co"];
		
		$q='4e';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $e4 = $row["max_marks"];
		$ex4 = $row["co"];
		
		$q='5e';
		$result = mysqli_query($link, "SELECT co, max_marks FROM mastertab WHERE course_id='$c_id' AND level='1' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND 
				exam='$exam' AND qno='$q'");
		$row = mysqli_fetch_assoc($result);
        $e5 = $row["max_marks"];
		$ex5 = $row["co"];
		
		//--------------------------------------------------------//
		
		
		//NOW INSERT THE DATA INTO TABLE
		
		
		$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
				
				$exam = $_POST['exam'];
				$f_id= $_SESSION['fkey'];
				$f_name= $_SESSION['nkey'];
				$c_id= $_SESSION['cikey'];
				$c_name= $_SESSION['ckey'];
				$semester= $_SESSION['skey'];
				$degree= $_SESSION['dkey'];
				$year= $_SESSION['ykey'];
				$level='2';
				
				$smarks = $_POST["1a".$roll];
				$qno ='1a';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ax1,$a1,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);

				$smarks = $_POST["1b".$roll];
				$qno ='1b';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$bx1,$b1,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["1c".$roll];
				$qno ='1c';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$cx1,$c1,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["1d".$roll];
				$qno ='1d';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$dx1,$d1,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["1e".$roll];
				$qno ='1e';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ex1,$e1,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				//--------------------------------
				
								$smarks = $_POST["2a".$roll];
				$qno ='2a';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ax2,$a2,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);

				$smarks = $_POST["2b".$roll];
				$qno ='2b';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$bx2,$b2,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["2c".$roll];
				$qno ='2c';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$cx2,$c2,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["2d".$roll];
				$qno ='2d';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$dx2,$d2,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["2e".$roll];
				$qno ='2e';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ex2,$e2,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				//--------------------------------
				
								$smarks = $_POST["3a".$roll];
				$qno ='3a';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ax3,$a3,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);

				$smarks = $_POST["3b".$roll];
				$qno ='3b';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$bx3,$b3,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["3c".$roll];
				$qno ='3c';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$cx3,$c3,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["3d".$roll];
				$qno ='3d';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$dx3,$d3,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["3e".$roll];
				$qno ='3e';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ex3,$e3,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				//--------------------------------
				
								$smarks = $_POST["4a".$roll];
				$qno ='4a';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ax4,$a4,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);

				$smarks = $_POST["4b".$roll];
				$qno ='4b';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$bx4,$b4,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["4c".$roll];
				$qno ='4c';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$cx4,$c4,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["4d".$roll];
				$qno ='4d';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$dx4,$d4,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["4e".$roll];
				$qno ='4e';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ex4,$e4,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				//--------------------------------
				
								$smarks = $_POST["5a".$roll];
				$qno ='5a';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ax5,$a5,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);

				$smarks = $_POST["5b".$roll];
				$qno ='5b';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$bx5,$b5,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["5c".$roll];
				$qno ='5c';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$cx5,$c5,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["5d".$roll];
				$qno ='5d';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$dx5,$d5,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				
				$smarks = $_POST["5e".$roll];
				$qno ='5e';
				$ins = mysqli_prepare($link,"INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks,student,scored_marks)	VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($ins, 'sssssssssssdsd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$ex5,$e5,$roll,$smarks);
				mysqli_stmt_execute($ins);
				mysqli_stmt_close($ins);
				

	
		}
		
		mysqli_stmt_close($rut);
		
			
	}
	
	

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
				var x = document.forms["delstud"]["rollno"].value;
			
				if((x==null || x=="")){
					alert("Fields are Empty!");
				}
				
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
			<h1 style="font-size:16px;">Student Mark Entry -- <?php echo $_SESSION["cikey"]; ?> - <?php echo $_SESSION["ckey"]; ?> -
			<?php echo $_SESSION["dkey"]; ?> - <?php echo $_SESSION["ykey"]; ?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:5px; height:auto; float:left;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style="width:66%;">
				<div style="text-align:center;">
				<form id="next" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="nxt" style="display:none">
						<option value="1">1</option>
				</select>		
				
					<input class="btn register" type="submit" name="next" value="PROCEED TO REPORT GENERATION" form="next" style="width:300px;"/>
			</form>
				</div>
			
				<form  method="post" name="courseenter" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					 <p style="padding:5px;">
					<table style="width:100%;">
					<tr>
					<td style="width:10%;"><b>Faculty ID </b></td><td><b>:</b> <?php echo $_SESSION["fkey"];  ?></td>
					<td style="width:14%;"><b>Faculty Name </b></td><td><b>:</b> <?php echo $_SESSION["nkey"];  ?></td>
					</tr>
					<tr>
					<td ><b>Course ID </b></td><td><b>:</b> <?php echo $_SESSION["cikey"];  ?></td>
				
					<td><b>Course Name </b></td><td><b>:</b> <?php echo $_SESSION["ckey"];  ?></td>
					
					<td style="width:6%;"><b>Year </b></td><td><b>:</b> <?php echo $_SESSION["ykey"];  ?></td>
					</tr>
					<tr>
					<td><b>Semester </b></td><td><b>:</b> <?php echo $_SESSION["skey"];  ?></td>
					<td><b>Degree </b></td><td><b>:</b> <?php echo $_SESSION["dkey"];  ?></td>
					</tr>
					</table>
					</p>					
					 
 				</fieldset>
			</form>
			<br/>
			
				<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="delstud" onsubmit="return validateForm()" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					 <p style="padding:5px;">
						<label>&nbsp;&nbsp;&nbsp;<b>Roll No:&nbsp;</b></label>
					
						<input name="rollno" type="text" placeholder="Roll No."/><br/>
						
					</p>					
					 
					<p style="padding:5px;">
						<label style="float:left">&nbsp;&nbsp;&nbsp;&nbsp;<b>Exam: &nbsp;&nbsp;&nbsp;</b></label>
						
					<select name="choo" style="float:left;width:176px;">
							<option value="ct1">CT1</option>
							<option value="ct2">CT2</option>
							<option value="ct3">CT3</option>
							<option value="endsem">END SEM</option>
						</select>
						
					</p>
 				</fieldset>
				<fieldset class="fieldsetbtn">
				<input class="btn register" type="submit" name="sa" value="DELETE"/>
				</fieldset>
			</form>
            
			
            </div>
			
			<div class="register-form" style="width:100%;">
				
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="qppattern" >
            
				
				<fieldset class="fieldsetform"	><legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Details&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
					<p style="font-weight:700;padding:5px;align:center;width:400px;">
					<label>EXAM :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<select name="exam">
						<option value="ct1">CT1</option>
						<option value="ct2">CT2</option>
						<option value="ct3">CT3</option>
						<option value="endsem">END SEMESTER</option>
				
					</select> <br/>
					</p>
				<p style="font-weight:700;padding:5px;align:center;width:400px;">
					
					<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>ROLL NO</th>
						<th>1a</th>
						<th>1b</th>
						<th>1c</th>
						<th>1d</th>
						<th>1e</th>
						
						<th>2a</th>
						<th>2b</th>
						<th>2c</th>
						<th>2d</th>
						<th>2e</th>
						
						<th>3a</th>
						<th>3b</th>
						<th>3c</th>
						<th>3d</th>
						<th>3e</th>
						
						<th>4a</th>
						<th>4b</th>
						<th>4c</th>
						<th>4d</th>
						<th>4e</th>
						
						<th>5a</th>
						<th>5b</th>
						<th>5c</th>
						<th>5d</th>
						<th>5e</th>
					</tr>
					<?php
						
						$ret = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
						mysqli_stmt_bind_param($ret, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
						mysqli_stmt_execute($ret);
					
						mysqli_stmt_bind_result($ret, $roll);
						
						while( mysqli_stmt_fetch($ret)){
						echo '<tr>';
						
						echo '<td>';
						echo $roll;
						echo '</td>';
						
						echo '<td>';
						echo'<input type="text" name="'."1a".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."1b".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."1c".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."1d".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."1e".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						
						echo '<td>';
						echo'<input type="text" name="'."2a".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."2b".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."2c".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."2d".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."2e".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						
						echo '<td>';
						echo'<input type="text" name="'."3a".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."3b".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."3c".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."3d".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."3e".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						
						echo '<td>';
						echo'<input type="text" name="'."4a".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."4b".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."4c".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."4d".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."4e".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						
						echo '<td>';
						echo'<input type="text" name="'."5a".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."5b".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."5c".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."5d".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						echo '<td>';
						echo'<input type="text" name="'."5e".$roll.'" value="0" style="width:15px;"/>';
						echo '</td>';
						
						
						
						echo '</tr>';
						}
						
						
						mysqli_stmt_close($ret);
		  
					?>
					</table>
					
					
				</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					
					<select name="dsem" style="display:none">
						<option value="1">1</option>
					</select>
					<input class="btn register" type="submit" name="resetct1" value="CLEAR CT1" form="ct1" />
					<input class="btn register" type="submit" name="resetct2" value="CLEAR CT2" form="ct2" />
					<input class="btn register" type="submit" name="resetct3" value="CLEAR CT3" form="ct3" />
					<input class="btn register" type="submit" name="resetct4" value="CLEAR SEM" form="sem" />
					<input class="btn register" type="submit" name="reset" value="DELETE ALL" form="rst" />
					
					<input class="btn register" type="submit" name="submit" value="SUBMIT" />
				</fieldset>
			</form>
			<form id="rst" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="deleteall">
				<select name="delall" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
			<form id="ct1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="dct1" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
			<form id="ct2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="dct2" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
			<form id="ct3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="dct3" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
			<form id="sem" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="delsem" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
			</div>
			<br/><br/><br/><br/>
			<table class="gradienttable" style="margin:0 auto; padding:25px; width:100%;" >
				
				<tr>
						<th>ROLL NO</th>
						<th>EXAM</th>
						<th>1a</th>
						<th>1b</th>
						<th>1c</th>
						<th>1d</th>
						<th>1e</th>
						
						<th>2a</th>
						<th>2b</th>
						<th>2c</th>
						<th>2d</th>
						<th>2e</th>
						
						<th>3a</th>
						<th>3b</th>
						<th>3c</th>
						<th>3d</th>
						<th>3e</th>
						
						<th>4a</th>
						<th>4b</th>
						<th>4c</th>
						<th>4d</th>
						<th>4e</th>
						
						<th>5a</th>
						<th>5b</th>
						<th>5c</th>
						<th>5d</th>
						<th>5e</th>
						
					</tr>
				
				
				<?php
				
				
		
			$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			
				
				$f_id= $_SESSION['fkey'];
				$f_name= $_SESSION['nkey'];
				$c_id= $_SESSION['cikey'];
				$c_name= $_SESSION['ckey'];
				$semester= $_SESSION['skey'];
				$degree= $_SESSION['dkey'];
				$year= $_SESSION['ykey'];
				$level='2';
					
				//CT1	
				echo '<tr>';
				echo '<td>'.$roll.'</td>';
				$exam='ct1';
				echo '<td>'.$exam.'</td>';
				
				$q='1a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='2a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='3a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='4a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            $q='5a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            echo '</tr>';
          }
		  
			mysqli_stmt_close($rut);
			
			
			
			///////////CT@22222222222222222222222
			echo '<tr>
						<th>ROLL NO</th>
						<th>EXAM</th>
						<th>1a</th>
						<th>1b</th>
						<th>1c</th>
						<th>1d</th>
						<th>1e</th>
						
						<th>2a</th>
						<th>2b</th>
						<th>2c</th>
						<th>2d</th>
						<th>2e</th>
						
						<th>3a</th>
						<th>3b</th>
						<th>3c</th>
						<th>3d</th>
						<th>3e</th>
						
						<th>4a</th>
						<th>4b</th>
						<th>4c</th>
						<th>4d</th>
						<th>4e</th>
						
						<th>5a</th>
						<th>5b</th>
						<th>5c</th>
						<th>5d</th>
						<th>5e</th>
						
					</tr>';
			
			
			$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			
				
				$f_id= $_SESSION['fkey'];
				$f_name= $_SESSION['nkey'];
				$c_id= $_SESSION['cikey'];
				$c_name= $_SESSION['ckey'];
				$semester= $_SESSION['skey'];
				$degree= $_SESSION['dkey'];
				$year= $_SESSION['ykey'];
				$level='2';
					
				//CT1	
				echo '<tr>';
			echo '<td>'.$roll.'</td>';
				$exam='ct2';
				echo '<td>'.$exam.'</td>';
				
				$q='1a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='2a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='3a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='4a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            $q='5a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            echo '</tr>';
           
          }
		  
			mysqli_stmt_close($rut);
			
			//-----------------CT3
			
						echo '<tr>
						<th>ROLL NO</th>
						<th>EXAM</th>
						<th>1a</th>
						<th>1b</th>
						<th>1c</th>
						<th>1d</th>
						<th>1e</th>
						
						<th>2a</th>
						<th>2b</th>
						<th>2c</th>
						<th>2d</th>
						<th>2e</th>
						
						<th>3a</th>
						<th>3b</th>
						<th>3c</th>
						<th>3d</th>
						<th>3e</th>
						
						<th>4a</th>
						<th>4b</th>
						<th>4c</th>
						<th>4d</th>
						<th>4e</th>
						
						<th>5a</th>
						<th>5b</th>
						<th>5c</th>
						<th>5d</th>
						<th>5e</th>
						
					</tr>';
			
			
			$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			
				
				$f_id= $_SESSION['fkey'];
				$f_name= $_SESSION['nkey'];
				$c_id= $_SESSION['cikey'];
				$c_name= $_SESSION['ckey'];
				$semester= $_SESSION['skey'];
				$degree= $_SESSION['dkey'];
				$year= $_SESSION['ykey'];
				$level='2';
					
				//CT1	
				echo '<tr>';
			echo '<td>'.$roll.'</td>';
				$exam='ct3';
				echo '<td>'.$exam.'</td>';
				
				$q='1a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='2a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='3a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='4a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            $q='5a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
            echo '</tr>';
          }
		  
			mysqli_stmt_close($rut);
			
			//--------------ENDSEM
			
						echo '<tr>
						<th>ROLL NO</th>
						<th>EXAM</th>
						<th>1a</th>
						<th>1b</th>
						<th>1c</th>
						<th>1d</th>
						<th>1e</th>
						
						<th>2a</th>
						<th>2b</th>
						<th>2c</th>
						<th>2d</th>
						<th>2e</th>
						
						<th>3a</th>
						<th>3b</th>
						<th>3c</th>
						<th>3d</th>
						<th>3e</th>
						
						<th>4a</th>
						<th>4b</th>
						<th>4c</th>
						<th>4d</th>
						<th>4e</th>
						
						<th>5a</th>
						<th>5b</th>
						<th>5c</th>
						<th>5d</th>
						<th>5e</th>
						
					</tr>';
			
			
				$rut = mysqli_prepare($link,"SELECT student FROM studcoursemap WHERE course_id=? AND semester=? AND degree=? AND year=? 
													AND faculty_id=? ORDER BY student ASC");
		mysqli_stmt_bind_param($rut, 'sssss', $_SESSION['cikey'],$_SESSION['skey'],$_SESSION['dkey'],$_SESSION['ykey'],$_SESSION['fkey'] );
		mysqli_stmt_execute($rut);
		mysqli_stmt_bind_result($rut, $roll);
		mysqli_stmt_store_result($rut);
		
		while(mysqli_stmt_fetch($rut)){
			
				
				$f_id= $_SESSION['fkey'];
				$f_name= $_SESSION['nkey'];
				$c_id= $_SESSION['cikey'];
				$c_name= $_SESSION['ckey'];
				$semester= $_SESSION['skey'];
				$degree= $_SESSION['dkey'];
				$year= $_SESSION['ykey'];
				$level='2';
					
				//CT1	
				echo '<tr>';
			echo '<td>'.$roll.'</td>';
				$exam='endsem';
				echo '<td>'.$exam.'</td>';
				
				$q='1a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='1e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='2a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='2e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='3a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='3e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
			$q='4a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='4e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            $q='5a';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5b';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5c';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5d';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				
				$q='5e';
				$result = mysqli_query($link, "SELECT scored_marks FROM mastertab WHERE course_id='$c_id' AND level='2' AND course_name='$c_name' AND semester='$semester'
				AND degree='$degree' AND year='$year' AND faculty_id='$f_id' AND qno='$q' AND student='$roll' AND exam='$exam' ORDER BY student ASC");
				$row = mysqli_fetch_assoc($result);
				echo '<td>'.$row["scored_marks"].'</td>';
				//---------------
            
            echo '</tr>';
          }
		  
			mysqli_stmt_close($rut);
			
		
			
			
		 
        ?>	
		
    </table>
			
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