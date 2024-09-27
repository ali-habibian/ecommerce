@extends('layouts.customer.home')

@section('title', 'سبد خرید')

@section('content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">
                                <h5 class="mb-3"><a href="#" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left ms-2"></i>ادامه خرید</a></h5>
                                <hr>

                                <table class="table-responsive table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">تصویر</th>
                                        <th class="text-center">عنوان</th>
                                        <th class="text-center">قیمت</th>
                                        <th class="text-center">تعداد</th>
                                        <th class="text-center">قیمت کل</th>
                                        <th class="text-center">حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartItems as $cartItem)
                                        <tr>
                                            <td class="text-center">
                                                <img
                                                    src="{{ asset('storage/' . $cartItem->product->image) }}"
                                                    class="img-fluid rounded-3"
                                                    alt="{{ $cartItem->product->name }}"
                                                    style="width: 65px;">
                                            </td>
                                            <td class="text-center">
                                                {{ $cartItem->product->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ format_persian_price($cartItem->product->price) }}
                                            </td>
                                            <td style="max-width: 100px" class="text-center">
                                                <div class="d-flex">
                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-link px-2"
                                                            onclick="decreaseQuantity(this)">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" min="1" name="quantity" value="{{ $cartItem->quantity }}"
                                                           type="number"
                                                           class="form-control form-control-sm"
                                                           onchange="validateQuantity(this); updateCart(this);"/>

                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-link px-2"
                                                            onclick="increaseQuantity(this)">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ format_persian_price($cartItem->total_price) }}
                                            </td>
                                            <td class="text-center"><a href="#" style="color: #ec5454;"><i
                                                        class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<@push('scripts')
    <script>
        function decreaseQuantity(button) {
            const input = button.parentNode.querySelector('input[type=number]');
            let value = parseInt(input.value, 10);
            if (value > 1) {
                value--;
                input.value = value;
            }
            validateQuantity(input);
            updateCart(input);
        }

        function increaseQuantity(button) {
            const input = button.parentNode.querySelector('input[type=number]');
            let value = parseInt(input.value, 10);
            value++;
            input.value = value;
            validateQuantity(input);
            updateCart(input);
        }

        function validateQuantity(input) {
            let value = parseInt(input.value, 10);
            if (isNaN(value) || value < 1) {
                input.value = 1;
            } else {
                input.value = value;
            }
        }

        function updateCart(input) {
            // This function should be implemented to update the cart
            // For example, you might want to make an AJAX call to update the server
            console.log('Updating cart with new quantity:', input.value);
            // Add your cart update logic here
        }
    </script>
@endpush
