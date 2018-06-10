@include('includes/header_start')
<!-- Put extra Css here -->
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="panel-heading float-right m-t-10">                                    
                                        <a class="btn btn-success w-md" href="{{ route('categories.index') }}">Category Listing</a>
                                    
                                </div> 
                            <h4 class="page-title"> <i class="dripicons-box"></i> Add new Category</h4>

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
                                
                               
<form class="" action="{{ route('categories.store') }}" method="post">
     {{ csrf_field() }}
                                

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Parent Category</label>
                                    <div class="col-sm-10">
                                       <select class="form-control" name="parent" id="parent">
                                           <option value="">--No Paret Category--</option>
                                           @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category}}</option>
                                                @foreach($category->subcategories as $subcat)
                                                <option value="{{ $subcat->id }}">&nbsp;&nbsp;⁞..{{ $subcat->category}}</option>
                                                @endforeach
                                           @endforeach
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" name="category" id="category" required>
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