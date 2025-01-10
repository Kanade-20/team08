<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CancerStatistics;
use DB;
use Illuminate\Support\Facades\Auth;

class CancerStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        // 分页功能
        $CancerStatistics = CancerStatistics::paginate(100);

        // 返回视图
        return view('CancerStatistics.index')->with('CancerStatistics',$CancerStatistics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CancerStatistics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 定義表單驗證規則
        $validated = $request->validate([
            'cancer_diagnosis_year' => 'required|integer|digits:4',
            'gender' => 'required|string|in:男,女,全',
            'city' => 'required|string|max:50',
            'cancer_type' => 'required|string|max:100',
            'age_standardized_incidence_rate' => 'required|numeric|between:0,999999.99',
            'cancer_cases' => 'required|integer|min:0',
            'average_age' => 'required|numeric|between:0,100',
            'median_age' => 'required|numeric|between:0,100',
            'crude_rate' => 'required|numeric|between:0,999999.99',
        ]);

         // 将传入的 gender 转换为枚举值
        $gender = $this->convertGender($validated['gender']);

        // 将转换后的值进行插入
        $CancerStatistics = CancerStatistics::create(array_merge($validated, ['gender' => $gender]));

        return view('CancerStatistics.show', compact('CancerStatistics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CancerStatistics = CancerStatistics::findOrFail($id);
        return view('CancerStatistics.show')->with('CancerStatistics',$CancerStatistics);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $CancerStatistics = CancerStatistics::findOrFail($id);
        return view('CancerStatistics.edit')->with('CancerStatistics',$CancerStatistics);
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
        $CancerStatistics = CancerStatistics::findOrFail($id);

        $validated = $request->validate([
            'cancer_diagnosis_year' => 'required|integer|digits:4',
            'gender' => 'required|string|in:男,女,全',
            'city' => 'required|string|max:50',
            'cancer_type' => 'required|string|max:100',
            'age_standardized_incidence_rate' => 'required|numeric|between:0,999999.99',
            'cancer_cases' => 'required|integer|min:0',
            'average_age' => 'required|numeric|between:0,100',
            'median_age' => 'required|numeric|between:0,100',
            'crude_rate' => 'required|numeric|between:0,999999.99',
        ],
        [
            'cancer_diagnosis_year.required' => '请填写癌症诊断的年份。',
            'cancer_diagnosis_year.integer' => '癌症诊断的年份必须为整数。',
            'cancer_diagnosis_year.digits' => '癌症诊断的年份必须是4位数。',

            'gender.required' => '请填写性别。',
            'gender.string' => '性别必须是字符串。',
            'gender.in' => "性别必须是'男性'、'女性'或'全'其中之一。",

            'city.required' => '请填写县市别。',
            'city.string' => '县市名称必须是字符串。',
            'city.max' => '县市名称不能超过50个字符。',

            'cancer_type.required' => '请填写癌症类型。',
            'cancer_type.string' => '癌症类型必须是字符串。',
            'cancer_type.max' => '癌症类型不能超过100个字符。',

            'age_standardized_incidence_rate.required' => '请填写年龄标准化发生率 (每10万人口)。',
            'age_standardized_incidence_rate.numeric' => '年龄标准化发生率必须为数字。',
            'age_standardized_incidence_rate.between' => '年龄标准化发生率必须在0到999999.99之间。',

            'cancer_cases.required' => '请填写癌症的发生数量。',
            'cancer_cases.integer' => '癌症的发生数量必须为整数。',
            'cancer_cases.min' => '癌症的发生数量不能小于0。',

            'average_age.required' => '请填写平均年龄。',
            'average_age.numeric' => '平均年龄必须为数字。',
            'average_age.between' => '平均年龄必须在0到100之间。',

            'median_age.required' => '请填写年龄中位数。',
            'median_age.numeric' => '年龄中位数必须为数字。',
            'median_age.between' => '年龄中位数必须在0到100之间。',

            'crude_rate.required' => '请填写粗率 (每10万人口)。',
            'crude_rate.numeric' => '粗率必须为数字。',
            'crude_rate.between' => '粗率必须在0到999999.99之间。',
         ]);

        // 将传入的 gender 转换为枚举值
        $gender = $this->convertGender($validated['gender']);

        // 更新数据
        $CancerStatistics->update(array_merge($validated, ['gender' => $gender]));

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
        $CancerStatistics = CancerStatistics::findOrFail($id);
        $CancerStatistics->delete();
        return redirect('CancerStatistics');
    }

    public function filter(Request $request)
    {
        // 临时设置更高的内存限制
        ini_set('memory_limit', '512M');

        // 获取筛选条件
        $year = $request->input('year', null);
        $gender = $request->input('gender');
        $city = $request->input('city');
        $cancer_type = $request->input('cancer_type');
        
        // 构建查询
        $query = CancerStatistics::query();

        // 过滤
        if ($year != null) {
            $query->where('cancer_diagnosis_year',  $year);
        }

        if (!empty($gender)) {
            $query->where('gender', $gender);
        }

        if (!empty($city)) {
            $query->where('city', $city);
        }

        if (!empty($cancer_type)) {
            $query->where('cancer_type', $cancer_type);
        }

        // 获取筛选后的数据
        $CancerStatistics = $query->paginate(100);

        // 返回视图并传递筛选后的数据
        return view('CancerStatistics.index', compact('CancerStatistics'));
    }
    public function getData(Request $request)
    {
        // 临时设置更高的内存限制
        ini_set('memory_limit', '512M');

        // 获取按照每一年的癌症发生总数
        $CancerStatistics = CancerStatistics::select(DB::raw('cancer_diagnosis_year, sum(cancer_cases) as total_cases'))
                                         ->groupBy('cancer_diagnosis_year')
                                         ->orderBy('cancer_diagnosis_year', 'asc')
                                         ->get();

        // 返回数据给前端（以 JSON 格式）
        return response()->json($CancerStatistics);
    }
    // 新增转换 gender 值的辅助方法
    private function convertGender($gender)
    {
        // 根据前端传入的值转换成数据库的枚举值
        switch ($gender) {
            case 'male':
                return '男';
            case 'female':
                return '女';
            case 'all':
                return '全';
            default:
                return $gender; // 保证传入的值在合法范围内
        }
    }
}
