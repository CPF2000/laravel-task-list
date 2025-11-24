<h1>Hello Index!</h1>
<div>
    @if (count($mytasks))
        @foreach ($mytasks as $task)
            <div>
                <a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </div>

        @endforeach
    @else
        <h2>No Tasks Yet</h2>
    @endif
    
</div>

<div>
    @forelse ($mytasks as $task)
        <p>{{ $task->long_description }}</p>
    @empty
        <h2>No Tasks Yet</h2>
    @endforelse
</div>
@isset($name2)
    <p>My name is {{ $name2 }}</p>
@endisset
<p>Today is {{ date('l, F jS Y') }}</p>

