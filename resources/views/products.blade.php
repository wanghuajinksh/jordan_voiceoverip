        @include('header')
        <button style="margin-top:100px;" id="add_product"">Add Product</button>
        <select id="page_select">
            <option value="0">All</option>
            @foreach ($pages as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <table border = "1" style="width:80%;margin-top:10px;" id="product_tbl" class="hoverTable">
            <thead>
                <th width="20%;">No</th>
                <th style="display:none;">ID</th>
                <th width="20%;">Name</th>
                <th width="20%;">Price</th>
                <th width="20%;">tprefix</th>
                <th width="40%;">Action</th>
                <th style="display:none;">Page_ID</th>
            </thead>
            <tbody id="myTBody">
           
            @php
               $no=1;
            @endphp
            @foreach($data as $item)
               <tr id="{{ $item->id }}">
                   <td>{{ $no }}</td>
                   <td contenteditable='true'>{{ $item->name }}</td>
                   <td contenteditable='true'>{{ $item->price }}</td>
                   <td contenteditable='true'>{{ $item->tprefix }}</td>
                   <td><button class="row_del">Delete</button></td>
                   <td></td>
               </tr>
               @php
                   $no++;
               @endphp
            @endforeach
            
            </tbody>
        </table>
        <!-- <button style="margin-top:10px;" onclick="addProducts()">Save All</button> -->
        <button style="margin-top:10px;" id="btn_save">Save All</button>
    </div>
    <script>
        
        // setInterval(function(){
        //     loadProducts();
        // }, 5000);
        // function loadProducts(){
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     let page_id = $("#page_select").val();
        //     $.ajax({
        //         url: "/getPageProducts/"+page_id,
        //         type:"GET",
        //         cache:false,
        //         success:function(data){
        //             add_table(data);
        //         },
        //         error:function(error){

        //         }
        //     });
        // }
   
        $("#page_select").click(function(){
            let page_id = $("#page_select").val();
            $.ajax({
                url: "/getPageProducts/"+page_id,
                type:"GET",
                cache:false,
                success:function(data){
                    add_table(data);
                },
                error:function(error){

                }
            });
        })
        function add_table(data){
            var txt = "";
            let no = 1;
            console.log()
            for(let i=0; i< data.length; i++){
                txt += "<tr id='"+data[i]['id']+"'>";
                txt += "<td>" + no + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['name'] + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['price'] + "</td>";
                txt += "<td contenteditable='true'>" + data[i]['tprefix'] + "</td>";
                txt += "<td><button class='row_del'>Delete</button></td>";
                txt += "</tr>";
                no++;
            }
            $("#myTBody").empty();
            $("#myTBody").append(txt);
            $(".row_del").click(function(){
            let id = $(this).parents('td').parents('tr').attr("id");
            let element = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/deleteProduct",
                type:"POST",
                data:{
                    id:id
                },
                success:function(data){
                    
                    if(data=="ok"){
                        console.log(element.parents('td').parents('tr').hide()); 
                        element.parents('td').parents('tr').hide(); 
                    }
                },
                error:function(err){
                    alert("ERRor"); 
                    
                }
            })

        })
        }
        $("#add_product").click(function(){
            var rowCount = $('#product_tbl tr').length;
            
            var txt="";
            txt += "<tr><td>"+ rowCount +"</td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td>";
            txt += "<td><button class='row_del'>Delete</button></td>";
            $("#myTBody").append(txt);

        })

        $("#btn_save").click(function(){
            var rowCount = $('#product_tbl tr').length;
            let page_id = $("#page_select").val();
            let products = [];
            
            $('#myTBody tr').each(function() {
                if (!this.rowIndex) return; // skip first row
                var customerId = this.cells[0].innerHTML;
                products.push({
                    "name":this.cells[1].innerHTML,
                    "price":this.cells[2].innerHTML,
                    "tprefix":this.cells[3].innerHTML,
                });
            });

            console.log(products);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/addProduct",
                type:"POST",
                data:{
                    products:products,
                    page_id: page_id
                },
                dataType: 'json',
                success:function(data){
                },
                error:function(err){
                    alert("ERRor");
                }
            })
        })
        $(".row_del").click(function(){
            let id = $(this).parents('td').parents('tr').attr("id");
            let element = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/deleteProduct",
                type:"POST",
                data:{
                    id:id
                },
                success:function(data){
                    
                    if(data=="ok"){
                        console.log(element.parents('td').parents('tr').hide()); 
                        element.parents('td').parents('tr').hide(); 
                    }
                },
                error:function(err){
                    alert("ERRor"); 
                    
                }
            })

        })
    </script>
</html>
