<?php

namespace App\Http\Controllers\Home;

use Illuminate\View\View;
use App\Traits\LogsActivity;
use App\Http\Controllers\Controller;
use App\Models\Tour\TourDestination;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TourController extends Controller
{
    use ValidatesRequests;
    use LogsActivity;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $title = 'Destinasi Wisata';
        $tour = TourDestination::with('packages')->get();
        $tour = $tour->filter(function ($destination) {
            return $destination->packages->isNotEmpty() && $destination->status == 'buka' && !is_null($destination->images);
        });

        return view('home.tour.index', compact('tour', 'title'));
    }

    public function wisata($id): View
    {
        $title = 'Destinasi Wisata';
        $tour = TourDestination::with('packages')->where('uuid', $id)->firstOrFail();
        $otherTours = TourDestination::with('packages')->where('uuid', '!=', $id)->inRandomOrder()->get();
        $otherTours = $otherTours->filter(function ($destination) {
            return $destination->packages->isNotEmpty() && $destination->status == 'buka' && !is_null($destination->images);
        });

        return view('home.tour.show', compact('tour', 'title', 'otherTours'));
    }
}
