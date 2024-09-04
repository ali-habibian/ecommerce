<div class="row mb-3">

    <div class="form-group col-md-6">
        <label class="form-label"
               for='price'>قیمت</label>

        <div class="input-group">
            <div class="input-group-text">
                ريال
            </div>

            <input
{{--                form="storeProduct"--}}
                   type="text"
                   name="price"
                   id='price'
                   placeholder="قیمت را وارد کنید..."
                   class="form-control"
                   value="{{ old('price') }}">
            <span class="invalid-feedback" id="price-error"></span>
        </div>

    </div>

    <div class="form-group col-md-6">
        <label class="form-label"
               for='discounted_price'>تخفیف</label>

        <div class="input-group">
            <div class="input-group-text">
                ريال
            </div>

            <input form="storeProduct"
                   type="text"
                   name="discounted_price"
                   id='discounted_price'
                   placeholder="0"
                   class="form-control"
                   value="{{ old('compare_price') }}">
            <span class="invalid-feedback" id="discounted_price-error"></span>
        </div>

    </div>
</div>

<div class="form-group">
    <label class="form-label"
           for='cost'>هزینه هر مورد</label>

    <div class="input-group">
        <div class="input-group-text">
            ريال
        </div>

        <input form="storeProduct"
               type="text"
               name="cost"
               id='cost'
               placeholder="0"
               class="form-control"
               value="{{ old('cost') }}">
        <span class="invalid-feedback" id="cost-error"></span>
    </div>

    <span class="text-sm text-secondary d-block mt-2">مشتریان این را نخواهند دید</span>

</div>
