<div class="form-group mb-3">
    {!! Form::label('title', '标题:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '请输入标题']) !!}
    @error('title')
        <span>{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-3">
    {!! Form::label('content', '内容:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => '请输入内容']) !!}
    @error('content')
        <span>{{ $message }}</span>
    @enderror
</div>

<div class="form-group mb-3">
    {!! Form::label('category', '分类:') !!}
    {!! Form::select('category', ['' => '所有分类', '基础知识' => '基础知识', '预防与筛查' => '预防与筛查', '患者护理' => '患者护理', '科研动态' => '科研动态'], null, ['class' => 'form-select']) !!}
    @error('category')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="form-group mb-3">
    {!! Form::label('keywords', '关键字:') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => '请输入关键字']) !!}
    @error('keywords')
        <span>{{ $message }}</span>
    @enderror
</div>
<div class="text-center pt-3">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary p-3']) !!}
</div>