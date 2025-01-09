<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CancerStatistics;
use App\Http\Requests\CreateCancerStatisticRequest;
use Illuminate\Support\Facades\Gate;

class CancerStatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cancerstatistics = CancerStatistics::all();
        return view('CancerStatistics.index',compact('cancerstatistics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Gate::denies('admin')) {
            abort(403); // 如果沒有權限，返回 403 錯誤
        }
        return view('CancerStatistics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCancerStatisticRequest $request)
{
    
    $data = $request->only([
        'cancer_diagnosis_year',
        'gender',
        'city_county',
        'cancer_type',
        'age_standardized_incidence_rate_who_2000',
        'cancer_cases',
        'average_age',
        'median_age',
        'crude_rate',
    ]);
    
    $data['age_standardized_incidence_rate_who_2000'] = number_format($data['age_standardized_incidence_rate_who_2000'], 2, '.', '');
    $data['average_age'] = number_format($data['average_age'], 2, '.', '');
    $data['median_age'] = number_format($data['median_age'], 1, '.', '');  
    $data['crude_rate'] = number_format($data['crude_rate'], 2, '.', '');

    CancerStatistics::create($data);


    return redirect('CancerStatistics');

}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cancerstatistic = CancerStatistics::findOrFail($id);
        return view('CancerStatistics.show',compact('cancerstatistic'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cancerstatistic = CancerStatistics::findOrFail($id);
        if (Gate::any(['admin', 'manager'])) {
            return view('CancerStatistics.edit',compact('cancerstatistic'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCancerStatisticRequest $request, $id)
    {
        //
        $cancerstatistic = CancerStatistics::findOrFail($id);
        $data = $request->only([
            'cancer_diagnosis_year',
            'gender',
            'city_county',
            'cancer_type',
            'age_standardized_incidence_rate_who_2000',
            'cancer_cases',
            'average_age',
            'median_age',
            'crude_rate',
        ]);

        $cancerstatistic->fill($data);

        $cancerstatistic->save();

        return redirect('CancerStatistics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $cancerstatistic = CancerStatistics::findOrFail($id);
        $cancerstatistic->delete();
        return redirect('CancerStatistics');
    }
}
