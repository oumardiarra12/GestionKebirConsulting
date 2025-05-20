<div class="dlabnav">
    <div class="dlabnav-scroll">

        <ul class="metismenu" id="menu">
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Tableau de Board</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.dashboard')}}">Tableau de Board</a></li>
                </ul>

            </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="flaticon-050-info"></i>
                    <span class="nav-text">Emplois</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('emplois.index')}}">Emplois</a></li>
                    <li><a href="{{route('emplois.create')}}">Creer un Emplois</a></li>
                </ul>
            </li>
             <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">CVthèque</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('cvtech.index')}}">Liste de CVthèque</a></li>
                </ul>
            </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-handshake"></i>
                    <span class="nav-text">Partenaire</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('partenaires.index')}}">Partenaires</a></li>

                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-user-friends"></i>
                    <span class="nav-text">Utilisateurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.index')}}">Administrateurs</a></li>
                    {{-- <li><a href="job-view.html">Abonnes</a></li> --}}
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="fa-solid fa-gear"></i>
                <span class="nav-text">Paramètres</span>
            </a>
            <ul aria-expanded="false">
                 <li><a href="{{route('regions.index')}}">Les Regions</a></li>
                <li><a href="{{route('contrat.index')}}">Type de Contrat</a></li>
                <li><a href="{{route('langues.index')}}">Langues</a></li>
                <li><a href="{{route('secteur.index')}}">Secteurs</a></li>
                <li><a href="{{route('niveauetudes.index')}}">Niveau d'Etudes</a></li>
                <li><a href="{{route('etapes.index')}}">Les Etapes de Recrutement</a></li>
                <li><a href="{{route('niveauexperience.index')}}">Les Niveaux d'Experiences</a></li>
                <li><a href="{{route('metiers.index')}}">Les Metiers</a></li>
                <li><a href="{{route('disponibilites.index')}}">Les Disponibilites</a></li>
                <li><a href="{{route('renumerations.index')}}">Les Renumerations</a></li>
                 <li><a href="{{route('expertises.index')}}">Les Expertises</a></li>
                <li><a href="{{route('admin.entreprise')}}">Notre Entreprise</a></li>
            </ul>
            </li>


            {{-- <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">Candidatures</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('candidatures.index')}}">Candidatures</a></li>

                </ul>
            </li> --}}

           {{--  <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-045-heart"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="uc-select2.html">Select 2</a></li>
                    <li><a href="uc-nestable.html">Nestedable</a></li>
                    <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="uc-toastr.html">Toastr</a></li>
                    <li><a href="map-jqvmap.html">Jqv Map</a></li>
                    <li><a href="uc-lightgallery.html">Light Gallery</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" class="" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-072-printer"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="form-element.html">Form Elements</a></li>
                    <li><a href="form-wizard.html">Wizard</a></li>
                    <li><a href="form-ckeditor.html">CkEditor</a></li>
                    <li><a href="form-pickers.html">Pickers</a></li>
                    <li><a href="form-validation.html">Form Validate</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-043-menu"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page-login.html">Login</a></li>
                    <li><a href="page-register.html">Register <span class="badge badge-xs badge-danger ms-3">New</span></a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="page-error-400.html">Error 400</a></li>
                            <li><a href="page-error-403.html">Error 403</a></li>
                            <li><a href="page-error-404.html">Error 404</a></li>
                            <li><a href="page-error-500.html">Error 500</a></li>
                            <li><a href="page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                    <li><a href="empty-page.html">Empty Page</a></li>
                </ul>
            </li> --}}
        </ul>

        {{-- <div class="copyright">
            <p><strong>Jobick Job Admin</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignLab</p>
        </div> --}}
    </div>
</div>
