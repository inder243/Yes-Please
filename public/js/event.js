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

$(document).ready(function() {
        var homeurl = $('#home_url').val();
      
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            timeFormat: 'h(:mm)t', // uppercase H for 24-hour clock
            defaultDate: $('#calendar').fullCalendar('today'),
            defaultView: 'month',
            editable: true,
            displayEventTime:true,
            displayEventEnd:true,
            events: home_url+'/business_user/listEvents',
            eventClick: function(calEvent, jsEvent, view) {
            $('#editModal #event_id').val(calEvent._id);
            $('#editModal #title').val(calEvent.title);

            $('#editModal #editdatefrom').val(moment(calEvent.start).format('YYYY-MM-DD'));

           
            if(moment(calEvent.end).format('YYYY-MM-DD')=="Invalid date")
            {
                $('#editModal #editdateto').val('');
            }
            else
            {
                $('#editModal #editdateto').val(moment(calEvent.end).format('YYYY-MM-DD'));
            }
            

            $('#editModal #edittimefrom').val(moment(calEvent.start).format('HH:mm:ss'));

            if(moment(calEvent.end).format('HH:mm:ss')=="Invalid date")
            {
                $('#editModal #edittimeto').val('');
            }
            else
            {
                $('#editModal #edittimeto').val(moment(calEvent.end).format('YYYY-MM-DD'));
            }
            

            $('#editModal').modal();
        }
            
        });
    });




/*$( "#add_new_schedule" ).submit(function( event ) {

 event.preventDefault();
 var validate=0;
  var stdate = $('#datefrom').val();
  var enddate = $('#dateto').val();
  var sttime = $('#timefrom').val();
  var endtime = $('#timeto').val();

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

    if(validate==0)
    {
        $( "#add_new_schedule" ).submit();
    }
    else
    {
        return false;
    }
});*/


/*$( "#edit_schedule" ).submit(function( event ) {

 event.preventDefault();
 var validate=0;
  var stdate = $('#editdatefrom').val();
  var enddate = $('#editdateto').val();
  var sttime = $('#edittimefrom').val();
  var endtime = $('#edittimeto').val();

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

    if(validate==0)
    {
        $( "#edit_schedule" ).submit();
    }
    else
    {
        return false;
    }
});*/




function minFromMidnight(tm){
 var ampm= tm.substr(-2)
 var clk = tm.substr(0, 5);
 var m  = parseInt(clk.match(/\d+$/)[0], 10);
 var h  = parseInt(clk.match(/^\d+/)[0], 10);
 h += (ampm.match(/pm/i))? 12: 0;
 return h*60+m;
}

$('#addpopup').on('shown.bs.modal', function (e) {
 
    $('#title').val('');
    $('#datefrom').val('');
    $('#dateto').val('');
    $('#timefrom').val('');
    $('#timeto').val('');
})

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
    validate=0;
    event.preventDefault();
    if(!$('.pickup_sch').is(':checked'))
    { 
        alert("Choose time for appointment"); 
        return false;
    }

    var rdval = $('.pickup_sch').val();
    if(rdval==3)
    {
        var stdate = $('#gdatefrom').val();
        var enddate = $('#gdateto').val();
        var sttime = $('#gtimefrom').val();
        var endtime = $('#gtimeto').val();

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

        if(validate==0)
        {
            var site_url = $("#home_url").val();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type:'POST',
            url:site_url+"/general_user/save_appointment",
            data:$('#add_new_schedule').serialize(),
            success:function(data){
                
                alert('success');
            }

            });
        }
        else
        {
            return false;
        }
    }
    



   
});

add_appointment_form