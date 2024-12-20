<x-front-layout>




    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" method="post" action="{{route('two-factor.login.store')}}">
                        @csrf
                        <div class="card-body">
                            @if($errors->has('code')))
                                <div class="alert alert-danger">
                                    {{$errors->first('code')}}
                                </div>
                            @endif
                            <div class="title">
                                <h3>verify code </h3>
                                <p>enter your code .</p>
                            </div>

                            <div class="form-group input-group">
                                <label for="reg-fn">Code</label>
                                <input class="form-control" name="code" type="text" id="reg-email">
                            </div>


                            <div class="button">
                                <button class="btn" type="submit">Verify</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->

</x-front-layout>
