@component('mail::message')
# Invoice from {{config('app.name')}}

Order Summary

Invoice Number: {{ $invoice->id }}<br>
Total: Rp. {{ number_format($invoice->total, 2) }}

@component('mail::button', ['url' => config('app.url').'/confirm-payment/'.$invoice->id])
Confirm Payment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
