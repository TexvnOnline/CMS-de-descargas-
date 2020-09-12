<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:donations.create')->only(['create','store']);
        $this->middleware('can:donations.index')->only(['index']);
        $this->middleware('can:donations.edit')->only(['edit','update']);
        $this->middleware('can:donations.show')->only(['show']);
        $this->middleware('can:donations.destroy')->only(['destroy']);
    }
    public function index()
    {
        $donations = Donation::orderBy('id','DESC')->paginate(10);
        return view('admin.donation.index', compact('donations'));
    }
    public function create()
    {
        return view('admin.donation.create');
    }
    public function store(Request $request)
    {
        $donation = Donation::create($request->all());
        return back()->with('info','Enlace de donación creado con exito.');
    }
    public function edit($id)
    {
        $donation = Donation::where('id',$id)->firstOrFail();
        return view('admin.donation.edit', compact('donation'));
    }
    public function update(Request $request, $id)
    {
        $donation = Donation::find($id);
        $donation->fill($request->all())->save();
        return back()->with('info','Enlace de donación actualizado con exito.');
    }
    public function destroy($id)
    {
        $donation = Donation::find($id)->delete();
        return back()->with('info', 'Enlace de donación eliminado con exito');
    }
}
