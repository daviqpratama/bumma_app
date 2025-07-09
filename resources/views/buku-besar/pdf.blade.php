<h2>Buku Besar - PDF</h2>
<table border="1">
    <tr>
        <th>Tanggal</th>
        <th>Akun</th>
        <th>Debit</th>
        <th>Kredit</th>
    </tr>
    @foreach($data as $row)
    <tr>
        <td>{{ $row->tanggal }}</td>
        <td>{{ $row->akun }}</td>
        <td>{{ $row->debit }}</td>
        <td>{{ $row->kredit }}</td>
    </tr>
    @endforeach
</table>
