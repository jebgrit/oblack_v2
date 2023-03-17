@extends('frontend.master')

@section('main')


        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Compte</a></li>
                <li class="active">Mes favoris</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">
            
                <div class="col-md-12 col-sm-10">
                    <section id="my-properties">
                        <header><h1>Annonces sauvegardées</h1></header>
                        <div class="my-properties">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="image">
                                            <a href="property-detail.html"><img alt="" src="assets/img/properties/property-04.jpg"></a>
                                        </td>
                                        <td><div class="inner">
                                            <a href="property-detail.html"><h2>987 Cantebury Drive</h2></a>
                                            <figure>Golden Valley, MN 55427</figure>
                                        </div>
                                        </td>
                                        <td class="actions">
                                            <a href="#"><i class="delete fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>


                            <!-- Pagination -->
                            
                        </div>
                    </section>
                </div>

            </div>
        </div>

@endsection
