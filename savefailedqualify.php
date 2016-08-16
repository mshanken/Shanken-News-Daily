<?php 

  // Include the needed CIHelper file
  require __DIR__.'/CIHelper.php';

  // Save this failed qualify attempt
  saveFailedQualifyAttempt();

  function saveFailedQualifyAttempt() {

    # Grab the necessary vars from URL
    $email = $_GET['email'];
    $zipcode = $_GET['zipcode'];
    $company = $_GET['company'];
    $businessType = $_GET['businessType'];

    if(!$email)
      return false;

    # Load the needed ciHelper
    $ciHelper = new CIHelper();

    # Start the profile array
    $profile = array (
      ''

    );

    // Start with a false result -- overwrite this with valid data if we get it
    $profile = array (
      'success' => false,
      'data' => null
    );

    // Get the email value handed in
    $email = $_GET['email'];

    // If no email, don't do API call
    if ($email && strlen($email) < 250 && preg_match("/\s/", $email) === 0) {

      // Instantiate the CI library
      $userData = $ciHelper->findSubscriber($email,true);

      // Did we find a result?
      if ($userData !== false) {

        // Ovewrite $result with valid results
        $result = array (
          'success' => true,
          'data' => $userData->data->lists->emaillistids
        );

      }

    }

    // Print the result, with headers

    header('Content-type: application/json; charset=utf-8'); 
    header('Access-Control-Allow-Origin: http://www.shankennewsdaily.com');

    echo json_encode($result);

  }

?>