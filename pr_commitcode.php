<?
  	@session_start();
	if(session_is_registered("valid_userprpo")) {	
		require_once("../include_RedThemes/odbc_connect.php");				
		$empno_user = $_SESSION["empno_user"];
	
		$pr_no=@$_GET["pr_no"];
		$flag=@$_GET["flag"];
		$str_count = "select count(*) from pr_details where pr_no='$pr_no'";			
		$cur_count = @odbc_exec($conn,$str_count);
		$count = @odbc_result($cur_count, "count(*)");
		
		if($count==0){
			if($flag=="from_editpage"){
					echo '<script language="JavaScript" type="text/JavaScript">';
					echo 'location.href="./prmas_edit.php?pr_no='.$pr_no.'&flag=edit";';
					echo 'alert ("�������ö�觵������ ���ͧ�ҡ�س�ѧ����������������´ PR");';
					echo '</script>';
			}else{
					include("./pr_search.php");						
					echo '<script language="JavaScript" type="text/JavaScript">';
					echo 'alert ("�������ö�觵������ ���ͧ�ҡ�س�ѧ����������������´ PR");';
					echo '</script>';					
			}
		}else{		
		
			
					if($flag=="from_editpage"){
							$txt_up = "update pr_master set pr_status='2',approve_date='',last_user='$empno_user',last_date=sysdate where pr_no='$pr_no'";
							$exe_up = odbc_exec($conn,$txt_up);
							$exe_commit = odbc_exec($conn,"commit");
							$_SESSION["sespk_no"] = "";
?>
							<script language="JavaScript" type="text/JavaScript">
								alert ("�觢��������º�������Ǥ��");
								win = top;
								win.opener = top;
								win.close ();
							</script>						
<?							
					}else{
							$txt_up = "update pr_master set pr_status='2',approve_date='',last_user='$empno_user',last_date=sysdate where pr_no='$pr_no'";
							$exe_up = odbc_exec($conn,$txt_up);
							$exe_commit = odbc_exec($conn,"commit");
							include("./pr_search.php");						
?>
							<script language="JavaScript" type="text/JavaScript">
									alert ("�觢��������º�������Ǥ��");
							</script>						
<?
					
					}
					
		}

	}else{
		include("../include_RedThemes/SessionTimeOut.php");
	}
?>
<html><head>
<title>COMMIT</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<body></body>
</html>	


