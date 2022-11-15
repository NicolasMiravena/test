
@foreach($lista as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->nombreIndicador }}</td>
    <td>{{ $item->codigoIndicador }}</td>
    <td>{{ $item->unidadMedidaIndicador }}</td>
    <td>{{ $item->valorIndicador }}</td>
    <td>{{ $item->fechaIndicador }}</td>
    <td>{{ $item->origenIndicador }}</td>
    <td>
        <a href="#" class="btn btn-warning edit" data-id='{{ $item->id }}' 
            data-nombre="{{ $item->nombreIndicador}}" data-codigo="{{ $item->codigoIndicador}}" 
            data-medida="{{ $item->unidadMedidaIndicador}}" data-valor="{{ $item->valorIndicador}}"
            data-fecha="{{ $item->fechaIndicador}}" data-origen="{{ $item->origenIndicador}}">Editar</a>

        <a href="#" class="btn btn-danger delete" data-id='{{ $item->id }}'>Eliminar</a>
    </td>
</tr>
@endforeach


