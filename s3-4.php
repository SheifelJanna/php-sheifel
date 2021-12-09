<HTML> 
<HEAD> <TITLE> Войти в систему</TITLE> </HEAD>  
<BODY> 
<FORM  method="post" action="<?php print $PHP_SELF ?>"> 
  Приветствуем вас! Пройдите авторизацию: 
  <br><INPUT type="text" name="a" size="25"> 
  <P> <INPUT type="submit" name="FIO" value="Войти"> 
</FORM> 
<?php
if (isset($_POST["FIO"])) { 
 if (($_POST["a"]=="Шейфель Жанна Владимировна")||($_POST["a"]=="Кристина Олеговна")||($_POST["a"]=="Степанян Степан ")||($_POST["a"]=="Данил Игнатьевич")) { echo("Здравствуйте, " . $_POST["a"]); 
  } else { 
  	echo "Вы не зарегистрированный пользователь!";
    }
    }
?>  
</BODY> 
</HTML>
