<div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}">
    <label for="number" class="control-label">{{ 'Number' }}</label>
    <input class="form-control" name="number" type="number" id="number"
        value="{{ isset($question->number) ? $question->number : '' }}">
    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
    <label for="text" class="control-label">{{ 'Soal' }}</label>
    <input class="form-control" name="text" type="text" id="text"
        value="{{ isset($question->text) ? $question->text : '' }}">
    {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer1') ? 'has-error' : '' }}">
    <label for="answer1" class="control-label">{{ 'Answer 1' }}</label>
    <input class="form-control" name="answer1" type="text" id="answer1"
        value="{{ isset($question->answer1) ? $question->answer1 : '' }}">
    {!! $errors->first('answer1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer2') ? 'has-error' : '' }}">
    <label for="answer2" class="control-label">{{ 'Answer 2' }}</label>
    <input class="form-control" name="answer2" type="text" id="answer2"
        value="{{ isset($question->answer2) ? $question->answer2 : '' }}">
    {!! $errors->first('answer2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer3') ? 'has-error' : '' }}">
    <label for="answer3" class="control-label">{{ 'Answer 3' }}</label>
    <input class="form-control" name="answer3" type="text" id="answer3"
        value="{{ isset($question->answer3) ? $question->answer3 : '' }}">
    {!! $errors->first('answer3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('answer4') ? 'has-error' : '' }}">
    <label for="answer4" class="control-label">{{ 'Answer 4' }}</label>
    <input class="form-control" name="answer4" type="text" id="answer4"
        value="{{ isset($question->answer4) ? $question->answer4 : '' }}">
    {!! $errors->first('answer4', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
