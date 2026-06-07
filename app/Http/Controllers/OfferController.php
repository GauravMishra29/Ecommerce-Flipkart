<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->get();

        return view('offers', compact('offers'));
    }

    public function indexAdmin()
    {
        $offers = Offer::latest()->get();

        return view('admin.offer.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offer.create');
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads/offers'),
            $imageName
        );

        Offer::create([

            'name' => $request->name,
            'offer' => $request->offer,
            'image' => 'uploads/offers/'.$imageName,

        ]);

        return redirect()->route('offers.index');
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);

        return view('admin.offer.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        if($request->hasFile('image')){

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/offers'),
                $imageName
            );

            $offer->image = 'uploads/offers/'.$imageName;
        }

        $offer->name = $request->name;

        $offer->offer = $request->offer;

        $offer->save();

        return redirect()->route('offers.index');
    }

    public function delete($id)
    {
        $offer = Offer::findOrFail($id);

        $offer->delete();

        return redirect()->route('offers.index');
    }
}