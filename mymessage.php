
<?php

  session_start();
  include "layouts/header2.php"; 
  include "config.php";
  $name = $_SESSION['name'];

  $sql = "SELECT * FROM chat WHERE name='$name'";
  $res = mysqli_query($conn,$sql);

 ?>

  <div class="container">
  <center><h2>Sent messages<span style="color:#dd7ff3;"></span></h2>
  </center></br>
  <div class="display-chat" id = "display-chat">
  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
  <td width="53" align="center" valign="top"><strong>Message</strong></td>
  <td width="321" align="center" valign="top"><strong>To</strong></td>
	<td width="321" align="center" valign="top"><strong>Date</strong></td>
  </tr>
  
  <?php
  
  $i = 0; 
  while($row = mysqli_fetch_array($res)){
    function decrypt($msg, $encrypt_key){
      $key = hex2bin($encrypt_key);
      $msg = base64_decode($msg);
      $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
      $nonce = mb_substr($msg,0,$nonceSize,'8bit');
      $ciphertext = mb_substr($msg,$nonceSize,null,'8bit');
  
      $plaintext = openssl_decrypt($ciphertext,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$nonce);
      return $plaintext;
    }
    $private_secret_key = '1f4276378ad3214c873928dbef42743f';
    $msg=$row['message'];
    $decrypted=decrypt($msg, $private_secret_key);
    ?>
    <tr bgcolor="<?php if($row['viewed'] == "yes") { echo "#FFE8E8"; } else { if($i%2==0) { echo "#FFE7CE"; } else { echo "#FFCAB0"; } } ?>">
    <td align="center" valign="top"><?php echo $decrypted?></td>
    <td align="center" valign="top"><?php echo $row['receives']?></td>
    <td align="center" valign="top"><?php echo $row['created_on']?></td>
    </tr>
    <?php $i++;
  } 

?>
  <a href="home.php" class="btn btn-primary">Home</a>
  <a href="chatpage.php" class="btn btn-primary">New message</a>
  <a href="message.php" class="btn btn-primary">Received messages</a>
  </table>
  
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#673ab7;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:#d69de0;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}

</style>

