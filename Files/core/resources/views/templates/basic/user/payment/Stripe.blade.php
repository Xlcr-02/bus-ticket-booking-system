@extends($activeTemplate.'layouts.master')
@section('content')
<div class="container padding-top padding-bottom">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card cmn--card card-deposit">
                <div class="card-header">
                    <h5 class="title text-center">@lang('Stripe Payment')</h5>
                </div>
                <div class="card-body card-body-deposit">


                    <div class="card-wrapper"></div>
                    <br><br>

                    <form role="form" id="payment-form" method="{{$data->method}}" action="{{$data->url}}">
                        @csrf
                        <input type="hidden" value="{{$data->track}}" name="track">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label text-left" for="name">@lang('Name on Card')</label>
                                <div class="input-group">
                                    <input type="text" class="form--control custom-input w-auto" name="name" placeholder="@lang('Name on Card')" autocomplete="off" autofocus />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-font"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-left" for="cardNumber">@lang('Card Number')</label>
                                <div class="input-group">
                                    <input type="tel" class="form--control custom-input w-auto" name="cardNumber" placeholder="@lang('Valid Card Number')" autocomplete="off" required autofocus />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label class="form-label text-left" for="cardExpiry">@lang('Expiration Date')</label>
                                <input type="tel" class="form--control input-sz custom-input" name="cardExpiry" placeholder="@lang('MM / YYYY')" autocomplete="off" required />
                            </div>
                            <div class="col-md-6 ">
                                <label class="form-label text-left" for="cardCVC">@lang('CVC Code')</label>
                                <input type="tel" class="form--control input-sz custom-input" name="cardCVC" placeholder="@lang('CVC')" autocomplete="off" required />
                            </div>
                        </div>
                        <br>
                        <button class="btn btn--base h-40" type="submit"> @lang('PAY NOW')
                        </button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('script')
<script src="{{ asset('assets/global/js/card.js') }}"></script>

<script>
    (function($) {
        "use strict";
        var card = new Card({
            form: '#payment-form',
            container: '.card-wrapper',
            formSelectors: {
                numberInput: 'input[name="cardNumber"]',
                expiryInput: 'input[name="cardExpiry"]',
                cvcInput: 'input[name="cardCVC"]',
                nameInput: 'input[name="name"]'
            }
        });
    })(jQuery);
</script>
@endpush