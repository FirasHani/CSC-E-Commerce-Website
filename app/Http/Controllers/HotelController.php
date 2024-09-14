<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Log;

class HotelController extends Controller
{
    // Controller method to show all hotels
    public function showHotel(Request $request)
    {
        $hotels = Hotel::all();
        return response()->json(['message' => 'show', 'hotel' => $hotels], 201);
    }

    // Show create hotel page
    public function storeForm(Request $request)
    {
        return view('hotels.createHotel');
    }

    // Test method
    public function test()
    {
        return response()->json(['message' => 'Test'], 201);
    }

    // Create hotel
    public function store(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Request received to store hotel:', $request->all());

            // Create a new hotel record
            $hotel = Hotel::create($request->all());

            return response()->json([
                'message' => 'Hotel has been added',
                'hotel' => $hotel
            ], 201);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error adding hotel:', ['message' => $e->getMessage(), 'trace' => $e->getTrace()]);

            // Return an error response
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Delete a hotel by ID
    public function destroy($id)
    {
        // Find the hotel by ID
        $hotel = Hotel::find($id);

        // Check if the hotel exists
        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }

        // Delete the hotel
        $hotel->delete();

        // Return a success response
        return response()->json(['message' => 'Hotel has been deleted'], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('name');
      
         $results = Hotel::where('name', 'like', "%$search%")->get();
        return response()->json(['message' => 'Search results', 'search' => $results], 200);
    }
}
