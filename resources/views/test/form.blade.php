<form action="{{route('test.store')}}" method="POST">
    @csrf
    <input type="text" name="name" id="">
    <input type="text" name="email" id="">
    <input type="text" name="bio" id="">
    <input type="text" name="certification_title" id="">
    <input type="text" name="certification_image" id="">
    <input type="text" name="map_location" id="">
    <input type="date" name="birth_date" id="">
    <input type="submit" name="" id="">
</form>
