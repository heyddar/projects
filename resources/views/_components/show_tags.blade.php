@if(isset($tags) && count($tags))
    <style>
        .a{
            background-color: #fcfff8d6;
            padding: 0.2rem;
            border-radius: 3px;
            color: #1b18e8;
        }
    </style>
    <div class="entry__tags">
        @foreach($tags as $tag)
            <a href="{{ route('tags', [$tag->id, str_slug($tag->name)]) }}" >{{ $tag->name }}</a>
        @endforeach
    </div>
@else
    موردی یافت نشد.
@endif