<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceAmountRequest;
use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;

class InternetServiceProviderController extends Controller
{
    public function getMptInvoiceAmount(InvoiceAmountRequest $request)
    {
        $mpt = new Mpt();
        $mpt->setMonth($request->get('month') ?: 1);
        $amount = $mpt->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount
        ]);
    }
    
    public function getOoredooInvoiceAmount(InvoiceAmountRequest $request)
    {
        $ooredoo = new Ooredoo();
        $ooredoo->setMonth($request->get('month') ?: 1);
        $amount = $ooredoo->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount
        ]);
    }
}
