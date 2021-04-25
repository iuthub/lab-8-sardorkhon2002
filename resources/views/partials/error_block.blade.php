@if(count($errors->all())>0)
    <div class="article error">
        <div class="article-body">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
