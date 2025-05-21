<div>
    <div class="main-bnr bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <h6 class="sub-title wow fadeInUp" data-wow-delay="0.4s">Nous avons plus de 200 emplois en direct</h6>
                    <h1 class=" wow fadeInUp" id="text" data-wow-delay="0.6s">Un <span
                            class=" text-primary">poste</span> à la hauteur de vos ambitions vous attend</h1>
                        <p class=" text text-primary wow fadeInUp font-w500" data-wow-delay="0.8s">Entrez un mot-clé,
                            puis cliquez sur Rechercher pour trouver votre emploi idéal. </p>
                        <div class="bnr-search-bar wow fadeInUp" data-wow-delay="1.0s">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xl-9 col-lg-8 col-md-9 col-sm-12">
                                    <div class="row center-line">
                                        <div class="col-lg-6 col-md-6 col-sm-6 ">
                                            <div class="search-bar">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <div class="icon-content w-100">
                                                    <input wire:model.live="searchTitre" required="required" class="form-control"
                                                        placeholder="Ex: Développeur Web" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="search-bar">
                                                <select wire:model.live="metier" id="metier" class="form-control border-0">
                                        <option value="">Metier</option>
                                        @foreach ($metiers as $m)
                                            <option value="{{ $m->id }}">{{ $m->nom_metier }}</option>
                                        @endforeach
                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xl-3 col-lg-4 col-md-3 col-sm-12  text-lg-center text-md-center text-center">
                                    {{-- <a class="btn btn-primary w-100" href="javascript:void(0);">Rechercher des
                                        emplois</a> --}}
                                        <select wire:model.live="secteur" id="secteur" class="form-control border-0 w-100">
                                        <option value="">secteur</option>
                                        @foreach ($secteurs as $s)
                                            <option value="{{ $s->id }}">{{ $s->nom_secteur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h6 class="bottom-contact wow fadeInUp" data-wow-delay="1.2s">
                            <span>Recherches populaires : </span>
                            <a href="javascript:void(0);">Designer,</a>
                            <a href="javascript:void(0);">Senior,</a>
                            <a href="javascript:void(0);">Architecture,</a>
                            <a href="javascript:void(0);">iOS,</a>
                            <a href="javascript:void(0);">Etc.</a>
                        </h6>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="banner-media">
                        <img class="media wow bounceInRight" data-wow-delay="1.4s"
                            src="frontend/assets/images/home-banner/men.png" alt="">
                        <ul class="bnr-blocks">
                            <li>
                                <div class="bnr-block wow fadeInUp anm" data-wow-delay="1.6s" data-speed-x="-1"
                                    data-speed-scale="-1">
                                    <i class="fa-solid fa-envelope"></i>
                                   <span class="block-text"></span>
                                </div>
                            </li>
                            <li>
                                <div class="bnr-block wow fadeInUp anm" data-wow-delay="1.6s" data-speed-x="-2"
                                    data-speed-scale="-1">
                                    <i class="fa-solid fa-briefcase"></i>
                                    <span class="block-text"></span>
                                </div>
                            </li>
                            <li>
                                <div class="bnr-block-pics wow fadeInUp anm" data-wow-delay="1.6s" data-speed-x="-3"
                                    data-speed-scale="-1">
                                    <span class="block-text">Équipe d’Experts</span>
                                    <div class="twm-pics">
                                        <span><img src="frontend/assets/images/banner/banner-block-pics/pic1.jpg"
                                                alt="image"></span>
                                        <span><img src="frontend/assets/images/banner/banner-block-pics/pic2.jpg"
                                                alt="image"></span>
                                        <span><img src="frontend/assets/images/banner/banner-block-pics/pic3.jpg"
                                                alt="image"></span>
                                        <span><img src="frontend/assets/images/banner/banner-block-pics/pic4.jpg"
                                                alt="image"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <svg class="shape1" viewBox="0 0 250 315" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M-15.8534 213.126L-49.2042 179.81C-58.9952 170.029 -58.9952 154.167 -49.2042 144.38L-15.8534 111.064C-6.0624 101.283 9.81609 101.283 19.6137 111.064L52.9646 144.38C62.7556 154.161 62.7556 170.023 52.9646 179.81L19.6137 213.126C9.81609 222.914 -6.0624 222.914 -15.8534 213.126Z"
                fill="var(--rgba-primary-6)"></path>
            <path
                d="M54.9201 306.94L23.9065 275.959C13.4659 265.529 13.4659 248.623 23.9065 238.194L54.9201 207.212C65.3607 196.783 82.2839 196.783 92.7245 207.212L123.738 238.194C134.179 248.623 134.179 265.529 123.738 275.959L92.7245 306.94C82.2839 317.37 65.354 317.37 54.9201 306.94Z"
                fill="var(--rgba-primary-6)"></path>
            <path
                d="M11.2693 151.465L-104.622 35.6945C-115.062 25.2648 -115.062 8.35919 -104.622 -2.0705L11.2693 -117.841C21.7099 -128.27 38.6331 -128.27 49.0737 -117.841L164.965 -2.0705C175.405 8.35919 175.405 25.2648 164.965 35.6945L49.0737 151.465C38.6331 161.894 21.7099 161.894 11.2693 151.465Z"
                fill="var(--primary-dark)"></path>
            <path
                d="M169.833 69.519L135.973 35.6945C125.533 25.2648 125.533 8.35919 135.973 -2.0705L169.833 -35.8951C180.274 -46.3248 197.197 -46.3248 207.638 -35.8951L241.497 -2.0705C251.938 8.35919 251.938 25.2648 241.497 35.6945L207.638 69.519C197.197 79.9487 180.274 79.9487 169.833 69.519Z"
                fill="var(--primary)"></path>
            <path
                d="M109.494 186.871L69.1182 146.537C63.0708 140.496 63.0708 130.702 69.1182 124.661L109.494 84.3272C115.542 78.2861 125.346 78.2861 131.393 84.3272L171.769 124.661C177.817 130.702 177.817 140.496 171.769 146.537L131.393 186.871C125.346 192.912 115.542 192.912 109.494 186.871Z"
                fill="var(--primary)"></path>
        </svg>
        <svg class="shape2" viewBox="0 0 319 612" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="mask0_54_23" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="319"
                height="612">
                <rect width="319" height="612" fill="var(--primary)"></rect>
            </mask>
            <g mask="url(#mask0_54_23)">
                <path
                    d="M76.7559 377.481L36.5386 359.615C23.3563 353.759 16.9589 338.129 22.2524 324.711L38.402 283.774C43.6954 270.356 58.6781 264.223 71.8604 270.08L112.078 287.946C125.26 293.802 131.657 309.432 126.364 322.85L110.214 363.787C104.921 377.205 89.9382 383.338 76.7559 377.481Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M245.853 304.82L166.379 269.514C146.657 260.753 137.091 237.381 145.011 217.305L176.924 136.41C184.844 116.335 207.247 107.165 226.97 115.927L306.443 151.232C326.166 159.994 335.731 183.365 327.812 203.441L295.899 284.336C287.979 304.412 265.575 313.581 245.853 304.82Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M376.662 571.765L157.738 474.51C138.015 465.748 128.449 442.377 136.369 422.301L224.28 199.46C232.2 179.384 254.603 170.215 274.326 178.976L493.25 276.232C512.973 284.994 522.539 308.365 514.619 328.441L426.708 551.282C418.784 571.348 396.381 580.518 376.662 571.765Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M115.525 575.71L45.2359 544.485C25.5131 535.723 15.9473 512.352 23.8672 492.276L52.0921 420.73C60.012 400.654 82.4152 391.485 102.138 400.246L172.427 431.471C192.149 440.233 201.715 463.605 193.795 483.68L165.57 555.226C157.659 575.299 135.247 584.472 115.525 575.71Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M185.275 121.967L151.156 106.81C135.544 99.8747 127.966 81.3589 134.235 65.4683L147.936 30.7383C154.205 14.8477 171.953 7.58327 187.565 14.5184L221.684 29.6757C237.296 36.6109 244.874 55.1268 238.605 71.0173L224.904 105.747C218.635 121.638 200.895 128.899 185.275 121.967Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M141.303 344.782L115.419 333.283C106.513 329.327 102.19 318.765 105.766 309.699L116.16 283.352C119.736 274.287 129.861 270.143 138.767 274.099L164.651 285.598C173.557 289.555 177.88 300.117 174.304 309.182L163.91 335.529C160.334 344.595 150.209 348.739 141.303 344.782Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M88.3079 244.487L79.933 240.767C75.6064 238.845 73.5055 233.712 75.2429 229.308L78.6059 220.783C80.3433 216.379 85.2636 214.365 89.5903 216.287L97.9652 220.007C102.292 221.93 104.393 227.063 102.655 231.467L99.2923 239.991C97.5549 244.395 92.6346 246.409 88.3079 244.487Z"
                    stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
                <path
                    d="M83.1256 390.858L42.9082 372.992C29.7259 367.135 23.3286 351.505 28.622 338.087L44.7716 297.15C50.065 283.732 65.0478 277.6 78.23 283.456L118.447 301.322C131.63 307.178 138.027 322.808 132.734 336.227L116.584 377.163C111.291 390.582 96.3167 396.71 83.1256 390.858Z"
                    fill="var(--primary-dark)"></path>
                <path
                    d="M275.11 335.94L195.637 300.634C175.914 291.873 166.348 268.501 174.268 248.426L206.181 167.531C214.101 147.455 236.504 138.285 256.227 147.047L335.7 182.352C355.423 191.114 364.989 214.486 357.069 234.561L325.156 315.456C317.245 335.528 294.833 344.701 275.11 335.94Z"
                    fill="var(--rgba-primary)"></path>
                <path
                    d="M416.689 688.933L358.103 662.906C338.38 654.144 328.814 630.773 336.734 610.697L360.26 551.063C368.18 530.987 390.583 521.818 410.306 530.579L468.892 556.606C488.615 565.367 498.181 588.739 490.261 608.815L466.735 668.449C458.815 688.525 436.412 697.694 416.689 688.933Z"
                    fill="white"></path>
                <path
                    d="M405.915 602.876L186.991 505.621C167.268 496.859 157.702 473.488 165.622 453.412L253.533 230.571C261.453 210.495 283.856 201.326 303.579 210.087L522.503 307.343C542.226 316.105 551.792 339.476 543.872 359.552L455.961 582.393C448.041 602.469 425.638 611.638 405.915 602.876Z"
                    fill="var(--primary-dark)"></path>
                <path
                    d="M144.79 606.827L74.5018 575.601C54.779 566.84 45.2132 543.468 53.133 523.393L81.358 451.847C89.2779 431.771 111.681 422.601 131.404 431.363L201.693 462.588C221.415 471.35 230.981 494.721 223.061 514.797L194.836 586.343C186.916 606.419 164.504 615.592 144.79 606.827Z"
                    fill="var(--primary-dark)"></path>
                <path
                    d="M214.529 153.078L180.409 137.921C164.798 130.986 157.219 112.47 163.488 96.5792L177.189 61.8492C183.458 45.9587 201.207 38.6942 216.818 45.6293L250.938 60.7867C266.549 67.7219 274.127 86.2377 267.859 102.128L254.158 136.858C247.893 152.758 230.153 160.019 214.529 153.078Z"
                    fill="var(--primary-dark)"></path>
                <path
                    d="M170.56 375.902L144.676 364.404C135.769 360.447 131.446 349.885 135.023 340.82L145.417 314.473C148.993 305.407 159.118 301.263 168.024 305.22L193.908 316.718C202.814 320.675 207.137 331.237 203.56 340.302L193.167 366.649C189.59 375.715 179.475 379.855 170.56 375.902Z"
                    fill="var(--primary-dark)"></path>
                <path
                    d="M117.561 275.598L109.186 271.878C104.86 269.956 102.759 264.823 104.496 260.419L107.859 251.894C109.596 247.49 114.517 245.476 118.843 247.398L127.218 251.118C131.545 253.04 133.646 258.173 131.909 262.577L128.546 271.102C126.808 275.506 121.897 277.517 117.561 275.598Z"
                    fill="var(--primary-dark)"></path>
            </g>
        </svg>
    </div>


    <div class="container mt-4">
        {{-- Loader --}}
        <div wire:loading.delay class="text-center my-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </div>

        {{-- Liste des offres --}}
        {{-- <div class="row  g-4">
    @forelse($emplois as $offre)
        <div class="col">
            <a href="{{ route('candidat.offredetail', $offre->id) }}" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition rounded-3">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-primary mb-2">
                            <i class="bi bi-briefcase-fill me-2"></i> {{ $offre->titre_emplois }}
                        </h5>

                        <p class="text-muted mb-3">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $offre->lieu_emplois }}
                        </p>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge rounded-pill bg-primary-subtle text-white">
                                <i class="bi bi-file-earmark-text me-1"></i> {{ $offre->typecontrat->nom_type_contrat ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-secondary-subtle text-white">
                                <i class="bi bi-layers me-1"></i> {{ $offre->secteur->nom_secteur ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-info-subtle text-white">
                                <i class="bi bi-award me-1"></i> {{ $offre->niveauglobalexperience->nom_niveau_global_experience ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-success-subtle text-white">
                                <i class="bi bi-mortarboard me-1"></i> {{ $offre->niveauetude->nom_niveau_etude ?? '-' }}
                            </span>
                            <span class="badge rounded-pill bg-warning-subtle text-white">
                                <i class="bi bi-person-workspace me-1"></i> {{ $offre->metier->nom_metier ?? '-' }}
                            </span>
                        </div>

                        <hr class="my-3">

                        <div class="small text-muted d-flex flex-wrap gap-3">
                            <span><i class="bi bi-calendar-check me-1"></i><strong>Début :</strong>
                                {{ \Carbon\Carbon::parse($offre->date_debut_emplois)->format('d/m/Y') }}
                            </span>
                            <span><i class="bi bi-calendar-x me-1"></i><strong>Fin :</strong>
                                {{ \Carbon\Carbon::parse($offre->date_fin_emplois)->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-2"></i> Aucune offre d'emploi trouvée selon les critères.
            </div>
        </div>
    @endforelse
</div> --}}





        {{-- Pagination --}}
        {{-- <div class="d-flex justify-content-center mt-5">
        {{ $emplois->links() }}
    </div> --}}
    </div>
    <section class="content-inner overflow-hidden position-relative">
        <div class="container">
            <div class="section-head text-center">
                <h6 class="text wow fadeInUp" data-wow-delay="0.6s">Méthode de travail</h6>
                <h2 class="title wow fadeInUp" data-wow-delay="0.8s">Comment cela fonctionne</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="icon-bx-wraper style-1 bg-clr-sky wow bounceInLeft" data-wow-delay="1.2s">
                        <div class="icon-media">
                            <img src="{{ asset('frontend/assets/images/icon/pic1.png') }}" alt="image"
                                class="rounded">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">Créez votre compte</h4>
                            <p class="text">Inscription rapide et accès à des centaines d'offres d'emploi adaptées à
                                votre profil, débutant ou expérimenté, pour trouver l'opportunité idéale.</p>
                        </div>
                        <h3 class="count">01</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="icon-bx-wraper style-1 bg-clr-pink wow bounceInUp" data-wow-delay="1.0s">
                        <div class="icon-media">
                            <img src="{{ asset('frontend/assets/images/icon/pic2.png') }}" alt="image"
                                class="rounded">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">Trouvez l’emploi qui vous correspond</h4>
                            <p class="text">Saisissez votre chance et construisez la carrière dont vous rêvez.</p>
                        </div>
                        <h3 class="count">02</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-b30">
                    <div class="icon-bx-wraper style-1 bg-clr-green wow bounceInRight" data-wow-delay="1.2s">
                        <div class="icon-media">
                            <img src="{{ asset('frontend/assets/images/icon/pic3.png') }}" alt="image"
                                class="rounded">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">Uploader votre CV</h4>
                            <p class="text">Ajoutez votre CV pour permettre aux recruteurs de découvrir votre
                                parcours, vos compétences et vos expériences.</p>
                        </div>
                        <h3 class="count">03</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-inner overflow-hidden position-relative bg-light">
        <div class="container">
            <div class="section-head text-center">
                <h6 class="text wow fadeInUp" data-wow-delay="0.6s">Toutes les offres d'emploi</h6>
                <h2 class="title wow fadeInUp" data-wow-delay="0.8s">Trouvez votre carrière, vous la méritez</h2>
            </div>

            <div class="row">
                @forelse($emplois as $offre)
                    @php
                        $dateFin = \Carbon\Carbon::parse($offre->date_fin_emplois);
                        $resteJours = round(now()->floatDiffInDays($dateFin, false));
                    @endphp


                    <div class="col-xl-4 col-md-6">
                        <div class="job-bx style-1 wow fadeInUp" data-wow-delay="1.0s">
                            <div class="d-flex m-b25 justify-content-between">
                                <ul>
                                    <li>
                                        @if ($resteJours > 0)
                                            <span class="badge bg-success">{{ $resteJours }} jour(s)
                                                restant(s)</span>
                                        @elseif ($resteJours === 0)
                                            <span class="badge bg-warning">Dernier jour</span>
                                        @else
                                            <span class="badge bg-danger">Expiré</span>
                                        @endif
                                    </li>
                                    <li>
                                        <a class="job-time" href="javascript:void(0);">
                                            {{ $offre->typecontrat->nom_type_contrat ?? '-' }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-contant">
                                <h6 class="job-title"><a href="{{ route('candidat.offredetail', $offre->id) }}">
                                        Nous recrutons un(e) {{ $offre->titre_emplois }}</a></h6>
                                <p class="text">{{ $offre->lieu_emplois }}</p>
                            </div>
                            <div class="jobs-amount">
                                <a class="btn btn-primary" href="{{ route('candidat.offredetail', $offre->id) }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i> Aucune offre d'emploi trouvée selon les critères.
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($emplois->count() >= $limit)
                <div class="text-center mt-4">
                    <button wire:click="loadMore" class="btn btn-outline-primary">Afficher plus</button>
                </div>
            @endif
        </div>
    </section>

    <div class="container">
        <section class="footer-action wow fadeInUp" data-wow-delay="1.0s">
            <div class="inner-content wow fadeInUp" data-wow-delay="1.2s">
                <div class="row justify-content-between align-items-center">
                    <div class="text-center text-xl-start col-xl-7 m-lg-b20">
                        <h2 class="title">Connectons-nous pour construire votre avenir professionnel</h2>
                    </div>
                    <div class="text-center text-xl-end col-xl-5">
                        <a class="btn btn-light btn-lg" href="{{ route('inscrire') }}">Créer un compte gratuit</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="content-inner overflow-hidden position-relative bg-light mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Ce que disent nos clients</h2>
                <p class="text-muted">Des témoignages qui illustrent notre engagement et notre expertise au Mali</p>
            </div>

            <div class="row g-4">
                <!-- Témoignage 1 -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <p class="card-text fst-italic">"Grâce à ce cabinet, nous avons recruté des talents de
                                qualité en un temps record. Professionnalisme et écoute sont au rendez-vous."</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex align-items-center">
                            <img src="{{ asset('frontend/assets/images/avatar/avatar1.jpg') }}" width="50"
                                height="50" alt="client" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Fatou Diarra</h6>
                                <small class="text-muted">Directrice RH, BamakoTech</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <p class="card-text fst-italic">"Une équipe réactive, à l'écoute de nos besoins
                                spécifiques. Nous recommandons fortement ce cabinet de recrutement au Mali."</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex align-items-center">
                            <img src="{{ asset('frontend/assets/images/avatar/avatar1.jpg') }}" width="50"
                                height="50" alt="client" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Moussa Traoré</h6>
                                <small class="text-muted">CEO, AgroMali</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Témoignage 3 -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <p class="card-text fst-italic">"Nous avons trouvé des profils rares et compétents. Ce
                                cabinet nous a vraiment aidés à structurer notre processus de recrutement."</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex align-items-center">
                            <img src="{{ asset('frontend/assets/images/avatar/avatar1.jpg') }}" width="50"
                                height="50" alt="client" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Awa Konaté</h6>
                                <small class="text-muted">Manager RH, Sotrama Digital</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
