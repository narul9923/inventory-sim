
<!-- Nama Barang Field -->
<div class="col-sm-12">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    <p>{{ $barang->nama_barang }}</p>
</div>

<!-- Kategori Id Field -->
<div class="col-sm-12">
    {!! Form::label('kategori_id', 'Kategori:') !!}
    <p>{{ $barang->kategori->nama_kategori }}</p>
</div>

<!-- Jumlah Barang Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    <p>{{ $barang->jumlah_barang }}</p>
</div>

<!-- Gudang Id Field -->
<div class="col-sm-12">
    {!! Form::label('gudang_id', 'Gudang:') !!}
    <p>{{ $barang->gudang->nama_gudang }}</p>
</div>
