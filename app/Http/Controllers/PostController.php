<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
      //fetch 5 posts from database which are active and latest
      $posts = Post::where('active',1)->orderBy('created_at','desc')->get();
      //page heading
      $title = 'Latest Posts';
      //return home.blade.php template from resources/views folder
      return view('site.news')->withPosts($posts)->withTitle($title);
    }

    public function list()
    {
      $posts = Post::all();
      return view('admin.news')->withPosts($posts);
    }
  
    public function create()
    {
      return view('admin.news-new');
    }

    public function store(Request $request)
    {
      dd($request);
      $post = new Post();
      $post->title = $request->get('title');
      $post->body = $request->get('body');
      $post->seodescription = $request->get('seodescription');
      $post->seotitle = $request->get('seotitle');
      $post->slug = $request->get('slug');
  
      $duplicate = Post::where('slug', $post->slug)->first();
      if ($duplicate) {
        return redirect('new-post')->withErrors('Title already exists.')->withInput();
      }
  
      if ($request->has('save')) {
        $post->active = 0;
        $message = 'Draft saved successfully';
      } else {
        $post->active = 1;
        $message = 'Post published successfully';
      }
      $post->save();
      return redirect('/admin/site-news/edit/' . $post->slug)->withMessage($message);
    }

    public function show($slug)
  {
    $post = Post::where('slug',$slug)->first();
    return view('site.article')->withPost($post);
  }


  public function edit(Request $request,$slug)
  {
    $post = Post::where('slug',$slug)->first();
    if($post)
      return view('admin.news-edit')->with('post',$post);
  }

  public function update(Request $request)
  {
    //
    $post_id = $request->input('post_id');
    $post = Post::find($post_id);
    if ($post && ($post->author_id == $request->user()->id || $request->user()->id == '1')) {
      $title = $request->input('title');
      $slug = Str::slug($title);
      $duplicate = Post::where('slug', $slug)->first();
      if ($duplicate) {
        if ($duplicate->id != $post_id) {
          return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
        } else {
          $post->slug = $slug;
        }
      }

      $post->title = $title;
      $post->body = $request->input('body');

      if ($request->has('save')) {
        $post->active = 0;
        $message = 'Post saved successfully';
        $landing = 'edit/' . $post->slug;
      } else {
        $post->active = 1;
        $message = 'Post updated successfully';
        $landing = $post->slug;
      }
      $post->save();
      return redirect($landing)->withMessage($message);
    } else {
      return redirect('/')->withErrors('you have not sufficient permissions');
    }
  }


  public function destroy(Request $request, $id)
  {
    //
    $post = Post::find($id);
    if($post && ($post->author_id == $request->user()->id || $request->user()->is_admin()))
    {
      $post->delete();
      $data['message'] = 'Post deleted Successfully';
    }
    else 
    {
      $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
    }
    return redirect('/')->with($data);
  }

  
}
