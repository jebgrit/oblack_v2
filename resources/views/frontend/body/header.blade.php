<div class="navigation">
    <div class="secondary-navigation">
        <div class="container">
            <div class="contact">
                <figure><strong>Email:</strong>oblack@support.com</figure>
            </div>
            <div class="user-area">
                <div class="actions">
                    <a href="{{ route('register') }}" class="promoted"><strong>S'inscire</strong></a>
                    <a href="{{ route('login') }}">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <header class="navbar" id="top" role="banner">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand nav" id="brand">
                    <a href="index-google-map-fullscreen.html"><img src="assets/img/logo.png" alt="brand"></a>
                </div>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Accueil</a></li>
                    <li><a href="#">Blog</a></li>
                    
                    <li class="has-child"><a href="#">Admin</a>
                        <ul class="child-navigation">
                            <li><a href="{{ route('profile') }}">Profile</a></li>
                            <li><a href="{{ route('myannonce') }}">Mes annonce</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('bookmark') }}">Favoris</a></li>
                    <li><a href="{{ route('chat') }}">Messages</a></li>
                </ul>
            </nav>
            
            <div class="add-your-property">
                <a href="{{ route('submit') }}" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Ajouter une annonce</span></a>
            </div>
        </header>
    </div>
</div>