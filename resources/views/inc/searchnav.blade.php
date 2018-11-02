<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="navbar navbar-inverse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
                @guest
                    <li class="nav-item">
                        please log in first
                    </li>
                @else
                    {!! Form::open(['action' => 'PagesController@discover', 'method' => 'GET']) !!}
                    <div class="form-group">
                        {{ Form::label('tags', 'Tag') }}
                        <select class="form-control" id="exampleFormControlSelect1" name="tags">
                            <option value="" selected disabled>Please select</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::submit('search') }}
                    </div>
                    {!! Form::close() !!}
                @endguest
            </ul>
        </div>
    </div>
</nav>