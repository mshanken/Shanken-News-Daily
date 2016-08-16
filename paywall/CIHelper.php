<?php 

  class CIHelper {

  public $ciApiKey = '4503D3B3-155D-010C-10024B7FE48522E3';
  public $ciApiUrl = 'http://portal.criticalimpact.com/api8/subscriber';

  public function saveFailedQualifySubscriber($email=null,$zip=null,$company=null,$industry=null)
  {
    # Api to save failed user qualifications on the free SND form
    
    if(!$email)
      return false;

    # ListID to use for Failed Qualifies
    $ciFailedQualifyList = '1000JTE00000001JP86';

    $profile['Email'] = 


  }

  private function addUserToLists($profile, $listIds)
      {
          $ciListID = $listIds;    // listIds is a comma separated list of CI list Ids  
         
          $url = $this->ciApiUrl;
          
          if(!empty($profile))
          {   
             
              /*
               * Check to see if the subscriber exists in CI
               * using their email
               */
               
              $success = $this->findSubscriber($profile['Email']);
              
              if($success)
                  $subscriberId = $success;
             
              
               /* Build parameter list to post the request to ci api
               *  to either create or update their subscriber record
               */
              $params = array();
              
              $this->listsremove = "";
              $params['apiKey']= $this->ciApiKey;
              $params['email']= $profile['Email'];
            
              
              if(array_key_exists('FirstName', $profile))       // populate firstname
                  $params['firstname'] = $profile['FirstName'];
              else
                  $params['firstname'] = '';
              
              if(array_key_exists('LastName', $profile))         // populate lastname
                  $params['lastname'] = $profile['LastName'];
              else
                  $params['lastname'] = '';
              
              // set custom fields if passed info else blank
              
              // form custom field json
              if(array_key_exists('Zipcode', $profile) )          // populate custom1 == user_zipcode
                  $custom['custom1'] = $profile['Zipcode'];
              else
                  $custom['custom1'] = '';
              
              if(array_key_exists('Industry', $profile) )         // populate custom2 == user_industry
                  $custom['custom2'] = $profile['Industry'];
              else
                  $custom['custom2'] = '';
              
              if(array_key_exists('FirstName', $profile) )       // populate custom6 == user_name
                  $custom['custom6'] = $profile['FirstName'];
              else
                  $custom['custom6'] = '';
              
              if(array_key_exists('Source', $profile) )          // populate custom5 == source
                  $custom['custom5'] = $profile['Source'];
              else
                  $custom['custom5'] = '';
              
              $custom_json = json_encode($custom);
              
            
              //$post_params['customfields']='{"custom1": "CUSTOMFIELD_VALUE_HERE", "custom2": "CUSTOMFIELD_VALUE_HERE"}';
              $params['customfields'] = $custom_json;
             
           
              $params['email_type']="1";  // HTML email
              $params['unsubscribe']="0";   // 0 means subscribe, 1 mean unsubscribe
              
             
             //var_dump($params);
            
             
              if ( !isset($subscriberId))
              {
                  /* SubscriberId not set, so user does not exist in CI subscriber database
                   * Create a new subscriber -- uses POST request
                   */
                 // Add listIds to the parameters
                 //echo "<br>new subscriber";
                 
                  $params['listId']= $ciListID;
                  $curl = curl_init($url);
                  curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, 100);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt ($curl, CURLOPT_POST, 1);
                  curl_setopt ($curl, CURLOPT_POSTFIELDS, $params);
                  
              }
              else {
                  
                  /* SubscriberId is set, that means user is already in CI subscriber database
                   * Update the subscriber record now -- uses PUT request
                   */
                 //echo "Update subscriber";
                 
                  
                  // Added subscriber ID to earlier array of parameters
                  
                  $params['id'] = $subscriberId;
                  
                  // Subscriber added to addional lists using addListIds parameter
                  $params['listidsadd'] = $ciListID;
                 
                  $url = sprintf("%s?%s", $url, http_build_query($params, '', '&'));
              
                  $curl = curl_init($url);
                  curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, 100);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
              
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                  curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($params,'', '&'));
              }
              
              
             
              //Posts this using CURL
             
              $result = curl_exec ($curl);
              curl_close ($curl);
              
             
              $parsed_result = json_decode($result,false);
              
             
             return $parsed_result;
             
          }
          
          
          
      }

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