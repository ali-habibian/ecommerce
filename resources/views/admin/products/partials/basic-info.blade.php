<div class="form-group mb-3">
    <label class="col-form-label" for='name'>عنوان</label>
    <input type="text"
           name="name"
           id='name'
           class="form-control"
           value="{{ old('name') }}">
    <span class="invalid-feedback" id="name-error"></span>
</div>

<div class="form-group mb-3">
    <label for='description' class="col-form-label">
        توضیحات
    </label>

    <textarea name="description"
              id='description'
              rows="8"
              cols="80"
              class="form-control">{{ old('description') }}</textarea>
    <span class="invalid-feedback" id="description-error"></span>
</div>

