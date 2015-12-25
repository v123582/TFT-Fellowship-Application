<!DOCTYPE html>
<!-- saved from url=(0044)http://apply.teachforindia.org/user/register -->
<html lang="en" ng-app="FormApp" id="ng-app" class="ng-scope">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Teach For Taiwan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Teach For Taiwan</title>

    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css"> 
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap-social.css')?>" type="text/css"> 
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 

</head>

<body>

    <div id="container">
        <div id="navbar">
            <nav role="navigation" class="navbar navbar-fixed-top navbar-default background_white">
                <div class="container-fluid">
                    <ul id="navmain" class="nav navbar-nav navbar-left">
                        <li><a href=
                        <?php
                         echo '' . URL::to('login') . '';
                        ?>
                        class="navbar-brand">TEACH<span class="tfiBlue">FOR</span><span>TAIWAN</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
                <div id="page">
            <div class="row">
                <div class="div col-md-4"></div>
                <div class="div col-md-4">
                    <div class="panel panel-default panel-forgot">
                        <div class="panel-body">
                            <form method="POST" action="/password/reset" class="ng-pristine ng-valid">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="token" value="{{ $token }}">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                            @endif
                                <div class="row-fluid form-group">
                                    <div align="center">
                                        <label class="thick0 tfiBlue">重置密碼</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                     <input type="email" placeholder="Email id"  name="email" value="{{ old('email') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                      <input type="password" placeholder="New Password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                      <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="submit" name="Reset Password" class="btn btn-primary btn-block"><b>重置密碼</b></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</body>

</html>
