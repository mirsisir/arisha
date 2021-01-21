{{--<html>--}}
{{--<head>--}}
{{--    <title></title>--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyCowuK3zARp1OK9St6K6530nVkAsEBJM20"  type="text/javascript"></script>--}}
{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" id="bootstrap-css" rel="stylesheet" />--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="jumbotron">--}}
{{--            <h1>Calculate the Distance Between two Addresses demo</h1>--}}
{{--        </div>--}}

{{--        <div class="col-md-6">--}}
{{--            <form id="distance_form">--}}
{{--                <div class="form-group"><label>Origin: </label> <input class="form-control" id="from_places" placeholder="Enter a location" /> <input id="origin" name="origin" required="" type="hidden" /></div>--}}

{{--                <div class="form-group"><label>Destination: </label> <input class="form-control" id="to_places" placeholder="Enter a location" /> <input id="destination" name="destination" required="" type="hidden" /></div>--}}
{{--                <input class="btn btn-primary" type="submit" value="Calculate" /></form>--}}

{{--            <div id="result">--}}
{{--                <ul class="list-group">--}}
{{--                    <li class="list-group-item d-flex justify-content-between align-items-center">Distance In Mile :</li>--}}
{{--                    <li class="list-group-item d-flex justify-content-between align-items-center">Distance is Kilo:</li>--}}
{{--                    <li class="list-group-item d-flex justify-content-between align-items-center">IN TEXT:</li>--}}
{{--                    <li class="list-group-item d-flex justify-content-between align-items-center">IN MINUTES:</li>--}}
{{--                    <li class="list-group-item d-flex justify-content-between align-items-center">FROM:</li>--}}
{{--                    <li class="list-group-item d-flex justify-content-between align-items-center">TO:</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $(function() {--}}
{{--        // add input listeners--}}
{{--        google.maps.event.addDomListener(window, 'load', function () {--}}
{{--            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));--}}
{{--            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));--}}

{{--            google.maps.event.addListener(from_places, 'place_changed', function () {--}}
{{--                var from_place = from_places.getPlace();--}}
{{--                var from_address = from_place.formatted_address;--}}
{{--                $('#origin').val(from_address);--}}
{{--            });--}}

{{--            google.maps.event.addListener(to_places, 'place_changed', function () {--}}
{{--                var to_place = to_places.getPlace();--}}
{{--                var to_address = to_place.formatted_address;--}}
{{--                $('#destination').val(to_address);--}}
{{--            });--}}

{{--        });--}}
{{--        // calculate distance--}}
{{--        function calculateDistance() {--}}
{{--            var origin = $('#origin').val();--}}
{{--            var destination = $('#destination').val();--}}
{{--            var service = new google.maps.DistanceMatrixService();--}}
{{--            service.getDistanceMatrix(--}}
{{--                {--}}
{{--                    origins: [origin],--}}
{{--                    destinations: [destination],--}}
{{--                    travelMode: google.maps.TravelMode.DRIVING,--}}
{{--                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.--}}
{{--                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.--}}
{{--                    avoidHighways: false,--}}
{{--                    avoidTolls: false--}}
{{--                }, callback);--}}
{{--        }--}}
{{--        // get distance results--}}
{{--        function callback(response, status) {--}}
{{--            if (status != google.maps.DistanceMatrixStatus.OK) {--}}
{{--                $('#result').html(err);--}}
{{--            } else {--}}
{{--                var origin = response.originAddresses[0];--}}
{{--                var destination = response.destinationAddresses[0];--}}
{{--                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {--}}
{{--                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);--}}
{{--                } else {--}}
{{--                    var distance = response.rows[0].elements[0].distance;--}}
{{--                    var duration = response.rows[0].elements[0].duration;--}}
{{--                    console.log(response.rows[0].elements[0].distance);--}}
{{--                    var distance_in_kilo = distance.value / 1000; // the kilom--}}
{{--                    var distance_in_mile = distance.value / 1609.34; // the mile--}}
{{--                    var duration_text = duration.text;--}}
{{--                    var duration_value = duration.value;--}}
{{--                    $('#in_mile').text(distance_in_mile.toFixed(2));--}}
{{--                    $('#in_kilo').text(distance_in_kilo.toFixed(2));--}}
{{--                    $('#duration_text').text(duration_text);--}}
{{--                    $('#duration_value').text(duration_value);--}}
{{--                    $('#from').text(origin);--}}
{{--                    $('#to').text(destination);--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--        // print results on submit the form--}}
{{--        $('#distance_form').submit(function(e){--}}
{{--            e.preventDefault();--}}
{{--            calculateDistance();--}}
{{--        });--}}

{{--    });--}}

{{--</script></body>--}}
{{--</html>--}}
<!-- [START maps_places_autocomplete_addressform] -->
<!DOCTYPE html>
<html>
<head>
    <title>Place Autocomplete Address Form</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCowuK3zARp1OK9St6K6530nVkAsEBJM20&callback=initAutocomplete&libraries=places&v=weekly"
        defer
    ></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>
</head>
<body>
<div id="locationField">
    <input
        id="autocomplete"
        placeholder="Enter your address"
        onFocus="geolocate()"
        type="text"
    />
</div>

<!-- Note: The address components in this sample are typical. You might need to adjust them for
           the locations relevant to your app. For more information, see
     https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
-->

<table id="address">
    <tr>
        <td class="label">Street address</td>
        <td class="slimField">
            <input class="field" id="street_number" disabled="true" />
        </td>
        <td class="wideField" colspan="2">
            <input class="field" id="route" disabled="true" />
        </td>
    </tr>
    <tr>
        <td class="label">City</td>
        <td class="wideField" colspan="3">
            <input class="field" id="locality" disabled="true" />
        </td>
    </tr>
    <tr>
        <td class="label">State</td>
        <td class="slimField">
            <input
                class="field"
                id="administrative_area_level_1"
                disabled="true"
            />
        </td>
        <td class="label">Zip code</td>
        <td class="wideField">
            <input class="field" id="postal_code" disabled="true" />
        </td>
    </tr>
    <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3">
            <input class="field" id="country" disabled="true" />
        </td>
    </tr>
</table>

<script>
    // [START maps_places_autocomplete_addressform]
    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    let placeSearch;
    let autocomplete;
    const componentForm = {
        street_number: "short_name",
        route: "long_name",
        locality: "long_name",
        administrative_area_level_1: "short_name",
        country: "long_name",
        postal_code: "short_name",
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("autocomplete"),
            { types: ["geocode"] }
        );
        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(["address_component"]);
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
    }

    // [START maps_places_autocomplete_addressform_fillform]
    function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();

        for (const component in componentForm) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (const component of place.address_components) {
            const addressType = component.types[0];

            if (componentForm[addressType]) {
                const val = component[componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // [END maps_places_autocomplete_addressform_fillform]
    // [START maps_places_autocomplete_addressform_geolocation]
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                const circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy,
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
    // [END maps_places_autocomplete_addressform_geolocation]
    // [END maps_places_autocomplete_addressform]
</script>
</body>
</html>
<!-- [END maps_places_autocomplete_addressform] -->
