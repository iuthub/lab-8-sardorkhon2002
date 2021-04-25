@extends('layouts.admin')

@section('content')

    @include('partials.error_block')

    <div class="articledit">
        <div class="article-header">
            <h2>Post Details</h2>
        </div>
        <div class="article-body">
            <table>
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" style="width:400px;" name="title" form="postForm" />
                    </td>
                </tr>
                <tr>
                    <td>Body</td>
                    <td>
                        <textarea name='body' form='postForm' style="width:400px;" rows="10" cols="50"></textarea>
                    </td>
                </tr>

            </table>

        </div>
        <div class="article-footer">
            <div class="article-meta">

            </div>
            <div class="article-actions">
                <form id="postForm" action="{{ route('adminCreatePost') }}" method="post">
                    @csrf

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection
