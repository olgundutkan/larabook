@include('layouts.partials.errors')

<div class="status-post">
    {{ Form::open(['route' => 'subjects_path']) }}
        <!-- Subject Form Input -->
        <div class="form-group">
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Create a new subject', 'tabindex' => '1']) }}
        </div>

        <div class="form-group status-post-submit">
            {{ Form::submit('Post Subject', ['class' => 'btn btn-default btn-xs', 'tabindex' => '1']) }}
        </div>
    {{ Form::close() }}
</div>