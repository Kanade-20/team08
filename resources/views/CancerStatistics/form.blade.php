<div >
    {!! Form::label('cancer_diagnosis_year','診斷年份:') !!}
    {!! Form::text('cancer_diagnosis_year', null ,['class' => 'form-control'])!!}
</div>
<div>
    {!! Form::label('gender', '性別:') !!}
    {!! Form::select('gender', ['' => '請選擇性別' ,'男' => '男性', '女' => '女性', '全' => '都有'], null, ['class' => 'form-control']) !!}
</div>

<div>
    {!! Form::label('city_county','縣市別:') !!}
    {!! Form::select('city_county', ['' => '請選擇縣市' ,'台北市' => '台北', '高雄市' => '高雄', '台中市' => '台中', '台南市' => '台南', '新北市' => '新北', 
    '桃園市' => '桃園', '彰化縣' => '彰化', '宜蘭縣' => '宜蘭', '花蓮縣' => '花蓮', '嘉義市' => '嘉義', '基隆市' => '基隆', '南投縣' => '南投', '雲林縣' => '雲林',
    '屏東縣' => '屏東', '新竹市' => '新竹', '苗栗縣' => '苗栗'], null, ['class' => 'form-control']) !!}
</div>
<div>
    {!! Form::label('cancer_type','癌症別:') !!}
    {!! Form::text('cancer_type', null, ['class' => 'form-control'])!!}
</div>
<div>
        {!! Form::label('age_standardized_incidence_rate_who_2000','年齡標準化發生率 (每10萬人口):') !!}
        {!! Form::text('age_standardized_incidence_rate_who_2000', null, ['class' => 'form-control'])!!}
</div>
<div>
    {!! Form::label('cancer_cases','癌症發生數:') !!}
    {!! Form::text('cancer_cases', null, ['class' => 'form-control'])!!}
</div>
<div>
    {!! Form::label('average_age','平均年齡:') !!}
    {!! Form::text('average_age', null, ['class' => 'form-control'])!!}
</div>
<div>
    {!! Form::label('median_age','年齡中位數:') !!}
    {!! Form::text('median_age', null, ['class' => 'form-control'])!!}
</div>
<div>
    {!! Form::label('crude_rate','粗率 (每10萬人口):') !!}
    {!! Form::text('crude_rate', null, ['class' => 'form-control'])!!}
</div>
<div>
   {!! Form::submit($submitButtonText, ['class'=>'button button2']) !!}
</div>
