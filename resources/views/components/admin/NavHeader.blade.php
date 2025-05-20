<div class="nav-header">
    <a href="{{ route('admin.dashboard') }}" class="brand-logo">
     @if ($entreprise?->logo_entreprise)
    <img src="{{ asset('storage/' . $entreprise->logo_entreprise) }}"
         alt="{{ $entreprise->nom_entreprise }}"
         style="max-height: 64px; width: 80px; object-fit: cover !important; border-radius: 50%; overflow: hidden;" />
@else
    <img src="{{ asset('assets/images/logo-full.png') }}"
         alt="Logo par défaut"
         style="max-height: 64px; width: 80px; object-fit: cover !important; border-radius: 50%; overflow: hidden;" />
@endif



        <h5 class="p-2">{{Auth::guard('admin')->user()?->nom_admin}}</h5>

    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
