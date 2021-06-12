<head>
    <meta name="viewport" content="width=device-width,
    initial-scale=1">
    <title>Data Perpustakaan</title>
    <style>
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        }
        thead {
        background-color: #94d0cc;
        }
        th, td {
        text-align: left;
        padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
        .tambah{
        padding: 8px 16px ;
        text-decoration: none;
        }
    </style>
</head>
<body>
    <div style="overflow-x:auto;">
    <a href="/Perpus/export" target="_blank">EXPORT EXCEL</a>
    
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Tahun terbit</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($buku as $bk)
            <tr>
                <td>{{ $bk->id }}</td>
                <td>{{ $bk->judul }}</td>
                <td>{{ $bk->tahun_terbit }}</td>
                <td>{{ $bk->jenis }}</td>
                <td>
                    <a class="tambah" href="{{ url('perpus_0175/' . $bk->id . '/edit') }}">Edit</a>
                    |
                    <a class="tambah" href="{{ route('perpus_0175.create') }}">Tambah</a>
                    |
                    <form action="{{ url('perpus_0175/' . $bk->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>