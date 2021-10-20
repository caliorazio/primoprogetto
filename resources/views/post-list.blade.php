<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <title> Lettera </title>
</head>
 <div class="container px-5 my-5">
 <div class="row justify-content-center">


<body>
<div class="form-floating mb-3">

@if(Session::has('post_delete'))
    <span>{{Session::get('post_delete')}}</span>
@endif


<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
            <th>Descrizione</th>
            <th>Action</th>
</tr>


<style>

    body {
    background: linear-gradient(to right, #0062E6, #33AEFF);
    }
     table{
         background: white;
         border-collapse: collapse;


     }
     td,th{
         padding: 5px;
         border: 2px solid black;

     }
     </style>
@foreach($posts as $post)

<tr>
     <td>{{$post->id}}</td>
     <td>{{$post->name}}</td>
     <td>{{$post->description}}</td>

 <td>   <button type="button" class="btn btn-success"> <a style="color:white" href="/edit-post/{{$post->id}}">Modifica </a></button>
    <button type="button" class="btn btn-danger"><a style="color:white" href="/delete-post/{{$post->id}}"> Elimina </button></a> </td></tr>
</a>
     @endforeach

</table> </div></div>

         <button type="button" class="btn btn-danger"><a style="color:white" href="{{route('post.add')}}"> Aggiungi </button></a>
