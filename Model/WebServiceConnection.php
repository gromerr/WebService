<?php

class WebServiceConnection {
    
    protected $soapClient;
    protected $authenticate;
    
    
    public function __construct() {
        
        $this->createSoapClient();
        $this->createAuthenticate();
    }
    
    private function createSoapClient(){
        $serviceURL = 'http://xxx.php?wsdl';
        $this->soapClient = new SoapClient( $serviceURL );
    }
    
    private function createAuthenticate(){
        $login = 'login';
        $password = 'password';
        $hashedSrting = sha1( date( 'Ymd' ) . sha1($password) );
        
        $this->authenticate =  array( 'system_key' => $hashedSrting, 'system_login' => $login );
    }
    
    protected function getParameters( array $params ){
        
        return array(
            'authenticate' => $this->authenticate,
            'params' => $params
        );
    }
}
