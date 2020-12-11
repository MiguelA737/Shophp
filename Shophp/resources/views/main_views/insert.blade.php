@extends('../layouts/master')
@section('content')
<div style="width:90%; margin: auto;">
    <form method="{{ $method }}" action="{{ $action }}">
    
    
        @for ($i = 0; $i < count($attributes); $i++)
        
        <div class="form-group">
            <label for="{{ $attributes[$i] }}">{{ $labels[$i] }}</label>

                @if ($fields[$attributes[$i]]['element'] == 'input')
                <input class="form-control" type="{{ $fields[$attributes[$i]]['type'] }}" name="{{ $attributes[$i] }}" id="{{ $attributes[$i] }}">
                @elseif ($fields[$attributes[$i]]['element'] == 'select')
                <select class="form-control" name="{{ $attributes[$i] }}" id="{{ $attributes[$i] }}">
                    
                    @for ($j = 0; $j < count($fields[$attributes[$i]]['options']); $j++)

                    <option value = "{{  $fields[$attributes[$i]]['options'][$j]->id  }}">
                        {{  $fields[$attributes[$i]]['options'][$j]->nome  }}
                    </option>
                    @endfor

                </select>
                @endif
        </div>
        @endfor

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@stop