@extends('../layouts/master')
@section('content')
<button class="btn btn-primary" onclick="location.href='/{{ $type }}/inserir'">Inserir</button>
<table class="table">
    <thead>
        <tr>

            @foreach ($labels as $label)
            <th scope="col">{{ $label }}</th>
            @endforeach

            <th scope="col" style="background-color:#BBBBBB">Operações</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($objects as $object)
        <tr>

            @foreach ($attributes as $attribute)
            <td>{{ $object[$attribute] }}</td>
            @endforeach

            <td style="background-color:#DDDDDD">
                <a href="/{{ $type }}/editar/{{ $object['id'] }}"><b>Editar</b></a>
                <span style="display:inline-block; width: 8px;"></span>
                <a href="/{{ $type }}/excluir/{{ $object['id'] }}"><b>Excluir</b></a>
            </td>

        </tr>
        @endforeach
    
    </tbody>
</table>
@stop