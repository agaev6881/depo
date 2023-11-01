<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--><?php
 $br="<br><br>";
if(isset($_REQUEST['btn'])){
  $br="";
  if(!isset($_POST['a1'])){$bad=2;}
  else if(!isset($_POST['a2'])){$bad=3;}
  else if(!isset($_POST['a3'])){$bad=4;}
  else{
 $a1=$_POST['a1']; 
 $a2=$_POST['a2'];
 $a3=$_POST['a3'];
 if(!is_numeric($a1)){
  echo "<input value='İlk element ədəd deyil".$a1."' readonly class='err'><br>";$result="Xəta";switch($a3){ case 1: $a3="+";break;case 2: $a3="-";break;case 3: $a3="*";break;case 4: $a3="/";break;default:$a3="Heç nə";break;}
 }
 else if(!is_numeric($a2)){
  echo "<input value='ikinci element eded deyil".$a2."' readonly class='err'><br>";$result="Xəta";
 }
 else{
  switch ($a3) {
    case 1:
      $result=($a1+$a2);$a3="+";
      break;
        case 2:
      $result= ($a1-$a2);$a3="-";
      break;
          case 3:
      $result =($a1*$a2);$a3="*";
      break;
          case 4:
      if($a2==0){$bad=1;}else{$result= ($a1/$a2);}$a3="/";
      //if($a1==0){$bad=1;}else{$result=0;}$a3="/";
      break;
    default:
      break;
  }
  if($bad==0){
    echo $result;
  }
  else if($bad==1){
    echo "<input value='0-a bölmək mümkün deyil' readonly class='err'><br>";$result="Xəta";
  }
 }}
}
?>
<style type="text/css">
.err{
  margin: 10px;
  padding: 5px;
  border: 2px solid red;
  width: 20%;
  background: transparent;
  color: red;
}
  body{margin: 5%;
    background: url('https://c4.wallpaperflare.com/wallpaper/586/603/742/minimalism-4k-for-mac-desktop-wallpaper-preview.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
  }
  input{
    border: 2px solid grey;
    text-align: center;
    <?php 
    if (isset($result)) {
       echo "width: 40px;";
     } ?>
  }
</style>
<form method="post">
  <input type="number" name="a1" value="<?php echo $a1;?>"><?php echo $br; ?>
  <input type='<?php if(!isset($result)){ echo "hidden'";}?>' name="" readonly value="<?php echo $a3;?>"><?php if($result){echo $br;} ?>
  <input type="number" name="a2" value="<?php echo $a2;?>"><?php echo $br; ?>
  <select style='<?php if(isset($result)){ echo "display: none;";}?>' name="a3"><?php echo $br; ?>
    <option selected disabled>Heç nə</option>
    <option value="1">+</option>
    <option value="2">-</option>
    <option value="3">*</option>
    <option value="4">/</option>
  </select><?php echo $br; ?>
  <input type='<?php if(!isset($result)){ echo "hidden";}?>' name="" value="=">
  <input type='<?php if(!isset($result)){echo "submit";}?>' value="<?php if(isset($result)){ echo $result;}else{echo "Hesabla";}?>" name="btn" <?php if($result){ echo "readonly";}?>><br>
</form>
