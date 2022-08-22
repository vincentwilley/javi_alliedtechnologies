// Custom JS for the Theme

// Config 
//-------------------------------------------------------------

var companyName = "Car Rental Station"; // Enter your event title


// Initialize Tooltip  
//-------------------------------------------------------------

$('.my-tooltip').tooltip();



// Initialize jQuery Placeholder  
//-------------------------------------------------------------

$('input, textarea').placeholder();



// Toggle Header / Nav  
//-------------------------------------------------------------

$(document).on("scroll", function () {
  if ($(document).scrollTop() > 39) {
    $("header").removeClass("large").addClass("small");
  }
  else {
    $("header").removeClass("small").addClass("large");
  }
});



// Vehicles Tabs / Slider  
//-------------------------------------------------------------

$(".vehicle-data").hide();
var activeVehicleData = $(".vehicle-nav .active a").attr("href");
$(activeVehicleData).show();

$('.vehicle-nav-scroll').click(function () {
  var direction = $(this).data('direction');
  var scrollHeight = $('.vehicle-nav li').height() + 1;
  var navHeight = $('#vehicle-nav-container').height() + 1;
  var actTopPos = $(".vehicle-nav").position().top;
  var navChildHeight = $('#vehicle-nav-container').find('.vehicle-nav').height();
  var x = -(navChildHeight - navHeight);

  var fullHeight = 0;
  $('.vehicle-nav li').each(function () {
    fullHeight += scrollHeight;
  });

  navHeight = fullHeight - navHeight + scrollHeight;

  // Scroll Down
  if ((direction == 'down') && (actTopPos > x) && (-navHeight <= (actTopPos - (scrollHeight * 2)))) {
    topPos = actTopPos - scrollHeight;
    $(".vehicle-nav").css('top', topPos);
  }

  // Scroll Up
  if (direction == 'up' && 0 > actTopPos) {
    topPos = actTopPos + scrollHeight;
    $(".vehicle-nav").css('top', topPos);
  }

  return false;
});




$(".vehicle-nav li").on("click", function () {

  $(".vehicle-nav .active").removeClass("active");
  $(this).addClass('active');

  $(activeVehicleData).fadeOut("slow", function () {
    activeVehicleData = $(".vehicle-nav .active a").attr("href");
    $(activeVehicleData).fadeIn("slow", function () { });
  });

  return false;
});



// Vehicles Responsive Nav  
//-------------------------------------------------------------

$("<div />").appendTo("#vehicle-nav-container").addClass("styled-select-vehicle-data");
$("<select />").appendTo(".styled-select-vehicle-data").addClass("vehicle-data-select");
$("#vehicle-nav-container a").each(function () {
  var el = $(this);
  $("<option />", {
    "value": el.attr("href"),
    "text": el.text()
  }).appendTo("#vehicle-nav-container select");
});

$(".vehicle-data-select").change(function () {
  $(activeVehicleData).fadeOut("slow", function () {
    activeVehicleData = $(".vehicle-data-select").val();
    $(activeVehicleData).fadeIn("slow", function () { });
  });

  return false;
});



// Initialize Datepicker
//-------------------------------------------------------------------------------
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#pick-up-date').datepicker({
  onRender: function (date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function (ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#drop-off-date')[0].focus();
}).data('datepicker');
var checkout = $('#drop-off-date').datepicker({
  onRender: function (date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function (ev) {
  checkout.hide();
}).data('datepicker');


$(".input-group.drop-off").toggle();
$(".autocomplete-suggestions").css("width", $('.pick-up .autocomplete-location').outerWidth());




// Scroll to Top Button
//-------------------------------------------------------------------------------

$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('.scrollup').removeClass("animated fadeOutRight");
    $('.scrollup').fadeIn().addClass("animated fadeInRight");
  } else {
    $('.scrollup').removeClass("animated fadeInRight");
    $('.scrollup').fadeOut().addClass("animated fadeOutRight");
  }
});

$('.scrollup, .navbar-brand').click(function () {
  $("html, body").animate({ scrollTop: 0 }, 'slow', function () {
    $("nav li a").removeClass('active');
  });
  return false;
});





// Scroll To Animation
//-------------------------------------------------------------------------------

var scrollTo = $(".scroll-to");

scrollTo.click(function (event) {
  $('.modal').modal('hide');
  var position = $(document).scrollTop();
  var scrollOffset = 110;

  if (position < 39) {
    scrollOffset = 260;
  }

  var marker = $(this).attr('href');
  $('html, body').animate({ scrollTop: $(marker).offset().top - scrollOffset }, 'slow');

  return false;
});



// setup autocomplete - pulling from locations-autocomplete.js
//-------------------------------------------------------------------------------

$('.autocomplete-location').autocomplete({
  lookup: window.locations,
});



// Newsletter Form
//-------------------------------------------------------------------------------

function calculate_distance() {

  var pickup = $("#pick-up-location").val();
  var drop = $("#drop-up-location").val();
  console.log(pickup);
  console.log(drop);
  var f_data = { long_title: pickup, lat_title: drop };
  var actionUrl = "web_api/calculate_distance.php";

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: f_data, // serializes the form's elements.
    success: function (data) {
      console.log(data); // show response from the php script.
    }
  });
}
$("#signup-form").submit(function (e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = "web_api/user.php";

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      console.log(data); // show response from the php script.
      var json = $.parseJSON(data);
      var resp = json.response;
      if (resp[0].status == 'success') {
        showSnackbar("Account Created");
        $("#status").text("Account Created");

        setTimeout(function () { window.location.href = 'signin.php'; }, 1000);
      } else {
        if (resp[0].reason == 'already_exists') {
          showSnackbar("Email already registered, try another email");


          $("#status").text("Email already registered, try another email");

          setTimeout(function () { window.location.href = 'signin.php'; }, 1000);
        } else {
          showSnackbar("Failed, Try again");
          $("#status").text("Failed, Try again");

          setTimeout(function () { window.location.href = 'signin.php'; }, 1000);
        }
      }
    }
  });

});

$("#signin-form").submit(function (e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = "web_api/user.php";

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      console.log(data); // show response from the php script.
      var json = $.parseJSON(data);
      var resp = json.response;
      if (resp[0].status == 'success') {
        showSnackbar("Account Found");
        $("#status").text("Account Found");

        setTimeout(function () { window.location.href = 'index.php'; }, 1000);
      } else {
        if (resp[0].reason == 'account_not_found') {
          showSnackbar("Invalid Details, try again");
          $("#status").text("Invalid Details, try again");
        } else {
          showSnackbar("Failed, Try again");
          $("#status").text("Failed, Try again");
        }
      }
    }
  });

});

$("#book_now_form").submit(function (e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = "web_api/request.php";

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      console.log(data); // show response from the php script.
      var json = $.parseJSON(data);
      var resp = json.response;
      if (resp[0].status == 'success') {
        showSnackbar("Request Booked");
        $("#status").text("Request Booked"); 
        setTimeout(function () { window.location.href = 'index.php'; }, 1000);
      } else {
        if (resp[0].reason == 'account_not_found') {
          showSnackbar("Invalid Details, try again");
          $("#status").text("Invalid Details, try again");
        } else {
          showSnackbar("Failed, Try again");
          $("#status").text("Failed, Try again");
        }
      }
    }
  });

});
$("#carrier_form").submit(function (e) {

  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = "web_api/carrer.php";

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      console.log(data); // show response from the php script.
      var json = $.parseJSON(data);
      var resp = json.response;
      if (resp[0].status == 'success') {
        showSnackbar("Request Booked");
        $("#status").text("Request Booked"); 
        // setTimeout(function () { window.location.href = 'index.php'; }, 1000);
      } else {
        if (resp[0].reason == 'account_not_found') {
          showSnackbar("Invalid Details, try again");
          $("#status").text("Invalid Details, try again");
        } else {
          showSnackbar("Failed, Try again");
          $("#status").text("Failed, Try again");
        }
      }
    }
  });

});
$("#contact-form").submit(function (e) {
  e.preventDefault(); // avoid to execute the actual submit of the form.
  var form = $(this);
  var actionUrl = "web_api/contact.php";

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      console.log(data); // show response from the php script.
      var json = $.parseJSON(data);
      var resp = json.response;
      if (resp[0].status == 'success') {
        showSnackbar("Request Sent");
        $("#status").text("Request Sent"); 
        // setTimeout(function () { window.location.href = 'index.php'; }, 1000);
      } else {
        if (resp[0].reason == 'already_exists') {
          showSnackbar("Query Already Sent, wait for Truck Quest to reply");
          $("#status").text("Query Already Sent, wait for Truck Quest to reply");
        } else {
          showSnackbar("Failed, Try again");
          $("#status").text("Failed, Try again");
        }
      }
    }
  });

});
$("#newsletter-form").submit(function () {

  $('#newsletter-form-msg').addClass('hidden');
  $('#newsletter-form-msg').removeClass('alert-success');
  $('#newsletter-form-msg').removeClass('alert-danger');

  $('#newsletter-form input[type=submit]').attr('disabled', 'disabled');

  $.ajax({
    type: "POST",
    url: "php/index.php",
    data: $("#newsletter-form").serialize(),
    dataType: "json",
    success: function (data) {

      if ('success' == data.result) {
        $('#newsletter-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
        $('#newsletter-form-msg').html(data.msg[0]);
        $('#newsletter-form input[type=submit]').removeAttr('disabled');
        $('#newsletter-form')[0].reset();
      }

      if ('error' == data.result) {
        $('#newsletter-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
        $('#newsletter-form-msg').html(data.msg[0]);
        $('#newsletter-form input[type=submit]').removeAttr('disabled');
      }

    }
  });

  return false;
});

function showSnackbar(msg) {
  var x = document.getElementById("snackbar");
  // $("#msg").txt(msg);
  document.getElementById("msg").innerHTML = (msg)
  x.className = "show";
  setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
}

// Contact Form
//-------------------------------------------------------------------------------

$("#contact-form").submit(function () {

  $('#contact-form-msg').addClass('hidden');
  $('#contact-form-msg').removeClass('alert-success');
  $('#contact-form-msg').removeClass('alert-danger');

  $('#contact-form input[type=submit]').attr('disabled', 'disabled');

  $.ajax({
    type: "POST",
    url: "php/index.php",
    data: $("#contact-form").serialize(),
    dataType: "json",
    success: function (data) {

      if ('success' == data.result) {
        $('#contact-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
        $('#contact-form-msg').html(data.msg[0]);
        $('#contact-form input[type=submit]').removeAttr('disabled');
        $('#contact-form')[0].reset();
      }

      if ('error' == data.result) {
        $('#contact-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
        $('#contact-form-msg').html(data.msg[0]);
        $('#contact-form input[type=submit]').removeAttr('disabled');
      }

    }
  });

  return false;
});



// Car Select Form
//-------------------------------------------------------------------------------

$("#car-select-form").submit(function () {

  var selectedCar = $("#car-select").find(":selected").text();
  var selectedCarVal = $("#car-select").find(":selected").val();
  var selectedCarImage = $("#car-select").val();
  var pickupLocation = $("#pick-up-location").val();
  var dropoffLocation = $("#drop-off-location").val();
  var pickUpDate = $("#pick-up-date").val();
  var pickUpTime = $("#pick-up-time").val();
  var dropOffDate = $("#drop-off-date").val();
  var dropOffTime = $("#drop-off-time").val();

  var error = 0;

  if (validateNotEmpty(selectedCarVal)) { error = 1; }
  if (validateNotEmpty(pickupLocation)) { error = 1; }
  if (validateNotEmpty(pickUpDate)) { error = 1; }
  if (validateNotEmpty(dropOffDate)) { error = 1; }

  if (0 == error) {

    $("#selected-car-ph").html(selectedCar);
    $("#selected-car").val(selectedCar);
    $("#selected-vehicle-image").attr('src', selectedCarImage);

    $("#pickup-location-ph").html(pickupLocation);
    $("#pickup-location").val(pickupLocation);

    if ("" == dropoffLocation) {
      $("#dropoff-location-ph").html(pickupLocation);
      $("#dropoff-location").val(pickupLocation);
    }
    else {
      $("#dropoff-location-ph").html(dropoffLocation);
      $("#dropoff-location").val(dropoffLocation);
    }

    $("#pick-up-date-ph").html(pickUpDate);
    $("#pick-up-time-ph").html(pickUpTime);
    $("#pick-up").val(pickUpDate + ' at ' + pickUpTime);

    $("#drop-off-date-ph").html(dropOffDate);
    $("#drop-off-time-ph").html(dropOffTime);
    $("#drop-off").val(dropOffDate + ' at ' + dropOffTime);

    $('#checkoutModal').modal();
  }
  else {
    $('#car-select-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').delay(2000).fadeOut();
  }

  return false;
});



// Check Out Form
//-------------------------------------------------------------------------------

$("#checkout-form").submit(function () {

  $('#checkout-form-msg').addClass('hidden');
  $('#checkout-form-msg').removeClass('alert-success');
  $('#checkout-form-msg').removeClass('alert-danger');

  $('#checkout-form input[type=submit]').attr('disabled', 'disabled');

  $.ajax({
    type: "POST",
    url: "php/index.php",
    data: $("#checkout-form").serialize(),
    dataType: "json",
    success: function (data) {

      if ('success' == data.result) {
        $('#checkout-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-success');
        $('#checkout-form-msg').html(data.msg[0]);
        $('#checkout-form input[type=submit]').removeAttr('disabled');

        setTimeout(function () {
          $('.modal').modal('hide');
          $('#checkout-form-msg').addClass('hidden');
          $('#checkout-form-msg').removeClass('alert-success');

          $('#checkout-form')[0].reset();
          $('#car-select-form')[0].reset();
        }, 5000);

      }

      if ('error' == data.result) {
        $('#checkout-form-msg').css('visibility', 'visible').hide().fadeIn().removeClass('hidden').addClass('alert-danger');
        $('#checkout-form-msg').html(data.msg[0]);
        $('#checkout-form input[type=submit]').removeAttr('disabled');
      }

    }
  });

  return false;
});



// Not Empty Validator Function
//-------------------------------------------------------------------------------

function validateNotEmpty(data) {
  if (data == '') {
    return true;
  } else {
    return false;
  }
}

