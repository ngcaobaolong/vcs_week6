@include('layouts.head')

<body class="login">
    <div id="wrapper">
        <div class="container">
            <div class="row login-wrapper">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6" style= "width: 100%" >
                                    <a class="active" id="register-form-link">Add user</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php echo $code ?? '' ;if (isset($code)) header("refresh:3;url=/users");?>
                                <div class="col-lg-12">
                                    <form id="register-form" action="#" method="post" role="form">
                                        <input type="hidden" name="action" value="add" />
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="fullname" id="fullname" tabindex="1" class="form-control" placeholder="Full name" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" tabindex="2" class="form-control" placeholder="Phone number">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="form-control btn btn-default btn-block">Add an Account</button>
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
        </div>
    </div>
</body>

</body>
