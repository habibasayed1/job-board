<nav {{$attributes}} >
    <ul class="flex space-x-4 text-slate-500 ">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach($links as $label => $url)
            <li>→</li>
            <li>
                <a href="{{ $url }}">{{ $label }}</a>
            </li>
        @endforeach

        @if(isset($job))
            <li>→</li>
            <li class="text-gray-500">{{ $job->title }}</li>
        @endif
    </ul>
</nav>
