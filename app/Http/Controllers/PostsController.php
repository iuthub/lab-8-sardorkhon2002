<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostsRepo;
use Illuminate\Session\Store;


class PostsController extends Controller
{

    public function getIndex(Store $session) {
        $postsRepo = new PostsRepo($session);

        return view('blog.index', [
            'posts' => $postsRepo->getPosts()
        ]);
    }


    public function getBlogPost($id, Store $session) {
        $postsRepo = new PostsRepo($session);

        return view('blog.post', [
            'post' => $postsRepo->getPost($id)
        ]);
    }

    public function getBlogPostByTitle($title, Store $session) {
        $postsRepo = new PostsRepo($session);

        return view('blog.post', [
            'post' => $postsRepo->getPostByTitle($title)
        ]);
    }

    public function getOthersAbout() {
        return view('others.about');
    }

    public function getAdminIndex(Store $session) {

        $postsRepo = new PostsRepo($session);

        return view('admin.index', [
            'posts' => $postsRepo->getPosts()
        ]);
    }

    public function getAdminEdit($id, Store $session) {
        $postsRepo = new PostsRepo($session);
        $post = $postsRepo->getPost($id);

        return view('admin.edit', [
            'post' => $post,
            'postId' => $id
        ]);
    }

    public function postAdminEdit(Request $req, Store $session) {
        $this->validate($req, [
            'title' => 'required|min:5',
            'body' => 'required|min:5'
        ]);

        $postsRepo = new PostsRepo($session);
        $postsRepo->updatePost(
            $req->input('id'),
            $req->input('title'),
            $req->input('body')
        );

        return redirect()->route('adminIndex')->with([
            'info'=>'Successfully updated! Post title is '. $req->input('title')
        ]);
    }

    public function getAdminCreate() {
        return view('admin.create');
    }


    public function postAdminCreate(Store $session, Request $req) {
        $this->validate($req, [
            'title' => 'required|min:5',
            'body' => 'required|min:5'
        ]);

        $postsRepo = new PostsRepo($session);
        $postsRepo->addPost(
            $req->input('title'),
            $req->input('body')
        );

        return redirect()->route('adminIndex')->with([
            'info'=>'Successfully created! Post title is '. $req->input('title')
        ]);
    }

    public function getAdminDelete(Store $session, $id) {
        $postsRepo = new PostsRepo($session);
        $postsRepo->deletePost($id);

        return redirect()->route('adminIndex')->with([
            'info'=>'Successfully deleted!  Post id is '. $id
        ]);
    }




}
