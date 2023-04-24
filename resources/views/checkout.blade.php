@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Complete payment - Card</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="container">
        <div class="row px-auto mt-5">
            <div class="col-md-8 offset-md-2">

                <div class="row g-5">
                    <form class="needs-validation" novalidate method="POST" action="{{ ('book') }}">
                        @csrf

                        <hr class="my-4">

                        <h4 class="mb-3">Payment
                            <i class="fa fa-cc-mastercard text-dark fs-4 me-2"></i>
                            <i class="fa fa-cc-visa text-dark fs-4 me-2"></i>
                            <i class="fa fa-cc-amex text-dark fs-4 me-2"></i>
                            <i class="fa fa-cc-paypal text-dark fs-4"></i>
                        </h4>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" value="{{ old('ccname') }}" name="ccname"
                                    id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cstCCNumber" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" value="{{ old('cstCCNumber') }}"
                                    name="cstCCNumber" id="cstCCNumber"
                                    value=""onkeyup="cc_format('cstCCNumber','cstCCardType');" placeholder=""
                                    required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" name="ccexp" id="cc-expiration" maxlength='5'
                                    onkeyup="formatString(event);" value="{{ old('ccexp') }}" placeholder="mm/yy" required>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="tel" class="form-control" id="cc-cvv" name="cccvv" maxlength="3"
                                    minlength="3" placeholder="123" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary bg-theme border-0 btn-lg" type="submit">Continue to
                            checkout</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('js')
        <script>
            
        function cc_format(ccid, ctid) {
            // supports Amex, Master Card, Visa, and Discover
            // parameter 1 ccid= id of credit card number field
            // parameter 2 ctid= id of credit card type field

            var ccNumString = document.getElementById(ccid).value;
            ccNumString = ccNumString.replace(/[^0-9]/g, '');
            // mc, starts with - 51 to 55
            // v, starts with - 4
            // dsc, starts with 6011, 622126-622925, 644-649, 65
            // amex, starts with 34 or 37
            var typeCheck = ccNumString.substring(0, 2);
            var cType = '';
            var block1 = '';
            var block2 = '';
            var block3 = '';
            var block4 = '';
            var formatted = '';

            if (typeCheck.length == 2) {
                typeCheck = parseInt(typeCheck);
                if (typeCheck >= 40 && typeCheck <= 49) {
                    cType = 'Visa';
                } else if (typeCheck >= 51 && typeCheck <= 55) {
                    cType = 'Master Card';
                } else if ((typeCheck >= 60 && typeCheck <= 62) || (typeCheck == 64) || (typeCheck == 65)) {
                    cType = 'Discover';
                } else if (typeCheck == 34 || typeCheck == 37) {
                    cType = 'American Express';
                } else {
                    cType = 'Invalid';
                }
            }

            // all support card types have a 4 digit firt block
            block1 = ccNumString.substring(0, 4);
            if (block1.length == 4) {
                block1 = block1 + ' ';
            }

            if (cType == 'Visa' || cType == 'Master Card' || cType == 'Discover') {
                // for 4X4 cards
                block2 = ccNumString.substring(4, 8);
                if (block2.length == 4) {
                    block2 = block2 + ' ';
                }
                block3 = ccNumString.substring(8, 12);
                if (block3.length == 4) {
                    block3 = block3 + ' ';
                }
                block4 = ccNumString.substring(12, 16);
            } else if (cType == 'American Express') {
                // for Amex cards
                block2 = ccNumString.substring(4, 10);
                if (block2.length == 6) {
                    block2 = block2 + ' ';
                }
                block3 = ccNumString.substring(10, 15);
                block4 = '';
            } else if (cType == 'Invalid') {
                // for Amex cards
                block1 = typeCheck;
                block2 = '';
                block3 = '';
                block4 = '';
                alert('Invalid Card Number');
            }

            formatted = block1 + block2 + block3 + block4;
            document.getElementById(ccid).value = formatted;
            document.getElementById(ctid).value = cType;
        }

        function formatString(e) {
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8];
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }

            event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
            ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
            ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
            ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
            ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
            ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
            ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
            );
        }
        </script>
    @endsection
