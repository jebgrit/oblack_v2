@extends('frontend.master')

@section('main')

        @php
            $route = Route::current()->getName();
        @endphp

        <style>
            .chat-container {
              width: 500px;
              height: 600px;
              background-color: #fff;
              border-radius: 5px;
              /* box-shadow: 0 0 10px #000; */
              overflow: hidden;
            }
            
            @media only screen and (max-width: 700px) {
              .chat-container {
                width: 90%;
                height: auto;
              }
            }
            
            .chat-header {
              background-color: #333;
              color: #fff;
              display: flex;
              justify-content: space-between;
              align-items: center;
              padding: 10px;
            }
            
            .close-button {
              background-color: transparent;
              border: none;
              color: #fff;
              font-size: 18px;
            }
            
            .chat-body {
              height: 500px;
              overflow-y: scroll;
              padding: 10px;
            }
            
            @media only screen and (max-width: 700px) {
              .chat-body {
                height: auto;
              }
            }
            
            .message-container {
              display: flex;
              flex-direction: column;
            }
            
            .message-item {
              background-color: #f2f2f2;
              border-radius: 10px;
              margin-bottom: 10px;
              padding: 10px;
            }
            
            .sender {
              align-self: flex-end;
              background-color: #333;
              color: #fff;
            }
            
            .receiver {
              align-self: flex-start;
            }
            
            .chat-footer {
              display: flex;
              align-items: center;
              background-color: #f2f2f2;
              padding: 10px;
            }
            
            input[type="text"] {
              width: 80%;
              padding: 10px;
              border-radius: 10px;
              border: none;
              margin-right: 10px;
            }
            
            @media only screen and (max-width: 700px) {
              input[type="text"] {
                width: 60%;
              }
            }
            
            button {
              background-color: #333;
              color: #fff;
              border: none;
              border-radius: 10px;
              padding: 10px 20px;
            }
        </style>

        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Compte</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-2">
                    <section id="sidebar">
                        <header><h3>Compte</h3></header>
                        {{-- <aside>
                            <ul class="sidebar-navigation">
                                <li class="{{ ($route == 'dashboard')? 'active': '' }}"><a href="profile.html"><i class="fa fa-user"></i><span>Profile</span></a></li>
                                <li class="{{ ($route == 'property')? 'active': '' }}"><a href="my-properties.html"><i class="fa fa-home"></i><span>Mes annonces</span></a></li>
                                <li class="{{ ($route == 'chat')? 'active': '' }}"><a href="my-properties.html"><i class="fa fa-comment"></i><span>Conversation</span></a></li>
                                <li class="{{ ($route == 'password')? 'active': '' }}"><a href="my-properties.html"><i class="fa fa-cog"></i><span>Mot de passe</span></a></li>
                                <li class="{{ ($route == 'bookmark')? 'active': '' }}"><a href="bookmarked.html"><i class="fa fa-heart"></i><span>Annonces favorites</span></a></li>
                            </ul>
                        </aside> --}}
                        <aside>
                          <ul class="sidebar-navigation">
                              <li class="{{ ($route == 'dashboard')? 'active': '' }}"><a href="profile.html"><i class="fa fa-user"></i><span>Profile</span></a></li>
                              <li class="{{ ($route == 'property')? 'active': '' }}"><a href="my-properties.html"><i class="fa fa-home"></i><span>Mes annonces</span></a>
                                  <span class="delete-option" style="display: {{ ($route == 'property')? 'inline-block': 'none' }}">Supprimer</span>
                              </li>
                              <li class="{{ ($route == 'chat')? 'active': '' }}"><a href="my-properties.html"><i class="fa fa-comment"></i><span>Conversation</span></a>
                                  <span class="delete-option" style="display: {{ ($route == 'chat')? 'inline-block': 'none' }}">Supprimer</span>
                              </li>
                              <li class="{{ ($route == 'password')? 'active': '' }}"><a href="my-properties.html"><i class="fa fa-cog"></i><span>Mot de passe</span></a></li>
                              <li class="{{ ($route == 'bookmark')? 'active': '' }}"><a href="bookmarked.html"><i class="fa fa-heart"></i><span>Annonces favorites</span></a></li>
                          </ul>
                      </aside>
                      
                    </section>
                </div>

                <div class="col-md-9 col-sm-10">
                    <section id="profile">
                        <header><h1>Chat</h1></header>
                        <div class="account-profile">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img alt="" class="image" src="assets/img/agent-01.jpg">
                                </div>
                                <div class="col-md-9 col-sm-9">


                                    <div class="chat-container">
                                        <div class="chat-body">
                                          <div class="message-container">
                                            <div class="message-item sender">
                                              <p>Bonjour, comment puis-je vous aider aujourd'hui ?</p>
                                            </div>
                                            <div class="message-item receiver">
                                              <p>Bonjour, je suis intéressé par un de vos articles en vente.</p>
                                            </div>
                                            <div class="message-item sender">
                                              <p>Très bien, pouvez-vous me dire lequel vous intéresse ?</p>
                                            </div>
                                            <div class="message-item sender">
                                                <p>Bonjour, comment puis-je vous aider aujourd'hui ?</p>
                                              </div>
                                              <div class="message-item receiver">
                                                <p>Bonjour, je suis intéressé par un de vos articles en vente.</p>
                                              </div>
                                              <div class="message-item sender">
                                                <p>Très bien, pouvez-vous me dire lequel vous intéresse ?</p>
                                              </div>
                                              <div class="message-item sender">
                                                <p>Bonjour, comment puis-je vous aider aujourd'hui ?</p>
                                              </div>
                                              <div class="message-item receiver">
                                                <p>Bonjour, je suis intéressé par un de vos articles en vente.</p>
                                              </div>
                                              <div class="message-item sender">
                                                <p>Très bien, pouvez-vous me dire lequel vous intéresse ?</p>
                                              </div>
                                            
                                          </div>
                                        </div>
                                        <div class="chat-footer">
                                          <input type="text" placeholder="Entrez votre message ici">
                                          <button>Envoyer</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                
            </div>
        </div>

@endsection
