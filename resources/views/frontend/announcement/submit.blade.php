@extends('frontend.master')

@section('main')

    <style>
        #the-count {
            float: right;
            padding: 0.1rem 0 0 0;
            font-size: 0.975rem;
        }
    </style>

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Accueil</a></li>
            <li class="active">Ajouter une annonce</li>
        </ol>
    </div>

    <div class="container">
        <header><h1>Ajouter une annonce</h1></header>
        
        <form role="form" id="form-submit" class="form-submit" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="row">
                <div class="block">
                    <div class="col-md-12 col-sm-9">
                        <section id="submit-form">
                            <section id="basic-information">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">Titre de l'annonce</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" maxlength="15000" rows="8" name="description" required autofocus>{{ old('description') }}</textarea>
                                    <div id="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 15000</span>
                                    </div>
                                    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <div class="block clearfix">
                                        <div class="col-md-6 col-sm-6">
                                            <section id="summary">
                                                <header><h2>Informations supplémentaires</h2></header>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="categorie">Catégorie</label>
                                                            <select name="categorie" id="categorie">
                                                                <option value=""></option>
                                                                <option value="Vêtements">Vêtements</option>
                                                                <option value="Chaussures">Chaussures</option>
                                                                <option value="Montres & bijoux">Montres & bijoux</option>
                                                                <option value="Accessoires">Accessoires</option>
                                                                <option value="Livres">Livres</option>
                                                                <option value="Jeux & jouets">Jeux & jouets</option>
                                                                <option value="Console & jeux vidéo">Console & jeux vidéo</option>
                                                                <option value="Téléphonie">Téléphonie</option>
                                                            </select>
                                                            @error('categorie')<div class="text-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="state">État</label>
                                                            <select name="state" id="state">
                                                                <option value=""></option>
                                                                <option value="Neuf avec étiquette">Neuf avec étiquette</option>
                                                                <option value="Neuf sans étiquette">Neuf sans étiquette</option>
                                                                <option value="Très bon état">Très bon état</option>
                                                                <option value="Bon état">Bon état</option>
                                                                <option value="État satisfaisant">État satisfaisant</option>
                                                            </select>
                                                            @error('state')<div class="text-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="type">Pointures</label>
                                                            <select name="type" id="type">
                                                                <option value=""></option>
                                                                <option value="16">16 </option>
                                                                <option value="16,5">16,5 </option>
                                                                <option value="17">17 </option>
                                                                <option value="17,5">17,5 </option>
                                                                <option value="18">18 </option>
                                                                <option value="18,5">18,5 </option>
                                                                <option value="19">19 </option>
                                                                <option value="19,5">19,5 </option>
                                                                <option value="20">20 </option>
                                                                <option value="20,5">20,5 </option>
                                                                <option value="21">21 </option>
                                                                <option value="21,5">21,5 </option>
                                                                <option value="22">22 </option>
                                                                <option value="22,5">22,5 </option>
                                                                <option value="23">23 </option>
                                                                <option value="23,5">23,5 </option>
                                                                <option value="24">24 </option>
                                                                <option value="24,5">24,5 </option>
                                                                <option value="25">25 </option>
                                                                <option value="25,5">25,5 </option>
                                                                <option value="26">26 </option>
                                                                <option value="26,5">26,5 </option>
                                                                <option value="27">27 </option>
                                                                <option value="27,5">27,5 </option>
                                                                <option value="28">28 </option>
                                                                <option value="28,5">28,5 </option>
                                                                <option value="29">29 </option>
                                                                <option value="29,5">29,5 </option>
                                                                <option value="30">30 </option>
                                                                <option value="30,5">30,5 </option>
                                                                <option value="31">31 </option>
                                                                <option value="31,5">31,5 </option>
                                                                <option value="32">32 </option>
                                                                <option value="32,5">32,5 </option>
                                                                <option value="33">33 </option>
                                                                <option value="33,5">33,5 </option>
                                                                <option value="34">34 </option>
                                                                <option value="34,5">34,5 </option>
                                                                <option value="35">35 </option>
                                                                <option value="35,5">35,5 </option>
                                                                <option value="36">36 </option>
                                                                <option value="36,5">36,5 </option>
                                                                <option value="37">37 </option>
                                                                <option value="37,5">37,5 </option>
                                                                <option value="38">38 </option>
                                                                <option value="38,5">38,5 </option>
                                                                <option value="39">39 </option>
                                                                <option value="39,5">39,5 </option>
                                                                <option value="40">40 </option>
                                                                <option value="40,5">40,5 </option>
                                                                <option value="41">41 </option>
                                                                <option value="41,5">41,5 </option>
                                                                <option value="42">42 </option>
                                                                <option value="42,5">42,5 </option>
                                                                <option value="43">43 </option>
                                                                <option value="43,5">43,5 </option>
                                                                <option value="44">44 </option>
                                                                <option value="44,5">44,5 </option>
                                                                <option value="45">45 </option>
                                                                <option value="45,5">45,5 </option>
                                                                <option value="46">46 </option>
                                                                <option value="46,5">46,5 </option>
                                                                <option value="47">47 </option>
                                                                <option value="47,5">47,5 </option>
                                                                <option value="48">48 </option>
                                                                <option value="48,5">48,5 </option>
                                                                <option value="49">49 </option>
                                                                <option value="49,5">49,5 </option>
                                                                <option value="50 et plus">50 et plus </option>
                                                            </select>
                                                            @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="size">Taille</label>
                                                            <select name="size" id="size">
                                                                <option value=""></option>
                                                                <optgroup label="Femme">
                                                                    <option value="32 - XXS">32 - XXS </option>
                                                                    <option value="34 - XS">34 - XS </option>
                                                                    <option value="36 - S">36 - S </option>
                                                                    <option value="38 - M">38 - M </option>
                                                                    <option value="40 - L">40 - L </option>
                                                                    <option value="42 - XL">42 - XL </option>
                                                                    <option value="44 - XXL">44 - XXL </option>
                                                                    <option value="46 - XXXL">46 - XXXL </option>
                                                                    <option value="48 - 4XL">48 - 4XL </option>
                                                                    <option value="50 et plus - 5XL">50 et plus - 5XL</option>
                                                                <optgroup label="Homme">
                                                                    <option value="XS">XS </option>
                                                                    <option value="S">S </option>
                                                                    <option value="M">M </option>
                                                                    <option value="L">L </option>
                                                                    <option value="XL">XL </option>
                                                                    <option value="XXL">XXL </option>
                                                                    <option value="XXL et plus">XXXL et plus </option>
                                                                <optgroup label="Enfant">
                                                                    <option value="3 ans">3 ans </option>
                                                                    <option value="4 ans">4 ans </option>
                                                                    <option value="5 ans">5 ans </option>
                                                                    <option value="6 ans">6 ans </option>
                                                                    <option value="8 ans">8 ans </option>
                                                                    <option value="10 ans">10 ans </option>
                                                                    <option value="12 ans">12 ans </option>
                                                                    <option value="14 ans">14 ans </option>
                                                                    <option value="16 ans">16 ans </option>
                                                                    <option value="18 ans">18 ans </option>
                                                            </select>
                                                            @error('size')<div class="text-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div><br>


                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="brand">Marque</label>
                                                            <input type="text" class="form-control" id="brand" name="brand" >
                                                            @error('brand')<div class="text-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="color">Couleur</label>
                                                            <select name="color" id="color">
                                                                <option value=""></option>
                                                                <option value="Argenté / Acier">Argenté / Acier</option>
                                                                <option value="Beige / Camel">Beige / Camel</option>
                                                                <option value="Blanc">Blanc</option>
                                                                <option value="Bleu / Ciel">Bleu / Ciel</option>
                                                                <option value="Crème / Blanc cassé / Écru">Crème / Blanc cassé / Écru</option>
                                                                <option value="Doré / Bronze / Cuivre">Doré / Bronze / Cuivre</option>
                                                                <option value="Gris / Anthracite">Gris / Anthracite</option>
                                                                <option value="Imprimés multicolore">Imprimés multicolore</option>
                                                                <option value="Jaune / Moutarde">Jaune / Moutarde</option>
                                                                <option value="Kaki">Kaki</option>
                                                                <option value="Lavande / Lilas">Lavande / Lilas</option>
                                                                <option value="Marine / Turquoise">Marine / Turquoise</option>
                                                                <option value="Marron">Marron</option>
                                                                <option value="Multicolore">Multicolore</option>
                                                                <option value="Noir">Noir</option>
                                                                <option value="Orange / Corail">Orange / Corail</option>
                                                                <option value="Rose / Fuchsia">Rose / Fuchsia</option>
                                                                <option value="Rouge / Bordeaux">Rouge / Bordeaux</option>
                                                                <option value="Vert">Vert</option>
                                                                <option value="Violet / Mauve">Violet / Mauve</option>
                                                                <option value="Autre">Autre</option>
                                                            </select>
                                                            @error('color')<div class="text-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div><br>
                                                
                                                <div class="form-group">
                                                    <label for="submit-title">Image de couverture</label>
                                                    <input type="file" name="photo" accept="image/jpeg,image/png">
                                                    @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
                                                </div>
                                                
                                            </section>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <section id="place-on-map">
                                                <header class="section-title">
                                                    <h2>Galerie</h2>
                                                </header>
                                                <div class="center">
                                                    <div class="form-group">
                                                        <input id="file-upload" name="image[]" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="false" data-show-remove="false" accept="image/jpeg,image/png" data-browse-class="btn btn-default" data-browse-label="Parcourir les images">
                                                        @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                                        <figure class="note"><strong>Conseils:</strong> You can upload all images at once!</figure>
                                                    </div>
                                                </div>
                                                
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <hr>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="block">
                    <div class="col-md-12 col-sm-9">
                        <div class="center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-default large">Partager l'annonce</button>
                                <figure class="note block">En validant la publication de votre annonce, vous acceptez nos <a href="terms-conditions.html">Conditions générales d'utilisation</a></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Count character --}}
    <script>
        const textarea = document.getElementById("description");
        const current = document.getElementById("current");

        textarea.addEventListener("input", function () {
        current.innerHTML = this.value.length;
        });

    </script>


@endsection
