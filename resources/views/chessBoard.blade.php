<h1>Bảng Cờ Vua {{ $n }} x {{ $n }}</h1>
<table border="1" cellpadding="10">
    @for ($i = 0; $i < $n; $i++)
        <tr>
            @for ($j = 0; $j < $n; $j++)
                @if (($i + $j) % 2 == 0)
                    <td style="background-color: white; width: 50px; height: 50px;"></td>
                @else
                    <td style="background-color: black; width: 50px; height: 50px;"></td>
                @endif
            @endfor
        </tr>
    @endfor
</table>