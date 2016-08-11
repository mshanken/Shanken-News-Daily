<?php 

  class CIHelper {

  public $ciApiKey = '4503D3B3-155D-010C-10024B7FE48522E3';
  public $ciApiUrl = 'http://portal.criticalimpact.com/api8/subscriber';

  public function findSubscriber($email,$returnAllData=false)
  
    {
              
       if($email == '' )
           throw new Exception("Must pass an email to find subscriber", 1);
           
       /*
        * Build a param array to pass to CI api
        */
       $url_params['apiKey']= $this->ciApiKey;
       
       $url = $this->ciApiUrl;
       
       $url_params['email']= $email;
      
       $url = sprintf("%s?%s", $url, http_build_query($url_params, '', '&'));
       
       
       //Uses CURL GET Request to get the subscriber record in CI
     
       
       $curl = curl_init($url);
       curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, 100);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       $result = curl_exec ($curl);
       curl_close ($curl);
       

       //Parse the json to get return values.
       $parsed_result = json_decode($result,false);
       
       if( $parsed_result->status == 'success') 
       {
           // subscriber exists, not get subscriber Id which is needed to update their record
          // echo "<br>subscriber found<br>";
           $subscriberId = $parsed_result->data->id;
       
           // Use returnAllData flag to decide what we give back    
           if ($returnAllData === false)
             return $subscriberId;
           else
             return $parsed_result;
       
       }
       else {
           return false;
       }
       
       
   }

  };
?>