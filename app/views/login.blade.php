<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
  {{HTML::style('css/bootstrap-theme.min.css')}}
  {{HTML::style('css/bootstrap.min.css')}}
  {{HTML::style('css/containers.css')}}
  {{HTML::style('css/components.css')}}
  {{HTML::style('css/skins.css')}}
  <title>PCSA - Login</title>
</head>
<body>
  <div class="containter login-container" id="main">
    <img src="img/logo.gif" alt="Po Co Soccer Association Logo" title="Po Co Soccer Association Logo"/> 
    <div class="row">
      <div class="col-md-12">
        @if(isset($flashError))
          <p class="bg-danger flash-msg">{{$flashError}}</p>
        @endif
        @if(isset($flashSuccess))
          <p class="bg-success flash-msg">{{$flashSuccess}}</p>
        @endif
        {{Form::open(
          array(
            'url'=>'login',
            'id'=>'login-form'
          )
        )}}

        <div class="form-group">  
        <label for="username">Username</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Enter Username">
        </div>

        <div class="form-group">  
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
  {{HTML::script('js/jquery-1.11.1.min.js')}}
  {{HTML::script('js/bootstrap.min.js')}}
  {{HTML::script('js/soccer-site.js')}}
  </body>
</html>