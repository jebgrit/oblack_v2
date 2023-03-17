@extends('frontend.master')

@section('main')

    @php
        $annonce = App\Models\Announcement::orderByDesc('id', 'ASC')->paginate(50);
    @endphp

    <div class="container">
        <ol class="breadcrumb"></ol>
    </div>

    <div class="container">
        <div class="row">
            <!-- Results -->
            <div class="col-md-9 col-sm-9">
                <section id="results">
                    <header><h1>Liste des annonces</h1></header>
                    <section id="search-filter">
                        <figure><h3><i class="fa fa-search"></i>Annonce disponible:</h3>
                            <span class="search-count">{{ count($annonce) }}</span>
                            <div class="sorting">
                                <div class="form-group">
                                    <select name="sorting">
                                        <option value="">Trier par</option>
                                        <option value="asc">Plus récent</option>
                                        <option value="desc">Plus ancien</option>
                                    </select>
                                </div>
                            </div>
                        </figure>
                    </section>


                    <section id="advertising">
                        <a href="{{ route('submit') }}">
                            <div class="banner">
                                <div class="wrapper">
                                    <span class="title">Voulez-vous que votre annonce soit répertoriée ici?</span>
                                    <span class="submit">Soumettez-le maintenant! <i class="fa fa-plus-square"></i></span>
                                </div>
                            </div>
                        </a>
                    </section>

                    <section id="properties" class="display-lines">

                        @foreach ($annonce as $item)
                            <div class="property">
                                
                                <div class="property-image">
                                    <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}">
                                        <img alt="" src="{{ asset($item->an_photo) }}">
                                    </a>
                                </div>
                                <div class="info">
                                    <header>
                                        <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}"><h3>{{ $item->an_title }}</h3></a>
                                        <figure>{{ $item->user->address }}</figure>
                                    </header>
                                    <aside>
                                        <p style="white-space:pre-wap; word-wrap:break-word; overflow-wrap:break-word">{{ Str::limit($item->an_description, 110, '...') }}</p>
                                    </aside>
                                    <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}" class="link-arrow">Voir l'annonce</a>
                                </div>
                            </div>

                        @endforeach

                        <!-- Pagination -->
                        @if ($annonce->hasPages())
                            {{ $annonce->links("vendor.pagination") }}
                        @endif

                        

                        
                    </section>
                </section>
            </div>
            <!-- end Results -->

            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">
                <section id="sidebar">
                    <aside id="edit-search">
                        <header><h3>Rechercher</h3></header>
                        <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                            
                            <div class="form-group">
                                <select name="country">
                                    <option hidden>Choisir</option>
                                    @foreach ($annonce as $item)
                                        <option value="{{ $item->id }}">{{ $item->an_categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" id="search" name="search" required>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Rechercher</button>
                            </div>
                        </form>
                    </aside>

                    {{-- <aside id="featured-properties">
                        <header><h3>Ajouté récemment</h3></header>

                        @foreach ($recent_add as $item)
                            <div class="property small">
                                <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}">
                                    <div class="property-image">
                                        <img alt="" src="{{ asset($item->an_photo) }}">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}"><h4>{{ $item->an_title }}</h4></a><br>
                                    <figure>{{ $item->an_address }} </figure>
                                </div>
                            </div>
                        @endforeach
                        
                    </aside> --}}
                    
                </section>
            </div>
            
        </div>
    </div>
    <br>
    <br>




    {{-- <script>

        $(document).ready(function() {
            $("select[name='sorting']").change(function() {
                var sortOption = $(this).val();
                if (sortOption === "asc") {

                    // Tri par plus récent
                    $.ajax({
                        url: '/annonce/sort',
                        type: 'GET',
                        data: { sort_option: sortOption },
                        success: function(data) {
                            // Mettre à jour la page avec les données triées
                            console.log(data);
                            // Récupérer les données triées
                            var sortedProperties = data;

                            // Effacer les données existantes de la page
                            $(".property").remove();

                            // Boucle sur les données triées et ajouter chaque propriété à la page
                            sortedProperties.forEach(function(property) {
                                var propertyHTML = `
                                <div class="property">
                                    <div class="property-image">
                                    <a href="{{ url('annonce/details/' . $property->id . '/' . $property->slug) }}">
                                        <img alt="" src="{{ asset($property->an_photo) }}">
                                    </a>
                                    </div>
                                    <div class="info">
                                    <header>
                                        <a href="{{ url('annonce/details/' . $property->id . '/' . $property->slug) }}"><h3>{{ $property->an_title }}</h3></a>
                                        <figure>{{ $property->an_address }}</figure>
                                    </header>
                                    <aside>
                                        <p>{{ Str::limit($property->an_description, 300, '...') }}</p>
                                        <dl>
                                        <dt>Status:</dt>
                                        <dd>Sale</dd>
                                        <dt>Area:</dt>
                                        <dd>860 m<sup>2</sup></dd>
                                        <dt>Beds:</dt>
                                        <dd>3</dd>
                                        <dt>Baths:</dt>
                                        <dd>2</dd>
                                        </dl>
                                    </aside>
                                    <a href="{{ url('annonce/details/' . $property->id . '/' . $property->slug) }}" class="link-arrow">Voir l'annonce</a>
                                    </div>
                                </div>
                                `;

                            // Ajouter le code HTML pour la propriété à la page
                                $(".property-list").append(propertyHTML);
                            });
                        },

                        
                        error: function() {
                            // Afficher une erreur
                            // ...
                        }
                    });

                } else if (sortOption === "desc") {
                    
                    // Tri par plus ancien
                    $.ajax({
                        url: '/annonce/sort',
                        type: 'GET',
                        data: { sort_option: sortOption },
                        success: function(data) {
                            // Mettre à jour la page avec les données triées
                        
                            // Récupérer les données triées
                            var sortedProperties = data;

                            // Effacer les données existantes de la page
                            $(".property").remove();

                            // Boucle sur les données triées et ajouter chaque propriété à la page
                            sortedProperties.forEach(function(property) {
                                var propertyHTML = `
                                <div class="property">
                                    <div class="property-image">
                                    <a href="{{ url('annonce/details/' . $property->id . '/' . $property->slug) }}">
                                        <img alt="" src="{{ asset($property->an_photo) }}">
                                    </a>
                                    </div>
                                    <div class="info">
                                    <header>
                                        <a href="{{ url('annonce/details/' . $property->id . '/' . $property->slug) }}"><h3>{{ $property->an_title }}</h3></a>
                                        <figure>{{ $property->an_address }}</figure>
                                    </header>
                                    <aside>
                                        <p>{{ Str::limit($property->an_description, 300, '...') }}</p>
                                        <dl>
                                        <dt>Status:</dt>
                                        <dd>Sale</dd>
                                        <dt>Area:</dt>
                                        <dd>860 m<sup>2</sup></dd>
                                        <dt>Beds:</dt>
                                        <dd>3</dd>
                                        <dt>Baths:</dt>
                                        <dd>2</dd>
                                        </dl>
                                    </aside>
                                    <a href="{{ url('annonce/details/' . $property->id . '/' . $property->slug) }}" class="link-arrow">Voir l'annonce</a>
                                    </div>
                                </div>
                                `;

                            // Ajouter le code HTML pour la propriété à la page
                            $(".property-list").append(propertyHTML);
                            });
                        },

                    
                        error: function() {
                            // Afficher une erreur
                        }

                    });
                }
            });
        });

    </script> --}}


@endsection