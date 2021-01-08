<!DOCTYPE html>
<html>
    <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <div class ="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class ="panel-heading">Login</div>
                <div class="panel-body">
                    <form action="{{route('myCaptchaPost')}}" method="post" role="form" class="form-horizontal">
                        {{csfr_field()}}
                    </form>
                </div>
            </div>
        </div>
            <div class="form-grop{{$errors->has('email')?'has-error':''}}">
              <label for="email" class="col-md-4 control-label">E-mail Address</label>                  <div class="col-md-6">
              <input id= "email" type="text" class="form-control" name="email" value ="{{old ('emai')}}">
                    @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                    @endif
                     </div>
                    <div>

              <div class="form-grop{{$errors->has('password')?'has-error':''}}">
              <label for="password" class="col-md-4 control-label">Password</label>                  <div class="col-md-6">
              <input id= "password" type="password" class="form-control" name="password">
                    @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                    @endif
                     </div>
                    <div>

             <div class="form-grop{{$errors->has('captcha')?'has-error':''}}">
              <label for="password" class="col-md-4 control-label">captcha</label>                  <div class="col-md-6">
                <div class="captcha">
                    <span>{{!! captcha_img() !!</span>
              <button type="button" class="btn btn-succes btn-refresh" ><i class= "fa fa-refresh"></i></button>
          </div>
          <input id ="captcha" type="text"  class="form-control" placeholder="Enter Captcha" name="captcha">

                    @if($errors->has('captcha'))
                    <span class="help-block">
                        <strong>{{$errors->first('captcha')}}</strong>
                    </span>
                    @endif
                     </div>
                    <div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
        $(".btn-refresh").click(function(){
            $.ajax({
                type:'GET',
                url:'/refresh_captcha',
                success:function(data){
                    $(".caption span").html(data.captcha);
                }
            });

        });
    </script>
</html>
