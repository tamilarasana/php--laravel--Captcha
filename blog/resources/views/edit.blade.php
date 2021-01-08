<!DOCTYPE html>
<html>
    <head>
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
        <body>
        <h2 style="text-align:center;">Register </h2>
         @if(session('success'))
         <div class ="alert alert-success">
         {{session::get('success')}}

          @php
               Session::forget('success')
          @endphp
          </div>
       @endif
          {{-- @if(count($errors-> all()))
            <div class="alert alert-danger">
               <ul>
                  @foreach($errors->all() as $error)
                   <li>Oops! {{$error}}</li>
                  @endforeach
                </ul>
            </div>
            @endif--}}

        <div class="container">
          <div class="row">
            <div class="col-md-3">
                <form  action="/detail_update"  method="post" autocomplete="off">
                 {{ csrf_field() }}
                  
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <input type="text" name="fname"  placeholder="Firstname" class="form-control" value ="{{ $data ['fname'] }}">
                          @if($errors->has('fname'))
                            <span class="text-danger">
                                {{$errors->first('fname')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" name="lname" placeholder="Lastname" class="form-control" value ="{{ $data ['lname'] }}">
                          @if($errors->has('lname'))
                            <span class="text-danger">
                                {{$errors->first('lname')}}
                            </span>
                            @endif
                    </div>



                   <div class="form-group">
                                <div class="row">
                                  <label>Gender</label>
                                  <div class="col-sm-10">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="gender"value ="{{ $data ['gender'] }}">
                                      <label>
                                        Male
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="gender" value ="{{ $data ['gender'] }}">
                                      <label>
                                        Female 
                                      </label>
                                    </div>
                                </div>
                          </div>
                            @if($errors->has('gender'))
                                  <span class="text-danger">
                                 {{$errors->first('gender')}}
                               </span>
                             @endif
                        </div>

                     
                    <div class="form-group">
                            <label>Status</label>
                            <select type="text" name="status" class="form-control" value ="{{ $data ['status'] }}">

                               <option>--Select--</option>
                                <option value="single">Single</option>
                                <option value="Married">Married</option> 
                               
                            </select>
                             @if($errors->has('account'))
                                  <span class="text-danger">
                                 {{$errors->first('account')}}
                               </span>
                             @endif
                        </div>



                    <div class="form-group">
                        <label>Email Id</label>
                        <input type="text" name="email" placeholder="Email" class="form-control" value ="{{ $data ['email']}}">
                          @if($errors->has('email'))
                            <span class="text-danger">
                                {{$errors->first('email')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Phone" class="form-control" value ="{{ $data ['phone'] }}">
                          @if($errors->has('phone'))
                            <span class="text-danger">
                                {{$errors->first('phone')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" value ="{{ $data ['password'] }}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                          @if($errors->has('password'))
                            <span class="text-danger">
                                {{$errors->first('password')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <tr><input type="submit" name="button" class="btn btn-success" value="Update" />
                        </tr>
                    </div>
                </form>
                    </div>
                    </div>
            </body>
        </html>
 