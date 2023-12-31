@component('mail::message')
# Reservasi Anda telah Disdetujui!
Reservasi anda telah disetujui oleh Admin.
langkah selanjutnya adalah nelakukan pembayaran melalui transfer melalui ATM ke rekening :

## BCA xxxxxxxxxx a/n Muhammad Yasif Akbar
## Jumlah Pembayaran : <?php echo number_format($payment->total , 0); ?>

setelah pembayaran, silakan upload bukti bayar pada website

# Detail Reservasi
<b>Nama : {{$payment->user->name}}</b><br>
<b>No Invoice : {{ $payment->no_invoice }}</b> <br>
<b>Tanggal Pengambilan : {{ date('d M Y H:i', strtotime($payment->order->first()->starts)) }}</b>
@component('mail::table')
| Alat       | Durasi         | Harga  |
| ------------- |:-------------:| --------:|
@foreach ($payment->order as $item)
| {{$item->alat->nama_alat}} | {{ $item->durasi }} Jam | <?php echo number_format($item->harga , 0); ?> |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
