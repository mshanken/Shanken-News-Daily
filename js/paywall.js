function isPageBlocked() {
  // Add logic here later to check URL and see if page is restricted
  // Logic (ugly) is: contains index.php/DDDD
  
  console.log('Calling isPageBlocked');
  var loc = window.location.href;

  // manually override URLs for testing vs live URL string
  // Remove this before going live
  //loc = "http://www.shankennewsdaily.com/index.php/2015/10/30/13664/rothschild-familys-shared-champagne-brand-seeing-sharpened-u-s-focus/";

  console.log('URL location is:',loc);

  var urlRegex = new RegExp(/index\.php\/\d\d\d\d/); // Look for index.php/DDDD

  if (urlRegex.test(loc))
    return true;
  else
    return false;

}

// Centralize the cookie data
function returnCookieInfo() {
  var name = 'paywall',
    options = {path:"/", expires:21},
    cookieInfo = {name: name, options:options}

  return cookieInfo;

}

// Grab the cookie we use for handling modal logic
function getPaywallCookie() {
  var cookieInfo = returnCookieInfo();
  console.log('getPaywallCookie called with name of ', cookieInfo.name);
  var cookie = Cookies.get(cookieInfo.name);
  console.log('cookie value is:', cookie);
  return cookie;
}
// Set the cookie if we need to
function setPaywallCookie() {
  var cookieInfo = returnCookieInfo();
    value = true;
    console.log('setPaywallCookie called with name of ', cookieInfo.name);
    console.log('setPaywallCookie called with options of ', cookieInfo.options);
    cookieSet = Cookies.set(cookieInfo.name, value, cookieInfo.options);
    console.log('cookieSet is:', cookieSet);
}
// Remove the cookie if we need to
function removePaywallCookie() {
  var cookieInfo = returnCookieInfo();
  console.log('removeCookie called');
  var removed = Cookies.remove(cookieInfo.name,cookieInfo.options);
  console.log('Cookie removed is:', removed);
}


// Centralize the generation of the modal body HTML
function getModalBody(titleText, bodyText, eventNameGA) {
  return '<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="color:black"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">'+titleText+'</h4></div><div class="modal-body">'+bodyText+'</div></div></div></div>';
}

// Is it a valid email string?
function validateEmail(email) {
  var emailRegex = new RegExp(/^.+@.+\..+$/);
  var validationResult = emailRegex.test(email);
  console.log('Valid email, sort of?: ',validationResult);
  return validationResult;
}

function postModalWarning(text) {
  $('#flashMessageWarning').html(text).show(400);
}

function clearModalWarning() {
  $('#flashMessageWarning').hide(400);
}

function postModalSuccess(text) {
  $('#flashMessageSuccess').html(text).show(400);
}

function clearModalSuccess() {
  $('#flashMessageSuccess').hide(400);
}

// Centralize handling of form submission
function handleFormSubmission() {
  var email = $('#subscriberEmail').val();

  // Make sure we have valid email before continuing
  var validEmail = validateEmail(email);

  if (validEmail === false)
    postModalWarning('Sorry, that is not a valid email address.  Try again.');
  else
    loginUser(email);

}



function performRestrictedBusinessLogic() {
  // Centralize the business logic here
  // Fire GTM event by pushing data to dataLayer
  dataLayer.push({'event': 'modal_restricted_fire'});

  var subscribeLink = 'http://newsletters.shankennewsdaily.com/',
    modalTitleText = 'Are You a Shanken News Daily Subscriber?',
    modalBodyText = 'This website is available to <i>Shanken News Daily</i> subscribers only. Please log in below.<p>If you don\'t have a subscription, <a href="'+subscribeLink+'" onclick="dataLayer.push({\'event\'\: \'modal_paywall_click\'});" style="color:blue">click here to sign up today.</a>',
    modalBodyForm = '<form class="form-horizontal">\
    <div id="flashMessageWarning" class="alert alert-danger" style="display: none;"></div>\
    <div id="flashMessageSuccess" class="alert alert-success" style="display: none;"></div>\
    <div class="form-group">\
      <label for="subscriberEmail" class="col-sm-4 control-label">Email Address</label>\
      <div class="col-sm-8">\
        <input type="email" class="form-control" id="subscriberEmail"></div>\
      </div>\
      <div class="col-sm-4 center-block" style="float:none">\
        <button id="modalSubmit" class="btn btn-primary">Subscriber Log In</button>\
      </div>\
    </div>\
    <br>\
    </form>',
    modalEventName = 'paywall';
  var modalBody = getModalBody(modalTitleText, modalBodyText+'<hr>'+modalBodyForm, modalEventName);
  console.log('Modal Body:', modalBody);
  console.log('performExpiredSubBusinessLogic called');
  $('#footer').after(modalBody);
  $('#basicModal').modal({show: true, backdrop: 'static', keyboard: false});  // Extra options needed for security
  console.log('Just tried to show the modal.');

  // Add listener to the modal button, but only after listener is shown
  $('#modalSubmit').click(function(event) {
    console.log('ModalSubmit clicked!');
    event.preventDefault();
    handleFormSubmission();
  })

}

function loginUser(email) {
  // Log in the user
  
  // First, hide the warning
  clearModalWarning();

  // Show what we're doing
  postModalSuccess('Logging you in now...hold just a second.');

  // Take the email and toss it against Hallmark
  // But wait 3 seconds in order to give chance for message to be read
  window.setTimeout(function() {
    apiCall(email);
  }, 3000);


}

function apiCall(email) {

  if(!email)
    return false;

  var url = 'http://www.winespectator.com/api/cIGetUserLists?email='+email;

  $.ajax({
    url: url,
    dataType: 'json',
    success: checkAPIResponse,
    error: errorAPIResponse
  });

}

function checkAPIResponse(response) {
  var validLists = ['1000JTE00000001J95W','1000JTE00000001IR71'],
    authenticatedUser = false;
  console.log('API call returned!',response);
  if(response.success === true) {
    console.log('Looping through valid lists',validLists.length);

    // Outer loop: go through valid List array
    for (var i = validLists.length - 1; i >= 0; i--) {
      if (authenticatedUser === true)   // Exit immediately if has been found on inside loop
        break;
      console.log('Checking this list:',validLists[i]);

      // Inner loop: go through this user's email lists array
      for (var j = response.data.length - 1; j >= 0; j--) {
        console.log('Looking at this item in User:',response.data[j]);

        // Comparison 
        if (response.data[j] == validLists[i]) {
          console.log('We have a match - break!');
          authenticatedUser = true;
          break;
        }
      }
    }
  } else {  
    console.log('No SND for you!');
  }

  console.log('Result of checking response is:',authenticatedUser);

  // Process the result
  if(authenticatedUser) {
    authenticateUser();
  } else {
    authenticationFailed();
  }

}

function errorAPIResponse(x,t,m) {
  console.log('API call errored out:'+t);

  // Google Analytics event fire
  dataLayer.push({'event': 'api_error_'+t});

  // Clear out the Checking message
  clearModalSuccess();

  // Post warning
  postModalWarning('Sorry, we\'re having a problem with our system right now.  Granting temporary access.');

  setTimeout(function() {
    $('#basicModal').modal('hide');
  },4000);


}

function authenticateUser() {

  // User is on the list - authenticate them
  console.log('User is valid: authenticate them');

  // Google Analytics event fire
  dataLayer.push({'event': 'user_authenticated'});

  // First, hide the success
  clearModalSuccess();

  // Set the Paywall Cookie
  setPaywallCookie();

  // Hide the modal
  $('#basicModal').modal('hide');

  // And, we're done!

}


function authenticationFailed() {

  // User is not on the list - reject
  console.log('User is invalid: reject them');

  // Google Analytics event fire
  dataLayer.push({'event': 'user_rejected'});

  // First, hide the warning
  clearModalSuccess();

  var subscribeLink = 'http://newsletters.shankennewsdaily.com/'

  // Then, let them know it failed
  postModalWarning('Sorry. We don\'t recognize that log in information. Please try again.<p>Need help? <a href="mailto:shankennewshelp@mshanken.com?subject=\'Help with Shanken News Daily website login\'">Click here</a>. Do you want to subscribe to <i>Shanken News Daily</i>? <a href="'+subscribeLink+'" onclick="dataLayer.push({\'event\'\: \'modal_paywall_authfail_click\'});" style="color:blue">Click here.');
  
}

function doPaywall() {

  // First, check to see if this page is restricted
  var restricted = isPageBlocked();

  if (restricted === false) {
    console.log('Not a restricted page, exit immediately');
    return;

  } else {

    // Page IS restricted -- proceed
    console.log('Restricted page: proceed with paywall logic');

    // Now, check to see if we have a user cookie
    var myPaywallCookie = getPaywallCookie();
    console.log('myPaywallCookie is:',myPaywallCookie);
    if (myPaywallCookie !== undefined) {
      console.log('Paywall cookie is set - have already done biz logic.  Break immediately.');
      return;
    } else {

      // Restricted page, no cookie -- present login modal
      performRestrictedBusinessLogic();

    }

    // // Set cookie so we don't do this more than once
    // setPaywallCookie(cookieInfo);  
  }
}

$(document).ready(function() {

  // Wrapping in setTimeout to add slight delay
  setTimeout(function() {

    // Do the paywall 
    doPaywall();

    // Wipe out the cookie, during testing
    //removePaywallCookie();
  },1000);

});




