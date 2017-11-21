{{Session::get('message') }}
<hr/>

<form action="{{url('/new-student')}}" method="POST">
    {{ csrf_field()}}
    
    <table> 
        <tr>
            <th>Student Name</th>
            <td><input type="text" name="studentName"></td>
        </tr>

        <tr>
            <th>Phone Number</th>
            <td><input type="number" name="phoneNumber"></td>
        </tr>

        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Submit"></td>
        <tr/>

    </table>  

</form>
