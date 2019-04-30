$( function()
 {
    $(".datepicker").datepicker();//intialize datepicker
    $(".datepicker").datepicker( "option", "dateFormat",'yy-mm-dd');//set format
    $(".datepicker").datepicker( "option",  "minDate", "0" );//hide past and today date

   

  } );

(function($) {
    $(function() {
        $('.timepicker').timepicker({ timeFormat: 'HH:mm:ss p' });
        $('.timepicker').timepicker({ timeFormat: 'HH:mm:ss p' });
    });
})(jQuery);


function minFromMidnight(tm){
 var ampm= tm.substr(-2)
 var clk = tm.substr(0, 5);
 var m  = parseInt(clk.match(/\d+$/)[0], 10);
 var h  = parseInt(clk.match(/^\d+/)[0], 10);
 h += (ampm.match(/pm/i))? 12: 0;
 return h*60+m;
}



$('.pickup_sch').change(function(){
    var value = $( this ).val();
    if(value==1)
    {
        $(".now-grp").show();
        $(".later-grp").hide();
        $(".flex-grp").hide();
    }
    else if(value==2)
    {
        $(".now-grp").hide();
        $(".later-grp").show();
        $(".flex-grp").hide();
    }
    else if(value==3)
    {
        $(".now-grp").hide();
        $(".later-grp").hide();
        $(".flex-grp").show();
    }
});


$( "#add_appointment_button" ).click(function( event ) {
    var validate=0;
    event.preventDefault();
    if(!$('.pickup_sch').is(':checked'))
    { 
        alert("Please Choose time for appointment"); 
        return false;
    }

    var rdval = $('.pickup_sch').val();
    if(rdval==2)
    {
        var stdate = $('#gotherdate').val();
        var time = $('#gothertime').val();
        if(stdate=='')
        {
            alert("Please Choose date for appointment"); 
            return false;
        }
        if(time=='')
        {
            alert("Please Choose time for appointment"); 
            return false;
        }
    }
    if(rdval==3)
    {
        var stdate = $('#gdatefrom').val();
        var enddate = $('#gdateto').val();
        var sttime = $('#gtimefrom').val();
        var endtime = $('#gtimeto').val();

        if(stdate=='')
        {
            alert("Please Choose date from"); 
            return false;
        }
        if(enddate=='')
        {
            alert("Please Choose date to"); 
            return false;
        }
        if(sttime=='')
        {
            alert("Please Choose time from"); 
            return false;
        }
        if(endtime=='')
        {
            alert("Please Choose time to"); 
            return false;
        }

        if(enddate<stdate)
        {
            validate=1;
            alert('end date should greater than start date.')
            
        }
        else if(stdate===enddate)
        {
            st = minFromMidnight(sttime);
            et = minFromMidnight(endtime);
            if(et<st)
            {
                 validate=1;
                alert('end time should greater than start time.')
               
            }
        }

        
    }
    
    if(validate==0)
        {
            var site_url = $("#home_url").val();
            alert(site_url);
            alert($('meta[name="csrf-token"]').attr('content'));
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type:'POST',
            url:site_url+"/general_user/save_appointment",
            data:$('#add_appointment_form').serialize(),
            success:function(data){
                
                alert('success');
            }

            });
        }
        else
        {
            return false;
        }


   
});

