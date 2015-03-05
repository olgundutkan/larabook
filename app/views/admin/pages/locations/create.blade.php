<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Create New Country</h1>
            {{ Form::open(['route' => 'admin.locations.store', 'class' => '', 'role' => 'form', 'method' => 'POST']) }}
                {{ Form::hidden('parent_id', 0) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name:', ['for' => 'name']) }}
                    {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Create!', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>