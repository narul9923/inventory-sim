
<!-- Barang Id Field -->
<div class="col-sm-12">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $riwayat->barang->nama_barang }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Nama User:') !!}
    <p>{{ $riwayat->users->name }}</p>
</div>

<!-- Jumlah Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $riwayat->jumlah }}</p>
</div>

<!-- Tipe Field -->
<div class="col-sm-12">
    {!! Form::label('tipe', 'Tipe:') !!}
    <p>{{ $riwayat->tipe }}</p>
</div>
