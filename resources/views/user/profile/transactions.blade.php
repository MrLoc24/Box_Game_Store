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
        <table style="width: 100%; text-align: center">
            <tr class="ph-title">
                <th>DATE</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>STATUS</th>
            </tr>
        @foreach ($trans as $tran)
            <tr class="ph-list">
                <td>{{ $tran->date }}</td>
                <td><a href="/game/{{ $tran->gameId }}">{{ str_replace('_', ' ', str_replace('__', ': ', $tran->gameId)) }}</a></td>
                <td>-${{ round($tran->gamePrice * (1 - $tran->gameSale / 100), 2) }}</td>
                <td>
                    @if ($tran->status != 0) 
                    Purchased
                    @else
                    Processing
                    @endif
                </td>
            </tr>
        @endforeach
        </table>
    </div>

    @endif

</div>

@endsection