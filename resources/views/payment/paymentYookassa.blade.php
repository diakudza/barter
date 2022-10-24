@extends('components.base')

@section('title',"YooKassa")

@section('content')

    <section class="container">

        <div class="about-project">

            <p>Платежи через YooKassa</p>

            <form action="{{ route('payment.create.yookassa') }}" method="POST" class="row">
                @csrf
                <div class="row w-75">
                    <input type="number" min="0" name="amount" placeholder="Сумма платежа" class="form-control w-25" required>
                    <input type="text" name="description" placeholder="описание платежа" class="form-control w-75"
                           required>
                </div>
                <button class="btn btn-success w-25">PAY</button>
            </form>
        </div>

        <div class="about-people">

        </div>


    </section>

@endsection
