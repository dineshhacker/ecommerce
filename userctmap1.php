<?php	
	
	session_start();
	
	include("pscripts/connect.php");
	include("pscripts/checkusertab.php");
	
	//FORM HANDLING
	
	if(isset($_POST['nxt']) && !empty($_POST["nxt"]))
	{
			header("Location:userctmap2.php");
		
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
		
		$del = mysqli_prepare($link,"DELETE FROM mastertab WHERE level='1' AND semester=? AND faculty_id=? AND degree=? AND course_id=? AND year=? ");
		mysqli_stmt_bind_param($del, 'sssss', $semester,$f_id,$degree,$c_id,$year);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
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
		
		$del = mysqli_prepare($link,"DELETE FROM mastertab WHERE level='1' AND semester=? AND faculty_id=? AND degree=? AND course_id=? AND year=? AND exam='ct1' ");
		mysqli_stmt_bind_param($del, 'sssss', $semester,$f_id,$degree,$c_id,$year);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
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
		
		$del = mysqli_prepare($link,"DELETE FROM mastertab WHERE level='1' AND semester=? AND faculty_id=? AND degree=? AND course_id=? AND exam='ct2' AND year=?");
		mysqli_stmt_bind_param($del, 'sssss', $semester,$f_id,$degree,$c_id,$year);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
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
		
		$del = mysqli_prepare($link,"DELETE FROM mastertab WHERE level='1' AND semester=? AND faculty_id=? AND degree=? AND course_id=? AND exam='ct3' AND year=?");
		mysqli_stmt_bind_param($del, 'sssss', $semester,$f_id,$degree,$c_id,$year);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}
	
	if(isset($_POST['dsem']) && !empty($_POST["dsem"]))
	{
		
		$f_id= $_SESSION['fkey'];
		$f_name= $_SESSION['nkey'];
		$c_id= $_SESSION['cikey'];
		$c_name= $_SESSION['ckey'];
		$semester= $_SESSION['skey'];
		$degree= $_SESSION['dkey'];
		$year= $_SESSION['ykey'];
		
		$del = mysqli_prepare($link,"DELETE FROM mastertab WHERE level='1' AND semester=? AND faculty_id=? AND degree=? AND course_id=? AND exam='endsem' AND year=?");
		mysqli_stmt_bind_param($del, 'sssss', $semester,$f_id,$degree,$c_id,$year);
		mysqli_stmt_execute($del);
		
		mysqli_stmt_close($del);
	
	}
	
	
	
	
	
	if(isset($_POST['1a']) && !empty($_POST["1a"]))
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
		$level='1';
		
		//-----------------------AAAAAAAAAAAAAAAAAAAAAAA--------------------------//
		$qno = '1a';
		$max_marks = $_POST['1a'];
		$co = $_POST['1ax'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
	
		$qno = '2a';
		$max_marks = $_POST['2a'];
		$co = $_POST['2ax'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '3a';
		$max_marks = $_POST['3a'];
		$co = $_POST['3ax'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '4a';
		$max_marks = $_POST['4a'];
		$co = $_POST['4ax'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '5a';
		$max_marks = $_POST['5a'];
		$co = $_POST['5ax'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		//-----------------------BBBBBBBBBBBBBBBBBBBBBBBBBBBBB--------------------------//
		$qno = '1b';
		$max_marks = $_POST['1b'];
		$co = $_POST['1bx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
	
		$qno = '2b';
		$max_marks = $_POST['2b'];
		$co = $_POST['2bx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '3b';
		$max_marks = $_POST['3b'];
		$co = $_POST['3bx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '4b';
		$max_marks = $_POST['4b'];
		$co = $_POST['4bx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '5b';
		$max_marks = $_POST['5b'];
		$co = $_POST['5bx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		//-----------------------CCCCCCCCCCCCCCCCCCCCCCCCCCCCC--------------------------//
		$qno = '1c';
		$max_marks = $_POST['1c'];
		$co = $_POST['1cx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
	
		$qno = '2c';
		$max_marks = $_POST['2c'];
		$co = $_POST['2cx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '3c';
		$max_marks = $_POST['3c'];
		$co = $_POST['3cx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '4c';
		$max_marks = $_POST['4c'];
		$co = $_POST['4cx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '5c';
		$max_marks = $_POST['5c'];
		$co = $_POST['5cx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		//-----------------------DDDDDDDDDDDDDDDDDDD--------------------------//
		$qno = '1d';
		$max_marks = $_POST['1d'];
		$co = $_POST['1dx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
	
		$qno = '2d';
		$max_marks = $_POST['2d'];
		$co = $_POST['2dx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '3d';
		$max_marks = $_POST['3d'];
		$co = $_POST['3dx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '4d';
		$max_marks = $_POST['4d'];
		$co = $_POST['4dx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '5d';
		$max_marks = $_POST['5d'];
		$co = $_POST['5dx'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		//-----------------------EEEEEEEEEEEEEEEEEEEEEEEE--------------------------//
		$qno = '1e';
		$max_marks = $_POST['1e'];
		$co = $_POST['1ex'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
	
		$qno = '2e';
		$max_marks = $_POST['2e'];
		$co = $_POST['2ex'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '3e';
		$max_marks = $_POST['3e'];
		$co = $_POST['3ex'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '4e';
		$max_marks = $_POST['4e'];
		$co = $_POST['4ex'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		$qno = '5e';
		$max_marks = $_POST['5e'];
		$co = $_POST['5ex'];
		$sql= "INSERT INTO mastertab(course_id,level,course_name,semester,degree,year,faculty_id,name,exam,qno,co,max_marks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = mysqli_prepare($link,$sql);
		mysqli_stmt_bind_param($stmt, 'sssssssssssd', $c_id,$level,$c_name,$semester,$degree,$year,$f_id,$f_name,$exam,$qno,$co,$max_marks);
		mysqli_stmt_execute($stmt);
		
		//echo "<script language='javascript'>alert('DONE!!');</script>"; 	
		mysqli_stmt_close($stmt);
			
	}
	
	/*	
	if(isset($_POST['1a']) && !empty($_POST["1a"]) &&isset($_POST['2a']) && !empty($_POST["2a"]) &&isset($_POST['3a']) && !empty($_POST["3a"]) &&
	   isset($_POST['4a']) && !empty($_POST["4a"]) &&isset($_POST['5a']) && !empty($_POST["5a"]) &&
isset($_POST['1b']) && !empty($_POST["1b"]) &&isset($_POST['2b']) && !empty($_POST["2b"]) &&isset($_POST['3b']) && !empty($_POST["3b"]) &&
	   isset($_POST['4b']) && !empty($_POST["4b"]) &&isset($_POST['5b']) && !empty($_POST["5b"]) &&
isset($_POST['1c']) && !empty($_POST["1c"]) &&isset($_POST['2c']) && !empty($_POST["2c"]) &&isset($_POST['3c']) && !empty($_POST["3c"]) &&
	   isset($_POST['4c']) && !empty($_POST["4c"]) &&isset($_POST['5c']) && !empty($_POST["5c"]) &&
isset($_POST['1d']) && !empty($_POST["1d"]) &&isset($_POST['2d']) && !empty($_POST["2d"]) &&isset($_POST['3d']) && !empty($_POST["3d"]) &&
	   isset($_POST['4d']) && !empty($_POST["4d"]) &&isset($_POST['5d']) && !empty($_POST["5d"]) &&
isset($_POST['1e']) && !empty($_POST["1e"]) &&isset($_POST['2e']) && !empty($_POST["2e"]) &&isset($_POST['3e']) && !empty($_POST["3e"]) &&
	   isset($_POST['4e']) && !empty($_POST["4e"]) &&isset($_POST['5e']) && !empty($_POST["5e"]))
	{
		echo "<script language='javascript'>alert('thanks!');</script>"; 
	
		$cid = $_POST['cid'];
		
		$stmt = mysqli_prepare($link,"SELECT course_name, semester, degree, year FROM course WHERE course_id=?");
		mysqli_stmt_bind_param($stmt, 's', $cid);
		
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $cname,$sem,$deg,$year);
		mysqli_stmt_fetch($stmt);
		

				$_SESSION["ckey"] = $cname;
				$_SESSION["skey"] = $sem;
				$_SESSION["dkey"] = $deg;
				$_SESSION["ykey"] = $year;
				
				header("Location:userctmap1.php");
	
	}
	*/

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
			
			
				var x = document.forms["qppattern"]["exam"].value;
				
				var a1 = document.forms["qppattern"]["1a"].value;
				var ax1 = document.forms["qppattern"]["1ax"].value;
				var b1 = document.forms["qppattern"]["1b"].value;
				var bx1 = document.forms["qppattern"]["1bx"].value;
				var c1 = document.forms["qppattern"]["1c"].value;
				var cx1 = document.forms["qppattern"]["1cx"].value;
				var d1 = document.forms["qppattern"]["1d"].value;
				var dx1 = document.forms["qppattern"]["1dx"].value;
				var e1 = document.forms["qppattern"]["1e"].value;
				var ex1 = document.forms["qppattern"]["1ex"].value;
				
				var a2 = document.forms["qppattern"]["2a"].value;
				var ax2 = document.forms["qppattern"]["2ax"].value;
				var b2 = document.forms["qppattern"]["2b"].value;
				var bx2 = document.forms["qppattern"]["2bx"].value;
				var c2 = document.forms["qppattern"]["2c"].value;
				var cx2 = document.forms["qppattern"]["2cx"].value;
				var d2 = document.forms["qppattern"]["2d"].value;
				var dx2 = document.forms["qppattern"]["2dx"].value;
				var e2 = document.forms["qppattern"]["2e"].value;
				var ex2 = document.forms["qppattern"]["2ex"].value;

				var a3 = document.forms["qppattern"]["3a"].value;
				var ax3 = document.forms["qppattern"]["3ax"].value;
				var b3 = document.forms["qppattern"]["3b"].value;
				var bx3 = document.forms["qppattern"]["3bx"].value;
				var c3 = document.forms["qppattern"]["3c"].value;
				var cx3 = document.forms["qppattern"]["3cx"].value;
				var d3 = document.forms["qppattern"]["3d"].value;
				var dx3 = document.forms["qppattern"]["3dx"].value;
				var e3 = document.forms["qppattern"]["3e"].value;
				var ex3 = document.forms["qppattern"]["3ex"].value;

				var a4 = document.forms["qppattern"]["4a"].value;
				var ax4 = document.forms["qppattern"]["4ax"].value;
				var b4 = document.forms["qppattern"]["4b"].value;
				var bx4 = document.forms["qppattern"]["4bx"].value;
				var c4 = document.forms["qppattern"]["4c"].value;
				var cx4 = document.forms["qppattern"]["4cx"].value;
				var d4 = document.forms["qppattern"]["4d"].value;
				var dx4 = document.forms["qppattern"]["4dx"].value;
				var e4 = document.forms["qppattern"]["4e"].value;
				var ex4 = document.forms["qppattern"]["4ex"].value;
				
				var a5 = document.forms["qppattern"]["5a"].value;
				var ax5 = document.forms["qppattern"]["5ax"].value;
				var b5 = document.forms["qppattern"]["5b"].value;
				var bx5 = document.forms["qppattern"]["5bx"].value;
				var c5 = document.forms["qppattern"]["5c"].value;
				var cx5 = document.forms["qppattern"]["5cx"].value;
				var d5 = document.forms["qppattern"]["5d"].value;
				var dx5 = document.forms["qppattern"]["5dx"].value;
				var e5 = document.forms["qppattern"]["5e"].value;
				var ex5 = document.forms["qppattern"]["5ex"].value;
				
				
				
				if (a1==null || a1=="" || a2==null || a2=="" || a3==null || a3=="" || a4==null || a4=="" || a5==null || a5=="" ||
					b1==null || b1=="" || b2==null || b2=="" || b3==null || b3=="" || b4==null || b4=="" || b5==null || b5=="" ||
					c1==null || c1=="" || c2==null || c2=="" || c3==null || c3=="" || c4==null || c4=="" || c5==null || c5=="" ||
					d1==null || d1=="" || d2==null || d2=="" || d3==null || d3=="" || d4==null || d4=="" || d5==null || d5=="" ||
					e1==null || e1=="" || e2==null || e2=="" || e3==null || e3=="" || e4==null || e4=="" || e5==null || e5=="" 
					){
					
					alert("Please dont leave the fileds empty");
					return false;
				}
				
				if(isNaN(a1) ||isNaN(a2) ||isNaN(a3) ||isNaN(a4) ||isNaN(a5) ||
				   isNaN(b1) ||isNaN(b2) ||isNaN(b3) ||isNaN(b4) ||isNaN(b5) ||
				   isNaN(c1) ||isNaN(c2) ||isNaN(c3) ||isNaN(c4) ||isNaN(c5) ||
				   isNaN(d1) ||isNaN(d2) ||isNaN(d3) ||isNaN(d4) ||isNaN(d5) ||
				   isNaN(e1) ||isNaN(e2) ||isNaN(e3) ||isNaN(e4) ||isNaN(e5) 
				 ){
				   alert("Please Enter only numbers");
					return false;
				   
				 }
				 
				 a1=parseInt(a1);a2=parseInt(a2);a3=parseInt(a3);a4=parseInt(a4);a5=parseInt(a5);
				 b1=parseInt(b1);b2=parseInt(b2);b3=parseInt(b3);b4=parseInt(b4);b5=parseInt(b5);
				 c1=parseInt(c1);c2=parseInt(c2);c3=parseInt(c3);c4=parseInt(c4);c5=parseInt(c5);
				 d1=parseInt(d1);d2=parseInt(d2);d3=parseInt(d3);d4=parseInt(d4);d5=parseInt(d5);
				 e1=parseInt(e1);e2=parseInt(e2);e3=parseInt(e3);e4=parseInt(e4);e5=parseInt(e5);
				
				if(a1==0){
					alert("The first question (1a) cannot be 0!");
					return false;
				
				}
				
				if(x=="ct1"){
					
					var ct1 = a1+a2+a3+a4+a5+b1+b2+b3+b4+b5+c1+c2+c3+c4+c5+d1+d2+d3+d4+d5+e1+e2+e3+e4+e5;
				
					if(ct1!=20){
					alert("The sum should add up to 20 for CT1");
						return false;
					}
				
				}
				else if(x=="ct2"){
					
					var ct2 = a1+a2+a3+a4+a5+b1+b2+b3+b4+b5+c1+c2+c3+c4+c5+d1+d2+d3+d4+d5+e1+e2+e3+e4+e5;
					
					if(ct2!=20){
						alert("The sum should add up to 20 for CT2");
						return false;
					}
				
				}
				else if(x=="ct3"){
					
					var ct3 = a1+a2+a3+a4+a5+b1+b2+b3+b4+b5+c1+c2+c3+c4+c5+d1+d2+d3+d4+d5+e1+e2+e3+e4+e5;
					
					if(ct3!=10){
						alert("The sum should add up to 10 for CT3 / Assignment");
						return false;
					}
				
				}
				else if(x=="endsem"){
					
					var endsem = a1+a2+a3+a4+a5+b1+b2+b3+b4+b5+c1+c2+c3+c4+c5+d1+d2+d3+d4+d5+e1+e2+e3+e4+e5;
					
					if(endsem!=50){
						alert("The sum should add up to 50 for End Semester");
						return false;
					}
				
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
			<h1 style="font-size:16px;">Question Papaer Pattern -- <?php echo $_SESSION["cikey"]; ?> - <?php echo $_SESSION["ckey"]; ?> -
			<?php echo $_SESSION["dkey"]; ?> - <?php echo $_SESSION["ykey"]; ?></h1>

			</div>			
					
			<div style="background-color:#D3D5E2; border-radius:1px; outline: 2px thick; padding:20px; height:620px;
            	border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
			
			
				<div class="register-form" style="width:76%;">
				<div style="text-align:center;">
				<form id="next" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
				<select name="nxt" style="display:none">
						<option value="1">1</option>
				</select>		
				
					<input class="btn register" type="submit" name="next" value="PROCEED TO STUDENT MARK ENTRY" form="next" style="width:300px;"/>
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
            </div>
			
			<div class="register-form" style="width:96%;">
				
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="qppattern" onsubmit="return validateForm()">
            
				
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
					
					<table style=" border: 1px solid black;width:98%;text-align:center;" id="exm">
						
						<tr>
							<th style="width:5%;" >
							Q.No
							</th>
							<th style="width:19%;">
							<b>A</b><br/>
								<table style="width:100%;">
									<tr>
										<td style="width:50%;"><b>EXAM</b></td>
										<td style="width:50%;"><b>CO</b></td>
									</tr>
								</table>
							</th>
							<th style="width:19%;">
							<b>B</b>
								<table style="width:100%;">
									<tr>
										<td style="width:50%;"><b>EXAM</b></td>
										<td style="width:50%;"><b>CO</b></td>
									</tr>
								</table>
							</th>
							<th style="width:19%;">
							<b>C</b>
								<table style="width:100%;">
									<tr>
										<td style="width:50%;"><b>EXAM</b></td>
										<td style="width:50%;"><b>CO</b></td>
									</tr>
								</table>
							</th>
							<th style="width:19%;">
							<b>D</b>
								<table style="width:100%;">
									<tr>
										<td style="width:50%;"><b>EXAM</b></td>
										<td style="width:50%;"><b>CO</b></td>
									</tr>
								</table>
							</th>
							<th style="width:19%;">
							<b>E</b>
								<table style="width:100%;">
									<tr>
										<td style="width:50%;"><b>EXAM</b></td>
										<td style="width:50%;"><b>CO</b></td>
									</tr>
								</table>
							</th>
							
							
						</tr>
						<tr>
							
							
							<td>
							
							<b>1</b>
							</td>
							<td>
								
								
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="1a" placeholder="Mark" style="width:60px;" autofocus />
											
										</td>
										<td style="width:50%;">
											<select name="1ax">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
				
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
							<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="1b" placeholder="Mark" style="width:60px;" />
											
										</td>
										<td style="width:50%;">
											<select name="1bx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="1c" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="1cx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="1d" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="1dx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="1e" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="1ex">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
						</tr>
						
						<tr>
							
							
							<td>
							
							<b>2</b>
							</td>
							<td>
								
								
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="2a" placeholder="Mark" style="width:60px;" autofocus />
											
										</td>
										<td style="width:50%;">
											<select name="2ax">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
				
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
							<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="2b" placeholder="Mark" style="width:60px;" />
											
										</td>
										<td style="width:50%;">
											<select name="2bx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="2c" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="2cx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="2d" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="2dx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="2e" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="2ex">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
						</tr>
						
						<tr>
							
							
							<td>
							
							<b>3</b>
							</td>
							<td>
								
								
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="3a" placeholder="Mark" style="width:60px;" autofocus />
											
										</td>
										<td style="width:50%;">
											<select name="3ax">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
				
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
							<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="3b" placeholder="Mark" style="width:60px;" />
											
										</td>
										<td style="width:50%;">
											<select name="3bx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="3c" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="3cx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="3d" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="3dx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="3e" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="3ex">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
						</tr>
						
						<tr>
							
							
							<td>
							
							<b>4</b>
							</td>
							<td>
								
								
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="4a" placeholder="Mark" style="width:60px;" autofocus />
											
										</td>
										<td style="width:50%;">
											<select name="4ax">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
				
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
							<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="4b" placeholder="Mark" style="width:60px;" />
											
										</td>
										<td style="width:50%;">
											<select name="4bx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="4c" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="4cx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="4d" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="4dx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="4e" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="4ex">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
						</tr>
						
						<tr>
							
							
							<td>
							
							<b>5</b>
							</td>
							<td>
								
								
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="5a" placeholder="Mark" style="width:60px;" autofocus />
											
										</td>
										<td style="width:50%;">
											<select name="5ax">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
				
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
							<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="5b" placeholder="Mark" style="width:60px;" />
											
										</td>
										<td style="width:50%;">
											<select name="5bx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="5c" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="5cx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="5d" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="5dx">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
							<td>
								<table style="width:100%;border:none;">
									<tr>
										<td style="width:50%;">
											<input type="text" value="0" name="5e" placeholder="Mark" style="width:60px;"/>
											
										</td>
										<td style="width:50%;">
											<select name="5ex">
												<option value="co1">CO1</option>
												<option value="co2">CO2</option>
												<option value="co3">CO3</option>
											</select> 
										</td>
									</tr>
								</table>
							</td>
						</tr>
						
						
					
					</table>
					
				</p>
 				</fieldset>
                <fieldset class="fieldsetbtn">
					
					<input class="btn register" type="submit" name="resetct1" value="CLEAR CT1" form="ct1" />
					<input class="btn register" type="submit" name="resetct2" value="CLEAR CT2" form="ct2" />
					<input class="btn register" type="submit" name="resetct3" value="CLEAR CT3" form="ct3" />
					<input class="btn register" type="submit" name="resetct4" value="CLEAR SEM" form="sem" />
					<input class="btn register" type="submit" name="reset" value="DELETE ALL" form="rst" />
					
					<input class="btn register" type="submit" name="submit" value="INSERT" />
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
				<select name="dsem" style="display:none">
						<option value="1">1</option>
				</select>		
			</form>
			
			</div>
			
			
			
			</div>
			
			<div style="background-color:#EEE; border-radius:1px; outline: 2px thick; padding:20px;
        border: 1px solid #aaa;
	 -moz-box-shadow: 1px 1px 3px #fff inset;
    -webkit-box-shadow: 1px 1px 3px #fff inset;
    box-shadow: 1px 1px 3px #fff inset;">
		
			<table class="gradienttable" style="margin:0 auto; padding:5px; width:100%;" >
				
					<tr>
						<th>COURSE ID</th>
						<th>COURSE NAME</th>
						<th>SEM</th>
						<th>DEG</th>
						<th>EXAM</th>
						<th>Q.NO</th>
						<th>CO</th>
						<th>MAX MARKS</th>
						
					</tr>
				
				
				<?php
				
				$f_id= $_SESSION['fkey'];
		$c_id= $_SESSION['cikey'];
		$sem= $_SESSION['skey'];
		$deg= $_SESSION['dkey'];
		
		
			$disp = mysqli_prepare($link,"SELECT course_id,course_name,semester,degree,exam,qno,max_marks,co FROM mastertab WHERE level='1' AND faculty_id=? AND course_id=? 
										AND	semester=? AND degree=? AND max_marks!=0 ORDER BY semester ASC, exam ASC");
				mysqli_stmt_bind_param($disp, 'ssss', $f_id,$c_id,$sem,$deg);
		
			mysqli_stmt_execute($disp);
			mysqli_stmt_bind_result($disp, $course_id,$course_name,$semester,$degree,$exam,$qno,$max_marks,$co);
			
			
          while( mysqli_stmt_fetch($disp)){
            echo
            '<tr>
              <td>'.$course_id.'</td>
              <td>'.$course_name.'</td>
              <td>'.$semester.'</td>
              <td>'.$degree.'</td>
              <td>'.$exam.'</td>
              <td>'.$qno.'</td>
			  <td>'.$co.'</td>
			  <td>'.$max_marks.'</td>
            </tr>';
          }
		  
			mysqli_stmt_close($disp);
		 
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