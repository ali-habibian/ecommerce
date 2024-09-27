@extends('layouts.customer.home')

@section('title', 'سبد خرید')

@section('content')
    <section class="padding-y bg-light">
        <main class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-3"><a href="{{ route('home.index') }}" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left ms-2"></i>ادامه خرید</a></h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <table class="table-responsive table">
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
                                <tr data-cart-item-id="{{ $cartItem->id }}">
                                    <td class="text-center">
                                        <img
                                                src="{{ asset('storage/' . $cartItem->product->image) }}"
                                                class="img-fluid rounded-3"
                                                alt="{{ $cartItem->product->name }}"
                                                style="width: 65px;">
                                    </td>
                                    <td class="text-center">
                                        <a class="btn-link"
                                           href="{{ route('home.products.show', $cartItem->product) }}">{{ $cartItem->product->name }}</a>
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

                                            <input id="quantity" min="1" name="quantity"
                                                   value="{{ $cartItem->quantity }}"
                                                   type="number"
                                                   class="form-control form-control-sm"
                                                   data-cart-item-id="{{ $cartItem->id }}"
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
                                    <td class="text-center">
                                        <a href="#" onclick="deleteItem({{ $cartItem->id }}); return false;" style="color: #ec5454;">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-center fs-5 fw-bold" colspan="2">مجموع</td>
                                <td class="text-center fs-5 fw-bold" id="totalCartPrice"
                                    colspan="4">{{ format_persian_price($cart->total_price) }} تومان
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer text-center">
                        <button id="pay_btn" class="btn btn-lg btn-primary">پرداخت</button>
                    </div>
                </div>
            </div>

        </main>
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
            const cartItemId = input.getAttribute('data-cart-item-id');
            const quantity = input.value;

            if (!cartItemId) {
                console.error('Cart item ID is missing');
                return;
            }

            fetch('{{ route('cart.update-item') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    cart_item_id: cartItemId,
                    quantity: quantity
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert('مشکلی به وجود آمده است، لطفا دوباره تلاش کنید.');
                    } else {
                        const row = input.closest('tr');
                        const cartItemTotalPriceCell = row.querySelector('td:nth-child(5)');
                        if (cartItemTotalPriceCell) {
                            cartItemTotalPriceCell.textContent = data.cart_item_new_total_price;
                        }
                        document.getElementById("totalCartPrice").innerHTML = data.cart_new_total_price
                    }
                })
                .catch(error => {
                    alert('مشکلی به وجود آمده است، لطفا دوباره تلاش کنید.');
                });
        }

        function deleteItem(id) {
            let path = '{{ route('cart.remove-item', ':id') }}';
            path = path.replace(':id', id);

            if (confirm('آیا مطمئن هستید که می‌خواهید این محصول را از سبد خرید حذف کنید؟')) {
                fetch(path, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the item from the UI
                            const row = document.querySelector(`tr[data-cart-item-id="${id}"]`);
                            if (row) {
                                row.remove();
                            }

                            // Update the cart total if it exists in the UI
                            if (data.cartTotal) {
                                const cartTotalElement = document.getElementById('totalCartPrice');
                                if (cartTotalElement) {
                                    cartTotalElement.innerHTML = data.cartTotal;
                                }
                            }

                            // Show success message
                            alert('محصول با موفقیت از سبد خرید حذف شد.');
                        } else {
                            // Show error message
                            alert('خطا در حذف محصول از سبد خرید. لطفاً دوباره تلاش کنید.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('خطا در ارتباط با سرور. لطفاً دوباره تلاش کنید.');
                    });
            }
        }
    </script>
@endpush
