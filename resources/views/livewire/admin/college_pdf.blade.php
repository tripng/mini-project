<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table - Mazer Admin Dashboard</title>
    <style>
        table{
            width:100%;
        }
        h2{
            text-align: center;
        }
    </style>
</head>

<body>
<div class="table-responsive w-100">
    <h2>Data Mahasiswa {{$college->college->name}}</h2>
    <h3>Profile Mahasiswa</h3>
    <table class="table table-lg" border="1" cellspacing="0" cellpadding="10">
        <tbody>
            <tr>
                <td><b>Nim</b></td>
                <td>{{$college->nim}}</td>
            </tr>
            <tr>
                <td><b>Nik</b></td>
                <td>{{$college->college->nik}}</td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>{{$college->college->email}}</td>
            </tr>
            <tr>
                <td><b>Nama</b></td>
                <td>{{$college->college->name}}</td>
            </tr>
            <tr>
                <td><b>Tanggal Lahir</b></td>
                <td>{{$college->nim}}</td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>{{$college->college->gender}}</td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td>{{$college->college->address}}</td>
            </tr>
            <tr>
                <td><b>Nomor Telepon</b></td>
                <td>{{$college->college->phone_number}}</td>
            </tr>
        </tbody>
    </table>

    <h3>Data Perkuliahan</h3>
    <table class="table table-lg" border="1" cellspacing="0" cellpadding="10">
        <tbody>
            <tr>
                <td><b>Status</b></td>
                <td>{{$college->college->data->status}}</td>
            </tr>
            <tr>
                <td><b>Angkatan</b></td>
                <td>{{$college->college->data->generation}}</td>
            </tr>
            <tr>
                <td><b>Jenjang Studi</b></td>
                <td>{{$college->college->data->level_of_study}}</td>
            </tr>
            <tr>
                <td><b>Fakultas</b></td>
                <td>{{$college->college->data->fakultas}}</td>
            </tr>
            <tr>
                <td><b>Jurusan</b></td>
                <td>{{$college->college->data->major}}</td>
            </tr>
            <tr>
                <td><b>Jalur Masuk</b></td>
                <td>{{$college->college->data->entrance}}</td>
            </tr>
            <tr>
                <td><b>IPK</b></td>
                <td>{{$college->college->data->ipk}}</td>
            </tr>
            <tr>
                <td><b>Semester</b></td>
                <td>{{$college->college->data->semester}}</td>
            </tr>
        </tbody>
    </table>
</div>

</body>

</html>
