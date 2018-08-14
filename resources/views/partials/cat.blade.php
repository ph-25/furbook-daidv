<div id="list-cats">
    <table class="table table-border">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Breed name</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td><a href="{{route('cat.show', $cat->id)}}">{{$cat->name}}</a></td>
                <td>{{$cat->date_of_birth}}</td>
                <td><a href="/cats/breeds/{{$cat->breed->name}}">{{$cat->breed->name}}</a></td>
                <td><a class="btn btn-warning" href="{{route('cat.edit', $cat->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('cat.destroy', $cat->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="center">
        {{$cats->links()}}
    </div>
    <script type="application/javascript">
        $(function () {
            $('.pagination a').click(function (e) {
                // Prevent page redirect
                e.preventDefault();

                // Get link from tag a
                var link = $(this).attr('href');

                // Send request
                $.ajax({
                    url: link,
                    type: 'GET',
                    success: function(response){
                        $('#list-cats').html(response);
                    },
                    error: function(errors){
                        console.log(errors);
                    }
                });
            })
        });
    </script>
</div>