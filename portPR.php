<?php
	@session_start();
	if (session_is_registered("valid_userprpo")) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Port Data</title>
<style type="text/css">
<!--
.style3 {font-size: 18px}
.style5 {font-size: 18px; color: #000000; }
.style6 {color: #0066FF}
-->
</style>
</head>
<?php
	include("../include/alert.php");
	$target_path = "C:\\WebServ\\webroot\\temp_report\\";
	$file_name = "excel_PRtranstek.xls";
	if(isset($_FILES["fileUpload"])){		
		if($_FILES["fileUpload"]["name"]!=""){
			if($_FILES["fileUpload"]["error"]){
				alert("�Դ��ͼԴ��Ҵ��鹡Ѻ�к� ������������ö Upload ����͡�������");
			}else{												
						if(substr($_FILES["fileUpload"]["name"],-4,4) == ".xls"){
							if(@!move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$target_path.$file_name)){
								alert("�Դ��ͼԴ��Ҵ��鹡Ѻ�к� ������������ö Upload ����͡�������");
							}else{									
										$ExcelApp = new COM("Excel.Application");
										$ExcelWorkBook = $ExcelApp->Workbooks->Open($target_path.$file_name);
										$amountWorkBook = $ExcelWorkBook->Worksheets->Count;
										if($amountWorkBook==1){
											$nameWS1 = $ExcelWorkBook->Worksheets(1)->Name;
											if($nameWS1=="Transtek")	{
												echo'<script type="text/javascript">
													window.location.reload("portPRCode.php");
												</script>'; 
											}	else {
												alert("��س�Ṻ����͡��÷��١��ͧ���¤��");
											}
										}else{
											alert("��س�Ṻ����͡��÷��١��ͧ���¤��");
										}
										$ExcelWorkBook->Close();
									    $ExcelApp->Quit();
										unset($ExcelApp,$ExcelWorkBook); 
							}
						}else{
									alert("��س�Ṻ����͡��÷��١��ͧ���¤��");
						}								
			}
		}else{
					alert("��س�Ṻ�����¤��");
		}	
	}
?>
<body onload="this.moveTo(0,0); resizeTo(screen.availWidth,screen.availHeight);">
<form name="form1" enctype="multipart/form-data" action="" method="post">
	<br /><br />
    <table align="center">
	<tr><td>
      <span class="style3"><a href="include/PR_Transtek.xls" title="��� Excel �鹩�Ѻ" target="_blank">��ǹ���Ŵ����͡��õ�Ẻ</a></span></p>
	  </td></td>
	  <tr><td>&nbsp;</td></tr>
	  <tr><td>
    <p><span class="style5">Upload ����͡��� </span>
      <input type="file" name="fileUpload" size="40" />  
      </p>
	  </td></tr>
	  <tr><td>
    <p align="center">
	<a class="style6" onclick="document.form1.submit();" style="cursor:pointer"><u>��������͡������ͧ��� Upload ����������ԡ�������</u></a>
    </p>
    </td></tr>
	</table>
</form>
</body>
</html>
<?php
	}else {
		include("../include_RedThemes/SessionTimeOut.php");
	}
?>
