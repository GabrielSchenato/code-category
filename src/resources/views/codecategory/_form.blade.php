<div class="form-group">
    {!! Form::label('Parent', 'Parent:') !!}
    <select name="parent_id" class="form-control">
        <option value="" disabled selected>-None-</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Active', 'Active:') !!}
    {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
</div>