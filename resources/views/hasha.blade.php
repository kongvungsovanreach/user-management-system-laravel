@extends("layout.master")
@section("script")
    <script>
        $(document).ready(function(){
            $("#update").click(function(){
                var data = {
                    "name":"this is kong vungsovanreach",
                    "_method":"PUT"
                };
                $.ajax({
                    url:"/api/users/1",
                    method:"POST",
                    data: data,
                    success: function(data){
                        console.log(data);
                    },
                    error: function(err){
                        console.log(err)
                    }
                })
            })

            $("#getData").click(function(){
                $.ajax({
                    url: "/api/users",
                    method:"get",
                    success: function(data){
                        var users = data.data;
                        var table_data = "";
                        for(i=0; i< users.length;i++){
                            table_data += "<tr>";
                            table_data += "<td>"+users[i].id+"</td>"+
                                        "<td>"+users[i].name+"</td>"+
                                        "<td>"+users[i].email+"</td>"+
                                        "<td>"+users[i].phone_number+"</td>";
                            table_data += "<tr>";
                        }
                        $("tbody").html(table_data);
                    }, 
                    error: function(err){
                        alert(err);
                    }
                })
            })
        })
        
    </script>

@endsection
@section("content")
<input id="update" type="button" value="update now">
<input id="getData" type="button" value="Getdata now">
<table>
    <thead>
            <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE NUMBER</th>
                </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection