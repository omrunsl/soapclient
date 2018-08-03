<?php 

	$url = "http://www.example.com/webservis.wsdl"; // Web Servis Url

	$client = new SOAPClient($url); // Soap nesnesi ile ilgili url'e bağlantı sağlanır.

	// Eğer authentication gerekiyorsa size verilen bilgileri headerbody kısmına yazmalısınız.
	// Auth gerekmiyorsa Sunucuda kullanılabilen fonksiyonlar kısmından devam edebilirsiniz.

	$username = "username";

	$password = "password";

	$headerbody = array(
		'Username' => $username,
		'Password' => $password,
	);

	$authheader = "SomeHeader"; //xml' de yer alan authentication kısmının etiketi

	$nameserver = "http://somens.org/"; // xml' de yer alan xmlns kısmı

	$header = new SOAPHeader($nameserver, $authheader, $headerbody); // Yeni header nesnesi oluşturuyoruz.

	$client->__setSoapHeaders($header); // Soap nesnesine header bilgilerini gönderiyoruz.

	echo "Karsi sunucudaki kullanilabilir fonksiyonlar:<br/><pre>"; // Sunucuda kullanılabilen fonksiyonları çekmenize yarar.
	$allMethods = $client->__getFunctions();
	print_r($allMethods);
	echo "</pre>"; 
	echo "<br/><pre>";

	echo "Karsi sunucudaki kullanilabilir Alanları:<br/><pre>"; // Sunucudaki fonksiyonların parametrelerşnş görmenize yarar.
	$allTypes = $client->__getTypes();
	print_r($allTypes);
	echo "</pre>";

	// Parametreleri array olarak bir değişkene atıyoruz.
	$parameters = array(
			"someparameter" => "somevalue"
	);

	$result = $client->SomeFunction($parameters); // Sunucudaki fonksiyona istek yapıyoruz.

	echo "<br/><pre>";

	print_r($result); // Sunucudan gelen sonucu ekrana yazdırıyoruz.
		
	echo "</pre>";

?>
