<?php

class WebController {
    
    public function controller(){
        require 'Model/ClientsWebService.php';
        
        if( isset( $_POST['inputLogin'] ) ){
            $clients = new ClientsWebService();
            
            if( $clients->checkLoginInService() ){
                
                if( $clients->getClientData() ){
                    include 'View/EditClientPage.php';
                }else{
                    include 'View/ErrorPage.php';
                } 
                
            }else{
                include 'View/ErrorPage.php';
            }
            
        }else if( isset( $_POST['formSave'] ) ){
            $clients = new ClientsWebService();
            
            if( $clients->setClientData() ){
                include 'View/SuccessPage.php';
            }else{
                include 'View/ErrorPage.php';
            }
            
            include 'View/EditClientPage.php';
        }
    }
}
