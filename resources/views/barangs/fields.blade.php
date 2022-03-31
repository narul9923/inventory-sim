<!-- Nama Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    {!! Form::text('nama_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori:') !!}
    {!! Form::select('kategori_id', $kategori, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Jumlah Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    {!! Form::text('jumlah_barang', null, ['class' => 'form-control']) !!}
</div>

<!-- Gudang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gudang_id', 'Gudang:') !!}
    {!! Form::select('gudang_id', $gudang, null, ['class' => 'form-control custom-select']) !!}
</div>
