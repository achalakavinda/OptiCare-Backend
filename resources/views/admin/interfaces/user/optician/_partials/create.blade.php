<div class="box-body">

    <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text ('name',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('email','Email:') !!}
                    {!! Form::email ('email',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('type','*User Type',['class' => 'control-label']) !!}
                {!! Form::select('type',array('optician'=>'Optician'),null,['class'=>'form-control','id'=>'role']) !!}
            </div>

            <div class="form-group">
                    {!! Form::label('is_active','Status:') !!}
                    {!! Form::select ('is_active',array(1 =>'Active', 0 =>'Not Active'),0 ,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('shop_name','Name of the Office:') !!}
                    {!! Form::text ('shop_name',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('br_number','Business Registration No:') !!}
                    {!! Form::text ('br_number',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('address','Address:') !!}
                    {!! Form::text ('address',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('contact_number','Contact Number:') !!}
                    {!! Form::text ('contact_number',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('contact_number_alternative','Other Contact Number:') !!}
                    {!! Form::text ('contact_number_alternative',null,['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password ('password',['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('avatar_id','Avatar:') !!}
                    {!! Form::file ('avatar_id',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('Latitude') !!}
                    {!! Form::number('latitude',null,['class'=>'form-control','id'=>'latField','readonly']) !!}
            </div>

            <div class="form-group">
                    {!! Form::label('Longitude') !!}
                    {!! Form::number('longitude',null,['class'=>'form-control','id'=>'lngField','readonly']) !!}
            </div>

            <div class="form-group">
                    {!! Form::label('Map Locations') !!}
                    <div style="width:100%; height:350px; " id="map"></div>
            </div>
    </div>




</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
</div>

<input id="pac-input" class="controls" type="text" placeholder="Search Box">


@section('js')
        <script>
            var map;

            function initAutocomplete() {
                var myLatLng = {lat: -25.363, lng: 131.044};

                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 4,
                    mapTypeId: 'roadmap',
                    draggable:true,
                });

                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });

                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();

                    places.forEach(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }

                        var marker = new google.maps.Marker({
                            map: map,
                            icon: '',
                            title: place.name,
                            position: place.geometry.location,
                            draggable:true,
                        });

                        google.maps.event.addListener(marker, 'dragend', function() {
                            // document.getElementsByName('latitude')[0].value = marker.getPosition().lat();
                            // document.getElementsByName('longitude')[0].value = marker.getPosition().lng();

                            $('#latField').val(parseFloat(marker.getPosition().lat()));
                            $('#lngField').val(parseFloat(marker.getPosition().lng()));

                        });
                        // Create a marker for each place.
                        markers.push(marker);

                        $('#latField').val(parseFloat(marker.getPosition().lat()));
                        $('#lngField').val(parseFloat(marker.getPosition().lng()));

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });

                    map.fitBounds(bounds);
                });

            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA88TfjA6tPEc93sF-GqJcLHLKfCdA_QR8&libraries=places&callback=initAutocomplete"
                async defer></script>
@endsection