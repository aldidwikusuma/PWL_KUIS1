@if ($table["total"] > 0)
    @switch($table["url"])
    @case("barang")
        @foreach ($table["data"] as $number => $datatablesatuan)
            <tr>
                <td>{{ $number+=1 }}</td>
                <td>{{ $datatablesatuan->name }}</td>
                <td><img src="{{ $datatablesatuan->image }}" alt="{{ $datatablesatuan->name }}"></td>
                <td>{{ $datatablesatuan->stok }}</td>
                <td>Rp. {{ $datatablesatuan->price/1000 }}</td>
                <td>
                    <a href="{{ url("table/" . $table["url"] . "/detail/$datatablesatuan->id") }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url("table/" . $table["url"] . "/edit/$datatablesatuan->id") }}" class="btn btn-warning ml-1">Edit</a>
                </td>
            </tr>
        @endforeach
        @break
    @case("supplier")
        @foreach ($table["data"] as $number => $datatablesatuan)
            <tr>
                <td>{{ $number+=1 }}</td>
                <td>{{ $datatablesatuan->name }}</td>
                <td><img src="{{ $datatablesatuan->image }}" alt="{{ $datatablesatuan->name }}"></td>
                <td>{{ $datatablesatuan->nik }}</td>
                <td>{{ $datatablesatuan->phone }}</td>
                <td>
                    <a href="{{ url("table/" . $table["url"] . "/detail/$datatablesatuan->id") }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url("table/" . $table["url"] . "/edit/$datatablesatuan->id") }}" class="btn btn-warning ml-1">Edit</a>
                </td>
            </tr>
        @endforeach
        @break
    @case("pegawai")
        @foreach ($table["data"] as $number => $datatablesatuan)
            <tr>
                <td>{{ $number+=1 }}</td>
                <td>{{ $datatablesatuan->namaPegawai }}</td>
                <td>{{ $datatablesatuan->jabatan }}</td>
                <td>{{ $datatablesatuan->alamat }}</td>
                <td>{{ $datatablesatuan->noTelp }}</td>
                <td>
                    <a href="{{ url("table/" . $table["url"] . "/detail/$datatablesatuan->id") }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url("table/" . $table["url"] . "/edit/$datatablesatuan->id") }}" class="btn btn-warning ml-1">Edit</a>
                </td>
            </tr>
        @endforeach
        @break
    @case("pelanggan")
        @foreach ($table["data"] as $number => $datatablesatuan)
            <tr>
                <td>{{ $number+=1 }}</td>
                <td>{{ $datatablesatuan->namaPelanggan }}</td>
                <td>{{ $datatablesatuan->alamat }}</td>
                <td>{{ $datatablesatuan->noTelp }}</td>
                <td>{{ $datatablesatuan->email }}</td>
                <td>
                    <a href="{{ url("table/" . $table["url"] . "/detail/$datatablesatuan->id") }}" class="btn btn-primary">Detail</a>
                    <a href="{{ url("table/" . $table["url"] . "/edit/$datatablesatuan->id") }}" class="btn btn-warning ml-1">Edit</a>
                </td>
            </tr>
        @endforeach
        @break
    @default
    @endswitch
@else
    <h3 class="mt-3">Data <span id="msgdatanotfound"></span> not Found</h3>
@endif