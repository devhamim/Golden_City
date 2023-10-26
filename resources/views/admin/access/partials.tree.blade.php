<li>
    <a href="#">{{ $user->name }}</a>
    @if ($user->leftChild || $user->rightChild)
        <ul>
            @if ($user->leftChild)
                @include('partials.tree', ['user' => $user->leftChild])
            @endif
            @if ($user->rightChild)
                @include('partials.tree', ['user' => $user->rightChild])
            @endif
        </ul>
</li>
</ul>
