(function ($) {
  var form = $(this);
  var actionUrl = 'web_api/getLocations.php';
  window.locations = [];
  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      var json = $.parseJSON(data);
      var resp = json.response;
 
      for (var i = 0; i < resp.length; i++) {
        item = {}
        item["value"] = resp[i].title;
        item["latLng"] = [resp[i].lati, resp[i].longi];

        window.locations.push(item);
      } 
    }, error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
      alert(textStatus, errorThrown);
    }
  });

  // window.locations = [ 
  // { value: "5711 W Century Blvd", latLng: [33.946272, -118.381641]}, 
  // ];
})(jQuery)
// console.log("Wait");
// console.log(window.locations);
// console.log(window.locations);