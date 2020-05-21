<?php $tabuniqid = 'tab-'.$uniqid; ?>
<ul class="nav nav-tabs" id="{{ $tabuniqid }}" role="tablist">
    @multilangualForm
    <li class="nav-item">
        <a class="nav-link{{ $loop->index == 0 ? ' active' : '' }}"
           id="{{ $tabuniqid.$locale->code }}-tab"
           data-toggle="tab"
           href="#{{ $tabuniqid.$locale->code }}"
           role="tab"
           aria-controls="{{ $tabuniqid.$locale->code }}"
           aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}">{{ $locale->name }}</a>
    </li>
    @endMultilangualForm
</ul>
<div class="tab-content" id="{{ $tabuniqid }}-content">
    @multilangualForm
    <div class="tab-pane fade{{ $loop->index == 0 ? ' show active' : '' }}"
         id="{{ $tabuniqid.$locale->code }}"
         role="tabpanel"
         aria-labelledby="{{ $tabuniqid.$locale->code }}-tab">
        <div class="py-2">
            @stack($uniqid.$locale->code)
        </div>
    </div>
    @endMultilangualForm
</div>
