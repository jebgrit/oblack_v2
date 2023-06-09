@extends('frontend.master')

@section('main')

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
                        <figure><h3><i class="fa fa-search"></i>Résultats de recherche:</h3>
                            <span class="search-count">28</span>
                            <div class="sorting">
                                <div class="form-group">
                                    <select name="sorting">
                                        <option value="">Trier par</option>
                                        <option value="1">Ville</option>
                                        <option value="2">Département</option>
                                        <option value="3">Date d'ajout</option>
                                    </select>
                                </div><!-- /.form-group -->
                            </div>
                        </figure>
                    </section>


                    <section id="advertising">
                        <a href="submit.html">
                            <div class="banner">
                                <div class="wrapper">
                                    <span class="title">Voulez-vous que votre annonce soit répertoriée ici?</span>
                                    <span class="submit">Soumettez-le maintenant! <i class="fa fa-plus-square"></i></span>
                                </div>
                            </div><!-- /.banner-->
                        </a>
                    </section><!-- /#adveritsing-->

                    <section id="properties" class="display-lines">
                        <div class="property">
                            <figure class="tag status">For Sale</figure>
                            <figure class="type" title="Apartment"><img src="assets/img/property-types/apartment.png" alt=""></figure>
                            <div class="property-image">
                                <figure class="ribbon">In Hold</figure>
                                <a href="property-detail.html">
                                    <img alt="" src="assets/img/properties/property-01.jpg">
                                </a>
                            </div>
                            <div class="info">
                                <header>
                                    <a href="property-detail.html"><h3>4862 Palmer Road</h3></a>
                                    <figure>Worthington, OH 43085</figure>
                                </header>
                                <div class="tag price">$ 38,000</div>
                                <aside>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum,
                                        bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt...
                                    </p>
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
                                <a href="property-detail.html" class="link-arrow">Read More</a>
                            </div>
                        </div><!-- /.property -->
                        <div class="property">
                            <figure class="type" title="House Boat"><img src="assets/img/property-types/houseboat.png" alt=""></figure>
                            <div class="property-image">
                                <a href="property-detail.html">
                                    <img alt="" src="assets/img/properties/property-03.jpg">
                                </a>
                            </div>
                            <div class="info">
                                <header>
                                    <a href="property-detail.html"><h3>987 Cantebury Drive</h3></a>
                                    <figure>Golden Valley, MN 55427</figure>
                                </header>
                                <div class="tag price">$ 38,000</div>
                                <aside>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum,
                                        bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt...
                                    </p>
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
                                <a href="property-detail.html" class="link-arrow">Read More</a>
                            </div>
                        </div><!-- /.property -->
                        <div class="property no-border">
                            <figure class="type" title="Single Family"><img src="assets/img/property-types/single-family.png" alt=""></figure>
                            <figure class="tag status">For Rent</figure>
                            <div class="property-image">
                                <a href="property-detail.html">
                                    <img alt="" src="assets/img/properties/property-02.jpg">
                                </a>
                            </div>
                            <div class="info">
                                <header>
                                    <a href="property-detail.html"><h3>2479 Murphy Court</h3></a>
                                    <figure>Minneapolis, MN 55402 </figure>
                                </header>
                                <div class="tag price">$ 100,000</div>
                                <aside>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum,
                                        bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt...
                                    </p>
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
                                <a href="property-detail.html" class="link-arrow">Read More</a>
                            </div>
                        </div><!-- /.property -->

                    

                        <!-- Pagination -->
                        <div class="center">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul><!-- /.pagination-->
                        </div><!-- /.center-->
                    </section>
                </section>
            </div>
            <!-- end Results -->

            <!-- sidebar -->
            <div class="col-md-3 col-sm-3">
                <section id="sidebar">
                    <aside id="edit-search">
                        <header><h3>Propriétés de recherche</h3></header>
                        <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                            
                            <div class="form-group">
                                <select name="country">
                                    <option value="">Département</option>
                                    <option value="1">France</option>
                                    <option value="2">Great Britain</option>
                                    <option value="3">Spain</option>
                                    <option value="4">Russia</option>
                                    <option value="5">United States</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="city">
                                    <option value="">Ville</option>
                                    <option value="1">New York</option>
                                    <option value="2">Los Angeles</option>
                                    <option value="3">Chicago</option>
                                    <option value="4">Houston</option>
                                    <option value="5">Philadelphia</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="district">
                                    <option value="">Catégorie</option>
                                    <option value="1">Manhattan</option>
                                    <option value="2">The Bronx</option>
                                    <option value="3">Brooklyn</option>
                                    <option value="4">Queens</option>
                                    <option value="5">Staten Island</option>
                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <select name="property-type">
                                    <option value="">Sous-catégorie</option>
                                    <option value="1">Apartment</option>
                                    <option value="2">Condominium</option>
                                    <option value="3">Cottage</option>
                                    <option value="4">Flat</option>
                                    <option value="5">House</option>
                                </select>
                            </div><!-- /.form-group -->
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Rechercher</button>
                            </div><!-- /.form-group -->
                        </form><!-- /#form-map -->
                    </aside><!-- /#edit-search -->

                    <aside id="featured-properties">
                        <header><h3>Annonces vedette</h3></header>
                        <div class="property small">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-06.jpg">
                                </div>
                            </a>
                            <div class="info">
                                <a href="property-detail.html"><h4>2186 Rinehart Road</h4></a>
                                <figure>Doral, FL 33178 </figure>
                                <div class="tag price">$ 72,000</div>
                            </div>
                        </div><!-- /.property -->
                        <div class="property small">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-09.jpg">
                                </div>
                            </a>
                            <div class="info">
                                <a href="property-detail.html"><h4>2479 Murphy Court</h4></a>
                                <figure>Minneapolis, MN 55402</figure>
                                <div class="tag price">$ 36,000</div>
                            </div>
                        </div><!-- /.property -->
                        <div class="property small">
                            <a href="property-detail.html">
                                <div class="property-image">
                                    <img alt="" src="assets/img/properties/property-03.jpg">
                                </div>
                            </a>
                            <div class="info">
                                <a href="property-detail.html"><h4>1949 Tennessee Avenue</h4></a>
                                <figure>Minneapolis, MN 55402</figure>
                                <div class="tag price">$ 128,600</div>
                            </div>
                        </div>
                    </aside>
                    
                </section>
            </div>
            
        </div>
    </div>


@endsection