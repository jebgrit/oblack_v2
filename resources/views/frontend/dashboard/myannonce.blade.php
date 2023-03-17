@extends('frontend.master')

@section('main')

        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Compte</a></li>
                <li class="active">Mes annonces</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-10">
                    <section id="my-properties">
                        <header><h1>Mes annonces</h1></header>
                        <div class="my-properties">
                            <div class="table-responsive">

                                @if ($myannonce->isEmpty())
                                    <p>Vous n'avez pas encore ajouté d'annonce. </p>
                                @else
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Annonces</th>
                                            <th></th>
                                            <th>Date d'ajout</th>
                                            <th>Vues</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($myannonce as $item)
                                                <tr>
                                                    <td class="image">
                                                        <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}"><img alt="" src="{{ asset($item->an_photo) }}"></a>
                                                    </td>
                                                    <td><div class="inner">
                                                        <a href="{{ url('annonce/details/' . $item->id . '/' . $item->slug) }}"><h2>{{ $item->an_title }}</h2></a>
                                                        <figure>{{ $item->an_address }}</figure>
                                                    </div>
                                                    </td>
                                                    <td>{{ $item->created_at->translatedFormat('d F Y') }}</td>
                                                    <td>
                                                        @if (count($item->views) == null)
                                                            <span>0</span>
                                                        @else
                                                            <span>{{ count($item->views) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('delete', $item->id) }}"><i class="text-danger fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>

                            <!-- Pagination -->
                            @if ($myannonce->hasPages())
                                {{ $myannonce->links("vendor.pagination") }}
                            @endif
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>

        

@endsection
