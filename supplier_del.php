<?
@session_start();
if(session_is_registered("valid_userprpo")) {
		require_once("../include_RedThemes/odbc_connect.php");	

			$supplier_id=@$_GET["supplier_id"];
			$status_ok = 0;

				$result1=@odbc_exec($conn,"delete from supplier where supplier_id='$supplier_id'");			
				if($result1){
						$status_ok = 1;
				}
			
			include("./sup_search.php");
			
			if($status_ok==1){
				odbc_exec($conn,"commit");
				echo '<script language="JavaScript" type="text/JavaScript">';
				echo 'alert ("�ѹ�֡���������º�������Ǥ��");';
				echo '</script>';
				
			}else{
				odbc_exec($conn,"rollback");
				echo '<script language="JavaScript" type="text/JavaScript">';
				echo 'alert ("�������öź�����������ͧ�ҡ�١���¡��ҹ�ҡ�����蹤��");';
				echo '</script>';				
			}
}else{
		include("../include_RedThemes/SessionTimeOut.php");
}
?>
<html><head>
<title>SUPPLIER</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<body></body>
</html>	