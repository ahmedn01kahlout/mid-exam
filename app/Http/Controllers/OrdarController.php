<?php

namespace App\Http\Controllers;

use App\Models\Ordar;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrdarRequest;
use App\Http\Requests\UpdateOrdarRequest;

class OrdarController extends Controller
{
    public function store(StoreOrdarRequest $request)
    {

        $ordar = new Ordar();
        $ordar->Name = $request->name;
        $ordar->Product = $request->product;
        $ordar->Quantity = $request->quantity;
        $ordar->PurchaseDate = $request->purchase_date;
        $ordar->DeliveryDate = $request->delivery_date;
        $ordar->validated();
        $ordar->save();
        return redirect()->back()->with('action', 0);
    }

    public function show()
    {
        $ordar = Ordar::get();
        return view('all_orders', compact('ordar'));
    }

    public function destroy($id)
    {
        Ordar::where('id', $id)->delete();
        return redirect()->back()->with('action', 0);
    }

    public function edit($id)
    {
        $ordar = Ordar::where('id', $id)->get();
        $action = 1;
        return view('create_order', compact(['action', 'ordar']));
    }

    public function update(UpdateOrdarRequest $request, $id)
    {
        Ordar::where('id', $id)->update([
            'Name' => $request->name,
            'Quantity' => $request->quantity,
            'Product' => $request->product,
            'PurchaseDate' => $request->purchase_date,
            'DeliveryDate' => $request->delivery_date
        ]);

        $action = 0;
        $ordar = Ordar::get();
        return view('create_order', compact(['action', 'ordar']));
    }

}
