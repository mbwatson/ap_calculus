<div class="row">
  <div class="btn-group col-md-5" data-toggle="buttons" style="display: flex;">
      <label class="btn btn-primary {{ (isset($question->type) && $question->type == 'Free Response') ? 'active' : ''}}" style="flex: 1;">
          <input type="radio" name="type" autocomplete="off" value="1"  {{ (isset($question->type) && $question->type == 'Free Response') ? 'checked' : ''}}> <span class="fa fa-pencil-square-o"></span> Free Response
      </label>
      <label class="btn btn-primary {{ (isset($question->type) && $question->type == 'Multiple Choice') ? 'active' : ''}}" style="flex: 1;">
          <input type="radio" name="type" autocomplete="off" value="2" {{ (isset($question->type) && $question->type == 'Multiple Choice') ? 'checked' : ''}}> <span class="fa fa-list"></span> Multiple Choice
      </label>
  </div>
  <div class="btn-group col-md-5 col-md-offset-1" data-toggle="buttons" style="display: flex;">
      <label class="btn btn-primary {{ (isset($question->calculator) && $question->calculator == 'Inactive') ? 'active' : ''}}" style="flex: 1;">
          <input type="radio" name="calculator" autocomplete="off" value="0" {{ (isset($question->calculator) && $question->calculator == 'Inactive') ? 'checked' : ''}}> <span class="fa fa-minus"></span> Calculator Inactive
      </label>
      <label class="btn btn-primary {{ (isset($question->calculator) && $question->calculator == 'Active') ? 'active' : ''}}" style="flex: 1;">
          <input type="radio" name="calculator" autocomplete="off" value="1" {{ (isset($question->calculator) && $question->calculator == 'Active') ? 'checked' : ''}}> <span class="fa fa-plus"></span> Calculator Active
      </label>
  </div>
</div>
<br />

{!! Form::text('title', null, ['class' => 'form-control form-title', 'placeholder' => 'Enter Title Here']) !!}

<div class="form-group">
    <div class="row" id="post">
        <div class="col-xs-2 text-center">
            <div class="{{ Auth::user()->isOnline() ? 'active-' : '' }}user text-center">
                <img class="avatar" src="{{ url('/') }}/avatars/{{ Auth::user()->avatar }}"><br />
                <span class="username">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="col-xs-10">
          {!! Form::textarea('body', null, ['id' => 'post-textarea', 'class' => 'form-control body']) !!}

          <br />

          <select class="form-control" id="standard_list" name="standards[]" multiple>
            @foreach ($standards as $standard)
              @if (isset($question))
                <option value="{{ $standard->id }}" {{ in_array($standard->id, $question->standards->lists('id')->toArray()) ? 'selected' : '' }}>
              @else
                <option value="{{ $standard->id }}">
              @endif
                {{ $standard->name }}: {{ $standard->description }}
              </option>
            @endforeach
          </select>
        </div>
    </div>
</div>

{!! Form::submit('Save Question', ['class' => 'btn btn-primary btn-block']) !!}