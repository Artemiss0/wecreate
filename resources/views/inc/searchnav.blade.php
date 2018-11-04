<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="navbar navbar-inverse" id="navbarSupportedContent">
            <ul class="nav navbar-nav searchnav">
                @guest
                    <li class="nav-item">
                        please log in first
                    </li>
                @else
                    {!! Form::open(['action' => 'PagesController@index', 'method' => 'GET']) !!}
                    @csrf
                    {{ Form::label('tags', 'Tag') }}
                    <li>
                        <select class="form-control" id="exampleFormControlSelect1" name="tags">
                            <option value="0" selected disabled>Please select</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li>
                        {{ Form::submit('search') }}
                    </li>
                    {!! Form::close() !!}
                @endguest
            </ul>
        </div>
    </div>
</nav>