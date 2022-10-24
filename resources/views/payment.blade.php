@extends('components.base')

@section('title',"о нас")

@section('content')

<section class="container">

    <div class="about-project">
        <form action="{{route('payment')}}" method="POST">
            @csrf
            <input name="amountToBePaid" placeholder="amountToBePaid">
            <select name="currency" placeholder="currency">
                <option value="USD" selected>USD</option>
                <option value="RUB">RUB</option>
                <option value="EUR">EUR</option>
            </select>

            <input name="paymentDescription" placeholder="paymentDescription">
            <input type="number" min="0" name="quantity" placeholder="quantity">

            <button >PAY</button>
        </form>
    </div>

    <div class="about-people">

    </div>


</section>

@endsection
