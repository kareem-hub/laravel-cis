
<!-- layout -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="/css/liststyle.css">

<!------ Include the above in your HEAD tag ---------->

<div class="container text-center">
    <h1 class="text-center mt-5 md-5">Users List</h1>
    <div class="row col-md-12 col-md-offset-2 custyle mt-5">
    <table class="table table-striped custab ">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>post title</th>
        </tr>
    </thead>
            @yield('content')
    </table>
    <br>
    <a href="/" class="btn btn-primary mt-5 m-3">Back Home</a>
    </div>
</div>
