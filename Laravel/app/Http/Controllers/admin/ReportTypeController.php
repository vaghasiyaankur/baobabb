<?php

namespace App\Http\Controllers\admin;

use App\Models\ReportType;
use App\Http\Requests\StoreReportTypeRequest;
use App\Http\Requests\UpdateReportTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class ReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportType::select('*');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        if($row->name != 'super-admin'){
                            $btn = '<div class="d-flex">';
                            $btn .= '<a href="/admin/report/type/'.$row->id.'/edit" class="edit btn btn-light btn-sm m-1">Edit</a>';
                            $btn .= '<form method="POST" action="/admin/report/type/'.$row->id.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="_method" value="DELETE"><button type="submit"class="edit btn btn-light btn-sm m-1">Delete</button></form>';
                            $btn .= '</div>';
                            return $btn;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.reportType.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reportType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportTypeRequest $request)
    {
        $report = new ReportType;
        $report->name = $request->name;
        $report->save();
        return redirect()->route('admin.report.type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function show(ReportType $reportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reportType = ReportType::findOrFail($id);
        return view('admin.reportType.create',compact('reportType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportTypeRequest  $request
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportTypeRequest $request, $id)
    {
        $reportType = ReportType::findOrFail($id);
        $reportType->name = $request->name;
        $reportType->save();
        return redirect()->route('admin.report.type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReportType::findOrFail($id)->delete();
        return redirect()->route('admin.report.type.index');
    }
}
