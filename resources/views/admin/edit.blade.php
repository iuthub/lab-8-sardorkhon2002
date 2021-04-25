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
                    <td class="title">Title</td>
                    <td>
                        <input type="text" style="width:400px;"
                               name="title"
                               form="postForm"
                               value="{{ $post['title'] }}"

                        />
                    </td>
                </tr>
                <tr>
                    <td class="bodyy">Body</td>
                    <td>
                        <textarea name='body' form='postForm' style="width:400px;" rows="10" cols="50">{{ $post['body'] }}</textarea>
                    </td>
                </tr>

            </table>

        </div>
        <div class="article-footer">
            <div class="article-meta">

            </div>
            <div class="article-actions">
                <form id="postForm" action="{{ route('adminEditPost') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $postId }}">

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

@endsection
