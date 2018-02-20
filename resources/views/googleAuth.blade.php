@section('content')

<style type="text/css">

.account-box

{

    border: 2px solid rgba(153, 153, 153, 0.75);

    border-radius: 2px;

    -moz-border-radius: 2px;

    -webkit-border-radius: 2px;

    -khtml-border-radius: 2px;

    -o-border-radius: 2px;

    z-index: 3;

    font-size: 13px !important;

    font-family: "Helvetica Neue" ,Helvetica,Arial,sans-serif;

    background-color: #ffffff;

    padding: 20px;

}

.logo

{

    background-position: 0 -4px;

    margin: -5px 0 17px 80px;

    position: relative;

    text-align: center;

    width: 138px;

}

.forgotLnk

{

    margin-top: 10px;

    display: block;

}

.or-box

{

    position: relative;

    border-top: 1px solid #dfdfdf;

    padding-top: 20px;

    margin-top:20px;

}

</style>

<div class="container">

    <div class="row">

        <div class="col-md-4 col-md-offset-4">

            <div class="account-box">

                <div class="logo ">

                    <img src="http://design.ubuntu.com/wp-content/uploads/ubuntu-logo32.png" width="80px" alt=""/>

                </div>

                <form class="form-signin" action="#">

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Email" required autofocus />

                </div>

                <div class="form-group">

                    <input type="password" class="form-control" placeholder="Password" required />

                </div>

                <button class="btn btn-lg btn-block btn-primary" type="submit">

                    Sign in</button>

                </form>

                <a class="forgotLnk" href="http://www.jquery2dotnet.com">I can't access my account</a>

                <div class="or-box">

                    <div class="row">

                        <div class="col-md-12 row-block">

                            <a href="{{ url('auth/google') }}" class="btn btn-lg btn-danger btn-block">

                                <strong>Login With Google</strong>

                            </a>

                        </div>

                    </div>

                </div>

                <div class="or-box row-block">

                    <div class="row">

                        <div class="col-md-12 row-block">

                            <a href="http://www.jquery2dotnet.com" class="btn btn-primary btn-block">Create New Account</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection