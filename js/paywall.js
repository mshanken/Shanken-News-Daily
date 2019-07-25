function isPageBlocked() {
  // Add logic here later to check URL and see if page is restricted
  // Logic (ugly) is: contains index.php/DDDD
  
  // console.log('Calling isPageBlocked');
  var loc = window.location.href;

  // console.log('URL location is:',loc);

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
  // console.log('getPaywallCookie called with name of ', cookieInfo.name);
  var cookie = Cookies.get(cookieInfo.name);
  // console.log('cookie value is:', cookie);
  if(cookie !== undefined)
    return parseInt(cookie);
  else
    return 1;    // first visit 
}
// Set the cookie if we need to
function setPaywallCookie() {
    var cookieInfo = returnCookieInfo();
    value = '999999';
    // console.log('setPaywallCookie called with name of ', cookieInfo.name);
    // console.log('setPaywallCookie called with options of ', cookieInfo.options);
    cookieSet = Cookies.set(cookieInfo.name, value, cookieInfo.options);
    // console.log('cookieSet is:', cookieSet);
}
// Set the cookie if we need to
function incrementPaywallCookie(oldValue) {
    var cookieInfo = returnCookieInfo();
    if (oldValue === undefined)
        newValue = 1;
    else
        newValue = oldValue+1;
    cookieSet = Cookies.set(cookieInfo.name, newValue, cookieInfo.options);
}

// Remove the cookie if we need to
function removePaywallCookie() {
  var cookieInfo = returnCookieInfo();
  // console.log('removeCookie called');
  var removed = Cookies.remove(cookieInfo.name,cookieInfo.options);
  // console.log('Cookie removed is:', removed);
}


// Centralize the generation of the modal body HTML
function getModalBody(titleText, bodyText, eventNameGA) {
  return '<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="color:black; background: rgba(0,0,0,0.70);"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel">'+titleText+'</h4></div><div class="modal-body">'+bodyText+'</div></div></div></div>';
}

// Is it a valid email string?
function validateEmail(email) {
  var emailRegex = new RegExp(/^.+@.+\..+$/);
  var validationResult = emailRegex.test(email);
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

  var subscribeLink = 'https://msh.dragonforms.com/QXnew30d1d',
    modalTitleText = '<a href="'+subscribeLink+'" onclick="dataLayer.push({\'event\'\: \'modal_paywall_click\'});"><img class="img-responsive" src="https://img.mshanken.com/d/snd/SDN_logo-Blocker.gif"></a>',
    modalBodyText = '<span>Continue reading this article with a subscription to Shanken News Daily.</span><span>You will also receive the Cannabis Edition e-newsletter.</span><div class="block-limitedoffer">Limited Time Offer<br><a href="'+subscribeLink+'" class="btn btn-primary" onclick="dataLayer.push({\'event\'\: \'modal_paywall_click\'});">$1 for 30 days </a></div>'
    modalBodyForm = '<br>Already a subscriber?  Log in.\
    <form class="form-inline">\
      <div class="form-group form-group-lg">\
        <label for="subscriberEmail" class="control-label sr-only">Email Address</label>\
        <input type="email" class="form-control" id="subscriberEmail" placeholder="Email Address" style="border-radius: 0;">\
      </div>\
      <button id="modalSubmit" class="btn btn-success btn-lg">Log In</button>\
      <br>\
      <div id="flashMessageWarning" class="alert alert-danger" style="display: none;"></div>\
      <div id="flashMessageSuccess" class="alert alert-success" style="display: none;"></div>\
    </form>',
    modalImg = '</div><div><img class="img-responsive" src="https://img.mshanken.com/d/snd/SND-Blocker.gif" style="margin-bottom:13px;">',
    modalEventName = 'paywall';
  var modalBody = getModalBody(modalTitleText, modalBodyText+modalBodyForm+modalImg, modalEventName);
  // console.log('Modal Body:', modalBody);
  // console.log('performExpiredSubBusinessLogic called');
  $('#footer').after(modalBody);
  $('#basicModal').modal({show: true, backdrop: 'static', keyboard: false});  // Extra options needed for security
  // console.log('Just tried to show the modal.');

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
  postModalSuccess('Logging in...');

  // Take the email and toss it against Hallmark
  // But wait 3 seconds in order to give chance for message to be read
  window.setTimeout(function() {
    apiCall(email);
  }, 3000);


}

function apiCall(email) {

  if(!email)
    return false;

  var url = 'https://api.shankennewsdaily.com/paywall2.php?email='+email;

  $.ajax({
    url: url,
    dataType: 'json',
    success: checkAPIResponse,
    error: errorAPIResponse
  });

}

function checkAPIResponse(response) {
  var authenticatedUser = false;
  console.log('API call returned!',response);

  // Did the API call result in success?
  if(response.success === true) {
    console.log('API call says success');
    authenticatedUser = true;
  } else {
    console.log('API call says failure');
    authenticatedUser = false;
  }

  // Process the result
  if(authenticatedUser) {
    authenticateUser();
  } else {
    authenticationFailed();
  }

}


function checkAPIResponse_original(response) {
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
  // console.log('User is invalid: reject them');

  // Google Analytics event fire
  dataLayer.push({'event': 'user_rejected'});

  // First, hide the warning
  clearModalSuccess();

  var subscribeLink = 'https://newsletters.shankennewsdaily.com/'

  // Then, let them know it failed
  postModalWarning('Sorry. We don\'t recognize that log in information. Please try again.<p>Need help? <a href="mailto:shankennewshelp@mshanken.com?subject=Help with Shanken News Daily website login">Click here</a>. Do you want to subscribe to <i>Shanken News Daily</i>? <a href="'+subscribeLink+'" onclick="dataLayer.push({\'event\'\: \'modal_paywall_authfail_click\'});" style="color:blue">Click here.');
  
}

function doPaywall() {

  // How many pages for free?
  var freePages = 3;

  // First, check to see if this page is restricted
  var restricted = isPageBlocked();

  if (restricted === false) {
    // console.log('Not a restricted page, exit immediately');
    return;

  } else {

    // Page IS restricted -- proceed
    // console.log('Restricted page: proceed with paywall logic');

    // Now, check to see if we have a user cookie
    var myPaywallCookieValue = getPaywallCookie();
    //console.log('myPaywallCookieValue is:',myPaywallCookieValue);
    
    // Allow logged in users to get through
    if(myPaywallCookieValue == '999999') {
        return;
    } else if(myPaywallCookieValue == undefined || myPaywallCookieValue <= freePages) {
        // New biz logic as of Oct 30, 2017 - allow 5 free pages
        // First page through fifth are free, but increment counter
        incrementPaywallCookie(myPaywallCookieValue);
        //console.log('Free page - current value is:',myPaywallCookieValue);
        return;
    } else {
        // Restricted page, not member, more than 5th page
        //console.log('Not free page - visit count is:',myPaywallCookieValue);
        performRestrictedBusinessLogic();
    }
  
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
