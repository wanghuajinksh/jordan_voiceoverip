        @include('header')
        <div style="margin-top:100px;">
            <label>Name : </label>
            <input type="text" placeholder="type the page name" id="pagename">
            <button onclick="addPage()">Submit</button>
        </div>
    </div>
</body>
<script>
    function addPage(){
        var page_name = document.getElementById("pagename").value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"/submitpage",
            type:"POST",
            data:{
                name:page_name
            },
            cache:false,
            success:function(data){
                alert("Success");
            },
            error:function(error){
                alert("Error");
            }
        });
    }
</script>
</html>
