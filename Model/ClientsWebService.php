<?php

require 'WebServiceConnection.php';

class ClientsWebService extends WebServiceConnection{
    
    private $clientNumber;
    private $errors;


    public function checkLoginInService(){
        $this->errors = array();
        
        $clientData = (array)$this->soapClient->getClientCRM( $this->getLoginParameters() );
        $this->getMainErrors( $clientData[ 'errors' ] );
        
        if( empty( $this->errors ) ){
            $this->clientNumber = $clientData['clients'][0]->client_number;
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    private function getLoginParameters(){
        
        $login = $_POST['inputLogin'];
        $parameters = array( 'login' => $login );
        
        return $this->getParameters( $parameters );
    }
    
    public function getClientData(){
        
        $clientData = (array)$this->soapClient->getClients( $this->getClientParametersForEdit() );
        $this->getMainErrors( $clientData[ 'errors' ] );
        
        if( empty( $this->errors ) ){
            $this->sendClientDataToPost( (array)$clientData['clients'][0] );
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    private function getClientParametersForEdit(){
        
        $parameters = array(
            'clients' => array(
                'client_numbers' => array( $this->clientNumber )
            )
        );
        
        return $this->getParameters( $parameters );
    }
    
    private function sendClientDataToPost( array $clientData ){
        
        $_POST['login'] = $clientData['login'];
        $_POST['client_number'] = $clientData['client_number'];
        $_POST['email'] = $clientData['email'];
        $_POST['firstname'] = $clientData['billing_address']->firstname;
        $_POST['lastname'] = $clientData['billing_address']->lastname;
        $_POST['street'] = $clientData['billing_address']->street;
        $_POST['zipcode'] = $clientData['billing_address']->zipcode;
        $_POST['city'] = $clientData['billing_address']->city;
        $_POST['company'] = $clientData['billing_address']->firm;
        $_POST['vat_number'] = $clientData['billing_address']->nip;
        $_POST['phone'] = $clientData['billing_address']->phone_cellular;
    }
    
    public function setClientData(){
        $this->errors = array();
        
        $clientData = (array)$this->soapClient->setClients( $this->getClientParametersForSave() );
        $this->getMainErrors( $clientData[ 'errors' ] );
        $this->getAdditionalErrors( $clientData[ 'clients' ][0] );
        
        if( empty( $this->errors ) ){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    private function getMainErrors( $errors ){
        
        if( $errors->faultCode > 0 ){
            $this->errors = array_merge( array( $errors ), $this->errors );
        }
    }
    
    private function getAdditionalErrors( $client ){
        
        if( $client->status == 0 ){
            $this->errors = array_merge( $client->errors, $this->errors );
        }
    }

    private function getClientParametersForSave(){
        $client = array(
            'login' => $_POST['login'],
            'shops' => array(1),
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'street' => $_POST['street'],
            'zipcode' => $_POST['zipcode'],
            'city' => $_POST['city'],
            'company' => $_POST['company'],
            'vat_number' => $_POST['vat_number'],
            'email' => $_POST['email']
        );
        
        if( strlen( $_POST['phone'] ) > 0 ){
            $client = array_merge( $client, array( 'phone' => $_POST['phone'] ) );
        }
        
        $parameters = array(
            'clients' => array(
                $client
            )
        );
        
        return $this->getParameters( $parameters );
    }

    public function getClientNumber(){
        return $this->clientNumber;
    }
    
    public function getErrors(){
        return $this->errors;
    }
}
