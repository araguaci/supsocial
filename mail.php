<?php
/*  artes do  sul */
if(isset ($_POST['submit'])){// se a variavel post submit existir executa o resto do codigo
	class Formail {
		public  $nome;
		public  $email ;
		public  $mensagem;
		public  $remetente;
		public  $assunto;
		public  $content_type;
		public  $mime_version;

		function mail() {
			$header = "From:$this->nome:< $this->email > \n".$this->content_type.$this->mime_version;
			$msg="<b>Nome:</b> ".$this->nome."<br><b>Email:</b> ".$this->email."<br>"."<b>Mensagem:</b> ".$this->mensagem;
			//echo $msg;
			//die();
			$mail=mail($this->remetente,$this->assunto,$msg,$header);
			$url="http://" . $_SERVER["HTTP_HOST"];
			if($mail==true){
				$header0 = header( "refresh: 3; url=$url" );
				echo("<div id='sucess' style='position:absolute; width:100%; height:50px; top: 50px; left: 0px; background:url(images/footer-bg.jpg); padding: 15px; '><div style='padding-top: 10px;'><img src='image/sucess1.png' width='32' align='absmiddle'/><span style='font-size:20px; font-weight: bolder; color:#FF7405;'>Sua  Mensagem Foi Enviada com sucesso em Breve Entraremos em Contato.</span></div></div>");
			} else {
				$header0 = header( "refresh: 10; url=$url" );
				echo("<div id='sucess' style='position:absolute; width:100%; height:50px; top: 50px; left: 0px; background:url(images/footer-bg.jpg); padding: 15px; '><div style='padding-top: 10px;'><span style='font-size:20px; font-weight: bolder; color:red;'>Falha no envio da mensagem, por favor tente novamente ou entre em contato pelos telefones: 48 999913535 e 48 999910335 Tim e WhatsApp</span></div></div>");
			}
		}
	}// function mail  fim
	//Instanciamos Nossa classe Formail e Resgatamos os dados do formulario via metodo post
	
	/*
	echo "<p>&nbsp;</p>";
	echo "<p>&nbsp;</p>";
	print_r($_POST);
	echo "<p>&nbsp;</p>";
	print_r($_SERVER);
	*/
	
	$Formail=new Formail();//istanciamos a classe Formail
	$Formail->nome=$_POST["nome"];
	$Formail->email=$_POST["email" ];
	$Formail->mensagem=$_POST["mensagem" ];
	//formatação do email//
	$Formail->remetente="floripasurfclub@gmail.com";// aqui o email para onde ira a mensagem
	$Formail->assunto=".: SUP SOCIAL - Mensagem do Site :.";//assunto do email
	$Formail->content_type="Content-Type: text/html; charset=ISO-8859-1\n";//serve para formatar para html assim podendo inserir codigo html como tabelas imagens e etc..
	$Formail->mime_version="MIME-Version: 1.0\n";//O protocolo básico de transmissão de e-mail pela Internet
	$Formail->mail();
}
?>