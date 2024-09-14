<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'label' => [ 'color' => 'white', 'text' => 'P1' ],
                'draggable' => true
            ],
     
    
        ];
        
        return view('maps.map', compact('initialMarkers'));
    }
    public function updateMarker(Request $request)
    {
        $data = $request->validate([
            'index' => 'required|integer',
            'position' => 'required|array',
            'position.lat' => 'required|numeric',
            'position.lng' => 'required|numeric',
        ]);

        // Find the marker by index or other identifier
        $marker = Marker::find($data['index']); // Adjust as necessary

        if ($marker) {
            $marker->lat = $data['position']['lat'];
            $marker->lng = $data['position']['lng'];
            $marker->save();

            return response()->json(['success' => true, 'message' => 'Marker updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Marker not found'], 404);
    }
}
