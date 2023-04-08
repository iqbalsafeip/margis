<table border="1px black solid" >
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Nama Perusahaan
            </th>
            <th>
                Alamat
            </th>
            <th>Tipe Market</th>
            <th>
                Kecamatan
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($market as $i => $m)
            <tr>
                <td>{{$i + 1}}</td>
                <td>{{$m->nama_perusahaan}}</td>
                <td>{{$m->alamat}}</td>
                <td>{{$m->tipe_market}}</td>
                <td>{{$m->kecamatan->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>