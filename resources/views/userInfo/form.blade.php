<!-- 姓名 -->
<div class="form-group">
    {!! Form::label('name', '姓名:') !!}
    {!! Form::text('name', $user->name, ['class' => 'form-control', 'disabled' => true]) !!}
</div>

<!-- 电子邮箱 -->
<div class="form-group">
    {!! Form::label('email', '电子邮箱:') !!}
    {!! Form::text('email', $user->email, ['class' => 'form-control', 'disabled' => true]) !!}
</div>

<!-- 电话 -->
<div class="form-group">
    {!! Form::label('phone', '电话:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<!-- 性别 -->
<div class="form-group">
    {!! Form::label('gender', '性别:') !!}
    {!! Form::select('gender', ['男' => '男', '女' => '女', '未知' => '未知'], null, ['class' => 'form-control']) !!}
    @error('gender')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<!-- 出生日期 -->
<div class="form-group">
    {!! Form::label('birthdate', '出生日期:') !!}
    {!! Form::date('birthdate',null, ['class' => 'form-control']) !!}
    @error('birthdate')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<!-- 病历 -->
<div class="form-group">
    {!! Form::label('medical_history', '病历:') !!}
    {!! Form::textarea('medical_history', null, ['class' => 'form-control']) !!}
    @error('medical_history')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<!-- 提交按钮 -->
<div class="mt-3 text-center">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>