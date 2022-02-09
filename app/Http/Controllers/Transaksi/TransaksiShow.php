<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class TransaksiShow extends Controller
{
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $snapToken = $transaksi->snap_token;

        if (is_null($snapToken)) {
            $midtrans = new CreateSnapTokenService($transaksi);
            $snapToken = $midtrans->getSnapToken();

            $transaksi->snap_token = $snapToken;
            $transaksi->save();
        }

        return view('transaksi.show', compact('transaksi', 'snapToken'));
    }
}
