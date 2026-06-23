<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar" style="background-color: #1b5e3a;">
  
  <div class="sidebar-header border-bottom" style="background-color: #1b5e3a; border-color: rgba(255,255,255,0.1) !important; padding: 0.75rem 1rem;">
    <div class="sidebar-brand me-auto" style="display: flex; align-items: center; gap: 8px; width: 100%;">
      <img src="{{ asset('assets/images/logo-sanita.png') }}" alt="Logo SanitaCheck" style="width: 42px; height: 42px; object-fit: contain;">
      <div style="line-height: 1.2;">
        <h5 class="mb-0" style="font-weight: 700; letter-spacing: 0.5px; font-size: 1.15rem; color: #ffffff;">SanitaCheck</h5>
        <div style="font-size: 0.62rem; color: #a3d9b1; white-space: nowrap;">Kampus Sehat Terintegrasi</div>
      </div>
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"></button>
  </div>

  <div class="sidebar-header border-bottom" style="background-color: #1b5e3a; border-color: rgba(255,255,255,0.1) !important; padding: 0.85rem 1rem;">
    <div class="d-flex align-items-center">
      <div class="avatar avatar-md me-3" style="width: 38px; height: 38px;">
        <img class="avatar-img" src="https://ui-avatars.com/api/?name=Admin&background=1b5e3a&color=fff" alt="Admin" style="border-radius: 50%;">
      </div>
      <div style="line-height: 1.3;">
        <div class="fw-bold text-white" style="font-size: 0.9rem;">Admin</div>
        <div class="small" style="color: #a3d9b1; font-size: 0.75rem;">Administrator</div>
        <div class="small d-flex align-items-center mt-1" style="color: #a3d9b1; font-size: 0.7rem;">
          <span style="display: inline-block; width: 7px; height: 7px; background-color: #2eb85c; border-radius: 50%; margin-right: 5px;"></span>
          Online
        </div>
      </div>
    </div>
  </div>

  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar style="padding: 0.5rem 0;">
    <li class="nav-title" style="color: #a3d9b1; font-size: 0.7rem; letter-spacing: 0.5px; padding: 0.75rem 1rem 0.25rem 1rem;">MENU UTAMA</li>
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('coreui-test') || request()->is('admin-dashboard') ? 'active' : '' }}" href="{{ url('/admin-dashboard') }}" {!! request()->is('coreui-test') || request()->is('admin-dashboard') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M425.706 142.294A240 240 0 0 0 16 312v88h144v-32H48v-56c0-114.691 93.309-208 208-208s208 93.309 208 208v56H352v32h144v-88a238.43 238.43 0 0 0-70.294-169.706" />
          <path fill="currentColor" d="M80 264h32v32H80zm160-136h32v32h-32zm-104 40h32v32h-32zm264 96h32v32h-32zm-102.778 71.1 69.2-144.173-28.85-13.848-69.183 144.135a64.141 64.141 0 1 0 28.833 13.886M256 416a32 32 0 1 1 32-32 32.036 32.036 0 0 1-32 32" />
        </svg>
        Dashboard
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('fasilitas-umum') ? 'active' : '' }}" href="{{ url('/fasilitas-umum') }}" {!! request()->is('fasilitas-umum') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M472 40H40a24.03 24.03 0 0 0-24 24v384a24.03 24.03 0 0 0 24 24h432a24.03 24.03 0 0 0 24-24V64a24.03 24.03 0 0 0-24-24m-8 400H48V72h416Z" />
          <path fill="currentColor" d="M152 240h32v-40h40v-32h-40v-40h-32v40h-40v32h40zm44.284 45.089L168 313.373l-28.284-28.284-22.627 22.627L145.373 336l-28.284 28.284 22.627 22.627L168 358.627l28.284 28.284 22.627-22.627L190.627 336l28.284-28.284zM288 168h112v32H288zm0 120h112v32H288zm0 64h112v32H288z" />
        </svg>
        Fasilitas Umum
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('inspeksi-sanitasi') ? 'active' : '' }}" href="{{ url('/inspeksi-sanitasi') }}" {!! request()->is('inspeksi-sanitasi') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z" />
          <path fill="currentColor" d="M136 296h224v32H136zm0 80h224v32H136z" />
        </svg>
        Inspeksi Sanitasi
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('petugas') ? 'active' : '' }}" href="{{ url('/petugas') }}" {!! request()->is('petugas') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M136.262 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04A144.3 144.3 0 0 1 93 277.207v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM135 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 135 139.635zM375 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04 144.3 144.3 0 0 1 48.538-28v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM375 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 375 139.635z" />
        </svg>
        Petugas
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('rekap-laporan') ? 'active' : '' }}" href="{{ url('/rekap-laporan') }}" {!! request()->is('rekap-laporan') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M468.916 353.07a243.54 243.54 0 0 0 0-186.459 248 248 0 0 0-2.747-6.354 242.3 242.3 0 0 0-50.059-72.686L404.8 76.257l-11.317 11.314-172.27 172.269 172.63 172.631 10.957 10.953 11.31-11.314a242.2 242.2 0 0 0 49.452-71.358 249 249 0 0 0 3.354-7.682m-64.557-231.12a211.57 211.57 0 0 1 0 275.781L266.468 259.84Z" />
          <path fill="currentColor" d="M105.361 398.32A195.891 195.891 0 0 1 343.42 91.125l23.256-23.255A227.875 227.875 0 0 0 82.733 420.948 228.03 228.03 0 0 0 366.24 452.1l-23.312-23.312c-75.028 43.98-173.271 33.829-237.567-30.468" />
        </svg>
        Rekap & Laporan
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ url('/profil') }}" {!! request()->is('profil') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240 240-107.452 240-240S388.548 16 256 16m-22 446.849a208.35 208.35 0 0 1-169.667-125.9c-.364-.859-.706-1.724-1.057-2.587L234 429.939Zm0-69.582L50.889 290.76A210 210 210 0 0 1 48 256q0-9.912.922-19.67L234 339.939Zm0-90L54.819 202.96a206 206 0 0 1 9.514-27.913Q67.1 168.5 70.3 162.191L234 253.934Zm0-86.015L86.914 134.819a209.4 209.4 0 0 1 22.008-25.9q3.72-3.72 7.6-7.228L234 166.027Zm0-87.708-89.648-49.093A206.95 206.95 0 0 1 234 49.151ZM464 256a207.775 207.775 0 0 1-198 207.761V48.239A207.79 207.79 0 0 1 464 256" />
        </svg>
        Profil
      </a>
    </li>
    
    <!-- <li class="nav-item">
      <a class="nav-link {{ request()->is('pengaturan') ? 'active' : '' }}" href="{{ url('/pengaturan') }}" {!! request()->is('pengaturan') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff; font-size: 0.85rem; padding: 0.6rem 1rem;"' : 'style="font-size: 0.85rem; padding: 0.6rem 1rem;"' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: #fff; width: 16px; height: 16px; margin-right: 0.75rem;">
          <path fill="currentColor" d="M262.29 192.31a64 64 0 1 0 57.4 57.4 64.13 64.13 0 0 0-57.4-57.4M416.39 256a154.348 154.348 0 0 1-1.53 20.79l45.21 35.46a10.81 10.81 0 0 1 2.45 13.75l-42.77 74a10.81 10.81 0 0 1-13.14 4.59l-44.9-18.08a16.11 16.11 0 0 0-15.17 1.75A164.48 164.48 0 0 1 325 400.8a15.94 15.94 0 0 0-8.82 12.14l-6.73 47.89a11.08 11.08 0 0 1-10.68 9.17h-85.54a11.11 11.11 0 0 1-10.69-8.87l-6.72-47.82a16.07 16.07 0 0 0-9-12.22 155.3 155.3 0 0 1-21.46-12.57 16 16 0 0 0-15.11-1.71l-44.89 18.07a10.81 10.81 0 0 1-13.14-4.58l-42.77-74a10.8 10.8 0 0 1 2.45-13.75l38.21-30a16.05 16.05 0 0 0 6-14.08c-.36-4.17-.58-8.38-.58-12.5s.21-8.27.58-12.35a16 16 0 0 0-6.07-13.94l-38.19-30A10.81 10.81 0 0 1 49.48 186l42.77-74a10.81 10.81 0 0 1 13.14-4.59l44.9 18.08a16.11 16.11 0 0 0 15.17-1.75A164.48 164.48 0 0 1 187 111.2a15.94 15.94 0 0 0 8.82-12.14l6.73-47.89A11.08 11.08 0 0 1 213.23 42h85.54a11.11 11.11 0 0 1 10.69 8.87l6.72 47.82a16.07 16.07 0 0 0 9 12.22 155.3 155.3 0 0 1 21.46 12.57 16 16 0 0 0 15.11 1.71l44.89-18.07a10.81 10.81 0 0 1 13.14 4.58l42.77 74a10.8 10.8 0 0 1-2.45 13.75l-38.21 30a16.05 16.05 0 0 0-6.05 14.08c.33 4.14.55 8.3.55 12.4Z" />
        </svg>
        Pengaturan
      </a>
    </li> -->
  </ul>

  <div class="sidebar-footer border-top d-flex mt-auto" style="border-color: rgba(255,255,255,0.1) !important;">
    <a class="nav-link w-100 p-2 text-white fw-bold d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; font-size: 0.85rem; padding-left: 1rem !important;">
      <svg class="nav-icon me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 18px; height: 18px; color: #fff;">
        <path fill="currentColor" d="M160 16v32h304v416H160v32h336V16z" />
        <path fill="currentColor" d="M77.155 272.034H351.75v-32.001H77.155l75.053-75.053v-.001l-22.628-22.626-113.681 113.68.001.001h-.001L129.58 369.715l22.628-22.627v-.001z" />
      </svg>
      Keluar
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
  </div>
</div>