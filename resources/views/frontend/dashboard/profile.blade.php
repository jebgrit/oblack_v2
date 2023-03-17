@extends('frontend.master')

@section('main')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Compte</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-10">
                    <section id="profile">
                        <header><h1>Profile</h1></header>
                        <div class="account-profile">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <img alt="" class="image" src="{{ !empty($data->photo) ? url('upload/autre/' . $data->photo) : url('frontend/assets/img/client-01.jpg') }}" style="width: 188px; height: 188px">
                                </div>
                                <div class="col-md-9 col-sm-9">


                                    <form method="POST" id="formAccount" class="mt-6 space-y-6" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div id="show_success_alert"></div>

                                        <section id="contact">
                                            <h3>Adresse</h3>
                                            <dl class="contact-fields">
                                                <dt><label for="name">Nom et prénom:</label></dt>
                                                <dd>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
                                                        <div class="text-danger"></div>
                                                    </div>
                                                </dd>

                                                <dt><label for="name">Adresse:</label></dt>
                                                <dd>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ $data->address }}" required>
                                                    </div>
                                                </dd>

                                                <dt><label for="phone">Téléphone:</label></dt>
                                                <dd>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}">
                                                    </div>
                                                </dd>

                                                <dt><label for="email">Email:</label></dt>
                                                <dd>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}">
                                                    </div>
                                                </dd>

                                                <dt><label for="phone">Photo:</label></dt>
                                                <dd>
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" name="photo" id="photo" accept='.jpg,.jpeg,.png'>
                                                    </div>
                                                </dd>

                                            </dl>
                                        </section>


                                        <section id="about-me">
                                            <h3>A propos de vous</h3>
                                            <div class="form-group">
                                                <textarea class="form-control" id="short_info" rows="5" name="short_info">{{ $data->short_info }}</textarea>
                                            </div>

                                        </section>

                                        <div class="form-group clearfix">
                                            <input type="submit" class="btn pull-left btn-default" id="account-submit" value="Enregistrer">
                                        </div>
                                        <br>

                                    </form>


                                    <section id="change-password">
                                        <header><h2>Changer le mot de passe</h2></header>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">

                                                <form method="POST" id="formPasswrd" class="mt-6 space-y-6">
                                                    @csrf

                                                    <div id="show_alert"></div>

                                                    <div class="form-group">
                                                        <label for="old_password">Mot de passe actuel</label>
                                                        <input type="password" class="form-control" id="old_password" name="old_password">
                                                        @error('old_password')<div class="text-danger">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Nouveau mot de passe</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
                                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                        @error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror
                                                    </div>

                                                    <div class="form-group clearfix">
                                                        <input type="submit" class="btn btn-default" id="submit" value="Enregistrer">
                                                    </div>

                                                </form><!-- /#form-account-password -->
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <strong>Conseil:</strong>
                                                <p>Le mot de passe doit avoir 6 caractères minimum, une lettre majuscule, un chiffre et un caractère spécial.
                                                </p>
                                            </div>
                                        </div>
                                    </section>

                                    <br>
                                    <br>


                                    <div class="form-group clearfix">
                                        <button type="button" class="btn pull-left btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                            Supprimer mon compte
                                        </button>
                                    </div>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Êtes-vous sûr de vouloir supprimer votre compte?</h5>
                                            </div>

                                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                                @csrf
                                                @method('delete')

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <p>Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.</p><br>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                                        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-danger">Supprimer le compte</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                
            </div>
        </div>




        <script>
            const textarea = document.querySelector("#short_info");
            const submitButton = document.querySelector("#account-submit");
            let initialValue = textarea.value;
          
            textarea.addEventListener("input", function() {
              if (textarea.value !== initialValue) {
                submitButton.removeAttribute("disabled");
              } else {
                submitButton.setAttribute("disabled", "true");
              }
            });
        </script>


        <script type="text/javascript">
            $(function(){
                $("#formAccount").submit(function(e){
                    e.preventDefault();

                    let formData = new FormData($('#formAccount')[0]);
                    // $("#account-submit").val('Vérification...');
                    $.ajax({
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        url: "/update",
                        success: function(res){
                            
                            // console.log(res);
                            if(res.status == 400){
                                showError('name', res.messages.name);
                                showError('email', res.messages.email);
                                showError('phone', res.messages.phone);
                                showError('address', res.messages.address);
                                showError('short_info', res.messages.short_info);
                                showError('photo', res.messages.photo);
                                $("#account-submit").val('Enregistrer');
                            } else if(res.status == 200) {
                                $("#show_success_alert").html(showMessage('success', res.messages));

                                $('input[name="name"]').val(data.name);
                                $('input[name="email"]').val(data.email);
                                $('input[name="phone"]').val(data.phone);
                                $('input[name="address"]').val(data.address);
                                $('input[name="short_info"]').val(data.short_info);
                                $("#formAccount")[0].reset();
                                removeValidationClasses("#formAccount");
                                // $("#account-submit").val('Enregistrer');

                                // Faire disparaître la notification après 5 secondes
                                // setTimeout(function () {
                                //     $('#show_success_alert').hide();
                                // }, 3000);
                            }
                        }
                    })
                });
            });

            $();
        </script>


        <script type="text/javascript">
            $(function(){
                $("#formPasswrd").submit(function(e){
                    e.preventDefault();
                    $("#submit").val('Vérification...');
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        data: $(this).serialize(),
                        url: "/updatePasswrd",
                        success: function(res){
                            // console.log(res);
                            if(res.status == 400){
                                showError('old_password', res.messages.old_password);
                                showError('password', res.messages.password);
                                showError('password_confirmation', res.messages.password_confirmation);
                                $("#submit").val('Enregistrer');
                            } else if(res.status == 200) {
                                $("#show_alert").html(showMessage('success', res.messages));
                                $("#formPasswrd")[0].reset();
                                removeValidationClasses("#formPasswrd");
                                $("#submit").val('Enregistrer');
                            } else if(res.status == 401) {
                                $("#show_alert").html(showMessage('danger', res.messages));
                                $("#submit").val('Enregistrer');
                            }
                        }
                    })
                });
            });
        </script>

@endsection
