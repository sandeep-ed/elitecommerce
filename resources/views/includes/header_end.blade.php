<!-- App css -->
        <link href="{{ URL::asset('/') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/') }}assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/') }}assets/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    </head>

    <body>
     @include('sweet::alert')
    @include('includes/topbar')