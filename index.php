<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
                 <div class="container">

        <div id="divInfo" class="row">
            <div class="col-12">
                <span id="demo1">

                </span>
                <span id="demo2">

                </span>

        </div>
            </div>

        <div><h1>Posts</h1></div>

        <div class="ro"></div>

        <div id="divMain" class="row">
            <div class="col-12">
                <table class="table" >
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
            </tr>  
        </thead>
        <tbody id="tblData">
        </tbody>
    </table>
            </div>
        </div>
    
 </div>

        <script>    
            function btnInfo_click(id){
               // alert(id)
               $("#divInfo").show();
               $("#divMain").hide();
                var url="https://jsonplaceholder.typicode.com/posts/"+id;
                $.getJSON(url)
                    .done((data)=>{
                        $("#demo1").text( JSON.stringify(data));
                var url2 ="https://jsonplaceholder.typicode.com/posts/"+id+"/comment";
                $.getJSON(url2)
                    .done((data)=>{
                        $("#demo2").text( JSON.stringify(data) );
                    })
                    .fail((xhr, status, err)=>{
                    });
        })

            }

            function loadPost(){
                var url = "https://jsonplaceholder.typicode.com/posts";
                $.getJSON(url)
                    .done((data)=>{
                      
                    $.each(data, (k, item)=>{
                        console.log(item)
                        var line = "<tr>"
                            +"<td><button onClick='btnInfo_click("+  item.id +")'"
                            +"class='btn-sm btn-primary'>I</button></td>"
                            +"<td>"+ item.id +"</td>"
                            +"<td>"+ item.title +"</td>"
                            +"<td>"+ item.body +"</td>"
                            +"</tr>";
            $("#tblData").append(line);   

            })  
        })
            .fail((xhr, status, err)=>{
                console.log("error")
        })
    }
       
        $(()=>{
            $("#divInfo").hide();
            loadPost();
        });
      </script>

</body>
</html>