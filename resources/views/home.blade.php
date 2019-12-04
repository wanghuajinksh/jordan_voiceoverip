        @include('header')
        <table border = "1" style="width:80%;margin-top:100px;" id="product_tbl" class="hoverTable">
            <thead>
                <th width="20%;">No</th>
                <th style="display:none;">ID</th>
                <th width="20%;">Name</th>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($pages as $item)
                
                <tr>
                    <td>{{ $no }}</td>
                    <td><a href="{{ route('page', $item->id)}}">{{ $item->name }}</a></td>
                </tr>
                @php
                   $no++;
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>
</html>
