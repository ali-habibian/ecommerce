<div class="form-group">
    <label class="form-label"
           for='sku'>بارکد</label>

    <input id='sku'
           type="text"
           name="sku"
           class="form-control"
           value="{{ old('sku') }}">
    <span class="invalid-feedback" id="sku-error"></span>
</div>

<div class="form-group mb-3">
    <label class="custom-switch pl-0">
        <input
            {{--            form="storeProduct"--}}
            checked
            type="checkbox"
            name="track_quantity"
            data-action="input->inventory#toggle"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description p-2"> ردیابی تعداد باقیمانده </span>
    </label>
    <span class="invalid-feedback" id="track_quantity-error"></span>
</div>

<div class="form-group"
     data-inventory-target="checkbox">
    <label class="custom-switch pl-0">
        <input
            {{--            form="storeProduct"--}}
            type="checkbox"
            name="sell_out_of_stock"
            class="custom-switch-input">
        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description p-2"> امکان فروش پس از اتمام موجودی </span>
    </label>
    <span class="invalid-feedback" id="sell_out_of_stock-error"></span>
</div>

<div class="form-group"
     data-inventory-target="quantity">
    <label class="form-label"
           for='quantity'>تعداد</label>

    <input type="text"
        name="quantity"
        id='quantity'
        class="form-control"
        value="{{ old('quantity') }}">
    <span class="invalid-feedback" id="quantity-error"></span>
</div>
