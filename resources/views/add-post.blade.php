<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">


     <title> Aggiungi </title>
</head>











<style>body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .btn-new {
        color: #fff;
        background-color: #ff001a;
        border-color: #fd0d29;
    }
</style>


<div class="container px-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 rounded-3 shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="h1 fw-light">Invia la tua richiesta</div>

                    </div>



                    <!-- Name Input -->
                        <div class="form-floating mb-3">
                            @if(Session::has('post_add'))
                                <span>{{Session::get('post_add')}}</span>
                            @endif


                            <form method="POST" action="{{route('save.post')}}">
                                @csrf
                                <label for="name">Nome</label>
                            <input class="form-control" name="name" type="text" name="Name" data-sb-validations="required" />

                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                        </div>


                        <!-- Message Input -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" type="text" name="Descrizione" style="height: 10rem;" data-sb-validations="required"></textarea>
                            <label for="message">Descrizione</label>
                        </div>


                        <!-- Submit button -->
                        <div class="d-grid">
                            <button type="submit" value="Entra" class="btn btn-primary btn-lg btn-block">Invia</button>

                            <br>
                            <button type="button" class="btn btn-new btn-lg btn-block"><a style="color:white" href="{{route('post.list')}}">Visualizza Richieste</button>


                        </div>
                    </form>
                    <!-- End of contact form -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

