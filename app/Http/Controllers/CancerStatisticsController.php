<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CancerStatistics;
use App\Http\Requests\CreateCancerStatisticRequest;

class CancerStatisticsController extends Controller
{
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
        return view('CancerStatistics.edit',compact('cancerstatistic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
