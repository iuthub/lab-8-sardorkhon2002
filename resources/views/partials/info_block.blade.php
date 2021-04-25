@if(Session::has('info'))
    <div class="article info">
        <div class="article-body">
            {{ Session::get('info') }}
        </div>
    </div>
@endif
