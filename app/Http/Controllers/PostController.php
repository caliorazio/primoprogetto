<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /*
    public function index()
    {

        $result = Post::all();
        return $result;
    }
/*
  /*  public function addPost()
    {
        return view('add-post');

    }

    public function savePost(Request $request)
    {
        DB::table('posts')->insert([
            'name' => $request->name,
            'description' => $request->description

        ]);

        return back()->with('post_add', 'Lettera Aggiunta');
    }

    public function postList()
    {

        $posts = DB::table('posts')->get();
        return view('post-list', compact('posts'));
    }


    public function editPost($id)
    {

        $post = DB::table('posts')->where('id', $id)->first();
        return view('edit-post', compact('post'));


    }

    public function updatePost(Request $request)
    {
        DB::table('posts')->where('id', $request->id)->update([


            'name' => $request->name,
            'description' => $request->description
        ]);

        return back()->with('post_update', 'Post Modificato');
    }


*/
    public function index(Request $request)
    {
        try {
            $skip = $request->input('start', 0);
            $take = $request->input('length', 48);
            $event = strtoupper($request->get('search'));

            $Posts = Posts::where('name', 'description', '%'.$event.'%');
            $count = $Posts->count();
            //se la tabella prevede un ordinamento allora aggiungere un orderBy alla query
            //skip = numero pagina in paginazione
            //take = limite risultati in una pagina


            $Posts = $Posts != NULL ? $Posts->skip($skip)->take($take)->get() : $Posts;
            //è utile ritornare il conteggio dei risultati per il frontend
            return Utility::result($Posts, $count);
        } catch (\Exception $ex) {
            return Utility::exception($ex);
        }
    }

    public function getPost(Request $request)
    {

        $q = $request->get('q');

        if($q == null) {
        return response()->json(Posts::all(), 200);

        }
        else if($q != null) {
           $post = Posts::where('name', 'LIKE', '%'.$q.'%')->get();

            return response()->json($post, 200);

        }


    }

    public function getPostById($id)
    {
        $Posts = Posts::find($id);
        if (is_null($Posts)) {
            return response()->json(['message' => 'Non trovato'], 404);

        }
        return response()->json($Posts::find($id), 200);


    }


    public function addPost(Request $request)
    {
        $Posts = Posts::create($request->all());
        return response($Posts, 201);

}





public function deletePost($id)

{
    $Posts = Posts::find($id);
  if (is_null($Posts)) {
      return response()->json(['message' => 'Non trovato'], 404);

  }
        $Posts->delete();
  return response()->json(null, 202);
}


public function updatePost(Request $request, $id) {
        $Posts = Posts::find($id);
        if(is_null($Posts)){
            return response()->json(['message' => 'non va'] , 404);

        }
        $Posts->update($request->all());
        return response()->json($Posts, 202);
}




public function search(Request $request){


}
}
