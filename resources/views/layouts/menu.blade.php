<li class="nav-item">
    <a href="{{ url('home') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('kategoris.index') }}"
       class="nav-link {{ Request::is('kategoris*') ? 'active' : '' }}">
        <p>Kategori</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('gudangs.index') }}"
       class="nav-link {{ Request::is('gudangs*') ? 'active' : '' }}">
        <p>Gudang</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('barangs.index') }}"
       class="nav-link {{ Request::is('barangs*') ? 'active' : '' }}">
        <p>Barang</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('riwayats.index') }}"
       class="nav-link {{ Request::is('riwayats*') ? 'active' : '' }}">
        <p>Riwayats</p>
    </a>
</li>


