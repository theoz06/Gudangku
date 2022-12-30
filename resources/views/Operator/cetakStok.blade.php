<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<span style="text-align: center">
		<h5>LAPORAN GUDANG</h4>
    </span>

    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-sm-1">No</th>
                <th class="col-md-4">Nama Barang</th>
                <th class="col-md-4">Kategori</th>
                <th class="col-md-4">Harga (Rp)</th>
                <th class="col-md-2">Stok</th>
            </tr>
        </thead>
        <tbody>
                
                @foreach ($data as $d)
                <tr>    
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->Nama_barang}}</td>
                    <td>{{$d->Kategori}}</td>
                    <td>Rp. {{$d->Price}}</td>
                    <td>{{$d->JumlahMasuk}}</td>          
                </tr>
            @endforeach
                        
        </tbody>
    </table>
</body>
</html>