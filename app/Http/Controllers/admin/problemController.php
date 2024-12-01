<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class problemController extends Controller
{

    public function index()
    {
        $problems = Report::all();
        return view("report.index", compact("problems"));
    }

//___________________________________________________________________________________________________________________

    public function show(string $id)
    {
        $report = Report::find($id);
        return view("report.show", compact("report"));
    }

//___________________________________________________________________________________________________________________

    public function destroy(string $id)
    {
        Report::destroy($id);
        return redirect()->route("problem.index");
    }
//_____________________________________________________________________________________________________________________

}
