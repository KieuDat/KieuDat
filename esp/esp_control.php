
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<style>
#myHeader {
  background-color: lightblue;
  color: black;
  padding: 40px;
  text-align: center;
  /*font-style: ;*/
}
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="3">
    <title>Dat test</title>
    <!--<link rel = "stylesheet" type="text/css" href="style.css"/>-->
    <link rel="icon" type="image/x-icon" href="/images/icon.ico">
</head>
<body  align="center">
 		<br />
            <header>
             <h1><a href="https://datsmart.000webhostapp.com">Home</a></h1>
             <h2 id="myHeader"> ĐẠT test</span>
        <br/>
             </h2>
            </header>
  
   <?php
  
   $jsonString = file_get_contents("test/test.json");
   $data = json_decode($jsonString, true);
	
	  $user='abcd_ef';
	if(isset($_POST['LED1_ON']))
	{
		if($user==$_POST['LED1_ON'])
		{
		$data['led1'] = "on";		
		}
	}
 
	if(isset($_POST['LED1_OFF']))
	{
		if($user==$_POST['LED1_OFF'])
		{
		$data['led1'] = "off";
		}
	}	
   
	$newJsonString = json_encode($data);
	file_put_contents("test/test.json", $newJsonString);
 
   ?>     
   
 <form action="esp_control.php" method="post">       
	<table border="1" width=100% height="400px" align="center">
		<tr class="indam">
        	<td bgcolor="lightblue">TÊN THIẾT BỊ</td>
            <td bgcolor="lightblue">TRẠNG THÁI</td>
            <td bgcolor="lightblue"> ĐIỀU KHIỂN</td>
            
        </tr>
        <tr>
        	<td><h2>Thiết bị 1</h2></td>
            <td>
            	<img id="myImage1" src="pic_bulboff10.png" width="60" height="60">
            </td>
            <td> <p>
            <?php
			$user='abcd_ef';
             echo "   <button style='height:60px; width:60px;' type='submit'  name='LED1_ON' value='$user'>ON</button> ";
             echo "   <button style='height:60px; width:60px;' type='submit'  name='LED1_OFF' value='$user'>OFF</button> ";
			?>
				</p>
                </td>
        </tr>
       
 
    </table>
 </form>
 
 <?php
   $jsonString = file_get_contents("test/test.json");
	$data = json_decode($jsonString, true);
 
 if ($data['led1'] == 'on')
 {
	echo "	  <script>";
   	echo " document.getElementById('myImage1').src = 'pic_bulbon10.png' ";
   	echo "    </script> ";
 }
 
 
 ?>
