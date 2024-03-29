<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 pl-0 custom-grid-inventory">
                    @if (isset($inventory->paypal_inventory))
                        <div class="ml-md-2">
                            <span class="custom-title-inventory">PayPal Balance Reserve: </span> <span
                                class="site-color custom-font-size-inventory">{{ $inventory->paypal_inventory }}</span>
                        </div>
                    @endif
                    @if (isset($inventory->cash_inventory))
                        <div class="ml-md-2">
                            <span class="custom-title-inventory">Cash Balance Reserve: </span> <span
                                class="site-color custom-font-size-inventory">{{ $inventory->cash_inventory }}</span>
                        </div>
                    @endif
                    @if (isset($inventory->perfect_money_inventory))
                        <div class="ml-md-2">
                            <span class="custom-title-inventory">Perfect Money Balance Reserve: </span> <span
                                class="site-color custom-font-size-inventory">{{ $inventory->perfect_money_inventory }}</span>
                        </div>
                    @endif
                    @if (isset($inventory->web_money_inventory))
                        <div class="ml-md-2">
                            <span class="custom-title-inventory">Web Money Balance Reserve: </span> <span
                                class="site-color custom-font-size-inventory">
                                {{ $inventory->web_money_inventory }}</span>
                        </div>
                    @endif
                    @if (isset($inventory->tether_inventory))
                        <div class="ml-md-2">
                            <span class="custom-title-inventory">Tether (TRC20) Balance Reserve: </span> <span
                                class="site-color custom-font-size-inventory">{{ $inventory->tether_inventory }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <form action=" {{ route('customer.orders.send') }} " method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-sm-12 d-flex align-self-center justify-content-center mb-5">
                        {{-- <h6 class="mb-0 d-block text-come text-center site-color mr-3">
                                    {{ isset($min) ? 'MIN: ' . $min : '' }} </h6>
                                <h6 class="mb-0 text-come text-center site-color">
                                    {{ isset($max) ? 'MAX: ' . $max : '' }} </h6>
                                <br> --}}
                    </div>
                    <div class="col-lg-6 col-sm-12 px-0">
                        <h6 class="site-color">Send</h6>
                        <div class="d-flex justify-content-center">
                            <div class="form-group">
                                <select name="calculator_id"
                                    class="form-control rounded-left form-control-sm input-currency-type"
                                    wire:model.lazy="input_currency_type" required>
                                    <img src="/defaultImages/bitcoin-gold-1.png" alt="bitcoin-gold" width="30">
                                    <option selected> Select Money</option>
                                    @foreach ($inputs as $input)
                                        <option class="option-styles" value="{{ $input->id }}">
                                            {{ $input->name }}</option>
                                    @endforeach
                                    <option value="Cash" disabled>Cash</option>
                                    <option value="PayPal" disabled>PayPal</option>
                                    <option value="Web Money" disabled>Web Money</option>
                                </select>
                                <button type="button">
                                    <div class="d-flex justify-content-center">
                                        <img src="/defaultImages/bitcoin-gold-1.png" width="30" class="img-fluid"
                                            alt="">
                                        <span>تتر</span>
                                    </div>
                                </button>
                            </div>
                            <div class="form-group">
                                <input type="number" step="0.01"
                                    class="form-control form-control-sm mb-2 input-currency-number" id="input_number"
                                    min="{{ isset($input->min) ? $input->min : '' }}"
                                    max="{{ isset($input->max) ? $input->max : '' }}" placeholder="ENTER THE AMOUNT"
                                    name="input_number" wire:model.lazy="input_number" required>
                                @if ($errors->has('input_number'))
                                    <span
                                        class="d-block text-danger custom-font-size">{{ $errors->first('input_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select name="input_currency_unit"
                                    class="form-control form-control-sm input-currency-unit"
                                    wire:model.lazy="input_currency_unit" required>
                                    <option selected>Select Currency</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR" disabled>EUR</option>
                                </select>
                            </div>
                        </div>

                        {{-- {{ dd($input_country) }} --}}
                        @if ($input_country)
                            <div class="form-group">
                                <select name="calculator_id"
                                    class="form-control rounded-left form-control-sm input-currency-type"
                                    wire:model.lazy="input_currency_type" required>
                                    <option selected> Select Money</option>
                                    @foreach ($inputs as $input)
                                        <option class="option-styles" value="{{ $input->id }}">
                                            {{ $input->name }}</option>
                                    @endforeach
                                    <option value="Cash" disabled>Cash</option>
                                    <option value="PayPal" disabled>PayPal</option>
                                    <option value="Web Money" disabled>Web Money</option>
                                </select>
                            </div>
                        @endif
                        {{-- <h6 class="site-color width-margin-label-form">Receive</h6>
                        <div class="d-flex justify-content-center">
                            <div class="form-group">
                                <select name="exchange_id" class="form-control form-control-sm output-currency-type"
                                    wire:model.lazy="output_currency_type" required>
                                    <option selected>Select Money</option>
                                    @if (isset($outputs))
                                        @foreach ($outputs as $output)
                                            <option value="{{ $output->id }}">
                                                {{ $output->name }}</option>
                                        @endforeach
                                    @endif
                                    <option value="Cash" disabled>Cash</option>
                                    <option value="Tether (TRC20)" disabled>Tether (TRC20)</option>
                                    <option value="Web Money" disabled>Web Money</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="output_number"
                                    class="form-control form-control-sm mb-2 output-currency-number"
                                    value="{{ $output_number ? $output_number : 0.0 }}" disabled>
                                <input type="hidden" name="output_number"
                                    value="{{ $output_number ? $output_number : 0.0 }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="output_currency_unit"
                                    class="form-control form-control-sm mb-2 output-currency-unit"
                                    value="{{ $output_currency_unit ? $output_currency_unit : 'Still Not Chosen' }}"
                                    disabled>
                                <input type="hidden" name="output_currency_unit"
                                    value="{{ $output_currency_unit ? $output_currency_unit : 'Still Not Chosen' }}">
                            </div>
                        </div>
                        @guest
                            <h6 class="site-color mt-4 text-center custom-font-size">If you are
                                interested in an exchange, Please sign up/sign in first.</h6>
                        @else
                            <div class="d-flex justify-content-center mt-4">
                                @if ($isDisabled)
                                    <button type="submit" class="btn btn-sm rounded custom-btn-content"
                                        disabled="{{ $isDisabled }}">Confirm</button>
                                @else
                                    <button type="submit" class="btn btn-sm rounded custom-btn-content"
                                        onclick="document.getElementById('sound').play();">Confirm</button>
                                @endif
                            </div>
                        @endguest --}}
                    </div>
                    <div
                        class="col-lg-3 col-sm-12 accent-green p-0 d-flex align-items-center justify-content-sm-center mt-sm">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0 @if ($image) mt--5 @endif d-block text-come text-center site-color"
                                    style="margin-top: -3rem;"> {{ isset($cost) ? $cost . '%' : '' }}
                                </h6>
                                <img src="/defaultImages/form-image.png" class="d-block {{ $image ? 'sold' : '' }}"
                                    alt="logo" width="70">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
