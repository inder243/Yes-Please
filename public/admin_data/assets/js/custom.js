
//hiding  success error msh

$(document).ready(function(){

  $('.forhide').delay(2000).fadeOut();

  /*****prevent first space on inputs*****/
  $("input").on("keypress", function(e) {
      if (e.which === 32 && !this.value.length)
          e.preventDefault();
  });
  
});
 //category

//edit category
 $('.edit').on('click', function(){

                // alert('here');
    var id= $(this).attr('data-id');
    var name=$(this).attr('data-name');
   
    // console.log('id'+id+" "+'name'+name);   
    $("#edit_category").val(name);
    $("#hidden_id").val(id);     
    $("#help-block").html(" ");    
    $("#help-block").removeClass("error");

 });



 $('.submit_category').on('click', function(){

                // alert('here');
    var id= $('#hidden_id').val();
    var name=$('#edit_category').val();
    var sending_url=$("#hidden_url").val();
    // console.log('id'+id+" "+'name'+name);   
   	
     if(name=='')
     {

         $("#help-block").html("Please fill the fields");

     } 
     else
     {

      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
       $.ajax({
               type:'POST',
               url:sending_url+'/admin/edit_category',
               data:{id:id,name:name},
               success:function(data) {
                // alert(data);
                if(data=="success")
                {
                  // alert('here');

                  $("#help-block").removeClass("error");
                  $("#help-block").addClass("succ-admin");
                  $("#help-block").html("Updated successfully");
                  // window.location.href = 'category';
                  location.reload();
                }
                if(data=="error")
                {
                  // alert('here1');

                  $("#help-block").addClass("error");
                   $("#help-block").removeClass("succ-admin");
                  $("#help-block").html("Already exists");
                  // location.reload();

                }

               }
            });

     }

 });


//delete category

 $('.delete_category').on('click', function(){

                // alert('here');
    var id= $(this).attr('data-id');
    var sending_url=$("#hidden_url").val();
 
    if (confirm("Are you sure to deactivate this category and it's sub categories?")) {
        $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
         $.ajax({
                 type:'POST',
                 url:sending_url+'/admin/delete_category',
                 data:{id:id},
                 success:function(data) {
                  // alert('here');
                    location.reload();
                 }
              });

    }
 
    
     
 });



//sub category


//edit sub category
 $('.edit_subcategory').on('click', function(){

                // alert('here');
    var id= $(this).attr('data-id');
    var name=$(this).attr('data-name');
    // console.log('id'+id+" "+'name'+name); 

   var cat_id=$(this).attr('data-categoryid');
    
    $("#category_edit").val(cat_id);
    $("#edit_subcategory").val(name);
    $("#hidden_id_subcategory").val(id);  

    $("#help-block").removeClass("error");   
    $("#help-block-sub").html(" ");    

 });



$('.submit_subcategory').on('click', function(){

                // alert('here');
    var id= $('#hidden_id_subcategory').val();
    var name=$('#edit_subcategory').val();
    var sending_url=$("#hidden_url").val();

    var cat_id=$("#category_edit").val();

    if(name=='')
     {

         $("#help-block-sub").html("Please fill the fields");

     } 
     else if(cat_id=='')
     {
      $("#help-block-sub").html("Please select category");
     }

    else
    {  
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
         $.ajax({
                 type:'POST',
                 url:sending_url+'/admin/edit_subcategory',
                 data:{id:id,name:name,cat_id:cat_id},
                 success:function(data) {
                  // alert(data);
                  if(data=="success")
                  {
                    // alert('here');

                    $("#help-block-sub").removeClass("error");
                    $("#help-block-sub").addClass("succ-admin");
                    $("#help-block-sub").html("Updated successfully");
                    // window.location.href = 'category';
                    location.reload();
                  }
                  if(data=="error")
                  {
                    // alert('here1');
                    $("#help-block-sub").addClass("error");
                    $("#help-block-sub").removeClass("succ-admin");
                    $("#help-block-sub").html("Already exists");
                    // location.reload();

                  }

                 }
              });
     }
 });


//delete sub category


$('.delete_subcategory').on('click', function(){

                // alert('here');
     var id= $(this).attr('data-id');
     var sending_url=$("#hidden_url").val();
     
     if(confirm('Are you sure to deactivate?'))
      {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
         $.ajax({
                 type:'POST',
                 url:sending_url+'/admin/delete_subcategory',
                 data:{id:id},
                 success:function(data) {
                    location.reload();
                  
                  }
              });
      
        }    
 });


//hashtag

//edit hashtag

 $('.edit_hashtag').on('click', function(){

                // alert('here');
    var id= $(this).attr('data-id');
    var name=$(this).attr('data-name');
   
    // console.log('id'+id+" "+'name'+name);   
    $("#edit_hashtag").val(name);
    $("#hidden_id_hash").val(id);     
    $("#help-block").removeClass("error");
    $("#help-block-hash").html(" ");    

 });




 $('.submit_hashtag').on('click', function(){

    var id= $('#hidden_id_hash').val();
    var name=$('#edit_hashtag').val();
    var sending_url=$("#hidden_url").val();
    // console.log('id'+id+" "+'name'+name);   
    
     if(name=='')
     {

         $("#help-block-hash").html("Please fill the fields");

     } 
     else
     {

      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
       $.ajax({
               type:'POST',
               url:sending_url+'/admin/edit_hashtag',
               data:{id:id,name:name},
               success:function(data) {
                // alert(data);
                if(data=="success")
                {
                  // alert('here');

                  $("#help-block-hash").removeClass("error");
                  $("#help-block-hash").addClass("succ-admin");
                  $("#help-block-hash").html("Updated successfully");
                  // window.location.href = 'category';
                  location.reload();
                }
                if(data=="error")
                {
                  // alert('here1');
                  $("#help-block-hash").addClass("error");
                  $("#help-block-hash").removeClass("succ-admin");
                  $("#help-block-hash").html("Already exists");
                  // location.reload();

                }

               }
            });

     }

 });



//delete hashtag

 $('.delete_hashtag').on('click', function(){

                // alert('here');
    var id= $(this).attr('data-id');
    var sending_url=$("#hidden_url").val();
 
    if (confirm("Are you sure to deactivate this hashtag?")) {
        $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
         $.ajax({
                 type:'POST',
                 url:sending_url+'/admin/delete_hashtag',
                 data:{id:id},
                 success:function(data) {
                  // alert('here');
                    location.reload();
                 }
              });

    }
 
    
     
 });

//open image in modal
function openImage(data)
{
    $('#showUserImageGallery').find('.modal-body').find('img').attr('src','');
    $('#showUserImageGallery').find('.modal-body').find('img').attr('src',$(data).attr('data-image'));
    
     $('#showUserImageGallery').modal('show');
}
