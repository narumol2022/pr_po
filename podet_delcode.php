<?
@session_start();
if(session_is_registered("valid_userprpo")) {
		require_once("../include_RedThemes/odbc_connect.php");	

		$id=@$_GET["id"];
		$po_no=@$_GET["po_no"];
		$prod_type=@$_GET["prod_type"];

		if($prod_type=="2"){
			$result=odbc_exec($conn,"delete from po_details_subjob where id='$id' and po_no='$po_no'");
		}			
		$result=odbc_exec($conn,"delete from po_details where id='$id' and po_no='$po_no' ");
		$result=odbc_exec($conn,"update po_master set po_status='1' where po_no='$po_no' ");
		$result2=odbc_exec($conn,"commit");
		
		include("./pomas_edit.php");
		
		echo '<script language="JavaScript" type="text/JavaScript">';
		echo '		alert ("��سҵ�Ǩ�ͺ�����١��ͧ�ͧ������ \n����к� PO �����觫����Թ������ �Ѻ PR ���¤�� \n\n ���ͧ�ҡ�͹�ӡ��������¡��\n�к��ѹ�֡��������ѹ�������ҧ PR �Ѻ PO ����ѵ��ѵ�");';
		echo '</script>';
}else{
		include("../include_RedThemes/SessionTimeOut.php");
}
?>
<html><head>
<title>PR REPORT</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>
<body></body>
</html>	