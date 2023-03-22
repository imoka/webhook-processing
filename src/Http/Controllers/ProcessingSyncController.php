<?php

namespace App\Http\Controllers\Api\Webhooks\Processing;

use App\Http\Controllers\Controller;
use Moka\ProcessingSync\Http\Requests\OrderItemRequest;
use Moka\ProcessingSync\Http\Requests\OrderRequest;
use Moka\ProcessingSync\Http\Requests\TransactionRequest;
use Symfony\Component\HttpFoundation\Response;

class ProcessingSyncController extends Controller
{
    public function transaction(TransactionRequest $request)
    {
        dd($request->all());

        return response()->json(['success' => true, 'message' => 'Успех', 'data' => $request->all()], Response::HTTP_OK);
    }

    public function order(OrderRequest $request)
    {
        return response()->json(['success' => true, 'message' => 'Успех', 'data' => $request->all()], Response::HTTP_OK);
    }

    public function orderItem(OrderItemRequest $request)
    {
        return response()->json(['success' => true, 'message' => 'Успех', 'data' => $request->all()], Response::HTTP_OK);
    }
}