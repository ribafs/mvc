<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Core\Auth;
use Core\Redirect;
use Core\Validator;


class PostsController extends BaseController
{
    private $post;
 
    public function index(){
        $this->setPageTitle('Posts');
        $this->view->posts = Post::all();
        $this->renderView('posts/index', 'layout');
    }

    public function edit($id)
    {
        $this->view->post = Post::find($id)->first();
        //$this->view->post = $this->view->post->find($id);
        $this->view->categories = Category::all();
//print Auth::id() .' - '. $this->view->post->user->id;exit;
        if(Auth::id() != $this->view->post->user->id){
            return Redirect::route('/posts', [
                'errors' => ['Você não pode editar post de outro autor.']
            ]);
        }
        $this->setPageTitle('Edit post - ' . $this->view->post->title);
        return $this->renderView('posts/edit', 'layout');
    }

    public function update($id, $request)
    {
        $data = [
            'title' => $request->post->title,
            'content' => $request->post->content
        ];

        if(Validator::make($data, Post::rules())){
            return Redirect::route("/post/{$id}/edit");
        }

        try{
            $post = Post::find($id);//$this->post->find($id);
            $post->update($data);
            if(isset($request->post->category_id)){
                $post->category()->sync($request->post->category_id);
            }else{
                $post->category()->detach();
            }
            return Redirect::route('/posts', [
                'success' => ['Post atualizado com sucesso!']
            ]);
        }catch(\Exception $e){
            return Redirect::route('/posts', [
                'errors' => [$e->getMessage()]
            ]);
        }
    }

    public function create()// formulário
    {
        $this->setPageTitle('New post');
        $this->view->categories = Category::all();
        return $this->renderView('posts/create', 'layout');
    }

    public function store($request) // inserir dados do form no banco
    {
        $data = [
            'user_id' => Auth::id(),
            'title' => $request->post->title,
            'content' => $request->post->content
        ];

        if (Validator::make($data, Post::rules())) {//$this->post->rules())
            return Redirect::route("/post/create");
        }

        try{
            $post = Post::create($data);// $this->post->create($data)
            if(isset($request->post->category_id)){
                $post->category()->attach($request->post->category_id);
            }
            return Redirect::route('/posts', [
                'success' => ['Post criado com sucesso!']
            ]);
        }catch(\Exception $e){
            return Redirect::route('/posts', [
                'errors' => [$e->getMessage()]
            ]);
        }

        /*if($this->post->create($data)){
            return Redirect::route('/posts');
        }else{
            return Redirect::route('/posts', [
                'errors' => ['Erro ao inserir no banco de dados!']
            ]);
        }*/
    }

    public function show($id)
    {
        $this->view->post = Post::find($id);//$this->post->find($id);
        $this->setPageTitle("{$this->view->post->title}");
        return $this->renderView('posts/show', 'layout');
    }

    public function delete($id)
    {
        try{
            $post = Post::find($id);// $this->post->find($id)
            if(Auth::id() != $post->user->id){
                return Redirect::route('/posts', [
                    'errors' => ['Você não pode excluir post de outro autor.']
                ]);
            }
            $post->delete();
            return Redirect::route('/posts', [
                'success' => ['Post excluído com sucesso!']
            ]);
        }catch(\Exception $e){
            return Redirect::route('/posts', [
                'errors' => [$e->getMessage()]
            ]);
        }
   }

}
