<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar" style="background-color: #1b5e3a;">
  <div class="sidebar-header border-bottom" style="background-color: #1b5e3a; border-color: rgba(255,255,255,0.1) !important;">
    <div class="sidebar-brand me-auto" style="display: flex; align-items: center; gap: 10px;">
      <!-- Placeholder logo -->
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 21.5C10.5 21.5 3 16 3 9.5V5L12 2L21 5V9.5C21 16 13.5 21.5 12 21.5Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M9 12L11 14L15 10" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <div>
        <h5 class="mb-0" style="font-weight: 700; letter-spacing: 0.5px;">SanitaCheck</h5>
        <div style="font-size: 0.65rem; color: #a3d9b1;">Kampus Sehat Terintegrasi</div>
      </div>
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"></button>
  </div>

  <div class="sidebar-header border-bottom" style="background-color: #1b5e3a; border-color: rgba(255,255,255,0.1) !important; padding: 1rem;">
    <div class="d-flex align-items-center">
      <div class="avatar avatar-md me-3">
        <img class="avatar-img" src="{{ asset('assets/admin/dist/assets/img/avatars/8.jpg') }}" alt="Admin">
      </div>
      <div>
        <div class="fw-bold text-white">Admin</div>
        <div class="small" style="color: #a3d9b1;">Administrator</div>
        <div class="small d-flex align-items-center mt-1" style="color: #a3d9b1;">
          <span style="display: inline-block; width: 8px; height: 8px; background-color: #2eb85c; border-radius: 50%; margin-right: 5px;"></span>
          Online
        </div>
      </div>
    </div>
  </div>

  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-title" style="color: #a3d9b1; font-size: 0.75rem;">MENU UTAMA</li>
    <li class="nav-item">
      <a class="nav-link {{ request()->is('coreui-test') || request()->is('admin-dashboard') ? 'active' : '' }}" href="{{ url('/admin-dashboard') }}" {!! request()->is('coreui-test') || request()->is('admin-dashboard') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff;"' : '' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M425.706 142.294A240 240 0 0 0 16 312v88h144v-32H48v-56c0-114.691 93.309-208 208-208s208 93.309 208 208v56H352v32h144v-88a238.43 238.43 0 0 0-70.294-169.706" class="ci-primary" />
          <path fill="var(--ci-primary-color, currentcolor)" d="M80 264h32v32H80zm160-136h32v32h-32zm-104 40h32v32h-32zm264 96h32v32h-32zm-102.778 71.1 69.2-144.173-28.85-13.848-69.183 144.135a64.141 64.141 0 1 0 28.833 13.886M256 416a32 32 0 1 1 32-32 32.036 32.036 0 0 1-32 32" class="ci-primary" />
        </svg>
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ request()->is('fasilitas-umum') ? 'active' : '' }}" href="{{ url('/fasilitas-umum') }}" {!! request()->is('fasilitas-umum') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff;"' : '' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M472 40H40a24.03 24.03 0 0 0-24 24v384a24.03 24.03 0 0 0 24 24h432a24.03 24.03 0 0 0 24-24V64a24.03 24.03 0 0 0-24-24m-8 400H48V72h416Z" class="ci-primary" />
          <path fill="var(--ci-primary-color, currentcolor)" d="M152 240h32v-40h40v-32h-40v-40h-32v40h-40v32h40zm44.284 45.089L168 313.373l-28.284-28.284-22.627 22.627L145.373 336l-28.284 28.284 22.627 22.627L168 358.627l28.284 28.284 22.627-22.627L190.627 336l28.284-28.284zM288 168h112v32H288zm0 120h112v32H288zm0 64h112v32H288z" class="ci-primary" />
        </svg>
        Fasilitas Umum
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ request()->is('inspeksi-sanitasi') ? 'active' : '' }}" href="{{ url('/inspeksi-sanitasi') }}" {!! request()->is('inspeksi-sanitasi') ? 'style="background-color: rgba(255,255,255,0.15); border-left: 4px solid #fff;"' : '' !!}>
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z" class="ci-primary" />
          <path fill="var(--ci-primary-color, currentcolor)" d="M136 296h224v32H136zm0 80h224v32H136z" class="ci-primary" />
        </svg>
        Inspeksi Sanitasi
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M136.262 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04A144.3 144.3 0 0 1 93 277.207v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM135 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 135 139.635zM375 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04 144.3 144.3 0 0 1 48.538-28v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM375 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 375 139.635z" class="ci-primary" />
        </svg>
        Petugas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M400 464H48V104h192V72H16v424h416V272h-32z" class="ci-primary" />
          <path fill="var(--ci-primary-color, currentcolor)" d="M304 16v32h137.373L188.687 300.687l22.626 22.626L464 70.627V208h32V16z" class="ci-primary" />
        </svg>
        Jadwal Petugas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M468.916 353.07a243.54 243.54 0 0 0 0-186.459 248 248 0 0 0-2.747-6.354 242.3 242.3 0 0 0-50.059-72.686L404.8 76.257l-11.317 11.314-172.27 172.269 172.63 172.631 10.957 10.953 11.31-11.314a242.2 242.2 0 0 0 49.452-71.358 249 249 0 0 0 3.354-7.682m-64.557-231.12a211.57 211.57 0 0 1 0 275.781L266.468 259.84Z" class="ci-primary" />
          <path fill="var(--ci-primary-color, currentcolor)" d="M105.361 398.32A195.891 195.891 0 0 1 343.42 91.125l23.256-23.255A227.875 227.875 0 0 0 82.733 420.948 228.03 228.03 0 0 0 366.24 452.1l-23.312-23.312c-75.028 43.98-173.271 33.829-237.567-30.468" class="ci-primary" />
        </svg>
        Rekap & Laporan
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="m256 461.129-158.337-77.94V168h316.674v215.189zm-126.337-104.5 126.337 62.188 126.337-62.188V200H129.663z" class="ci-primary" />
          <path fill="var(--ci-primary-color, currentcolor)" d="m203.492 334.205-59.553-61.94 23.08-22.186 36.953 38.435 97.432-93.535 22.19 23.08z" class="ci-primary" />
        </svg>
        Tindak Lanjut
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M494 198.671a40.54 40.54 0 0 0-32.174-27.592l-115.909-18.837-53.732-104.414a40.7 40.7 0 0 0-72.37 0l-53.732 104.414-115.907 18.837a40.7 40.7 0 0 0-22.364 68.827l82.7 83.368-17.9 116.055a40.672 40.672 0 0 0 58.548 42.538L256 428.977l104.843 52.89a40.69 40.69 0 0 0 58.548-42.538l-17.9-116.055 82.7-83.368A40.54 40.54 0 0 0 494 198.671m-32.53 18.7L367.4 312.2l20.364 132.01a8.671 8.671 0 0 1-12.509 9.088L256 393.136 136.744 453.3a8.671 8.671 0 0 1-12.509-9.088L144.6 312.2l-94.069-94.83a8.7 8.7 0 0 1 4.778-14.706l131.841-21.426 61.119-118.767a8.694 8.694 0 0 1 15.462 0l61.119 118.767 131.841 21.426a8.7 8.7 0 0 1 4.778 14.706Z" class="ci-primary" />
        </svg>
        Riwayat Tindak Lanjut
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="var(--ci-primary-color, currentcolor)" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240 240-107.452 240-240S388.548 16 256 16m-22 446.849a208.35 208.35 0 0 1-169.667-125.9c-.364-.859-.706-1.724-1.057-2.587L234 429.939Zm0-69.582L50.889 290.76A210 210 0 0 1 48 256q0-9.912.922-19.67L234 339.939Zm0-90L54.819 202.96a206 206 0 0 1 9.514-27.913Q67.1 168.5 70.3 162.191L234 253.934Zm0-86.015L86.914 134.819a209.4 209.4 0 0 1 22.008-25.9q3.72-3.72 7.6-7.228L234 166.027Zm0-87.708-89.648-49.093A206.95 206.95 0 0 1 234 49.151ZM464 256a207.775 207.775 0 0 1-198 207.761V48.239A207.79 207.79 0 0 1 464 256" class="ci-primary" />
        </svg>
        Profil
      </a>
    </li>
  </ul>
  <div class="sidebar-footer border-top d-flex mt-auto" style="border-color: rgba(255,255,255,0.1) !important;">
    <a class="nav-link w-100 p-3 text-white fw-bold d-flex align-items-center" href="#" style="text-decoration: none;">
      <svg class="nav-icon me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 24px; height: 24px;">
        <path fill="currentColor" d="M160 16v32h304v416H160v32h336V16z" />
        <path fill="currentColor" d="M77.155 272.034H351.75v-32.001H77.155l75.053-75.053v-.001l-22.628-22.626-113.681 113.68.001.001h-.001L129.58 369.715l22.628-22.627v-.001z" />
      </svg>
      Keluar
    </a>
  </div>
</div>
