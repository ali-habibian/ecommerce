<div
    {{ stimulus_controller('flash', [
        'success' => session()->get('success') ?? '',
        'error' => session()->get('error') ?? $errors->any() ? 'مشکلی به وجود آمده است' : '',
    ]) }}>

</div>
