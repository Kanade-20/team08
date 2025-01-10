@extends('layouts.app')

@section('title', '台湾癌症统计数据')

<link rel="stylesheet" href="{{ mix('css/table.css') }}">

@section('content')
    <div class="CancerStatistics_container">
        <h1>台湾地区癌症统计数据</h1>
        <hr>
        <!-- 数据筛选 -->
        <div class="filters">
            <form action="{{ route('CancerStatistics.filter') }}" method="GET">
                <label for="year">癌症诊断年份：</label>
                <input type="number" name="year" id="year" placeholder="请輸入年份" >

                <label for="gender">性别:</label>
                <select name="gender" id="gender">
                    <option value="">-请选择-</option>
                    <option value="全">全</option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>

                <label for="city">县市別：</label>
                <select name="city" id="city">
                    <option value="">-请选择-</option>
                    <option value="全省">全省</option>
                    <option value="台北市">台北市</option>
                    <option value="台中市">台中市</option>
                    <option value="台南市">台南市</option>
                    <option value="高雄市">高雄市</option>
                    <option value="基隆市">基隆市</option>
                    <option value="新竹市">新竹市</option>
                    <option value="嘉義市">嘉義市</option>
                    <option value="新北市">新北市</option>
                    <option value="桃園市">桃園市</option>
                    <option value="新竹縣">新竹縣</option>
                    <option value="宜蘭縣">宜蘭縣</option>
                    <option value="苗栗縣">苗栗縣</option>
                    <option value="彰化縣">彰化縣</option>
                    <option value="南投縣">南投縣</option>
                    <option value="雲林縣">雲林縣</option>
                    <option value="嘉義縣">嘉義縣</option>
                    <option value="屏東縣">屏東縣</option>
                    <option value="澎湖縣">澎湖縣</option>
                    <option value="花蓮縣">花蓮縣</option>
                    <option value="台東縣">台東縣</option>
                    <option value="金門縣">金門縣</option>
                    <option value="連江縣">連江縣</option>
                </select>

                <label for="cancer_type">癌症类型：</label>
                <select name="cancer_type" id="cancer_type">
                    <option value="">-请选择-</option>
                    <option value="全癌症">全癌症</option>
                    <option value="口腔、口咽及下咽">口腔、口咽及下咽</option>
                    <option value="主唾液腺">主唾液腺</option>
                    <option value="鼻咽">鼻咽</option>
                    <option value="白血病">白血病</option>
                    <option value="膀胱">膀胱</option>
                    <option value="非何杰金氏淋巴瘤">非何杰金氏淋巴瘤</option>
                    <option value="腦">腦</option>
                    <option value="女性乳房">女性乳房</option>
                    <option value="肺、支氣管及氣管">肺、支氣管及氣管</option>
                    <option value="肝及肝內膽管">肝及肝內膽管</option>
                    <option value="結直腸">結直腸</option>
                    <option value="胃">胃</option>
                    <option value="不明原發部位">不明原發部位</option>
                    <option value="甲狀腺">甲狀腺</option>
                    <option value="腎">腎</option>
                    <option value="卵巢、輸卵管及寬韌帶">卵巢、輸卵管及寬韌帶</option>
                    <option value="子宮體">子宮體</option>
                    <option value="子宮頸">子宮頸</option>
                    <option value="皮膚">皮膚</option>
                    <option value="胰">胰</option>
                    <option value="漿細胞瘤">漿細胞瘤</option>
                    <option value="其他內分泌腺">其他內分泌腺</option>
                    <option value="眼及淚腺">眼及淚腺</option>
                    <option value="腎盂及其他泌尿系統">腎盂及其他泌尿系統</option>
                    <option value="結締組織、皮下組織及其他軟組織">結締組織、皮下組織及其他軟組織</option>
                    <option value="胸腺、心臟與中隔">胸腺、心臟與中隔</option>
                    <option value="喉">喉</option>
                    <option value="鼻腔、中耳及副鼻竇">鼻腔、中耳及副鼻竇</option>
                    <option value="後腹膜腔及腹膜">後腹膜腔及腹膜</option>
                    <option value="膽囊及肝外膽管">膽囊及肝外膽管</option>
                    <option value="攝護腺">攝護腺</option>
                    <option value="小腸">小腸</option>
                    <option value="食道">食道</option>
                    <option value="何杰金氏淋巴瘤">何杰金氏淋巴瘤</option>
                    <option value="其他女性生殖器官">其他女性生殖器官</option>
                    <option value="其他神經系統">其他神經系統</option>
                    <option value="骨、關節及關節軟骨">骨、關節及關節軟骨</option>
                    <option value="d消化器官其他分界不明部位">消化器官其他分界不明部位</option>
                    <option value="睪丸">睪丸</option>
                    <option value="男性乳房">男性乳房</option>
                    <option value="胸膜">胸膜</option>
                    <option value="子宮">子宮</option>
                    <option value="其他男性生殖器官">其他男性生殖器官</option>
                    <option value="其他分界不明的部位">其他分界不明的部位</option>
                </select>

                <button type="submit" class="btn btn-primary">筛选</button>
            </form>
        </div>
        @can('admin')
            <a href="{{ route('CancerStatistics.create') }}" class="btn btn-primary mb-2">+ 新增数据</a> 
        @endcan
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>癌症诊断年份</th>
                    <th>性別</th>
                    <th>县市別</th>
                    <th>癌症类型</th>
                    <th>年龄标准化发生率 (每10万人口)</th>
                    <th>癌症的发生数量</th>
                    <th>平均年龄</th>
                    <th>年龄中位数</th>
                    <th>粗率 (每10万人口)</th>
                    <th>操作</th>
                    @can('admin')
                        <th>操作</th>
                        <th>操作</th>
                    @elsecan('manager')
                        <th>操作</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($CancerStatistics as $index => $cancer)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{$cancer->cancer_diagnosis_year}}</td>
                        <td>{{$cancer->gender}}</td>
                        <td>{{$cancer->city}}</td>
                        <td>{{$cancer->cancer_type}}</td>
                        <td>{{$cancer->age_standardized_incidence_rate}}</td>
                        <td>{{$cancer->cancer_cases}}</td>
                        <td>{{$cancer->average_age}}</td>
                        <td>{{$cancer->median_age}}</td>
                        <td>{{$cancer->crude_rate}}</td>
                        <td><a class="btn btn-primary" href="{{ route('CancerStatistics.show', $cancer) }}">详情</a></td>
                        @can('manager')
                            <td><a class="btn btn-primary" href="{{ route('CancerStatistics.edit', $cancer) }}">编辑</a></td>
                        @elsecan('admin')
                            <td><a class="btn btn-primary" href="{{ route('CancerStatistics.edit', $cancer) }}">编辑</a></td>
                            <td>
                                <form action="{{ route('CancerStatistics.destroy', $cancer) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>   
        </table>

        <!-- 分页导航 -->
        <div class="pagination">
            {{ $CancerStatistics->appends(request()->query())->links() }}
        </div>
    </div>
@endsection