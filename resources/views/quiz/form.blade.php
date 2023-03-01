<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($quiz->group_id) ? $quiz->group_id : ''}}" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quiz') ? 'has-error' : ''}}">
    <label for="quiz" class="control-label">{{ 'Quiz' }}</label>
    <input class="form-control" name="quiz" type="text" id="quiz" value="{{ isset($quiz->quiz) ? $quiz->quiz : ''}}" >
    {!! $errors->first('quiz', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
