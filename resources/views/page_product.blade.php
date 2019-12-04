        @include('header')
        <table border = "1" style="width:80%;margin-top:100px;" id="product_tbl" class="hoverTable">
            <thead>
                <th width="20%;">No</th>
                <th style="display:none;">ID</th>
                <th width="20%;">Name</th>
                <th width="20%;">Status</th>
                <th width="20%;">Number</th>
                <th width="20%;">prefix</th>
                
            </thead>
            <tbody id="myTBody">

            @php
                $no = 1;
            @endphp

            @foreach ($products as $item)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->tprefix }}</td>
                </tr>
                @php
                   $no++;
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>

</body>
<script>
    setInterval(function(){
        loadData();
    }, 2000)
    function loadData(){
        var page_id = {{ $id }} ;

        $.ajax({
            url:"/getPageProducts/"+page_id,
            type:"GET",
            cache:false,
            success:function(data){
                add_table(data);
            },
            error:function(error){
                alert("Error");
            }
        });
    }
    function add_table(data){
            var txt = "";
            let no = 1;
            
            for(let i=0; i< data.length; i++){
                txt += "<tr id='"+data[i]['id']+"'>";
                txt += "<td>" + no + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['name'] + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['status'] + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['number'] + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['tprefix'] + "</td>";
                txt += "</tr>";
                no++;
            }
            $("#myTBody").empty();
            $("#myTBody").append(txt);
    }
</script>
</html>
