<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Auth;
class ReportAproblemController extends Controller
{
    public function index()
    {
        Auth::user();
        $report = Report::all();
        return response()->json($report);
    }
//_______________________________________________________________________________________________________________

    public function store(Request $request)
    {       
            Auth::user();
            $validated= $request->validate([
            'problem' => 'required|string',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $imagePath= null;
            if($request->hasFile('image')){
                $imagePath = 'problem/' . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('problem'), $request->file('image')->getClientOriginalName());
                }
            $report = Report::create([
                'problem' => $validated['problem'],
                'image'=> $imagePath,
            ]);
            return response()->json($report);
    }
//____________________________________________________________________________________________________________________
    public function show(string $id)
    {   Auth::user();
        $report = Report::find($id);
        return response()->json($report);
    }
//_____________________________________________________________________________________________________________________

    public function update(Request $request, string $id)
    {       Auth::user();
            $request->validate([
            'problem' => 'required|string',
            'image' =>'nullable|string',
            ]);
            $report = Report::find($id);
            $report->update($request->all());
            return response()->json($report);
    }
//________________________________________________________________________________________________________________________
    public function destroy(string $id)
    {
        Auth::user();
        $report = Report::find($id);
        $report->delete();
        return response()->json(['message'=> 'deleted successfully']);
    }
//_______________________________________________________________________________________________________________________

}
