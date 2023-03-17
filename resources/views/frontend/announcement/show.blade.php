@extends('frontend.master')

@section('main')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Accueil</a></li>
            <li class="active">{{ $annonce->an_title }}</li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <!-- Property Detail Content -->
            <div class="col-md-9 col-sm-9">
                <section id="property-detail">
                    <header class="property-title">
                        <h1>{{ $annonce->an_title }}</h1>
                        <figure>{{ $annonce->an_address }}</figure>
                        <span class="actions">
                            <a href="#" class="fa fa-flag"></a>
                            <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Sauvegarder l'annonce</span><span class="title-added">Annonce sauvegardée</span></a>
                        </span>
                    </header>
                    <section id="property-gallery">
                        <div class="owl-carousel property-carousel">

                            @foreach ($galerie as $item)
                                <div class="property-slide">
                                    <a href="{{ asset($item->url) }}" class="image-popup">
                                        <div class="overlay"><h3>Front View</h3></div>
                                        <img alt="" src="{{ asset($item->url) }}" style="width: 950px; height:480px;">
                                    </a>
                                </div>
                            @endforeach
                            
                        </div>
                        <a href="">Signaler l'annonce</a>
                    </section>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <section id="quick-summary" class="clearfix">
                                <header><h2>Critères</h2></header>
                                <dl>
                                    
                                    @if ($annonce->an_type == null)
                                        
                                    @else
                                        <dt>Type:</dt>
                                            <dd>{{ $annonce->an_type }}</dd>
                                    @endif

                                    @if ($annonce->an_size == null)
                                        
                                    @else
                                        <dt>Taille:</dt>
                                            <dd>{{ $annonce->an_size }}</dd>
                                    @endif

                                    @if ($annonce->an_color == null)
                                        
                                    @else
                                        <dt>Couleur:</dt>
                                            <dd>{{ $annonce->an_color }}</dd>
                                    @endif

                                    @if ($annonce->an_brand == null)
                                        
                                    @else
                                        <dt>Marque:</dt>
                                            <dd>{{ $annonce->an_brand }}</dd>
                                    @endif
                                    
                                </dl>
                            </section>
                        </div>

                        <div class="col-md-8 col-sm-12">
                            <section id="description">
                                <header><h2>Description de l'annonce</h2></header>
                                <p>
                                    {{ $annonce->an_description }}
                                </p>
                            </section>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <section id="contact-agent">
                                <header><h2>Contacter l'echangeur</h2></header>
                                <div class="row">
                                    <section class="agent-form">
                                        <div class="col-md-7 col-sm-12">
                                            <aside class="agent-info clearfix">
                                                <figure><a href="agent-detail.html"><img alt="" src="{{ !empty($annonce->user->photo) ? url('upload/autre/' . $annonce->user->photo) : url('frontend/assets/img/client-01.jpg') }}"></a></figure>
                                                <div class="agent-contact-info">
                                                    <h3>{{ $annonce->user->name }}</h3>
                                                    <p>
                                                        {{ $annonce->user->short_info }}
                                                    </p>
                                                    <dl>
                                                        @if ($annonce->user->phone == null)
                                                            <!-- -->
                                                        @else
                                                            <dt>Numéro:</dt>
                                                            <dd>(+33) {{ $annonce->user->phone }}</dd>
                                                        @endif

                                                        @if ($annonce->user->email == null)
                                                            <!-- -->
                                                        @else
                                                            <dt>Email:</dt>
                                                            <dd><a href="mailto:{{ $annonce->user->email }}">{{ $annonce->user->email }}</a></dd>
                                                        @endif
                                                        
                                                    </dl>
                                                    <hr>
                                                    <a href="agent-detail.html" class="link-arrow">Profile détaillé</a>
                                                </div>
                                            </aside>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <div class="agent-form">
                                                <form role="form" id="form-contact-agent" method="post"  class="clearfix">
                                                    <div class="form-group">
                                                        <label for="form-contact-agent-message">Votre message<em>*</em></label>
                                                        <textarea class="form-control" id="form-contact-agent-message" rows="2" name="form-contact-agent-message" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn pull-right btn-default" id="form-contact-agent-submit">Envoyer un message</button>
                                                    </div>
                                                    <div id="form-contact-agent-status"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </section>                            
                            
                        </div>
                    </div>
                </section>
            </div>

            <!-- sidebar -->
            
            
        </div>
    </div>

    

@endsection
