<?php

namespace App\Http\Controllers;

use App\Models\Additives;
use App\Models\Contributions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdditivesController extends Controller
{
    public function show(Additives $additive)
    {
        return view('additive/show', compact('additive'));
    }

    public function index()
    {
        $q = request()->input('q');
        if ($q) {
            $additives = Additives::where('e_code', 'like', '%' . $q . '%')->orWhere('title', 'like', '%' . $q . '%')->get();
        } else {
            $additives = Additives::all();
        }
        return view('additive/all', compact('additives'));
    }


    public function edit(Additives $additive,)
    {
        return view('additive/edit', compact('additive'));
    }

    public function update(): RedirectResponse
    {
        $data = request()->validate([
            'id' => 'required|integer',
            'e_code' => 'required|uppercase|max:6',
            'title' => 'required|string',
            'info' => 'required|string',
            'e_type' => 'required|string',
            'halal_status' => 'required|digits_between:0,1',
            'health_rating' => 'required|digits_between:0,3',
        ]);

        $additive = Additives::find($data['id']);
/*
        $user_id = Auth::id();
        $contributions = Contributions::firstOrNew(['user_id' => $user_id]);
        $contributions->contribution_count += 1;
        $contributions->user_id = $user_id;
        $contributions->save();
*/
        $additive->update($data);

        return Redirect::route('additive.show', ['additive' => request()->input('id')])->with('status', 'additive-updated');
    }

    public function statistics()
    {
        $all_count = Additives::count();
        $halal_count = Additives::where('halal_status', 1)->count();
        $health_unknown = Additives::where('health_rating', 0)->count();

        $health_bad = Additives::where('health_rating', 1)->count();
        $health_normal = Additives::where('health_rating', 2)->count();
        $health_good = Additives::where('health_rating', 3)->count();

        $stat = [
            'all_count' => $all_count,
            'halal_count' => $halal_count,
            'health_unknown' => $health_unknown,
            'health_bad' => $health_bad,
            'health_normal' => $health_normal,
            'health_good' => $health_good
        ];
        return view('dashboard', compact('stat'));
    }
}
