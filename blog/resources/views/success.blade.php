<!DOCTYPE html>
<html>
    <head>
        <title>details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
        <body>
           
            <h2 style="text-align:center;">Details </h2>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right">
                <li> <a class="btn btn-danger" href="{{ url('/') }}">Logout</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                <li> <a class="btn btn-danger" href="{{ url('/login') }}">Back</a></li>
                </ul>
                </div>
            </nav>
             <form class="" action="/success" method="post" autocomplete="off">
                    {{ csrf_field() }}
        
               </form>
                        <div class="container">
                        <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Action</th>
                     </tr>
                        </thead>
                        <tbody>

                        @foreach ($datas  as $data)
                        <tr>
                            <td>{{ $data  -> lname }}</td>
                            <td>{{ $data  ->fname }}</td>
                            <td>{{ $data  ->gender }}</td>
                            <td>{{ $data  ->status }}</td>
                            <td>{{ $data  ->email }}</td>
                            <td>{{ $data  ->phone }}</td>
                            <td>{{ $data  ->password }}</td>

                            <div class="form-group">
                            <td>
                                 <a href="{{action('UserController@edit',$data ?? ''['id'])}}"><button class="btn btn-success">Edit</button></a>
                                <a href="{{action('UserController@destroy', $data ?? ''['id'])}}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                            </td>

                           
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </body>
</html>
