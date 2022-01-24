<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
    
    
    <ul>
    <li><a href="#">Home</a></li>
        <?php
        
        $user = null; // sesija
        $user=$_SESSION['user'];
        if($user!=null){
                echo "<li><a rel='$user' id='logout'>Log out</a></li>";
            }
        else{
            echo "<li><a href='login.html'>Sign in</a></li>";
        }
        
        ?> 
      
      </ul>
      <div class="wrap">
      <div class="search">
       <input id="search"style="height: 36px;" type="text" class="searchTerm" placeholder="Enter search term">
        <button type="submit" class="searchButton">
         <i class="fa fa-search"></i>
        </button>
        <button type="submit" class="searchButton" id="sort">
         <i class="fa fa-sort"></i>
        </button>
        <?php
        $user = null;
        $user=$_SESSION['admin'];
        if($user==1){
          echo "<button id='addNew' type='button' class='btn btn-primary' style='margin-left:15px;'>";
          echo "Add";
         echo "</button>";
        }
        ?>
      </div>
  </div>
    <div id="products" class="products">

        </div>
        <div id="form"class="add-new" style="padding-top:0px;">
        <div id="forma" class="form" >
          <form class="add-form" method="post" action="so/addProduct.php">
            <input style="color:black;"type="text" name="url" placeholder="ImageURL"/>
            <input style="color:black;"type="text" name="name"placeholder="Name"/>
            <input style="color:black;"type="text" name="about"placeholder="About"/>
            <input style="color:black;"type="text" name="price"placeholder="Price"/>
            <button>Save</button>
          </form>
        </div>
      </div>
    

</body>
</html>
<script>
    $(document).ready(function(){
        document.getElementById("forma").style.display = "none";
             $.ajax({
                url:'so/userGetProducts.php',
                type:'POST',
                success:function(show_products){
                    if(!show_products.error){
                        $('#products').html(show_products);
                    }


                }

            });  
            //kada neko ukuca nesto u seaech
            $('#search').keyup(function(){

                var search=$('#search').val();
                console.log(search);
                $.ajax({
                    url:'so/userSearchProducts.php',
                    //prosledjujemo preko kljuca search atribut search
                    data:{search:search},
                    type:'POST',
                    success:function(show_products){
                        //ako nema greske onda u result ubacimo data koji je vracen
                        if(!show_products.error){
                          $('#products').html(show_products);
                          if(show_products==""){
                            $.ajax({
                            url:'so/userGetProducts.php',
                            type:'POST',
                            success:function(show_products){
                            if(!show_products.error){
                            $('#products').html(show_products);
                           }
                    }
                }   );  
          console.log("prazno");
                          }
                      }
                  }  

              });
          });
              
            $("#logout").on('click', function(){
            $.ajax({
              url:'so/logout.php',
              type:'POST',
              success:function(){
                window.location.replace("http://localhost/namestaj/index.html"); 
              }
                          });
          });

 


           });
           $("#sort").on('click', function(){
            $.ajax({
              url:'so/userSortProduct.php',
              type:'POST',
              success:function(show_products){
                    if(!show_products.error){
                        $('#products').html(show_products);
                    }
              }
                          });
          });


           $("#addNew").on('click', function(){
        document.getElementById("forma").style.display = "block";

          });
           function myFunction(id){
              console.log(id);

             var user1=document.getElementById("logout");
             var user=$(user1).attr('rel');
            $.ajax({
              url:'so/makeOrder.php',
              type:'POST',
              data:{user:user, id:id},
              success:function(data){
                console.log(data);
                  alert("uspesna kupovina");
              }
                          });
          }
          function edit(id){
            // var prod=document.getElementById("change");
            //  var id=$(prod).attr('value');
             console.log(id);
            $.ajax({
              url:'so/getProduct.php',
              type:'POST',
              data:{id:id},
              success:function(data){
                $('#form').html(data);
              }
                          });
          }
          function update(event,id){
            console.log(id);
            var name1=document.getElementById("name");
             var name=$(name1).attr('value');
             var url1=document.getElementById("url");
             var url=$(url1).attr('value');
             var price1=document.getElementById("price");
             var price=$(price1).attr('value');
            $.ajax({
              url:'so/changeProduct.php',
              type:'POST',
              data:{id:id,name:name,price:price,url:url},
              success:function(data){
                console.log(data)
              }
                          });
          }
          function deleteProduct(id){
            console.log(id);
            $.ajax({
              url:'so/deleteProducts.php',
              type:'POST',
              data:{id:id},
              success:function(data){
                console.log(data);
                  location.reload();
              }
                          });
          }
    </script>