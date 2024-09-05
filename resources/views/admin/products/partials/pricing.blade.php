<div class="row mb-3">

    <div class="form-group col-md-6">
        <label class="form-label"
               for='price'>قیمت</label>

        <div class="input-group">
            <div class="input-group-text">
                ريال
            </div>

            <input type="number"
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
               for='discounted_price'>قیمت با تخفیف</label>

        <div class="input-group">
            <div class="input-group-text">
                ريال
            </div>

            <input type="number"
                   name="discounted_price"
                   id='discounted_price'
                   placeholder="0"
                   class="form-control"
                   value="{{ old('compare_price') }}">
            <span class="invalid-feedback" id="discounted_price-error"></span>
        </div>

    </div>
</div>
