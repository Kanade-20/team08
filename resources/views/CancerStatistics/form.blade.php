<div class="form-group">
    {!! Form::label('cancer_diagnosis_year', '癌症诊断年份:') !!}
    {!! Form::text('cancer_diagnosis_year',null,['class' => 'form-control']) !!}
    @error('cancer_diagnosis_year')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('gender', '性別:') !!}
    {!! Form::select('gender', ['男' => '男', '女' => '女', '全' => '全'], null, ['class' => 'form-control']) !!}
    @error('gender')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('city', '县市别:') !!}
    {!! Form::select('city', [
        '' => '-请选择-',
        '全省' => '全省',
        '台北市' => '台北市',
        '台中市' => '台中市',
        '台南市' => '台南市',
        '高雄市' => '高雄市',
        '基隆市' => '基隆市',
        '新竹市' => '新竹市',
        '嘉义市' => '嘉义市',
        '新北市' => '新北市',
        '桃园市' => '桃园市',
        '新竹縣' => '新竹縣',
        '宜蘭縣' => '宜蘭縣',
        '苗栗縣' => '苗栗縣',
        '彰化縣' => '彰化縣',
        '南投縣' => '南投縣',
        '雲林縣' => '雲林縣',
        '嘉義縣' => '嘉义縣',
        '屏東縣' => '屏东县',
        '澎湖縣' => '澎湖縣',
        '花蓮縣' => '花蓮縣',
        '台東縣' => '台東縣',
        '金門縣' => '金門縣',
        '連江縣' => '連江縣',
    ], null, ['class' => 'form-control']) !!}
    @error('city')
        <span>{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('cancer_type', '癌症类型:') !!}
    {!! Form::select('cancer_type', [
        '' => '-请选择-',
        '全癌症' => '全癌症',
        '口腔、口咽及下咽' => '口腔、口咽及下咽',
        '主唾液腺' => '主唾液腺',
        '鼻咽' => '鼻咽',
        '白血病' => '白血病',
        '膀胱' => '膀胱',
        '非何杰金氏淋巴瘤' => '非何杰金氏淋巴瘤',
        '腦' => '腦',
        '女性乳房' => '女性乳房',
        '肺、支氣管及氣管' => '肺、支气管及气管',
        '肝及肝內膽管' => '肝及肝内胆管',
        '結直腸' => '结直肠',
        '胃' => '胃',
        '不明原發部位' => '不明原发部位',
        '甲狀腺' => '甲状腺',
        '腎' => '肾',
        '卵巢、輸卵管及寬韌帶' => '卵巢、输卵管及宽韧带',
        '子宮體' => '子宫体',
        '子宮頸' => '子宫颈',
        '皮膚' => '皮肤',
        '胰' => '胰',
        '漿細胞瘤' => '浆细胞瘤',
        '其他內分泌腺' => '其他内分泌腺',
        '眼及淚腺' => '眼及泪腺',
        '腎盂及其他泌尿系統' => '肾盂及其他泌尿系统',
        '結締組織、皮下組織及其他軟組織' => '结缔组织、皮下组织及其他软组织',
        '胸腺、心臟與中隔' => '胸腺、心脏与中隔',
        '喉' => '喉',
        '鼻腔、中耳及副鼻竇' => '鼻腔、中耳及副鼻窦',
        '後腹膜腔及腹膜' => '后腹膜腔及腹膜',
        '膽囊及肝外膽管' => '胆囊及肝外胆管',
        '攝護腺' => '摄护腺',
        '小腸' => '小肠',
        '食道' => '食道',
        '何杰金氏淋巴瘤' => '何杰金氏淋巴瘤',
        '其他女性生殖器官' => '其他女性生殖器官',
        '其他神經系統' => '其他神经系统',
        '骨、關節及關節軟骨' => '骨、关节及关节软骨',
        '消化器官其他分界不明部位' => '消化器官其他分界不明部位',
        '睪丸' => '睾丸',
        '男性乳房' => '男性乳房',
        '胸膜' => '胸膜',
        '子宮' => '子宫',
        '其他男性生殖器官' => '其他男性生殖器官',
        '其他分界不明的部位' => '其他分界不明的部位',
    ], null, ['class' => 'form-control']) !!}
    @error('cancer_type')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('age_standardized_incidence_rate', '年龄标准化发生率 (每10万人口):') !!}
    {!! Form::text('age_standardized_incidence_rate',null,['class' => 'form-control']) !!}
    @error('age_standardized_incidence_rate')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('cancer_cases', '癌症的发生数量:') !!}
    {!! Form::text('cancer_cases',null,['class' => 'form-control']) !!}
    @error('cancer_cases')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('average_age', '平均年龄:') !!}
    {!! Form::text('average_age',null,['class' => 'form-control']) !!}
    @error('average_age')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('median_age', '年龄中位数:') !!}
    {!! Form::text('median_age',null,['class' => 'form-control']) !!}
    @error('median_age')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('crude_rate', '粗率 (每10万人口):') !!}
    {!! Form::text('crude_rate',null,['class' => 'form-control']) !!}
    @error('crude_rate')
        <span>{{ $message }}</span>
    @enderror
</div>

 <div class="mt-3 text-center">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>