<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function create(Request $request)
    {
        // $request->validate([
        //     'position' => 'required|string|max:255',
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
        // ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $imagePath = 'images/' . $filename;
            $file->move(public_path('images'), $filename); // Simpan file di lokasi fisik
        }

        $position = Position::create([
            'position' => $request->input('position'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'image' => $imagePath, // Store the image path
        ]);

        return response()->json([
            'message' => 'Data successfully sent!',
            'request' => Position::get(),
        ]);
    }
    //
}
