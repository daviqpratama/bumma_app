<!-- Menu Transaksi -->
<li class="nav-item mb-2">
    <a href="{{ route('transaksi.index') }}" 
       class="nav-link d-flex align-items-center {{ request()->is('transaksi*') ? 'active' : '' }}" 
       style="color: #333;">
        <img src="{{ asset('icons/transaction.svg') }}" alt="Transaksi" width="20" class="me-2">
        <span>Transaksi</span>
    </a>
    <!-- Menu Transaksi -->
<li class="nav-item mb-2">
    <a href="{{ route('transaksi.index') }}" 
       class="nav-link d-flex align-items-center {{ request()->is('transaksi*') ? 'active' : '' }}" 
       style="color: #333;">
        <img src="{{ asset('icons/transaction.svg') }}" alt="Transaksi" width="20" class="me-2">
        <span>Transaksi</span>
    </a>
</li>
<a href="{{ route('transaksi.index') }}" 
   class="nav-link d-flex align-items-center {{ request()->is('transaksi*') ? 'active' : '' }}">
    🧾 <span class="ms-2">Transaksi</span>
</a>

</li>
