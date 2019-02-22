<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

ini_set('soap.wsdl_cache_enabled', 0 );
ini_set('soap.wsdl_cache_ttl', 0); 

$client = new SoapClient("http://192.168.43.226:8080/1C_WEB/ws/ws1.1cws?wsdl"
    , 
    array( 
    //'cache_wsdl' => WSDL_CACHE_NONE,
    //'trace' => true, 
    'features' => SOAP_USE_XSI_ARRAY_TYPE, 
    'encoding' => 'UTF-8')
); 

//Заполним массив данными
$name = "Полина"; //$_POST["name"];
$telephone = "+79774718024";//$_POST["telephone"];
$result = $client->Order($name,$telephone);
  //Order - это метод веб-сервиса 1С, который описан в конфигурации.
var_dump($result);

?>