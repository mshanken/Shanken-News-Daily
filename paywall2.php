<?php 

  // Include the needed CIHelper file
  require __DIR__.'/CIHelper.php';

  // Run the CI check
  checkEmailAgainstCI();


  function checkEmailAgainstCI() {

    // Check CI First to see if user is valid 

    $ciHelper = new CIHelper();

    // Start with a false result -- overwrite this with valid data if we get it
    $result = array (
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