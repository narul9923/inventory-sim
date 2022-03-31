<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    {!! Form::select('barang_id', $barang, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $user, auth()->id(), ['class' => 'form-control custom-select', 'readonly' => 'true']) !!}
</div>


<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipe', 'Tipe:') !!}
    {!! Form::select('tipe', ['Masuk' => 'Masuk', 'Keluar' => 'Keluar'], null, ['class' => 'form-control custom-select']) !!}
</div>
