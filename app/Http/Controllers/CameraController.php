<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cameras;
use App\Models\User;
use App\Models\Payments;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CameraController extends Controller
{
    //for user to view shop
    public function index()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('shop', ['cameras' => $cameras]);
    }

    //for guest to view shop
    public function index_guest()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('shop_guest', ['cameras' => $cameras]);
    }

    //dashboard
    public function dashboard()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('CameraDashboard', ['cameras' => $cameras]);
    }

    public function updatePrice(Request $request, Cameras $camera)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $camera->update(['camera_price' => $request->price]);

        return back()->with('success', 'Camera price updated successfully.');
    }

    //end

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' =>   auth()->id(),
            'camera_id' => 'required|exists:cameras,camera_id',
            'camera_name' => 'required|string',
            'camera_category' => 'required|string',
            'camera_price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'days_rent' => 'required|integer',
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rent_date',
        ]);

        Payments::create($validated);
    }
}
