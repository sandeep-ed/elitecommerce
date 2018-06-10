@include('includes/header_start')
<!-- Put extra Css here -->
    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@include('includes/header_end')

<div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="panel-heading float-right m-t-10">
                                
                                    <a class="btn btn-success w-md" href="{{ route('categories.create') }}">Add New</a>
                                
                            </div> 
                            <h4 class="page-title"> <i class="dripicons-blog"></i> Category List</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div>
        </div>
     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        <div class="wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">                               
                                

                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th width="280px">Action</th>                               
                                    </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($categories as $category)
                                          <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $category->category}}</td>
                                                <td>{{ $category->slug}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>        
                                                     <form action="{{ route('categories.destroy',$category->id) }}" method="POST" style='display:inline'>
                                                        
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                                 @foreach($category->subcategories as $subcat)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>&nbsp;&nbsp;⁞....{{ $subcat->category}}</td>
                                                <td>{{ $subcat->slug}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('categories.edit',$subcat->id) }}">Edit</a>        
                                                     <form action="{{ route('categories.destroy',$subcat->id) }}" method="POST" style='display:inline'>
                                                        
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                                      @foreach($subcat->subsubcategories as $subsubcategories)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⁞....{{ $subsubcategories->category}}</td>
                                                <td>{{ $subsubcategories->slug}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('categories.edit',$subsubcategories->id) }}">Edit</a>        
                                                     <form action="{{ route('categories.destroy',$subsubcategories->id) }}" method="POST" style='display:inline'>
                                                        
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                                   @endforeach
                                                 @endforeach
                                            @endforeach                              
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

               

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

@include('includes/footer_start')
<!-- Put Extra Js here -->
    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js"></script>
@include('includes/footer_end')