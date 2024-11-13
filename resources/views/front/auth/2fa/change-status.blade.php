<x-front-layout>
    <!-- Start Account Login Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <form class="card login-form" method="post"
                          @if(auth()->user()->two_factor_secret) action="{{route('two-factor.enable')}}"
                          @else action="{{route('two-factor.disable')}}" @endif >
                        @csrf
                        <div class="card-body">

                            <div class="title">
                                <h3>2fa status </h3>
                            </div>
                            @if (session('status') == 'two-factor-authentication-enabled')
                                <div class="mb-4 font-medium text-sm">
                                    Please finish configuring two factor authentication below.
                                </div>
                            @endif
                            <div class="button">

                                @if(!auth()->user()->two_factor_secret)


                                    <button class="btn" type="submit">
                                        Enable 2fa
                                    </button>
                                @else
                                    {!! auth()->user()->twoFactorQrCodeSvg(); !!}
                                    <p>scan this qr code in your authenticator app</p>
                                    <a href="{{route('two-factor.challenge')}}" class="btn">
                                        go to this page to enter your code
                                    </a>
                                <hr>
                                    @method('DELETE')
                                    <button class="btn" type="submit">
                                        Disable 2fa
                                    </button>

                                @endif

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->

</x-front-layout>
