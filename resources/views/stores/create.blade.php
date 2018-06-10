@include('includes/header_start')
<!-- Put extra Css here -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA--PjA5omSRAmiI6rGuKAyCHezGk3F8TM&libraries=places"></script>

    <script>
        function initialize() {
          var input = document.getElementById('location');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                //document.getElementById('city2').value = place.name;
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <form class="float-right app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <h4 class="page-title"> <i class="dripicons-box"></i> Add new Store</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>


        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                               
<form class="" action="{{ route('stores.store') }}" method="post">
     {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Store Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" name="store_name" id="store_name" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Store Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="store_email" value="" id="store_email" parsley-type="email" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="store_phone" type="tel" value="" id="store_phone" required="">
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="location" type="text" value="" id="location" required="">
                                        <input type="hidden" id="latitude" name="latitude" />
                                        <input type="hidden" id="longitude" name="longitude" />
                                    </div>
                                </div>                              
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">                                
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Assign Categories to this Store</label>
                                    <div class="col-sm-10">
                                          <div class="row">
                    <div class="col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Select Categories</h4>                              

                                <div class="custom-dd dd" id="">
                                    @foreach($categories as $category)
                                    <input type="checkbox" class="" name="store_categories[]" value="{{ $category->id }}" required=""> &nbsp;{{ $category->category }}<br><br>
                                     @endforeach
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    
                </div> <!-- end row -->
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-pink waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

@include('includes/footer_start')
<!-- Put Extra Js here -->
<script type="text/javascript" src="{{ URL::asset('/') }}assets/plugins/parsleyjs/parsley.min.js"></script>
  

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>
@include('includes/footer_end')