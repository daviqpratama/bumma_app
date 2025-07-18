<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Buku Besar - Excel</title>
</head>
<body>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No Ref</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ number_format($item->debit, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->kredit, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->saldo, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
