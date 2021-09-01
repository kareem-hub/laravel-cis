<link rel="stylesheet" href="css/homestyle.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div class="container">
	    <div class="text-center">
            <h1 class="text-center col-12">
	            Users Managment
                <br>
	            <small class="by">by
                @if(isset($name))
                {{$name}}
                @else
                Kareem
                @endif
                </small>
		    </h1>
            <a href="/show" class="btn btn-dark mt-5 m-3">See All Users</a>
            <a href="/create" class="btn btn-primary mt-5 m-3">Add New User</a>
	    </div>
    </div>
</body>
