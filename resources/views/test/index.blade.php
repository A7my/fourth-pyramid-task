<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <h1>Type1 User</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Bio</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($typeOneUsers as $t1)
        <tr>
            <th >{{$t1->id}}</th>
            <td>{{$t1->name}}</td>
            <td>{{$t1->email}}</td>
            <td>{{$t1->bio}}</td>
        </tr>
        @empty
        <tr>
            <td><h3 style="color:red"> There is no data</h3></td>
            <td><h3 style="color:red"> There is no data</h3></td>
            <td><h3 style="color:red"> There is no data</h3></td>
            <td><h3 style="color:red"> There is no data</h3></td>
        </tr>

        @endforelse
        </tbody>
    </table>

    <h1>Type2 User</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Bio</th>
            <th scope="col">Cert. Title</th>
            <th scope="col">Cert. Image</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($typeTwoUsers as $t2)
            <tr>
                <th >{{$t2->id}}</th>
                <td>{{$t2->name}}</td>
                <td>{{$t2->email}}</td>
                <td>{{$t2->bio}}</td>
                <td>{{$t2->certification_title}}</td>
                <td><img width="100px" height="70px" src="{{URL::asset('Images/img/' . $t2->certification_image)}}" alt=""></td>
            </tr>
            @empty
            <tr>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
            </tr>

            @endforelse
        </tbody>
    </table>
    <h1>Type3 User</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Bio</th>
            <th scope="col">Map Location</th>
            <th scope="col">Birth Date</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($typeThreeUsers as $t3)
            <tr>
                <th >{{$t3->id}}</th>
                <td>{{$t3->name}}</td>
                <td>{{$t3->email}}</td>
                <td>{{$t3->bio}}</td>
                <td><iframe src="{{$t3->map_location}}" width="150px" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                <td>{{$t3->birth_date}}</td>
            </tr>
            @empty
            <tr>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
                <td><h3 style="color:red"> There is no data</h3></td>
            </tr>
            @endforelse
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
