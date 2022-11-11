@extends('user.profile.layouts')
@section('title', 'Purchase History')
@section('content1')

<style>
    .profile .options .transaction {
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">

    <div class="settings">
        <p class="title-settings title">{{ __('purchase history') }}</p>
        <p class="content-settings">{{ __('View your account payment details and transactions.') }}</p>
    </div>

    @if (empty($trans))
    <div class="purchase-history" style="text-align: center; font-weight: 400">No charges have been made to your account yet</div>
    @else

    <div class="purchase-history">
        <table style="width: 100%">
            <tr class="ph-title">
                <td>DATE</th>
                <td>DESCRIPTION</th>
                <td>PRICE</th>
                <td>STATUS</th>
                <td>DETAILS</th>
            </tr>
        @foreach ($trans as $tran)
            <tr class="ph-list">
                <td>{{ $tran->date }}</td>
                <td>
                    <a href="/game/{{ $tran->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $tran->gameId)) }}</a>
                </td>
                <td>-${{ round($tran->gamePrice * (1 - $tran->gameSale / 100), 2) }}</td>
                <td>
                    @if ($tran->status != 0) 
                    Purchased
                    @else
                    Processing
                    @endif
                </td>
                <td><a href="#" onclick="showDetails(document.querySelector('[data-transactions-{{ $tran->gameId }}]'))">Details</a></td>
            </tr>
            <tr class="ph-list">
                <td></td>
                <td class="ph-list-hide" data-transactions-{{ $tran->gameId }}>
                    <span style="font-weight: 800; margin-block-end: 10px; display: flex; gap: 10px">
                        Order ID: <p>{{ $tran->orderId }}</p>
                    </span>
                    @php
                        $date = Carbon\Carbon::parse($tran->date, 'Asia/Ho_Chi_Minh');
                        $now = Carbon\Carbon::now('UTC');

                        $diff = $date->diffForHumans($now);
                    @endphp
                    <span style="font-weight: 600; margin-block-end: 10px; display: flex; gap: 50px;">{{ $diff }}.
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </table>
    </div>

    @endif

</div>

<script>
    const showDetails = function (details) {
        details.classList.toggle("active");
    }
</script>

@endsection