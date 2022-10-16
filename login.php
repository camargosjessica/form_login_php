<?php 
   session_start(); 
?>
<html>
    <head>
        <title>Autenticação do Usuário</title>
    </head>
    <body>
<?php
$servername = "localhost";  //endereço do servidor local do mysql
$database = "watchmen";  //nome do banco de dados
$username = "root"; //nome do usuário
$password = "";  //senha do banco de dados
$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
      die("Falha de conexão: " . mysqli_connect_error());
}
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
if(!$email || !$senha)
{
	echo "Você deve digitar sua senha e email!";
	exit;
}
$sql = "SELECT * FROM user WHERE email='$email' and senha='$senha'";
$res=mysqli_query($con,$sql);
if($row = mysqli_fetch_array($res)){ 
        echo "Seja bem vindo(a) ";
        header('Location: welcome.html');
} else {
    echo "Usuário ou senha inválidos";
}
mysqli_close($con);

?>
</body>
</html>