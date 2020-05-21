@if(isset($can['ability'], $can['model'])
    && Gate::allows($can['ability'], $can['model'])
    || ! isset($can))
    <li class="nav-item{{ isset($tree) && is_array($tree) ? ' has-treeview' : '' }}">
        <a href="{{ $url ?? '#' }}"
           class="nav-link{{ isset($isActive) && $isActive ?  ' active' : '' }}">
            @isset($icon)
                <i class="nav-icon {{ $icon }}"></i>
            @endisset
            <p>
                {{ $name }}

                @isset($badge)
                    <span class="right badge badge-{{ $badgeLevel ?? 'danger' }}">{{ $badge }}</span>
                @endisset

                @if(isset($tree) && is_array($tree))
                    <i class="right fas fa-angle-right"></i>
                @endif
            </p>
        </a>
        @if(isset($tree) && is_array($tree) && count($tree))
            <ul class="nav nav-treeview">
                @foreach($tree as $item)
                    @if(isset($item['can']['ability'], $item['can']['model'])
                        && Gate::allows($item['can']['ability'], $item['can']['model'])
                        || ! isset($item['can']))
                        <li class="nav-item">
                            <a href="{{ $item['url'] }}"
                               class="nav-link{{ isset($item['isActive']) && $item['isActive'] ? ' active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    {{ $item['name'] }}
                                    @isset($item['badge'])
                                        <span class="right badge badge-{{ $item['badgeLevel'] ?? 'danger' }}">
                                    {{ $item['badge'] }}
                                </span>
                                    @endisset
                                </p>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </li>
@endif
