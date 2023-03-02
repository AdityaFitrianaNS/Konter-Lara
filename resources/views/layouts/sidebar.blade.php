<nav id="sidebar" class="sidebar js-sidebar">
   <div class="sidebar-content js-simplebar">
       <a class="sidebar-brand" href="index.html">
           <span class="align-middle">Konter Lara</span>
       </a>

       <ul class="sidebar-nav pt-1">
           <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('dashboard') }}">
                   <i class="align-middle" data-feather="pie-chart"></i>
                   <span class="align-middle">Dashboard</span>
               </a>
           </li>

           <li class="sidebar-header">
               Alat
           </li>

           <li class="sidebar-item {{ request()->routeIs('aksesoris') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('aksesoris') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Aksesoris</span>
               </a>
           </li>

           <li class="sidebar-header">
               Pulsa & Paket
           </li>

           <li class="sidebar-item {{ request()->routeIs('axis') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('axis') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Axis</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('indosat') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('indosat') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Indosat</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('smartfren') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('smartfren') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Smartfren</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('telkomsel') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('telkomsel') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Telkomsel</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('tri') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('tri') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Tri</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('xl') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('xl') }}">
                   <i class="align-middle" data-feather="align-left"></i>
                   <span class="align-middle">Xl Axiata</span>
               </a>
           </li>

           <li class="sidebar-header">
               Keuangan
           </li>

           <li class="sidebar-item">
               <a class="sidebar-link" href="#">
                   <i class="align-middle" data-feather="dollar-sign"></i>
                   <span class="align-middle">Pembelian</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('pemasukan') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('pemasukan') }}">
                   <i class="align-middle" data-feather="arrow-down-circle"></i>
                   <span class="align-middle">Pemasukan</span>
               </a>
           </li>

           <li class="sidebar-item {{ request()->routeIs('pengeluaran') ? 'active' : '' }}">
               <a class="sidebar-link" href="{{ route('pengeluaran') }}">
                   <i class="align-middle" data-feather="arrow-up-circle"></i>
                   <span class="align-middle">Pengeluaran</span>
               </a>
           </li>

           @if(auth()->user()->role  === 'owner')
               <li class="sidebar-header">
                   Karyawan
               </li>

               <li class="sidebar-item mb-2">
                   <a class="sidebar-link" href="{{ route('karyawan') }}">
                       <i class="align-middle" data-feather="dollar-sign"></i>
                       <span class="align-middle">Data Karyawan</span>
                   </a>
               </li>
           @endif
       </ul>
   </div>
</nav>
